@extends('admin.layouts.master')

@section('title', 'Job Applications & Candidates')
@section('page-title', 'Job Applications & Candidates')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold m-0 text-dark">Job Applications & Candidates</h4>
        <p class="text-muted small m-0">Review submitted resumes, filter candidate applications, and update hiring statuses.</p>
    </div>
</div>

<!-- Search & Filter Card -->
<div class="admin-card mb-4">
    <div class="admin-card-body p-3">
        <form action="{{ route('admin.applications.index') }}" method="GET" class="row g-3 align-items-center">
            <div class="col-md-4">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0"><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
                    <input type="text" name="search" class="form-control border-start-0" placeholder="Search applicant name, email, phone..." value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-3">
                <select name="job_id" class="form-select" onchange="this.form.submit()">
                    <option value="">All Job Positions</option>
                    @foreach($jobs as $job)
                        <option value="{{ $job->id }}" {{ request('job_id') == $job->id ? 'selected' : '' }}>{{ $job->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select" onchange="this.form.submit()">
                    <option value="">All Application Statuses</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="reviewed" {{ request('status') === 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                    <option value="shortlisted" {{ request('status') === 'shortlisted' ? 'selected' : '' }}>Shortlisted</option>
                    <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
                    <option value="hired" {{ request('status') === 'hired' ? 'selected' : '' }}>Hired</option>
                </select>
            </div>
            <div class="col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-dark w-100"><i class="fa-solid fa-filter me-1"></i> Filter</button>
                @if(request()->hasAny(['search', 'job_id', 'status']))
                    <a href="{{ route('admin.applications.index') }}" class="btn btn-outline-secondary"><i class="fa-solid fa-rotate-left"></i></a>
                @endif
            </div>
        </form>
    </div>
</div>

<!-- Applications Table Card -->
<div class="admin-card">
    <div class="admin-card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle m-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">Applicant Candidate</th>
                        <th>Applied For Position</th>
                        <th>Contact Details</th>
                        <th>Applied Date</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($applications as $app)
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold text-dark">{{ $app->applicant_name }}</div>
                                @if($app->experience_years)
                                    <small class="text-muted"><i class="fa-solid fa-briefcase me-1"></i> Exp: {{ $app->experience_years }}</small>
                                @endif
                            </td>
                            <td>
                                @if($app->job)
                                    <span class="badge bg-light text-dark border">{{ $app->job->title }}</span>
                                @else
                                    <span class="badge bg-secondary">General Application</span>
                                @endif
                            </td>
                            <td>
                                <div><i class="fa-solid fa-envelope me-1 text-primary"></i> <a href="mailto:{{ $app->applicant_email }}" class="text-decoration-none text-dark">{{ $app->applicant_email }}</a></div>
                                <div><i class="fa-solid fa-phone me-1 text-success"></i> <a href="tel:{{ $app->applicant_phone }}" class="text-decoration-none text-dark">{{ $app->applicant_phone }}</a></div>
                            </td>
                            <td>
                                <span class="text-muted small">{{ $app->created_at->format('d M Y, h:i A') }}</span>
                            </td>
                            <td>
                                @php
                                    $statusBadges = [
                                        'pending'     => 'bg-warning text-dark',
                                        'reviewed'    => 'bg-info text-dark',
                                        'shortlisted' => 'bg-primary text-white',
                                        'rejected'    => 'bg-danger text-white',
                                        'hired'       => 'bg-success text-white',
                                    ];
                                @endphp
                                <span class="badge {{ $statusBadges[$app->status] ?? 'bg-secondary' }} px-3 py-2 text-capitalize">
                                    {{ $app->status }}
                                </span>
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('admin.applications.show', $app->id) }}" class="btn btn-sm btn-outline-primary" title="View Application Details">
                                        <i class="fa-solid fa-eye me-1"></i> View
                                    </a>
                                    <a href="{{ route('admin.applications.downloadResume', $app->id) }}" class="btn btn-sm btn-outline-success" title="Download Resume File">
                                        <i class="fa-solid fa-download me-1"></i> Resume
                                    </a>
                                    <form action="{{ route('admin.applications.destroy', $app->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this applicant application?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Application">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="fa-solid fa-file-signature fa-3x mb-3 d-block opacity-50"></i>
                                No candidate applications submitted yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($applications->hasPages())
        <div class="card-footer bg-white p-3 border-top">
            {{ $applications->links() }}
        </div>
    @endif
</div>
@endsection
