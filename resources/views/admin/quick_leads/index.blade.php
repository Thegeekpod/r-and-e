@extends('admin.layouts.master')

@section('title', 'Quick Leads & Popup Manager')
@section('page-title', 'Quick Leads (Global Popup Module)')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm mb-4" role="alert">
        <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Global Popup Toggle & Setting Card -->
<div class="admin-card border-top border-4 {{ ($popupSettings['popup_enabled'] ?? '1') === '1' ? 'border-success' : 'border-danger' }} mb-4">
    <div class="admin-card-header d-flex flex-wrap align-items-center justify-content-between gap-3">
        <div>
            <div class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-toggle-on fs-5 {{ ($popupSettings['popup_enabled'] ?? '1') === '1' ? 'text-success' : 'text-danger' }}"></i>
                <h5 class="fw-bold m-0 text-dark">Global Popup Lead System Control</h5>
            </div>
            <p class="text-muted small m-0 mt-1">
                Enable or turn off the global consultation lead popup across your entire website and configure popup timing.
            </p>
        </div>
        <div>
            @if(($popupSettings['popup_enabled'] ?? '1') === '1')
                <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill fs-6">
                    <i class="fa-solid fa-circle-check me-1"></i> Global Popup is ON (Active)
                </span>
            @else
                <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-2 rounded-pill fs-6">
                    <i class="fa-solid fa-ban me-1"></i> Global Popup is OFF (Disabled)
                </span>
            @endif
        </div>
    </div>
    <div class="admin-card-body">
        <form action="{{ route('admin.quick-leads.settings') }}" method="POST">
            @csrf
            <div class="row g-3 align-items-center">
                <div class="col-12 col-md-3">
                    <div class="p-3 bg-light rounded-3 border">
                        <div class="form-check form-switch fs-5 d-flex align-items-center justify-content-between m-0">
                            <label class="form-check-label fw-bold text-dark fs-6" for="quick_lead_popup_enabled">
                                Popup Status
                            </label>
                            <input class="form-check-input ms-3" type="checkbox" name="quick_lead_popup_enabled" id="quick_lead_popup_enabled" value="1" {{ ($popupSettings['popup_enabled'] ?? '1') === '1' ? 'checked' : '' }}>
                        </div>
                        <small class="text-muted d-block mt-2">
                            Switch to immediately turn ON or OFF popup on user-facing pages.
                        </small>
                    </div>
                </div>

                <div class="col-12 col-md-3">
                    <label class="form-label small fw-bold">Popup Badge Text</label>
                    <input type="text" name="quick_lead_popup_badge" class="form-control" value="{{ $popupSettings['popup_badge'] ?? 'Instant Support' }}" placeholder="e.g. Instant Support">
                </div>

                <div class="col-12 col-md-3">
                    <label class="form-label small fw-bold">Auto-Trigger Delay (Seconds)</label>
                    <input type="number" name="quick_lead_popup_delay" min="1" max="60" class="form-control" value="{{ $popupSettings['popup_delay'] ?? '5' }}" placeholder="5">
                    <small class="text-muted">Seconds before popup triggers automatically</small>
                </div>

                <div class="col-12 col-md-3 text-md-end mt-md-4">
                    <button type="submit" class="btn btn-primary-admin px-4 w-100">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Save Popup Settings
                    </button>
                </div>

                <div class="col-12 col-md-6 mt-3">
                    <label class="form-label small fw-bold">Popup Heading</label>
                    <input type="text" name="quick_lead_popup_title" class="form-control" value="{{ $popupSettings['popup_title'] ?? 'Get Free Expert Consultation' }}" placeholder="e.g. Get Free Expert Consultation">
                </div>

                <div class="col-12 col-md-6 mt-3">
                    <label class="form-label small fw-bold">Popup Subheading</label>
                    <input type="text" name="quick_lead_popup_subtitle" class="form-control" value="{{ $popupSettings['popup_subtitle'] ?? 'Have questions about finance, taxation, admissions, or placements? Talk with our specialists.' }}" placeholder="Popup description...">
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Header & Filter Bar for Leads Table -->
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div>
        <h4 class="fw-bold m-0 text-dark">Quick Leads Submissions</h4>
        <p class="text-muted small m-0">Review captured leads along with the exact website page where the client submitted the inquiry.</p>
    </div>
    <div class="d-flex align-items-center gap-2">
        @if($unreadCount > 0)
            <span class="badge bg-warning text-dark fs-6 px-3 py-2 rounded-pill shadow-sm">
                <i class="fa-solid fa-bolt me-1"></i> {{ $unreadCount }} New / Unread {{ Str::plural('Lead', $unreadCount) }}
            </span>
        @endif
    </div>
</div>

<!-- Search & Source Page Filter Bar -->
<div class="admin-card mb-4">
    <div class="admin-card-body p-3">
        <form method="GET" action="{{ route('admin.quick-leads.index') }}" class="row g-2 align-items-center">
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="fa-solid fa-magnifying-glass"></i></span>
                    <input type="text" name="search" class="form-control border-start-0" placeholder="Search by name, email, phone, service, or page..." value="{{ request('search') }}">
                </div>
            </div>

            <div class="col-md-4">
                <select name="page_filter" class="form-select">
                    <option value="">All Source Pages</option>
                    @foreach($distinctPages as $pageName)
                        <option value="{{ $pageName }}" {{ request('page_filter') == $pageName ? 'selected' : '' }}>
                            Page: {{ $pageName }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary-admin flex-fill">
                    <i class="fa-solid fa-filter me-1"></i> Filter Leads
                </button>
                @if(request('search') || request('page_filter'))
                    <a href="{{ route('admin.quick-leads.index') }}" class="btn btn-outline-secondary" title="Clear Filters">
                        <i class="fa-solid fa-rotate-left"></i>
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>

<!-- Leads List Table -->
<div class="admin-card">
    <div class="admin-card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 70px;" class="ps-4">Status</th>
                        <th>Lead Contact</th>
                        <th>Interest / Service</th>
                        <th style="min-width: 170px;">Captured From Page</th>
                        <th>Inquiry Note</th>
                        <th>Submission Time</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leads as $lead)
                        <tr class="{{ !$lead->is_read ? 'table-warning bg-opacity-25 fw-bold' : '' }}">
                            <td class="ps-4">
                                @if(!$lead->is_read)
                                    <span class="badge bg-danger shadow-sm" title="Unread Lead">NEW</span>
                                @else
                                    <span class="badge bg-secondary-subtle text-secondary" title="Read">Read</span>
                                @endif
                            </td>
                            <td>
                                <div class="text-dark fw-bold fs-6">{{ $lead->name }}</div>
                                <small class="text-muted d-block">
                                    <i class="fa-solid fa-envelope me-1 text-primary"></i> <a href="mailto:{{ $lead->email }}" class="text-decoration-none text-muted">{{ $lead->email }}</a>
                                </small>
                                @if($lead->phone)
                                    <small class="text-muted d-block">
                                        <i class="fa-solid fa-phone me-1 text-success"></i> <a href="tel:{{ $lead->phone }}" class="text-decoration-none text-muted">{{ $lead->phone }}</a>
                                    </small>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-dark text-white px-2 py-1 fs-7">
                                    {{ $lead->service ?? 'General Inquiry' }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <span class="badge bg-info-subtle text-info border border-info-subtle px-2 py-1 fs-7">
                                        <i class="fa-regular fa-file-lines me-1"></i> {{ $lead->source_page ?? 'Direct / Unknown' }}
                                    </span>
                                </div>
                                @if($lead->source_url)
                                    <small class="text-muted d-block mt-1 text-truncate" style="max-width: 220px;">
                                        <a href="{{ $lead->source_url }}" target="_blank" class="text-decoration-none text-secondary" title="{{ $lead->source_url }}">
                                            <i class="fa-solid fa-arrow-up-right-from-square me-1" style="font-size: 0.75rem;"></i> {{ parse_url($lead->source_url, PHP_URL_PATH) ?: '/' }}
                                        </a>
                                    </small>
                                @endif
                            </td>
                            <td style="max-width: 280px;">
                                @if($lead->message)
                                    <div class="text-truncate small text-dark" title="{{ $lead->message }}">
                                        {{ $lead->message }}
                                    </div>
                                @else
                                    <span class="text-muted small fst-italic">No message provided</span>
                                @endif
                            </td>
                            <td>
                                <small class="text-dark d-block">{{ $lead->created_at->format('M d, Y') }}</small>
                                <small class="text-muted d-block">{{ $lead->created_at->format('h:i A') }}</small>
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.quick-leads.show', $lead) }}" class="btn btn-sm btn-outline-primary me-1" title="View Lead Details">
                                    <i class="fa-solid fa-eye"></i> View
                                </a>

                                <form action="{{ route('admin.quick-leads.toggleRead', $lead) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-secondary me-1" title="{{ $lead->is_read ? 'Mark as Unread' : 'Mark as Read' }}">
                                        <i class="fa-solid {{ $lead->is_read ? 'fa-envelope' : 'fa-envelope-open' }}"></i>
                                    </button>
                                </form>

                                <form action="{{ route('admin.quick-leads.destroy', $lead) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to permanently delete this lead?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Lead">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="fa-regular fa-comment-dots fs-1 d-block mb-3 text-secondary"></i>
                                No quick popup leads recorded yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($leads->hasPages())
            <div class="p-3 border-top">
                {{ $leads->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
