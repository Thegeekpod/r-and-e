@extends('admin.layouts.master')

@section('title', 'Candidate Application Details')
@section('page-title', 'Applicant Profile & Resume Review')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold m-0 text-dark">Candidate: {{ $application->applicant_name }}</h4>
        <p class="text-muted small m-0">Applied for {{ $application->job->title ?? 'General Position' }} on {{ $application->created_at->format('d M Y, h:i A') }}</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.applications.downloadResume', $application->id) }}" class="btn btn-success px-4 shadow-sm">
            <i class="fa-solid fa-download me-2"></i> Download Resume File
        </a>
        <a href="{{ route('admin.applications.index') }}" class="btn btn-outline-secondary px-4">
            <i class="fa-solid fa-arrow-left me-2"></i> Back to Applications
        </a>
    </div>
</div>

<div class="row g-4">
    <!-- Candidate Info -->
    <div class="col-lg-7">
        <div class="admin-card mb-4">
            <div class="admin-card-header">
                <h5><i class="fa-solid fa-id-card text-primary me-2"></i> Applicant Profile Details</h5>
            </div>
            <div class="admin-card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="text-muted small d-block">Full Name</label>
                        <div class="fw-bold text-dark fs-6">{{ $application->applicant_name }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small d-block">Applied Position</label>
                        <div class="fw-bold text-dark fs-6">{{ $application->job->title ?? 'N/A' }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small d-block">Email Address</label>
                        <div class="fw-bold text-dark"><a href="mailto:{{ $application->applicant_email }}">{{ $application->applicant_email }}</a></div>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted small d-block">Phone / Mobile</label>
                        <div class="fw-bold text-dark"><a href="tel:{{ $application->applicant_phone }}">{{ $application->applicant_phone }}</a></div>
                    </div>
                    <div class="col-md-4">
                        <label class="text-muted small d-block">Years of Experience</label>
                        <div class="fw-bold text-dark">{{ $application->experience_years ?? 'Not specified' }}</div>
                    </div>
                    <div class="col-md-4">
                        <label class="text-muted small d-block">Current / Last Company</label>
                        <div class="fw-bold text-dark">{{ $application->current_company ?? 'N/A' }}</div>
                    </div>
                    <div class="col-md-4">
                        <label class="text-muted small d-block">Expected Salary</label>
                        <div class="fw-bold text-dark">{{ $application->expected_salary ?? 'N/A' }}</div>
                    </div>
                    <div class="col-12">
                        <label class="text-muted small d-block mb-1">Cover Note / Message</label>
                        <div class="p-3 bg-light rounded-3 border text-dark">
                            {!! nl2br(e($application->cover_note ?? 'No cover message attached.')) !!}
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="text-muted small d-block mb-1">Attached Resume</label>
                        <div class="d-flex align-items-center justify-content-between p-3 bg-light rounded-3 border">
                            <div class="d-flex align-items-center gap-3">
                                <i class="fa-solid fa-file-pdf text-danger fa-2x"></i>
                                <div>
                                    <div class="fw-bold text-dark">{{ basename($application->resume_path) }}</div>
                                    <small class="text-muted">Uploaded on {{ $application->created_at->format('d M Y') }}</small>
                                </div>
                            </div>
                            <a href="{{ route('admin.applications.downloadResume', $application->id) }}" class="btn btn-sm btn-outline-success">
                                <i class="fa-solid fa-download me-1"></i> Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Application Status & Notes -->
    <div class="col-lg-5">
        <div class="admin-card mb-4">
            <div class="admin-card-header">
                <h5><i class="fa-solid fa-user-check text-success me-2"></i> Update Application Status</h5>
            </div>
            <div class="admin-card-body">
                <form action="{{ route('admin.applications.updateStatus', $application->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Candidate Status</label>
                        <select name="status" class="form-select">
                            <option value="pending" {{ $application->status === 'pending' ? 'selected' : '' }}>Pending (Received)</option>
                            <option value="reviewed" {{ $application->status === 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                            <option value="shortlisted" {{ $application->status === 'shortlisted' ? 'selected' : '' }}>Shortlisted for Interview</option>
                            <option value="rejected" {{ $application->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                            <option value="hired" {{ $application->status === 'hired' ? 'selected' : '' }}>Hired</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Internal Admin Notes / Comments</label>
                        <textarea name="admin_notes" rows="5" class="form-control" placeholder="Add interview feedback, notes, or candidate ratings for internal reference...">{{ old('admin_notes', $application->admin_notes) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary-admin w-100 py-2 shadow-sm">
                        <i class="fa-solid fa-floppy-disk me-2"></i> Save Status & Notes
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
