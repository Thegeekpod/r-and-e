<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobPosting;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function index(Request $request)
    {
        $query = JobApplication::with('job')->latest();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('applicant_name', 'like', "%{$search}%")
                  ->orWhere('applicant_email', 'like', "%{$search}%")
                  ->orWhere('applicant_phone', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('job_id')) {
            $query->where('job_posting_id', $request->input('job_id'));
        }

        $applications = $query->paginate(15)->withQueryString();
        $jobs = JobPosting::select('id', 'title')->orderBy('title')->get();

        return view('admin.applications.index', compact('applications', 'jobs'));
    }

    public function show(JobApplication $application)
    {
        $application->load('job');
        return view('admin.applications.show', compact('application'));
    }

    public function updateStatus(Request $request, JobApplication $application)
    {
        $validated = $request->validate([
            'status'      => 'required|in:pending,reviewed,shortlisted,rejected,hired',
            'admin_notes' => 'nullable|string|max:2000',
        ]);

        $application->update($validated);

        return redirect()->back()->with('success', 'Application status updated successfully!');
    }

    public function downloadResume(JobApplication $application)
    {
        $filePath = public_path($application->resume_path);

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'Resume file not found on server.');
        }

        return response()->download($filePath);
    }

    public function destroy(JobApplication $application)
    {
        // Delete uploaded resume if file exists inside uploads/resumes
        if ($application->resume_path && file_exists(public_path($application->resume_path))) {
            @unlink(public_path($application->resume_path));
        }

        $application->delete();

        return redirect()->route('admin.applications.index')->with('success', 'Job application deleted successfully!');
    }
}
