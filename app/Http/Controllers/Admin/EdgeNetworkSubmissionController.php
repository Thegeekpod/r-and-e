<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EdgeNetworkSubmission;
use Illuminate\Http\Request;

class EdgeNetworkSubmissionController extends Controller
{
    public function index(Request $request)
    {
        $query = EdgeNetworkSubmission::query()->latest();

        // Filter by Type
        if ($request->filled('type') && in_array($request->type, ['professional', 'business'])) {
            $query->where('type', $request->type);
        }

        // Filter by Status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search query
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('company_name', 'like', "%{$search}%")
                  ->orWhere('service_needed', 'like', "%{$search}%")
                  ->orWhere('qualification', 'like', "%{$search}%");
            });
        }

        $submissions = $query->paginate(15)->withQueryString();

        // Metrics for summary cards & tabs
        $totalCount         = EdgeNetworkSubmission::count();
        $professionalsCount = EdgeNetworkSubmission::where('type', 'professional')->count();
        $businessesCount    = EdgeNetworkSubmission::where('type', 'business')->count();
        $pendingCount       = EdgeNetworkSubmission::where('status', 'pending')->count();
        $unreadCount        = EdgeNetworkSubmission::where('is_read', false)->count();

        return view('admin.edge_network.index', compact(
            'submissions',
            'totalCount',
            'professionalsCount',
            'businessesCount',
            'pendingCount',
            'unreadCount'
        ));
    }

    public function show(EdgeNetworkSubmission $submission)
    {
        if (!$submission->is_read) {
            $submission->update(['is_read' => true]);
        }

        return view('admin.edge_network.show', compact('submission'));
    }

    public function updateStatus(Request $request, EdgeNetworkSubmission $submission)
    {
        $validated = $request->validate([
            'status'      => 'required|in:pending,contacted,shortlisted,in_progress,completed,rejected',
            'admin_notes' => 'nullable|string|max:5000',
        ]);

        $submission->update($validated);

        return redirect()->back()->with('success', 'Submission status and notes updated successfully.');
    }

    public function toggleRead(EdgeNetworkSubmission $submission)
    {
        $submission->update(['is_read' => !$submission->is_read]);

        return redirect()->back()->with('success', 'Read status updated.');
    }

    public function downloadFile(EdgeNetworkSubmission $submission, $fileType)
    {
        $filePath = null;
        $downloadName = null;

        if ($fileType === 'resume' && $submission->resume_path) {
            $filePath = public_path($submission->resume_path);
            $downloadName = 'Resume_' . str_replace(' ', '_', $submission->name) . '.' . pathinfo($filePath, PATHINFO_EXTENSION);
        } elseif ($fileType === 'attachment' && $submission->attachment_path) {
            $filePath = public_path($submission->attachment_path);
            $downloadName = 'Requirement_' . str_replace(' ', '_', $submission->company_name ?: $submission->name) . '.' . pathinfo($filePath, PATHINFO_EXTENSION);
        }

        if ($filePath && file_exists($filePath)) {
            return response()->download($filePath, $downloadName);
        }

        return redirect()->back()->with('error', 'Requested file does not exist or has been removed.');
    }

    public function destroy(EdgeNetworkSubmission $submission)
    {
        if ($submission->resume_path && file_exists(public_path($submission->resume_path))) {
            @unlink(public_path($submission->resume_path));
        }

        if ($submission->attachment_path && file_exists(public_path($submission->attachment_path))) {
            @unlink(public_path($submission->attachment_path));
        }

        $submission->delete();

        return redirect()->route('admin.edge-network.index')->with('success', 'Submission deleted successfully.');
    }
}
