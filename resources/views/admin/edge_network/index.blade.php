@extends('admin.layouts.master')

@section('title', 'EDGE Accounts Network - Submissions')
@section('page-title', 'EDGE Accounts Network')

@section('content')
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div>
        <h4 class="fw-bold m-0 text-dark">EDGE Accounts Network Submissions</h4>
        <p class="text-muted small m-0">Manage applications from Accounting Professionals and Requirements submitted by Businesses.</p>
    </div>
    @if($unreadCount > 0)
        <span class="badge bg-danger fs-6 px-3 py-2 rounded-pill shadow-sm">
            <i class="fa-solid fa-bell me-1"></i> {{ $unreadCount }} Unread {{ Str::plural('Submission', $unreadCount) }}
        </span>
    @endif
</div>

<!-- Metrics Overview Cards -->
<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="admin-card p-3 mb-0 h-100 d-flex align-items-center gap-3">
            <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: #e0f2fe; color: #0284c7;">
                <i class="fa-solid fa-network-wired fa-lg"></i>
            </div>
            <div>
                <span class="text-muted small fw-medium d-block">Total Submissions</span>
                <h4 class="fw-bold m-0 text-dark">{{ $totalCount }}</h4>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="admin-card p-3 mb-0 h-100 d-flex align-items-center gap-3">
            <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: #dcfce7; color: #166534;">
                <i class="fa-solid fa-user-tie fa-lg"></i>
            </div>
            <div>
                <span class="text-muted small fw-medium d-block">Professionals</span>
                <h4 class="fw-bold m-0 text-dark">{{ $professionalsCount }}</h4>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="admin-card p-3 mb-0 h-100 d-flex align-items-center gap-3">
            <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: #fef3c7; color: #b45309;">
                <i class="fa-solid fa-building fa-lg"></i>
            </div>
            <div>
                <span class="text-muted small fw-medium d-block">Businesses</span>
                <h4 class="fw-bold m-0 text-dark">{{ $businessesCount }}</h4>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="admin-card p-3 mb-0 h-100 d-flex align-items-center gap-3">
            <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background: #fee2e2; color: #b91c1c;">
                <i class="fa-solid fa-clock-rotate-left fa-lg"></i>
            </div>
            <div>
                <span class="text-muted small fw-medium d-block">Pending Review</span>
                <h4 class="fw-bold m-0 text-dark">{{ $pendingCount }}</h4>
            </div>
        </div>
    </div>
</div>

<!-- Type Filter Tabs -->
<div class="d-flex align-items-center gap-2 mb-3">
    <a href="{{ route('admin.edge-network.index', array_merge(request()->except('type', 'page'))) }}" 
       class="btn btn-sm {{ !request('type') ? 'btn-dark' : 'btn-outline-secondary bg-white' }} rounded-pill px-3">
        All Submissions <span class="badge {{ !request('type') ? 'bg-light text-dark' : 'bg-secondary' }} ms-1">{{ $totalCount }}</span>
    </a>
    <a href="{{ route('admin.edge-network.index', array_merge(request()->except('type', 'page'), ['type' => 'professional'])) }}" 
       class="btn btn-sm {{ request('type') === 'professional' ? 'btn-success' : 'btn-outline-secondary bg-white' }} rounded-pill px-3">
        <i class="fa-solid fa-user-graduate me-1"></i> Professionals <span class="badge {{ request('type') === 'professional' ? 'bg-light text-success' : 'bg-secondary' }} ms-1">{{ $professionalsCount }}</span>
    </a>
    <a href="{{ route('admin.edge-network.index', array_merge(request()->except('type', 'page'), ['type' => 'business'])) }}" 
       class="btn btn-sm {{ request('type') === 'business' ? 'btn-warning text-dark' : 'btn-outline-secondary bg-white' }} rounded-pill px-3">
        <i class="fa-solid fa-building me-1"></i> Businesses <span class="badge {{ request('type') === 'business' ? 'bg-dark text-white' : 'bg-secondary' }} ms-1">{{ $businessesCount }}</span>
    </a>
</div>

<!-- Search & Filter Card -->
<div class="admin-card mb-4">
    <div class="admin-card-body p-3">
        <form action="{{ route('admin.edge-network.index') }}" method="GET" class="row g-3 align-items-center">
            @if(request('type'))
                <input type="hidden" name="type" value="{{ request('type') }}">
            @endif
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0"><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
                    <input type="text" name="search" class="form-control border-start-0" placeholder="Search name, company, email, phone, city..." value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-4">
                <select name="status" class="form-select" onchange="this.form.submit()">
                    <option value="">All Statuses</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="contacted" {{ request('status') === 'contacted' ? 'selected' : '' }}>Contacted</option>
                    <option value="shortlisted" {{ request('status') === 'shortlisted' ? 'selected' : '' }}>Shortlisted</option>
                    <option value="in_progress" {{ request('status') === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-dark flex-fill"><i class="fa-solid fa-filter me-1"></i> Filter</button>
                @if(request()->hasAny(['search', 'status']))
                    <a href="{{ route('admin.edge-network.index', request('type') ? ['type' => request('type')] : []) }}" class="btn btn-outline-secondary" title="Reset Filters"><i class="fa-solid fa-rotate-left"></i></a>
                @endif
            </div>
        </form>
    </div>
</div>

<!-- Submissions Table Card -->
<div class="admin-card">
    <div class="admin-card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 40px;" class="ps-3 text-center">Status</th>
                        <th>Type</th>
                        <th>Member / Contact</th>
                        <th>Key Details / Scope</th>
                        <th>Submitted Date</th>
                        <th>Workflow Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($submissions as $sub)
                        <tr class="{{ !$sub->is_read ? 'table-warning bg-opacity-10 fw-bold' : '' }}">
                            <td class="ps-3 text-center">
                                @if(!$sub->is_read)
                                    <span class="badge bg-danger rounded-pill" title="Unread Submission">New</span>
                                @else
                                    <span class="badge bg-secondary rounded-pill" title="Read">Seen</span>
                                @endif
                            </td>
                            <td>
                                @if($sub->type === 'professional')
                                    <span class="badge text-white px-2 py-1 rounded" style="background-color: #0d362a;">
                                        <i class="fa-solid fa-user-graduate me-1"></i> Professional
                                    </span>
                                @else
                                    <span class="badge text-white px-2 py-1 rounded" style="background-color: #8c5825;">
                                        <i class="fa-solid fa-building me-1"></i> Business
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="text-dark fw-bold">{{ $sub->name }}</div>
                                @if($sub->company_name)
                                    <div class="text-muted small"><i class="fa-solid fa-briefcase me-1"></i> {{ $sub->company_name }}</div>
                                @elseif($sub->qualification)
                                    <div class="text-muted small"><i class="fa-solid fa-award me-1"></i> {{ $sub->qualification }} ({{ $sub->experience_years ?? 'N/A' }})</div>
                                @endif
                                <div class="text-muted small">
                                    <i class="fa-solid fa-envelope me-1"></i> {{ $sub->email }}
                                    @if($sub->phone)
                                        <span class="ms-2"><i class="fa-solid fa-phone me-1"></i> {{ $sub->phone }}</span>
                                    @endif
                                </div>
                                @if($sub->city)
                                    <div class="text-muted small"><i class="fa-solid fa-location-dot me-1 text-danger"></i> {{ $sub->city }}</div>
                                @endif
                            </td>
                            <td style="max-width: 280px;">
                                @if($sub->type === 'professional')
                                    @if($sub->skills)
                                        <div class="text-dark small text-truncate" title="{{ $sub->skills }}">
                                            <strong>Skills:</strong> {{ $sub->skills }}
                                        </div>
                                    @endif
                                    @if($sub->availability)
                                        <div class="small text-muted"><strong>Avail:</strong> {{ $sub->availability }}</div>
                                    @endif
                                    @if($sub->resume_path)
                                        <a href="{{ route('admin.edge-network.downloadFile', [$sub, 'resume']) }}" class="badge bg-light text-primary border text-decoration-none mt-1 d-inline-block">
                                            <i class="fa-solid fa-file-pdf me-1"></i> Download CV
                                        </a>
                                    @endif
                                @else
                                    <div class="text-dark small"><strong>Service:</strong> {{ $sub->service_needed }}</div>
                                    @if($sub->expected_budget)
                                        <div class="small text-muted"><strong>Budget:</strong> {{ $sub->expected_budget }}</div>
                                    @endif
                                    <div class="text-muted small text-truncate" title="{{ $sub->requirement_details }}">{{ $sub->requirement_details }}</div>
                                    @if($sub->attachment_path)
                                        <a href="{{ route('admin.edge-network.downloadFile', [$sub, 'attachment']) }}" class="badge bg-light text-primary border text-decoration-none mt-1 d-inline-block">
                                            <i class="fa-solid fa-paperclip me-1"></i> Attachment
                                        </a>
                                    @endif
                                @endif
                            </td>
                            <td>
                                <small class="text-muted">{{ $sub->created_at->format('M d, Y') }}</small>
                                <div class="small text-muted">{{ $sub->created_at->format('h:i A') }}</div>
                            </td>
                            <td>
                                @php
                                    $statusMap = [
                                        'pending'     => ['bg-warning text-dark', 'Pending'],
                                        'contacted'   => ['bg-info text-dark', 'Contacted'],
                                        'shortlisted' => ['bg-primary text-white', 'Shortlisted'],
                                        'in_progress' => ['bg-secondary text-white', 'In Progress'],
                                        'completed'   => ['bg-success text-white', 'Completed'],
                                        'rejected'    => ['bg-danger text-white', 'Rejected'],
                                    ];
                                    $st = $statusMap[$sub->status] ?? ['bg-secondary text-white', ucfirst($sub->status)];
                                @endphp
                                <span class="badge {{ $st[0] }} px-2 py-1">{{ $st[1] }}</span>
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.edge-network.show', $sub) }}" class="btn btn-sm btn-outline-primary me-1" title="View Submission">
                                    <i class="fa-solid fa-eye"></i> View
                                </a>

                                <form action="{{ route('admin.edge-network.toggleRead', $sub) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-secondary me-1" title="{{ $sub->is_read ? 'Mark as Unread' : 'Mark as Read' }}">
                                        <i class="fa-solid {{ $sub->is_read ? 'fa-envelope' : 'fa-envelope-open' }}"></i>
                                    </button>
                                </form>

                                <form action="{{ route('admin.edge-network.destroy', $sub) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this submission?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Submission">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="fa-solid fa-network-wired fs-1 d-block mb-3 text-secondary"></i>
                                No EDGE Accounts Network submissions found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($submissions->hasPages())
            <div class="p-3 border-top">
                {{ $submissions->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
