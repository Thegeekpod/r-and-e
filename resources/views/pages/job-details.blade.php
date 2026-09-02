@extends('layouts.app')

@section('title', $job->title . ' | Edge Hire Job Portal')
@section('main-class', 'placement education job-details-page')

@section('content')

{{-- Job Details Hero Section --}}
<section class="job-details-hero-section">
    <div class="container">
        {{-- Breadcrumb --}}
        <div class="job-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <i class="fa-solid fa-chevron-right"></i>
            <a href="{{ route('placement') }}">Placement Services</a>
            <i class="fa-solid fa-chevron-right"></i>
            <span>{{ $job->title }}</span>
        </div>

        {{-- Hero Card --}}
        <div class="job-details-hero-card">
            <div class="job-hero-top">
                <div class="job-badges">
                    <span class="job-badge-category">{{ $job->category }}</span>
                    <span class="job-badge-type">{{ $job->type }}</span>
                    @if($job->is_featured)
                        <span class="job-badge-featured"><i class="fa-solid fa-star job-icon-space"></i> Featured</span>
                    @endif
                </div>
            </div>

            <h1 class="job-details-title">{{ $job->title }}</h1>
            <p class="job-company-name"><i class="fa-solid fa-building job-icon-space"></i> {{ $job->company_name }}</p>

            <div class="job-meta-row">
                <div class="job-meta-item">
                    <i class="fa-solid fa-location-dot job-icon-danger"></i>
                    <span>{{ $job->location }}</span>
                </div>
                @if($job->salary_range)
                <div class="job-meta-item">
                    <i class="fa-solid fa-indian-rupee-sign job-icon-success"></i>
                    <span>{{ $job->salary_range }}</span>
                </div>
                @endif
                @if($job->experience_required)
                <div class="job-meta-item">
                    <i class="fa-solid fa-user-graduate job-icon-primary"></i>
                    <span>Exp: {{ $job->experience_required }}</span>
                </div>
                @endif
            </div>

            <div class="job-hero-actions">
                <a href="#apply-form" class="btn-job-apply-now">
                    <i class="fa-solid fa-paper-plane job-icon-space"></i> Apply For Position
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Main Content Section --}}
<section class="job-details-body-section">
    <div class="container">

        @if(session('apply_success'))
            <div class="job-alert-success" role="alert">
                <h4 class="job-alert-heading"><i class="fa-solid fa-circle-check job-icon-space"></i> Application Submitted Successfully!</h4>
                <p class="job-alert-text">{{ session('apply_success') }}</p>
            </div>
        @endif

        {{-- Job Description & Details Cards --}}
        <div class="job-details-grid-container">
            <!-- Summary Card -->
            <div class="job-content-card" data-aos="fade-up">
                <h3 class="job-card-heading"><i class="fa-solid fa-file-text job-icon-space"></i> Job Summary</h3>
                <div class="job-card-body-text">
                    {!! nl2br(e($job->description)) !!}
                </div>
            </div>

            <!-- Requirements & Benefits Cards (Custom 2 Column Grid) -->
            @if($job->requirements || $job->benefits)
            <div class="job-two-col-grid">
                @if($job->requirements)
                <div class="job-content-card" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="job-card-heading"><i class="fa-solid fa-list-check job-icon-space"></i> Requirements &amp; Qualifications</h3>
                    <div class="job-card-body-text">
                        {!! nl2br(e($job->requirements)) !!}
                    </div>
                </div>
                @endif

                @if($job->benefits)
                <div class="job-content-card" data-aos="fade-up" data-aos-delay="150">
                    <h3 class="job-card-heading"><i class="fa-solid fa-gift job-icon-space"></i> Perks &amp; Benefits</h3>
                    <div class="job-card-body-text">
                        {!! nl2br(e($job->benefits)) !!}
                    </div>
                </div>
                @endif
            </div>
            @endif
        </div>

        {{-- Application Form Section (Clean White Background Card) --}}
        <div class="job-apply-section" id="apply-form" data-aos="fade-up" data-aos-delay="200">
            <div class="job-apply-form-card">
                <div class="apply-card-header">
                    <span class="apply-badge-pill"><i class="fa-solid fa-bolt job-icon-space"></i> Direct Hiring</span>
                    <h3 class="apply-card-title">Apply For This Position</h3>
                    <p class="apply-card-subtitle">Fill in your contact information and attach your updated resume (PDF or DOC) to apply directly.</p>
                </div>

                <form action="{{ route('jobs.apply', $job->id) }}" method="POST" enctype="multipart/form-data" class="apply-form-body">
                    @csrf

                    <!-- Custom Grid Row 1: Name, Email, Phone (3 Columns) -->
                    <div class="job-form-grid-3">
                        <div class="form-group">
                            <label class="form-label-custom"><i class="fa-solid fa-user job-icon-space job-icon-success"></i> Full Name <span class="job-text-danger">*</span></label>
                            <input type="text" name="applicant_name" class="form-control-custom" placeholder="e.g. Rahul Sharma" value="{{ old('applicant_name') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label-custom"><i class="fa-solid fa-envelope job-icon-space job-icon-success"></i> Email Address <span class="job-text-danger">*</span></label>
                            <input type="email" name="applicant_email" class="form-control-custom" placeholder="rahul@example.com" value="{{ old('applicant_email') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label-custom"><i class="fa-solid fa-phone job-icon-space job-icon-success"></i> Phone Number <span class="job-text-danger">*</span></label>
                            <input type="tel" name="applicant_phone" class="form-control-custom" placeholder="+91 98765 43210" value="{{ old('applicant_phone') }}" required>
                        </div>
                    </div>

                    <!-- Custom Grid Row 2: Experience, Salary, Company (3 Columns) -->
                    <div class="job-form-grid-3">
                        <div class="form-group">
                            <label class="form-label-custom"><i class="fa-solid fa-briefcase job-icon-space job-icon-success"></i> Experience (Years)</label>
                            <input type="text" name="experience_years" class="form-control-custom" placeholder="e.g. 3 Years" value="{{ old('experience_years') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label-custom"><i class="fa-solid fa-indian-rupee-sign job-icon-space job-icon-success"></i> Expected Salary</label>
                            <input type="text" name="expected_salary" class="form-control-custom" placeholder="e.g. ₹35,000/mo" value="{{ old('expected_salary') }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label-custom"><i class="fa-solid fa-building job-icon-space job-icon-success"></i> Current / Last Company</label>
                            <input type="text" name="current_company" class="form-control-custom" placeholder="Company or Hospital name" value="{{ old('current_company') }}">
                        </div>
                    </div>

                    <!-- Custom Grid Row 3: Resume & Cover Note (2 Columns) -->
                    <div class="job-form-grid-2">
                        <div class="form-group">
                            <label class="form-label-custom"><i class="fa-solid fa-file-pdf job-icon-space job-icon-success"></i> Attach Resume (PDF, DOC, DOCX) <span class="job-text-danger">*</span></label>
                            <input type="file" name="resume" class="form-control-custom file-input" accept=".pdf,.doc,.docx" required>
                            <div class="job-form-help">Accepted formats: .pdf, .doc, .docx (Max 10MB)</div>
                        </div>
                        <div class="form-group">
                            <label class="form-label-custom"><i class="fa-solid fa-comment-dots job-icon-space job-icon-success"></i> Cover Note / Message</label>
                            <textarea name="cover_note" rows="2" class="form-control-custom" placeholder="Briefly describe your background or key skills...">{{ old('cover_note') }}</textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="job-submit-wrapper">
                        <button type="submit" class="btn-submit-application">
                            <i class="fa-solid fa-paper-plane job-icon-space"></i> Submit Candidate Application
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>

{{-- Queries & CTA Sections --}}
<section class="queries-final-section">
    <div class="container queries-flex">
        <div class="queries-left">
            <h2>
                {{ $settings['edu_queries_heading'] ?? 'If You Have any Queries Feel Free To Ask !' }}
            </h2>
        </div>
        <div class="queries-right">
            <div class="ask-card">
                <h3>{{ $settings['edu_queries_cta_text'] ?? 'Ask Question' }}</h3>
                <p>{{ $settings['edu_queries_sub_text'] ?? 'If you have Any Queries Feel Free To ask !' }}</p>
                <div class="input-wrapper">
                    <input type="text" placeholder="Type............" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta-banner-section" data-aos="zoom-in">
    <div class="container">
        <div class="cta-banner-card">
            <h2>{{ $settings['edu_cta_banner_title'] ?? 'Ready to Contact with us ?' }}</h2>
            <a href="{{ $settings['edu_cta_banner_btn_url'] ?? '#contact' }}" class="btn-get-started-white">{{ $settings['edu_cta_banner_btn_text'] ?? 'Get Started' }} <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</section>
@endsection
