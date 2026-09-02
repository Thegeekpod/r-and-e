<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use App\Models\JobPosting;
use Illuminate\Http\Request;

class JobPostingController extends Controller
{
    public function index(Request $request)
    {
        $query = JobPosting::withCount('applications')->latest();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('company_name', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $jobs = $query->paginate(15)->withQueryString();

        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        $categories = JobCategory::where('status', 'active')->orderBy('name')->get();
        return view('admin.jobs.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'               => 'required|string|max:255',
            'category'            => 'required|string|max:100',
            'type'                => 'required|string|max:50',
            'company_name'        => 'required|string|max:255',
            'location'            => 'required|string|max:255',
            'salary_range'        => 'nullable|string|max:100',
            'experience_required' => 'nullable|string|max:100',
            'description'         => 'required|string',
            'requirements'        => 'nullable|string',
            'benefits'            => 'nullable|string',
            'deadline'            => 'nullable|date',
            'status'              => 'required|in:published,draft,closed',
            'is_featured'         => 'nullable|boolean',
        ]);

        $validated['is_featured'] = $request->has('is_featured');

        JobPosting::create($validated);

        return redirect()->route('admin.jobs.index')->with('success', 'Job posting created successfully!');
    }

    public function edit(JobPosting $job)
    {
        $categories = JobCategory::where('status', 'active')->orderBy('name')->get();
        return view('admin.jobs.edit', compact('job', 'categories'));
    }


    public function update(Request $request, JobPosting $job)
    {
        $validated = $request->validate([
            'title'               => 'required|string|max:255',
            'category'            => 'required|string|max:100',
            'type'                => 'required|string|max:50',
            'company_name'        => 'required|string|max:255',
            'location'            => 'required|string|max:255',
            'salary_range'        => 'nullable|string|max:100',
            'experience_required' => 'nullable|string|max:100',
            'description'         => 'required|string',
            'requirements'        => 'nullable|string',
            'benefits'            => 'nullable|string',
            'deadline'            => 'nullable|date',
            'status'              => 'required|in:published,draft,closed',
            'is_featured'         => 'nullable|boolean',
        ]);

        $validated['is_featured'] = $request->has('is_featured');

        $job->update($validated);

        return redirect()->route('admin.jobs.index')->with('success', 'Job posting updated successfully!');
    }

    public function destroy(JobPosting $job)
    {
        $job->delete();
        return redirect()->back()->with('success', 'Job posting deleted successfully!');
    }
}
