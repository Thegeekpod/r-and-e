@extends('admin.layouts.master')

@section('title', 'Job Postings Management')
@section('page-title', 'Job Postings Management')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold m-0 text-dark">Job Openings & Postings</h4>
        <p class="text-muted small m-0">Manage active job openings, post new vacancies, and manage job statuses.</p>
    </div>
    <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary-admin px-4 shadow-sm">
        <i class="fa-solid fa-plus me-2"></i> Post New Job
    </a>
</div>

<!-- Search & Filter Card -->
<div class="admin-card mb-4">
    <div class="admin-card-body p-3">
        <form action="{{ route('admin.jobs.index') }}" method="GET" class="row g-3 align-items-center">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0"><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
                    <input type="text" name="search" class="form-control border-start-0" placeholder="Search by title, company, category..." value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select" onchange="this.form.submit()">
                    <option value="">All Statuses</option>
                    <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="closed" {{ request('status') === 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-dark w-100"><i class="fa-solid fa-filter me-1"></i> Filter</button>
                @if(request()->hasAny(['search', 'status']))
                    <a href="{{ route('admin.jobs.index') }}" class="btn btn-outline-secondary"><i class="fa-solid fa-rotate-left"></i></a>
                @endif
            </div>
        </form>
    </div>
</div>

<!-- Jobs Table Card -->
<div class="admin-card">
    <div class="admin-card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle m-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">Job Title</th>
                        <th>Category</th>
                        <th>Type & Location</th>
                        <th>Company</th>
                        <th>Applications</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jobs as $job)
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold text-dark">{{ $job->title }}</div>
                                <small class="text-muted"><i class="fa-solid fa-eye me-1"></i> {{ $job->views_count }} views</small>
                                @if($job->is_featured)
                                    <span class="badge bg-warning text-dark ms-1"><i class="fa-solid fa-star me-1"></i> Featured</span>
                                @endif
                            </td>
                            <td><span class="badge bg-light text-dark border">{{ $job->category }}</span></td>
                            <td>
                                <div><i class="fa-regular fa-clock me-1 text-primary"></i> {{ $job->type }}</div>
                                <small class="text-muted"><i class="fa-solid fa-location-dot me-1 text-danger"></i> {{ $job->location }}</small>
                            </td>
                            <td><span class="fw-medium text-dark">{{ $job->company_name }}</span></td>
                            <td>
                                <a href="{{ route('admin.applications.index', ['job_id' => $job->id]) }}" class="badge bg-info text-dark text-decoration-none px-3 py-2">
                                    <i class="fa-solid fa-users me-1"></i> {{ $job->applications_count }} Applicants
                                </a>
                            </td>
                            <td>
                                @if($job->status === 'published')
                                    <span class="badge bg-success"><i class="fa-solid fa-check me-1"></i> Published</span>
                                @elseif($job->status === 'draft')
                                    <span class="badge bg-secondary"><i class="fa-solid fa-pen-ruler me-1"></i> Draft</span>
                                @else
                                    <span class="badge bg-danger"><i class="fa-solid fa-lock me-1"></i> Closed</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('jobs.show', $job->slug) }}" target="_blank" class="btn btn-sm btn-outline-info" title="Preview Job">
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    </a>
                                    <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn btn-sm btn-outline-primary" title="Edit Job">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this job posting?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Job">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="fa-solid fa-briefcase fa-3x mb-3 d-block opacity-50"></i>
                                No job postings found. Click "Post New Job" to add one!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($jobs->hasPages())
        <div class="card-footer bg-white p-3 border-top">
            {{ $jobs->links() }}
        </div>
    @endif
</div>
@endsection
