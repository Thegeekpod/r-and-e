@extends('admin.layouts.master')

@section('title', 'Dashboard Overview')
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="row g-4 mb-4">
    <!-- Stat 1: Inquiries -->
    <div class="col-md-3 col-sm-6">
        <div class="admin-card p-3 d-flex align-items-center gap-3">
            <div class="rounded-4 p-3 bg-danger bg-opacity-10 text-danger fs-3">
                <i class="fa-solid fa-envelope-open-text"></i>
            </div>
            <div>
                <span class="text-muted small fw-semibold text-uppercase">Inquiries</span>
                <h3 class="fw-bold m-0 text-dark">
                    {{ $stats['inquiries_count'] }}
                    @if($stats['unread_inquiries'] > 0)
                        <span class="badge bg-danger fs-6 rounded-pill align-middle ms-1">{{ $stats['unread_inquiries'] }} new</span>
                    @endif
                </h3>
            </div>
        </div>
    </div>

    <!-- Stat 2: Testimonials -->
    <div class="col-md-3 col-sm-6">
        <div class="admin-card p-3 d-flex align-items-center gap-3">
            <div class="rounded-4 p-3 bg-success bg-opacity-10 text-success fs-3">
                <i class="fa-solid fa-comment-dots"></i>
            </div>
            <div>
                <span class="text-muted small fw-semibold text-uppercase">Testimonials</span>
                <h3 class="fw-bold m-0 text-dark">{{ $stats['testimonials_count'] }}</h3>
            </div>
        </div>
    </div>

    <!-- Stat 3: Client Partners -->
    <div class="col-md-3 col-sm-6">
        <div class="admin-card p-3 d-flex align-items-center gap-3">
            <div class="rounded-4 p-3 bg-primary bg-opacity-10 text-primary fs-3">
                <i class="fa-solid fa-handshake"></i>
            </div>
            <div>
                <span class="text-muted small fw-semibold text-uppercase">Client Partners</span>
                <h3 class="fw-bold m-0 text-dark">{{ $stats['clients_count'] }}</h3>
            </div>
        </div>
    </div>

    <!-- Stat 4: Site Settings -->
    <div class="col-md-3 col-sm-6">
        <div class="admin-card p-3 d-flex align-items-center gap-3">
            <div class="rounded-4 p-3 bg-warning bg-opacity-10 text-warning fs-3">
                <i class="fa-solid fa-sliders"></i>
            </div>
            <div>
                <span class="text-muted small fw-semibold text-uppercase">Settings Fields</span>
                <h3 class="fw-bold m-0 text-dark">{{ $stats['settings_count'] }}</h3>
            </div>
        </div>
    </div>
</div>

<!-- Quick Shortcuts -->
<div class="admin-card mb-4">
    <div class="admin-card-header">
        <h5><i class="fa-solid fa-bolt text-warning me-2"></i> Quick Content Actions</h5>
    </div>
    <div class="admin-card-body">
        <div class="row g-3">
            <div class="col-md-3">
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-dark p-3 text-start w-100 rounded-3 d-flex align-items-center justify-content-between">
                    <div>
                        <div class="fw-bold"><i class="fa-solid fa-envelope-open-text text-danger me-2"></i> View Inquiries</div>
                        <small class="text-muted">Review incoming leads</small>
                    </div>
                    <i class="fa-solid fa-chevron-right text-muted"></i>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.home.index') }}" class="btn btn-outline-dark p-3 text-start w-100 rounded-3 d-flex align-items-center justify-content-between">
                    <div>
                        <div class="fw-bold"><i class="fa-solid fa-house-laptop text-success me-2"></i> Home Page Editor</div>
                        <small class="text-muted">Hero, Services & Graphics</small>
                    </div>
                    <i class="fa-solid fa-chevron-right text-muted"></i>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-dark p-3 text-start w-100 rounded-3 d-flex align-items-center justify-content-between">
                    <div>
                        <div class="fw-bold"><i class="fa-solid fa-plus-circle text-primary me-2"></i> Testimonials</div>
                        <small class="text-muted">Add / edit client reviews</small>
                    </div>
                    <i class="fa-solid fa-chevron-right text-muted"></i>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('admin.settings.index') }}" class="btn btn-outline-dark p-3 text-start w-100 rounded-3 d-flex align-items-center justify-content-between">
                    <div>
                        <div class="fw-bold"><i class="fa-solid fa-gear text-info me-2"></i> Site Settings</div>
                        <small class="text-muted">Logo, phone, email & socials</small>
                    </div>
                    <i class="fa-solid fa-chevron-right text-muted"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Recent Inquiries -->
    <div class="col-md-6">
        <div class="admin-card h-100">
            <div class="admin-card-header">
                <h5><i class="fa-solid fa-envelope text-danger me-2"></i> Recent Inquiries</h5>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline-primary rounded-pill">View All</a>
            </div>
            <div class="admin-card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Sender</th>
                                <th>Service</th>
                                <th>Date</th>
                                <th class="text-end pe-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recent_inquiries as $inq)
                                <tr class="{{ !$inq->is_read ? 'fw-bold' : '' }}">
                                    <td>
                                        <div>{{ $inq->name }}</div>
                                        <small class="text-muted">{{ $inq->email }}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-dark">{{ $inq->service ?? 'General' }}</span>
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $inq->created_at->diffForHumans() }}</small>
                                    </td>
                                    <td class="text-end pe-3">
                                        <a href="{{ route('admin.contacts.show', $inq) }}" class="btn btn-sm btn-outline-primary">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">No inquiries yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Preview -->
    <div class="col-md-6">
        <div class="admin-card h-100">
            <div class="admin-card-header">
                <h5><i class="fa-solid fa-comment-dots text-success me-2"></i> Recent Testimonials</h5>
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-sm btn-outline-primary rounded-pill">View All</a>
            </div>
            <div class="admin-card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Client</th>
                                <th>Role</th>
                                <th>Rating</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recent_testimonials as $t)
                                <tr>
                                    <td>
                                        <div class="fw-bold">{{ $t->name }}</div>
                                    </td>
                                    <td>{{ $t->role }}</td>
                                    <td>
                                        <span class="text-warning">
                                            @for($i=0; $i<$t->rating; $i++) ★ @endfor
                                        </span>
                                    </td>
                                    <td>
                                        @if($t->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">No testimonials added yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
