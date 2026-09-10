@extends('layouts.app')

@section('title', 'Current Job Vacancies & Careers | Edge Hire')
@section('main-class', 'placement education jobs-list-page')

@section('content')

{{-- Jobs Page Hero & Header --}}
<section class="job-details-hero-section">
    <div class="container">
        {{-- Breadcrumb --}}
        <div class="job-breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <i class="fa-solid fa-chevron-right"></i>
            <a href="{{ route('placement') }}">Placement Services</a>
            <i class="fa-solid fa-chevron-right"></i>
            <span>All Vacancies</span>
        </div>

        <div class="jobs-portal-header">
            <h1 class="job-details-title mb-2">Current Openings &amp; Opportunities</h1>
            <p class="job-company-name mb-0">Explore verified job opportunities across Healthcare, Hospital Management, Finance, Academics, and Corporate verticals.</p>
        </div>
    </div>
</section>

{{-- Jobs Listing & Search Section --}}
<section class="job-details-body-section">
    <div class="container">

        {{-- Search Bar Form --}}
        <form action="{{ route('jobs.index') }}" method="GET" class="jobs-search-bar mb-5" data-aos="fade-up">
            {{-- Job Title / Keyword Field --}}
            <div class="jobs-search-field">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="keyword" placeholder="Nurse, Doctor, Accounts..." value="{{ request('keyword') }}" />
            </div>
            <div class="jobs-search-divider"></div>
            {{-- Location Field --}}
            <div class="jobs-search-field">
                <i class="fa-solid fa-location-dot"></i>
                <input type="text" name="location" placeholder="Durgapur, Kolkata..." value="{{ request('location') }}" />
            </div>
            <div class="jobs-search-divider"></div>
            {{-- Category Field --}}
            <div class="jobs-search-field">
                <i class="fa-solid fa-layer-group"></i>
                <select name="category">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>
            <div class="jobs-search-divider"></div>
            {{-- Job Type Field --}}
            <div class="jobs-search-field">
                <i class="fa-regular fa-clock"></i>
                <select name="type">
                    <option value="">All Types</option>
                    <option value="Full-time" {{ request('type') === 'Full-time' ? 'selected' : '' }}>Full-time</option>
                    <option value="Part-time" {{ request('type') === 'Part-time' ? 'selected' : '' }}>Part-time</option>
                    <option value="Contract" {{ request('type') === 'Contract' ? 'selected' : '' }}>Contract</option>
                    <option value="Freelance" {{ request('type') === 'Freelance' ? 'selected' : '' }}>Freelance</option>
                </select>
            </div>
            <button type="submit" class="jobs-search-btn">Search jobs</button>
        </form>

        {{-- Active Filters Reset Indicator --}}
        @if(request()->filled('keyword') || request()->filled('location') || request()->filled('category') || request()->filled('type'))
            <div class="d-flex align-items-center justify-content-between mb-4 bg-white p-3 rounded-3 shadow-sm border">
                <div>
                    <span class="fw-bold text-dark me-2"><i class="fa-solid fa-filter text-primary me-1"></i> Active Filters:</span>
                    @if(request('keyword')) <span class="badge bg-primary me-1">Keyword: {{ request('keyword') }}</span> @endif
                    @if(request('location')) <span class="badge bg-info text-dark me-1">Location: {{ request('location') }}</span> @endif
                    @if(request('category')) <span class="badge bg-success me-1">Category: {{ request('category') }}</span> @endif
                    @if(request('type')) <span class="badge bg-dark me-1">Type: {{ request('type') }}</span> @endif
                </div>
                <a href="{{ route('jobs.index') }}" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-xmark me-1"></i> Clear Filters</a>
            </div>
        @endif

        {{-- Jobs Grid --}}
        <div class="jobs-grid" data-aos="fade-up" data-aos-delay="100">
            @forelse($jobs as $job)
            <div class="job-card">
                <div class="job-card-top">
                    <h3 class="job-card-title">{{ $job->title }}</h3>
                    <span class="job-card-type">{{ $job->type }}</span>
                </div>
                @if(!empty($job->company_name))
                    <p class="job-card-company">{{ $job->company_name }}</p>
                @endif
                <div class="job-card-meta">
                    <span><i class="fa-solid fa-location-dot" style="color:#e53935;"></i> {{ $job->location }}</span>
                    @if($job->salary_range)
                        <span><i class="fa-solid fa-indian-rupee-sign" style="color:#2e7d32;"></i> {{ $job->salary_range }}</span>
                    @endif
                </div>
                <p class="job-card-desc">
                    {{ Str::limit($job->description, 140) }}
                </p>
                <a href="{{ route('jobs.show', $job->slug) }}" class="job-card-btn">View Details &amp; Apply</a>
            </div>
            @empty
            <div class="col-12 text-center py-5 bg-white rounded-4 shadow-sm p-5 border">
                <i class="fa-solid fa-briefcase fa-4x text-muted mb-3 d-block"></i>
                <h3 class="fw-bold text-dark mb-2">No Matching Job Openings Found</h3>
                <p class="text-muted mb-4">We couldn't find any active job postings matching your current search parameters.</p>
                <a href="{{ route('jobs.index') }}" class="btn-job-apply-now" style="background:#095145; color:#ffffff !important;">Browse All Vacancies</a>
            </div>
            @endforelse
        </div>

        {{-- Pagination Links --}}
        @if($jobs->hasPages())
        <div class="jobs-pagination-wrapper" data-aos="fade-up">
            {{ $jobs->links('partials.pagination') }}
        </div>
        @endif



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
