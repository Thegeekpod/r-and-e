@extends('admin.layouts.master')

@section('title', 'Quick Lead Details')
@section('page-title', 'Quick Lead Details')

@section('content')
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div>
        <h4 class="fw-bold m-0 text-dark">Lead from {{ $quickLead->name }}</h4>
        <p class="text-muted small m-0">
            Captured on {{ $quickLead->created_at->format('l, F d, Y \a\t h:i A') }}
            ({{ $quickLead->created_at->diffForHumans() }})
        </p>
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ route('admin.quick-leads.index') }}" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left me-1"></i> Back to Quick Leads
        </a>
        <a href="mailto:{{ $quickLead->email }}?subject=Regarding your consultation request - Roy Infinity Edge" class="btn btn-primary-admin">
            <i class="fa-solid fa-reply me-1"></i> Reply via Email
        </a>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5 class="fw-bold text-dark m-0"><i class="fa-regular fa-message text-primary me-2"></i> Inquiry & Requirement Details</h5>
            </div>
            <div class="admin-card-body">
                <div class="mb-4">
                    <label class="form-label text-muted small">Service / Domain of Interest</label>
                    <div>
                        <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 fs-6 rounded-pill">
                            {{ $quickLead->service ?? 'General Consultation' }}
                        </span>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label text-muted small">Message / Note</label>
                    <div class="p-4 bg-light rounded-4 border text-dark" style="white-space: pre-line; line-height: 1.7; font-size: 15px;">
                        {{ $quickLead->message ?: 'No additional message was provided with this quick popup lead submission.' }}
                    </div>
                </div>

                <!-- Page Tracking Banner -->
                <div class="p-3 bg-info-subtle border border-info-subtle rounded-3 mb-4">
                    <div class="d-flex align-items-center gap-2">
                        <i class="fa-solid fa-location-crosshairs text-info fs-5"></i>
                        <div>
                            <div class="fw-bold text-dark">Captured on: {{ $quickLead->source_page ?? 'Direct / Unknown' }}</div>
                            @if($quickLead->source_url)
                                <small class="text-muted d-block text-break">
                                    Full URL: <a href="{{ $quickLead->source_url }}" target="_blank" class="text-decoration-none text-info fw-semibold">{{ $quickLead->source_url }}</a>
                                </small>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                    <form action="{{ route('admin.quick-leads.toggleRead', $quickLead) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary btn-sm">
                            <i class="fa-solid {{ $quickLead->is_read ? 'fa-envelope' : 'fa-envelope-open' }} me-2"></i>
                            {{ $quickLead->is_read ? 'Mark as Unread' : 'Mark as Read' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.quick-leads.destroy', $quickLead) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this lead?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            <i class="fa-solid fa-trash-can me-2"></i> Delete Lead
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5 class="fw-bold text-dark m-0"><i class="fa-regular fa-user text-success me-2"></i> Lead Profile</h5>
            </div>
            <div class="admin-card-body">
                <div class="mb-3">
                    <label class="form-label text-muted small">Full Name</label>
                    <div class="fw-bold fs-6 text-dark">{{ $quickLead->name }}</div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted small">Email Address</label>
                    <div>
                        <a href="mailto:{{ $quickLead->email }}" class="text-decoration-none fw-semibold">
                            <i class="fa-solid fa-envelope me-1"></i> {{ $quickLead->email }}
                        </a>
                    </div>
                </div>

                @if($quickLead->phone)
                    <div class="mb-3">
                        <label class="form-label text-muted small">Phone Number</label>
                        <div>
                            <a href="tel:{{ $quickLead->phone }}" class="text-decoration-none fw-semibold text-success">
                                <i class="fa-solid fa-phone me-1"></i> {{ $quickLead->phone }}
                            </a>
                        </div>
                    </div>
                @endif

                <div class="mb-3">
                    <label class="form-label text-muted small">Origin Page Name</label>
                    <div class="fw-semibold text-dark">
                        <i class="fa-regular fa-file-lines me-1 text-primary"></i> {{ $quickLead->source_page ?? 'Direct' }}
                    </div>
                </div>

                @if($quickLead->ip_address)
                    <div class="mb-3">
                        <label class="form-label text-muted small">Client IP Address</label>
                        <div class="small text-muted font-monospace">{{ $quickLead->ip_address }}</div>
                    </div>
                @endif

                <div class="mb-0">
                    <label class="form-label text-muted small">Received At</label>
                    <div class="small text-muted">{{ $quickLead->created_at->format('M d, Y - h:i A') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
