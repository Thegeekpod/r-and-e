@extends('admin.layouts.master')

@section('title', 'About Us Page Content Editor | Admin Panel')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1"><i class="fa-solid fa-circle-info text-primary me-2"></i> About Us Page Content Editor</h3>
            <p class="text-muted mb-0">Manage all text, banner titles, hero stats, story pillars, mission/vision, and core values for the public About Us page.</p>
        </div>
        <a href="{{ route('about') }}" target="_blank" class="btn btn-outline-primary rounded-pill px-3">
            <i class="fa-solid fa-eye me-1"></i> Preview About Page
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- 1. Hero Section Card --}}
        <div class="admin-card mb-4">
            <div class="admin-card-header">
                <h5><i class="fa-solid fa-star text-warning me-2"></i> Hero Banner &amp; Quick Stats</h5>
            </div>
            <div class="admin-card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Section Badge Text</label>
                        <input type="text" name="about_hero_badge" class="form-control" value="{{ $settings['about_hero_badge']->value ?? 'About Roy Infinity Edge' }}">
                    </div>
                    <div class="col-md-8">
                        <label class="form-label fw-bold">Hero Title / Heading</label>
                        <input type="text" name="about_hero_title" class="form-control" value="{{ $settings['about_hero_title']->value ?? 'Empowering Futures Across Finance, Education & Talent Placement' }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold">Hero Subtitle / Description</label>
                        <textarea name="about_hero_subtitle" rows="3" class="form-control">{{ $settings['about_hero_subtitle']->value ?? 'We are an integrated multi-disciplinary consulting organization committed to driving sustainable growth, institutional strength, and professional success across India.' }}</textarea>
                    </div>

                    {{-- Quick Stats Inline Inputs --}}
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Stat 1 (Experience Number)</label>
                        <input type="text" name="about_exp_years" class="form-control mb-1" value="{{ $settings['about_exp_years']->value ?? '12+' }}">
                        <input type="text" name="about_exp_label" class="form-control form-control-sm text-muted" value="{{ $settings['about_exp_label']->value ?? 'Years Excellence' }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Stat 2 (Clients)</label>
                        <input type="text" name="about_stat1_number" class="form-control mb-1" value="{{ $settings['about_stat1_number']->value ?? '500+' }}">
                        <input type="text" name="about_stat1_label" class="form-control form-control-sm text-muted" value="{{ $settings['about_stat1_label']->value ?? 'Corporate Clients' }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Stat 3 (Admissions)</label>
                        <input type="text" name="about_stat2_number" class="form-control mb-1" value="{{ $settings['about_stat2_number']->value ?? '1,200+' }}">
                        <input type="text" name="about_stat2_label" class="form-control form-control-sm text-muted" value="{{ $settings['about_stat2_label']->value ?? 'Admissions' }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Stat 4 (Placements)</label>
                        <input type="text" name="about_stat3_number" class="form-control mb-1" value="{{ $settings['about_stat3_number']->value ?? '2,500+' }}">
                        <input type="text" name="about_stat3_label" class="form-control form-control-sm text-muted" value="{{ $settings['about_stat3_label']->value ?? 'Placements' }}">
                    </div>
                </div>
            </div>
        </div>

        {{-- 2. Company Story & Pillars Card --}}
        <div class="admin-card mb-4">
            <div class="admin-card-header">
                <h5><i class="fa-solid fa-book-open text-primary me-2"></i> Company Story &amp; Pillars of Success</h5>
            </div>
            <div class="admin-card-body">
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label fw-bold">Story Section Heading</label>
                        <input type="text" name="about_story_heading" class="form-control" value="{{ $settings['about_story_heading']->value ?? 'Who We Are & Our Legacy' }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Story Paragraph 1</label>
                        <textarea name="about_story_content_p1" rows="4" class="form-control">{{ $settings['about_story_content_p1']->value ?? '' }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Story Paragraph 2</label>
                        <textarea name="about_story_content_p2" rows="4" class="form-control">{{ $settings['about_story_content_p2']->value ?? '' }}</textarea>
                    </div>

                    {{-- Pillars of Success --}}
                    <div class="col-12 mt-4">
                        <h6 class="fw-bold text-success border-bottom pb-2">Right-Side Pillars of Success Highlights</h6>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-bold">Pillars Box Heading</label>
                        <input type="text" name="about_pillar_title" class="form-control" value="{{ $settings['about_pillar_title']->value ?? 'Key Pillars of Success' }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Pillar 1 Title &amp; Subtext</label>
                        <input type="text" name="about_pillar1_title" class="form-control mb-1" value="{{ $settings['about_pillar1_title']->value ?? 'Finance & Taxation' }}">
                        <textarea name="about_pillar1_desc" rows="2" class="form-control">{{ $settings['about_pillar1_desc']->value ?? 'GST filings, audit compliance, and strategic financial planning for enterprises.' }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Pillar 2 Title &amp; Subtext</label>
                        <input type="text" name="about_pillar2_title" class="form-control mb-1" value="{{ $settings['about_pillar2_title']->value ?? 'Education Consultancy' }}">
                        <textarea name="about_pillar2_desc" rows="2" class="form-control">{{ $settings['about_pillar2_desc']->value ?? 'Nursing & Medical admissions with full INC & WBNC accreditation guidance.' }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Pillar 3 Title &amp; Subtext</label>
                        <input type="text" name="about_pillar3_title" class="form-control mb-1" value="{{ $settings['about_pillar3_title']->value ?? 'Healthcare Recruitment' }}">
                        <textarea name="about_pillar3_desc" rows="2" class="form-control">{{ $settings['about_pillar3_desc']->value ?? 'Doctor & Nursing staff placements across leading hospitals in India.' }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        {{-- 3. Mission, Vision & Promise Card --}}
        <div class="admin-card mb-4">
            <div class="admin-card-header">
                <h5><i class="fa-solid fa-bullseye text-success me-2"></i> Mission, Vision &amp; Institutional Promise</h5>
            </div>
            <div class="admin-card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Mission Title</label>
                        <input type="text" name="about_mission_title" class="form-control mb-2" value="{{ $settings['about_mission_title']->value ?? 'Our Mission' }}">
                        <label class="form-label fw-bold">Mission Description</label>
                        <textarea name="about_mission_desc" rows="4" class="form-control">{{ $settings['about_mission_desc']->value ?? '' }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Vision Title</label>
                        <input type="text" name="about_vision_title" class="form-control mb-2" value="{{ $settings['about_vision_title']->value ?? 'Our Vision' }}">
                        <label class="form-label fw-bold">Vision Description</label>
                        <textarea name="about_vision_desc" rows="4" class="form-control">{{ $settings['about_vision_desc']->value ?? '' }}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Institutional Promise Title</label>
                        <input type="text" name="about_promise_title" class="form-control mb-2" value="{{ $settings['about_promise_title']->value ?? 'Our Institutional Promise' }}">
                        <label class="form-label fw-bold">Promise Description</label>
                        <textarea name="about_promise_desc" rows="4" class="form-control">{{ $settings['about_promise_desc']->value ?? 'We maintain 100% compliance transparency, zero hidden charges, and continuous support for students, job applicants, and corporate clients nationwide.' }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        {{-- 4. Core Values Card --}}
        <div class="admin-card mb-4">
            <div class="admin-card-header">
                <h5><i class="fa-solid fa-shield-heart text-danger me-2"></i> Core Values (4 Pillars)</h5>
            </div>
            <div class="admin-card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 bg-light">
                            <h6 class="fw-bold text-primary mb-3">Value 1</h6>
                            <label class="form-label fw-bold">Title</label>
                            <input type="text" name="about_value1_title" class="form-control mb-2" value="{{ $settings['about_value1_title']->value ?? 'Uncompromising Integrity' }}">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="about_value1_desc" rows="2" class="form-control">{{ $settings['about_value1_desc']->value ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 bg-light">
                            <h6 class="fw-bold text-primary mb-3">Value 2</h6>
                            <label class="form-label fw-bold">Title</label>
                            <input type="text" name="about_value2_title" class="form-control mb-2" value="{{ $settings['about_value2_title']->value ?? 'Sectoral Expertise' }}">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="about_value2_desc" rows="2" class="form-control">{{ $settings['about_value2_desc']->value ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 bg-light">
                            <h6 class="fw-bold text-primary mb-3">Value 3</h6>
                            <label class="form-label fw-bold">Title</label>
                            <input type="text" name="about_value3_title" class="form-control mb-2" value="{{ $settings['about_value3_title']->value ?? 'Client-Centric Dedication' }}">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="about_value3_desc" rows="2" class="form-control">{{ $settings['about_value3_desc']->value ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="border rounded-3 p-3 bg-light">
                            <h6 class="fw-bold text-primary mb-3">Value 4</h6>
                            <label class="form-label fw-bold">Title</label>
                            <input type="text" name="about_value4_title" class="form-control mb-2" value="{{ $settings['about_value4_title']->value ?? 'Continuous Innovation' }}">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="about_value4_desc" rows="2" class="form-control">{{ $settings['about_value4_desc']->value ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Submit Button --}}
        <div class="d-flex justify-content-end mb-5">
            <button type="submit" class="btn btn-primary-admin px-5 py-3 shadow-lg fs-6">
                <i class="fa-solid fa-floppy-disk me-2"></i> Save About Page Changes
            </button>
        </div>
    </form>
</div>
@endsection
