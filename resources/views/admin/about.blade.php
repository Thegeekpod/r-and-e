@extends('admin.layouts.master')

@section('title', 'About Us Page Content Editor | Admin Panel')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1"><i class="fa-solid fa-circle-info text-primary me-2"></i> About Us Page Content Editor</h3>
            <p class="text-muted mb-0">Manage all text, banner images, story paragraphs, mission/vision, and impact counters for the public About Us page.</p>
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
                <h5><i class="fa-solid fa-star text-warning me-2"></i> Hero Banner Section</h5>
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
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Hero Banner Graphic Image</label>
                        <input type="file" name="about_hero_image" class="form-control" accept="image/*">
                        @if(isset($settings['about_hero_image']->value))
                            <div class="img-preview-box mt-2">
                                <img src="{{ asset($settings['about_hero_image']->value) }}" alt="Hero Image Preview">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- 2. Company Legacy & Story Card --}}
        <div class="admin-card mb-4">
            <div class="admin-card-header">
                <h5><i class="fa-solid fa-book-open text-primary me-2"></i> Company Legacy &amp; Story</h5>
            </div>
            <div class="admin-card-body">
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label fw-bold">Section Heading</label>
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
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Story Section Image</label>
                        <input type="file" name="about_story_img" class="form-control" accept="image/*">
                        @if(isset($settings['about_story_img']->value))
                            <div class="img-preview-box mt-2">
                                <img src="{{ asset($settings['about_story_img']->value) }}" alt="Story Image Preview">
                            </div>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Experience Badge (Number)</label>
                        <input type="text" name="about_exp_years" class="form-control" value="{{ $settings['about_exp_years']->value ?? '12+' }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Experience Badge (Label)</label>
                        <input type="text" name="about_exp_label" class="form-control" value="{{ $settings['about_exp_label']->value ?? 'Years of Consulting Excellence' }}">
                    </div>
                </div>
            </div>
        </div>

        {{-- 3. Mission & Vision Card --}}
        <div class="admin-card mb-4">
            <div class="admin-card-header">
                <h5><i class="fa-solid fa-bullseye text-success me-2"></i> Mission &amp; Vision</h5>
            </div>
            <div class="admin-card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Mission Title</label>
                        <input type="text" name="about_mission_title" class="form-control mb-2" value="{{ $settings['about_mission_title']->value ?? 'Our Mission' }}">
                        <label class="form-label fw-bold">Mission Description</label>
                        <textarea name="about_mission_desc" rows="4" class="form-control">{{ $settings['about_mission_desc']->value ?? '' }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Vision Title</label>
                        <input type="text" name="about_vision_title" class="form-control mb-2" value="{{ $settings['about_vision_title']->value ?? 'Our Vision' }}">
                        <label class="form-label fw-bold">Vision Description</label>
                        <textarea name="about_vision_desc" rows="4" class="form-control">{{ $settings['about_vision_desc']->value ?? '' }}</textarea>
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

        {{-- 5. Impact Statistics Card --}}
        <div class="admin-card mb-4">
            <div class="admin-card-header">
                <h5><i class="fa-solid fa-chart-line text-info me-2"></i> Impact Statistics &amp; Counters</h5>
            </div>
            <div class="admin-card-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Stat 1 Number</label>
                        <input type="text" name="about_stat1_number" class="form-control mb-2" value="{{ $settings['about_stat1_number']->value ?? '500+' }}">
                        <label class="form-label fw-bold">Stat 1 Label</label>
                        <input type="text" name="about_stat1_label" class="form-control" value="{{ $settings['about_stat1_label']->value ?? 'Corporate Clients Served' }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Stat 2 Number</label>
                        <input type="text" name="about_stat2_number" class="form-control mb-2" value="{{ $settings['about_stat2_number']->value ?? '1,200+' }}">
                        <label class="form-label fw-bold">Stat 2 Label</label>
                        <input type="text" name="about_stat2_label" class="form-control" value="{{ $settings['about_stat2_label']->value ?? 'Successful Admissions' }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Stat 3 Number</label>
                        <input type="text" name="about_stat3_number" class="form-control mb-2" value="{{ $settings['about_stat3_number']->value ?? '2,500+' }}">
                        <label class="form-label fw-bold">Stat 3 Label</label>
                        <input type="text" name="about_stat3_label" class="form-control" value="{{ $settings['about_stat3_label']->value ?? 'Healthcare Placements' }}">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Stat 4 Number</label>
                        <input type="text" name="about_stat4_number" class="form-control mb-2" value="{{ $settings['about_stat4_number']->value ?? '99.8%' }}">
                        <label class="form-label fw-bold">Stat 4 Label</label>
                        <input type="text" name="about_stat4_label" class="form-control" value="{{ $settings['about_stat4_label']->value ?? 'Client Satisfaction Rate' }}">
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
