@extends('admin.layouts.master')

@section('title', 'Inquiry Details')
@section('page-title', 'Contact Message Details')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold m-0 text-dark">Inquiry from {{ $contact->name }}</h4>
        <p class="text-muted small m-0">Received on {{ $contact->created_at->format('l, F d, Y \a\t h:i A') }}</p>
    </div>
    <div>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary me-2">
            <i class="fa-solid fa-arrow-left me-2"></i> Back to Messages
        </a>
        <a href="mailto:{{ $contact->email }}?subject=Re: {{ rawurlencode($contact->subject ?? 'Inquiry via Roy Infinity Edge') }}" class="btn btn-primary-admin">
            <i class="fa-solid fa-reply me-2"></i> Reply via Email
        </a>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-8">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5 class="fw-bold text-dark m-0">Message Content</h5>
            </div>
            <div class="admin-card-body">
                @if($contact->subject)
                    <div class="mb-4">
                        <label class="form-label text-muted small">Subject</label>
                        <h5 class="fw-bold text-dark">{{ $contact->subject }}</h5>
                    </div>
                @endif

                <div class="mb-4">
                    <label class="form-label text-muted small">Inquiry Message</label>
                    <div class="p-4 bg-light rounded-4 border text-dark" style="white-space: pre-line; line-height: 1.7; font-size: 16px;">
                        {{ $contact->message }}
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                    <form action="{{ route('admin.contacts.toggleRead', $contact) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary btn-sm">
                            <i class="fa-solid {{ $contact->is_read ? 'fa-envelope' : 'fa-envelope-open' }} me-2"></i>
                            {{ $contact->is_read ? 'Mark as Unread' : 'Mark as Read' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            <i class="fa-solid fa-trash-can me-2"></i> Delete Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="admin-card">
            <div class="admin-card-header">
                <h5 class="fw-bold text-dark m-0">Sender Profile</h5>
            </div>
            <div class="admin-card-body">
                <div class="mb-3">
                    <label class="form-label text-muted small">Full Name</label>
                    <div class="fw-bold fs-6 text-dark">{{ $contact->name }}</div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted small">Email Address</label>
                    <div>
                        <a href="mailto:{{ $contact->email }}" class="text-decoration-none fw-semibold">
                            <i class="fa-solid fa-envelope me-1"></i> {{ $contact->email }}
                        </a>
                    </div>
                </div>

                @if($contact->phone)
                    <div class="mb-3">
                        <label class="form-label text-muted small">Phone Number</label>
                        <div>
                            <a href="tel:{{ $contact->phone }}" class="text-decoration-none fw-semibold">
                                <i class="fa-solid fa-phone me-1"></i> {{ $contact->phone }}
                            </a>
                        </div>
                    </div>
                @endif

                <div class="mb-3">
                    <label class="form-label text-muted small">Requested Service</label>
                    <div>
                        <span class="badge bg-success px-3 py-2 fs-6 rounded-pill">
                            {{ $contact->service ?? 'General Inquiry' }}
                        </span>
                    </div>
                </div>

                <div class="mb-0">
                    <label class="form-label text-muted small">Submission Timestamp</label>
                    <div class="small text-muted">{{ $contact->created_at->format('M d, Y - h:i A') }} ({{ $contact->created_at->diffForHumans() }})</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
