@extends('admin.layouts.master')

@section('title', 'Submission Details: ' . $submission->name)
@section('page-title', 'EDGE Accounts Network - Submission Details')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.edge-network.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
        <i class="fa-solid fa-arrow-left me-1"></i> Back to Submissions
    </a>
</div>

<div class="row g-4">
    <!-- Left Column: Details -->
    <div class="col-lg-8">
        <div class="admin-card">
            <div class="admin-card-header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-2">
                    @if($submission->type === 'professional')
                        <span class="badge text-white px-3 py-2 rounded-pill" style="background-color: #0d362a;">
                            <i class="fa-solid fa-user-graduate me-1"></i> Accounting Professional Profile
                        </span>
                    @else
                        <span class="badge text-white px-3 py-2 rounded-pill" style="background-color: #8c5825;">
                            <i class="fa-solid fa-building me-1"></i> Business Requirement
                        </span>
                    @endif
                </div>
                <small class="text-muted"><i class="fa-solid fa-calendar me-1"></i> Submitted: {{ $submission->created_at->format('M d, Y h:i A') }}</small>
            </div>
            <div class="admin-card-body">
                <div class="d-flex align-items-start gap-3 pb-3 mb-4 border-bottom">
                    <div class="rounded-circle d-flex align-items-center justify-content-center text-white" 
                         style="width: 56px; height: 56px; font-size: 1.5rem; background: {{ $submission->type === 'professional' ? '#0d362a' : '#8c5825' }};">
                        <i class="fa-solid {{ $submission->type === 'professional' ? 'fa-user' : 'fa-building' }}"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-1 text-dark">{{ $submission->name }}</h4>
                        @if($submission->company_name)
                            <h6 class="text-primary mb-1"><i class="fa-solid fa-briefcase me-1"></i> {{ $submission->company_name }}</h6>
                        @endif
                        <div class="text-muted small">
                            <span class="me-3"><i class="fa-solid fa-envelope me-1 text-primary"></i> <a href="mailto:{{ $submission->email }}" class="text-decoration-none text-dark">{{ $submission->email }}</a></span>
                            <span class="me-3"><i class="fa-solid fa-phone me-1 text-success"></i> <a href="tel:{{ $submission->phone }}" class="text-decoration-none text-dark">{{ $submission->phone }}</a></span>
                            @if($submission->city)
                                <span><i class="fa-solid fa-location-dot me-1 text-danger"></i> {{ $submission->city }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                @if($submission->type === 'professional')
                    <!-- Professional Profile Fields -->
                    <div class="row g-3 mb-4">
                        <div class="col-sm-6">
                            <div class="p-3 bg-light rounded-3 border">
                                <span class="text-muted small d-block">Highest Qualification</span>
                                <strong class="text-dark fs-6">{{ $submission->qualification ?? 'Not Specified' }}</strong>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-light rounded-3 border">
                                <span class="text-muted small d-block">Total Experience</span>
                                <strong class="text-dark fs-6">{{ $submission->experience_years ?? 'Not Specified' }}</strong>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-light rounded-3 border">
                                <span class="text-muted small d-block">Availability Preference</span>
                                <strong class="text-dark fs-6">{{ $submission->availability ?? 'Not Specified' }}</strong>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-light rounded-3 border">
                                <span class="text-muted small d-block">Expected Compensation / Fees</span>
                                <strong class="text-dark fs-6">{{ $submission->expected_fees ?? 'Negotiable / Not Specified' }}</strong>
                            </div>
                        </div>
                    </div>

                    @if($submission->skills)
                        <div class="mb-4">
                            <h6 class="fw-bold text-dark mb-2">Skills & Areas of Expertise</h6>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach(explode(',', $submission->skills) as $skill)
                                    <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-2 rounded-pill">
                                        <i class="fa-solid fa-check-circle me-1"></i> {{ trim($skill) }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if($submission->bio)
                        <div class="mb-4">
                            <h6 class="fw-bold text-dark mb-2">Professional Summary / Bio</h6>
                            <div class="p-3 bg-light rounded-3 border text-dark" style="white-space: pre-line; line-height: 1.6;">
                                {{ $submission->bio }}
                            </div>
                        </div>
                    @endif

                    @if($submission->resume_path)
                        <div class="p-3 rounded-3 border d-flex align-items-center justify-content-between" style="background: #f0fdf4;">
                            <div class="d-flex align-items-center gap-3">
                                <i class="fa-solid fa-file-pdf fa-2x text-danger"></i>
                                <div>
                                    <div class="fw-bold text-dark">Uploaded Resume / CV</div>
                                    <small class="text-muted">Attached by professional</small>
                                </div>
                            </div>
                            <a href="{{ route('admin.edge-network.downloadFile', [$submission, 'resume']) }}" class="btn btn-sm btn-success rounded-pill px-3">
                                <i class="fa-solid fa-download me-1"></i> Download Resume
                            </a>
                        </div>
                    @endif

                @else
                    <!-- Business Requirement Fields -->
                    <div class="row g-3 mb-4">
                        <div class="col-sm-6">
                            <div class="p-3 bg-light rounded-3 border">
                                <span class="text-muted small d-block">Organization / Company</span>
                                <strong class="text-dark fs-6">{{ $submission->company_name ?? 'Not Specified' }}</strong>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-light rounded-3 border">
                                <span class="text-muted small d-block">Industry / Nature of Business</span>
                                <strong class="text-dark fs-6">{{ $submission->business_nature ?? 'Not Specified' }}</strong>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-light rounded-3 border">
                                <span class="text-muted small d-block">Required Service</span>
                                <strong class="text-primary fs-6">{{ $submission->service_needed ?? 'General Accounting' }}</strong>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-light rounded-3 border">
                                <span class="text-muted small d-block">Engagement Type</span>
                                <strong class="text-dark fs-6">{{ $submission->engagement_type ?? 'Not Specified' }}</strong>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="p-3 bg-light rounded-3 border">
                                <span class="text-muted small d-block">Expected Budget / Professional Fees (Approx.)</span>
                                <strong class="text-dark fs-6">{{ $submission->expected_budget ?? 'Flexible / Open to Quote' }}</strong>
                            </div>
                        </div>
                    </div>

                    @if($submission->requirement_details)
                        <div class="mb-4">
                            <h6 class="fw-bold text-dark mb-2">Scope of Work & Assignment Details</h6>
                            <div class="p-3 bg-light rounded-3 border text-dark" style="white-space: pre-line; line-height: 1.6;">
                                {{ $submission->requirement_details }}
                            </div>
                        </div>
                    @endif

                    @if($submission->attachment_path)
                        <div class="p-3 rounded-3 border d-flex align-items-center justify-content-between" style="background: #fefce8;">
                            <div class="d-flex align-items-center gap-3">
                                <i class="fa-solid fa-paperclip fa-2x text-warning"></i>
                                <div>
                                    <div class="fw-bold text-dark">Requirement Document / RFP</div>
                                    <small class="text-muted">Attached by business client</small>
                                </div>
                            </div>
                            <a href="{{ route('admin.edge-network.downloadFile', [$submission, 'attachment']) }}" class="btn btn-sm btn-warning text-dark fw-bold rounded-pill px-3">
                                <i class="fa-solid fa-download me-1"></i> Download Attachment
                            </a>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>

    <!-- Right Column: Status & Admin Actions -->
    <div class="col-lg-4">
        <!-- Status & Internal Notes Card -->
        <div class="admin-card mb-4">
            <div class="admin-card-header">
                <h5><i class="fa-solid fa-sliders me-2 text-primary"></i> Workflow Status & Notes</h5>
            </div>
            <div class="admin-card-body">
                <form action="{{ route('admin.edge-network.updateStatus', $submission) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted">Current Workflow Status</label>
                        <select name="status" class="form-select">
                            <option value="pending" {{ $submission->status === 'pending' ? 'selected' : '' }}>Pending Review</option>
                            <option value="contacted" {{ $submission->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="shortlisted" {{ $submission->status === 'shortlisted' ? 'selected' : '' }}>Shortlisted / Matching</option>
                            <option value="in_progress" {{ $submission->status === 'in_progress' ? 'selected' : '' }}>In Progress / Assigned</option>
                            <option value="completed" {{ $submission->status === 'completed' ? 'selected' : '' }}>Completed / Closed</option>
                            <option value="rejected" {{ $submission->status === 'rejected' ? 'selected' : '' }}>Rejected / Ineligible</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold small text-muted">Internal Admin Notes</label>
                        <textarea name="admin_notes" class="form-control" rows="4" placeholder="Add confidential notes, assigned accounting partner, or progress tracking details...">{{ $submission->admin_notes }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary-admin w-100">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Update Status & Notes
                    </button>
                </form>
            </div>
        </div>

        <!-- Quick Contact Actions Card -->
        <div class="admin-card mb-4">
            <div class="admin-card-header">
                <h5><i class="fa-solid fa-bolt me-2 text-warning"></i> Direct Contact</h5>
            </div>
            <div class="admin-card-body d-flex flex-column gap-2">
                <a href="mailto:{{ $submission->email }}?subject={{ urlencode('Regarding your EDGE Accounts Network submission') }}" class="btn btn-outline-primary d-flex align-items-center justify-content-center gap-2">
                    <i class="fa-solid fa-envelope"></i> Send Email
                </a>
                @if($submission->phone)
                    @php
                        $cleanPhone = preg_replace('/[^0-9]/', '', $submission->phone);
                    @endphp
                    <a href="https://wa.me/{{ $cleanPhone }}" target="_blank" class="btn btn-outline-success d-flex align-items-center justify-content-center gap-2">
                        <i class="fa-brands fa-whatsapp"></i> Chat on WhatsApp
                    </a>
                    <a href="tel:{{ $submission->phone }}" class="btn btn-outline-dark d-flex align-items-center justify-content-center gap-2">
                        <i class="fa-solid fa-phone"></i> Call Phone
                    </a>
                @endif
            </div>
        </div>

        <!-- Danger Zone -->
        <div class="admin-card border-danger border-opacity-25">
            <div class="admin-card-header bg-danger bg-opacity-10 text-danger">
                <h5 class="text-danger m-0"><i class="fa-solid fa-triangle-exclamation me-2"></i> Manage Record</h5>
            </div>
            <div class="admin-card-body d-flex flex-column gap-2">
                <form action="{{ route('admin.edge-network.toggleRead', $submission) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-secondary w-100">
                        <i class="fa-solid {{ $submission->is_read ? 'fa-envelope' : 'fa-envelope-open' }} me-1"></i>
                        {{ $submission->is_read ? 'Mark as Unread' : 'Mark as Read' }}
                    </button>
                </form>

                <form action="{{ route('admin.edge-network.destroy', $submission) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this submission?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger w-100">
                        <i class="fa-solid fa-trash-can me-1"></i> Delete Submission
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
