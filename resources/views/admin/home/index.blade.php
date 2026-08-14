@extends('admin.layouts.master')

@section('title', 'Home Page Content Editor')
@section('page-title', 'Home Page Content Management')

@section('content')
<form action="{{ route('admin.home.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold m-0 text-dark">Customize Home Page</h4>
            <p class="text-muted small m-0">Edit texts, stats, banners, service cards, and section images.</p>
        </div>
        <button type="submit" class="btn btn-primary-admin px-4">
            <i class="fa-solid fa-floppy-disk me-2"></i> Save All Changes
        </button>
    </div>

    <!-- Navigation Tabs -->
    <ul class="nav nav-tabs mb-4 bg-white p-2 rounded-3 shadow-sm" id="homeTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="hero-tab" data-bs-toggle="tab" data-bs-target="#hero-pane" type="button" role="tab">
                <i class="fa-solid fa-wand-magic-sparkles me-2"></i> 1. Hero & Stats
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="services-tab" data-bs-toggle="tab" data-bs-target="#services-pane" type="button" role="tab">
                <i class="fa-solid fa-briefcase me-2"></i> 2. About & 3 Services
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="taxation-tab" data-bs-toggle="tab" data-bs-target="#taxation-pane" type="button" role="tab">
                <i class="fa-solid fa-calculator me-2"></i> 3. Taxation Feature
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="education-tab" data-bs-toggle="tab" data-bs-target="#education-pane" type="button" role="tab">
                <i class="fa-solid fa-graduation-cap me-2"></i> 4. Education Feature
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="placement-tab" data-bs-toggle="tab" data-bs-target="#placement-pane" type="button" role="tab">
                <i class="fa-solid fa-user-doctor me-2"></i> 5. Placement Feature
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="queries-tab" data-bs-toggle="tab" data-bs-target="#queries-pane" type="button" role="tab">
                <i class="fa-solid fa-circle-question me-2"></i> 6. Queries & CTA
            </button>
        </li>
    </ul>

    <!-- Tab Contents -->
    <div class="tab-content" id="homeTabsContent">
        <!-- 1. HERO SECTION -->
        <div class="tab-pane fade show active" id="hero-pane" role="tabpanel">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-heading text-primary me-2"></i> Hero Main Headings & Buttons</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Hero Title - Line 1 (Dark Text)</label>
                            <input type="text" name="hero_title_line1" class="form-control" value="{{ $settings['hero_title_line1'] ?? 'One Partner.' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Hero Title - Line 2 (Green Highlight Text)</label>
                            <input type="text" name="hero_title_line2" class="form-control" value="{{ $settings['hero_title_line2'] ?? 'Infinite Solutions.' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Hero Subtitle</label>
                            <input type="text" name="hero_subtitle" class="form-control" value="{{ $settings['hero_subtitle'] ?? 'Expert Consulting in Finance, Education & Placement' }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Button 1 Text</label>
                            <input type="text" name="hero_btn1_text" class="form-control" value="{{ $settings['hero_btn1_text'] ?? 'Explore Services' }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Button 1 Link URL</label>
                            <input type="text" name="hero_btn1_url" class="form-control" value="{{ $settings['hero_btn1_url'] ?? '#services' }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Button 2 Text</label>
                            <input type="text" name="hero_btn2_text" class="form-control" value="{{ $settings['hero_btn2_text'] ?? 'Book Consultation' }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Button 2 Link URL</label>
                            <input type="text" name="hero_btn2_url" class="form-control" value="{{ $settings['hero_btn2_url'] ?? '#consultation' }}">
                        </div>
                    </div>

                    <h6 class="fw-bold text-dark mt-4 mb-3 border-bottom pb-2">Hero Stats & Visuals</h6>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Stat 1 Label & Value</label>
                            <div class="input-group mb-2">
                                <input type="text" name="hero_stat1_label" class="form-control" placeholder="Label" value="{{ $settings['hero_stat1_label'] ?? 'Downloads' }}">
                                <input type="text" name="hero_stat1_value" class="form-control" placeholder="Value" value="{{ $settings['hero_stat1_value'] ?? '432K+' }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Stat 2 Label & Value</label>
                            <div class="input-group mb-2">
                                <input type="text" name="hero_stat2_label" class="form-control" placeholder="Label" value="{{ $settings['hero_stat2_label'] ?? 'User' }}">
                                <input type="text" name="hero_stat2_value" class="form-control" placeholder="Value" value="{{ $settings['hero_stat2_value'] ?? '200K+' }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Stat 3 Label & Value</label>
                            <div class="input-group mb-2">
                                <input type="text" name="hero_stat3_label" class="form-control" placeholder="Label" value="{{ $settings['hero_stat3_label'] ?? 'Community' }}">
                                <input type="text" name="hero_stat3_value" class="form-control" placeholder="Value" value="{{ $settings['hero_stat3_value'] ?? '20K+' }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Company Trust Count</label>
                            <input type="text" name="hero_trust_count" class="form-control" value="{{ $settings['hero_trust_count'] ?? '230+' }}">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Company Trust Subtext</label>
                            <input type="text" name="hero_trust_text" class="form-control" value="{{ $settings['hero_trust_text'] ?? 'some big companies that we work with, and trust us very much' }}">
                        </div>

                        <!-- Hero Images -->
                        <div class="col-md-4">
                            <label class="form-label">Hero Hand Arrow Image</label>
                            <input type="file" name="hero_arrow_img" class="form-control">
                            <div class="img-preview-box">
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('hero_arrow_img', 'images/arrow.png') }}" alt="Arrow Preview">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Growth Circle Arrow Image</label>
                            <input type="file" name="hero_growth_arrow_img" class="form-control">
                            <div class="img-preview-box">
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('hero_growth_arrow_img', 'images/angle-arrow.webp') }}" alt="Angle Arrow Preview">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Analytics Card Banner Image</label>
                            <input type="file" name="hero_banner2_img" class="form-control">
                            <div class="img-preview-box">
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('hero_banner2_img', 'images/banner-2.webp') }}" alt="Banner Preview">
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <label class="form-label">Bottom Ticker / Banner Text</label>
                            <input type="text" name="bottom_banner_text" class="form-control" value="{{ $settings['bottom_banner_text'] ?? 'Finance & Taxation | Education Consultancy | Job Placement services' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. ABOUT & 3 SERVICES -->
        <div class="tab-pane fade" id="services-pane" role="tabpanel">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-briefcase text-success me-2"></i> Section Header</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <label class="form-label">Heading Prefix</label>
                            <input type="text" name="about_heading_prefix" class="form-control" value="{{ $settings['about_heading_prefix'] ?? 'About Roy' }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Heading Highlight (Green)</label>
                            <input type="text" name="about_heading_highlight" class="form-control" value="{{ $settings['about_heading_highlight'] ?? 'Infinity Edge' }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Heading Suffix</label>
                            <input type="text" name="about_heading_suffix" class="form-control" value="{{ $settings['about_heading_suffix'] ?? 'Consulting' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Section Subtitle</label>
                            <input type="text" name="about_subtitle" class="form-control" value="{{ $settings['about_subtitle'] ?? 'Your Trusted Partner in Finance, Education, and Recruitment Solutions.' }}">
                        </div>
                    </div>

                    <!-- 3 Cards -->
                    <div class="row g-4 mt-2">
                        <!-- Card 1: Finance -->
                        <div class="col-md-4">
                            <div class="card h-100 border rounded-4 shadow-sm p-3">
                                <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-coins text-warning me-2"></i> Card 1: Finance</h6>
                                <div class="mb-3">
                                    <label class="form-label small">Card Title</label>
                                    <input type="text" name="service1_title" class="form-control" value="{{ $settings['service1_title'] ?? 'Finance & Taxation' }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">Features / Points (One per line)</label>
                                    <textarea name="service1_points" rows="4" class="form-control">{{ $settings['service1_points'] ?? "Taxation & Compliance\nBusiness Advisory\nGST & Accounting\nExplore Finance Services" }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">Button Text & Link</label>
                                    <input type="text" name="service1_btn_text" class="form-control mb-2" value="{{ $settings['service1_btn_text'] ?? 'Explore Finance Services' }}">
                                    <input type="text" name="service1_btn_url" class="form-control" value="{{ $settings['service1_btn_url'] ?? '/finance' }}">
                                </div>
                                <div>
                                    <label class="form-label small">Card Image</label>
                                    <input type="file" name="service1_img" class="form-control">
                                    <div class="img-preview-box mt-2">
                                        <img src="{{ \App\Models\SiteSetting::getImageUrl('service1_img', 'images/finance.webp') }}" alt="Finance Preview">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2: Education -->
                        <div class="col-md-4">
                            <div class="card h-100 border rounded-4 shadow-sm p-3">
                                <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-graduation-cap text-success me-2"></i> Card 2: Education</h6>
                                <div class="mb-3">
                                    <label class="form-label small">Card Title</label>
                                    <input type="text" name="service2_title" class="form-control" value="{{ $settings['service2_title'] ?? 'Education Consultancy' }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">Features / Points (One per line)</label>
                                    <textarea name="service2_points" rows="4" class="form-control">{{ $settings['service2_points'] ?? "College Admissions\nNursing & Medical Courses\nINC & WBNC Assistance\nExplore Education Services" }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">Button Text & Link</label>
                                    <input type="text" name="service2_btn_text" class="form-control mb-2" value="{{ $settings['service2_btn_text'] ?? 'Explore Education Services' }}">
                                    <input type="text" name="service2_btn_url" class="form-control" value="{{ $settings['service2_btn_url'] ?? '/education' }}">
                                </div>
                                <div>
                                    <label class="form-label small">Card Image</label>
                                    <input type="file" name="service2_img" class="form-control">
                                    <div class="img-preview-box mt-2">
                                        <img src="{{ \App\Models\SiteSetting::getImageUrl('service2_img', 'images/eduction.webp') }}" alt="Education Preview">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3: Placement -->
                        <div class="col-md-4">
                            <div class="card h-100 border rounded-4 shadow-sm p-3">
                                <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-user-tie text-primary me-2"></i> Card 3: Placement</h6>
                                <div class="mb-3">
                                    <label class="form-label small">Card Title</label>
                                    <input type="text" name="service3_title" class="form-control" value="{{ $settings['service3_title'] ?? 'Job Placement Services' }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">Features / Points (One per line)</label>
                                    <textarea name="service3_points" rows="4" class="form-control">{{ $settings['service3_points'] ?? "Doctor Recruitment\nHospital Staffing\nHealthcare Jobs\nExplore Placement Portal" }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">Button Text & Link</label>
                                    <input type="text" name="service3_btn_text" class="form-control mb-2" value="{{ $settings['service3_btn_text'] ?? 'Explore Placement Services' }}">
                                    <input type="text" name="service3_btn_url" class="form-control" value="{{ $settings['service3_btn_url'] ?? '#' }}">
                                </div>
                                <div>
                                    <label class="form-label small">Card Image</label>
                                    <input type="file" name="service3_img" class="form-control">
                                    <div class="img-preview-box mt-2">
                                        <img src="{{ \App\Models\SiteSetting::getImageUrl('service3_img', 'images/job.webp') }}" alt="Job Preview">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. TAXATION FEATURE SECTION -->
        <div class="tab-pane fade" id="taxation-pane" role="tabpanel">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-calculator text-dark me-2"></i> Taxation Feature Section</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Title Line 1</label>
                            <input type="text" name="feat_tax_title_line1" class="form-control" value="{{ $settings['feat_tax_title_line1'] ?? 'Turning financial complexity' }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Title Line 2 (Pre-highlight)</label>
                            <input type="text" name="feat_tax_title_line2" class="form-control" value="{{ $settings['feat_tax_title_line2'] ?? 'into' }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Title Highlight (Green)</label>
                            <input type="text" name="feat_tax_title_highlight" class="form-control" value="{{ $settings['feat_tax_title_highlight'] ?? 'confident success.' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Section Subtitle</label>
                            <input type="text" name="feat_tax_subtitle" class="form-control" value="{{ $settings['feat_tax_subtitle'] ?? 'Because every rupee saved is a step toward growth.' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Card Title</label>
                            <input type="text" name="feat_tax_card_title" class="form-control" value="{{ $settings['feat_tax_card_title'] ?? 'Where smart taxation meets smarter business growth.' }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Button Text</label>
                            <input type="text" name="feat_tax_btn_text" class="form-control" value="{{ $settings['feat_tax_btn_text'] ?? 'Learn More' }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Button URL</label>
                            <input type="text" name="feat_tax_btn_url" class="form-control" value="{{ $settings['feat_tax_btn_url'] ?? '/finance' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Card Description</label>
                            <textarea name="feat_tax_card_desc" rows="2" class="form-control">{{ $settings['feat_tax_card_desc'] ?? "We don't just manage taxes — we maximize your potential." }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Floating Graphic Image</label>
                            <input type="file" name="feat_tax_img_graphics" class="form-control">
                            <div class="img-preview-box">
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('feat_tax_img_graphics', 'images/man-1-graphics.webp') }}" alt="Tax Graphics">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Person / Main Image</label>
                            <input type="file" name="feat_tax_img_person" class="form-control">
                            <div class="img-preview-box">
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('feat_tax_img_person', 'images/man-1.webp') }}" alt="Tax Person">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. EDUCATION FEATURE SECTION -->
        <div class="tab-pane fade" id="education-pane" role="tabpanel">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-graduation-cap text-success me-2"></i> Education Feature Section</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Title Line 1</label>
                            <input type="text" name="feat_edu_title_line1" class="form-control" value="{{ $settings['feat_edu_title_line1'] ?? 'Guiding you to the right' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Title Line 2</label>
                            <input type="text" name="feat_edu_title_line2" class="form-control" value="{{ $settings['feat_edu_title_line2'] ?? 'college, the right way.' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Section Subtitle</label>
                            <input type="text" name="feat_edu_subtitle" class="form-control" value="{{ $settings['feat_edu_subtitle'] ?? 'Expert guidance for the right college choice.' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Card Title</label>
                            <input type="text" name="feat_edu_card_title" class="form-control" value="{{ $settings['feat_edu_card_title'] ?? 'Choose the right college with us.' }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Button Text</label>
                            <input type="text" name="feat_edu_btn_text" class="form-control" value="{{ $settings['feat_edu_btn_text'] ?? 'Learn More' }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Button URL</label>
                            <input type="text" name="feat_edu_btn_url" class="form-control" value="{{ $settings['feat_edu_btn_url'] ?? '/education' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Card Description</label>
                            <textarea name="feat_edu_card_desc" rows="2" class="form-control">{{ $settings['feat_edu_card_desc'] ?? 'Choose smart. Choose the right college.' }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Brochure Card Text (Lines)</label>
                            <textarea name="feat_edu_brochure_text" rows="3" class="form-control">{{ $settings['feat_edu_brochure_text'] ?? "To Know More\nDownload\nOur Brochure" }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Brochure QR Code Image</label>
                            <input type="file" name="feat_edu_brochure_qr" class="form-control">
                            <div class="img-preview-box">
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('feat_edu_brochure_qr', 'images/qr-code.png') }}" alt="QR Code">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Floating Graphics Image</label>
                            <input type="file" name="feat_edu_img_graphics" class="form-control">
                            <div class="img-preview-box">
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('feat_edu_img_graphics', 'images/woment-graphics.webp') }}" alt="Woman Graphics">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Person Image</label>
                            <input type="file" name="feat_edu_img_person" class="form-control">
                            <div class="img-preview-box">
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('feat_edu_img_person', 'images/woment.webp') }}" alt="Woman Person">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 5. PLACEMENT FEATURE SECTION -->
        <div class="tab-pane fade" id="placement-pane" role="tabpanel">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-user-doctor text-info me-2"></i> Placement Feature Section</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Title Line 1</label>
                            <input type="text" name="feat_place_title_line1" class="form-control" value="{{ $settings['feat_place_title_line1'] ?? 'Strategic placements for' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Title Highlight (Green)</label>
                            <input type="text" name="feat_place_title_highlight" class="form-control" value="{{ $settings['feat_place_title_highlight'] ?? 'ambitious professionals.' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Section Subtitle</label>
                            <input type="text" name="feat_place_subtitle" class="form-control" value="{{ $settings['feat_place_subtitle'] ?? 'Because every rupee saved is a step toward growth.' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Card Title</label>
                            <input type="text" name="feat_place_card_title" class="form-control" value="{{ $settings['feat_place_card_title'] ?? 'Connecting talent with the right opportunities.' }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Button Text</label>
                            <input type="text" name="feat_place_btn_text" class="form-control" value="{{ $settings['feat_place_btn_text'] ?? 'Learn More' }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Button URL</label>
                            <input type="text" name="feat_place_btn_url" class="form-control" value="{{ $settings['feat_place_btn_url'] ?? '#' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Card Description</label>
                            <textarea name="feat_place_card_desc" rows="2" class="form-control">{{ $settings['feat_place_card_desc'] ?? 'Your career starts with the right placement.' }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Floating Graphic Image</label>
                            <input type="file" name="feat_place_img_graphics" class="form-control">
                            <div class="img-preview-box">
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('feat_place_img_graphics', 'images/man2-graphics.webp') }}" alt="Placement Graphics">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Person Image</label>
                            <input type="file" name="feat_place_img_person" class="form-control">
                            <div class="img-preview-box">
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('feat_place_img_person', 'images/man-2.webp') }}" alt="Placement Person">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 6. QUERIES & CTA SECTION -->
        <div class="tab-pane fade" id="queries-pane" role="tabpanel">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-circle-question text-warning me-2"></i> Queries Section</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Queries Title Line 1</label>
                            <input type="text" name="queries_title_line1" class="form-control" value="{{ $settings['queries_title_line1'] ?? 'If You Have any Queries' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Queries Title Highlight (Green)</label>
                            <input type="text" name="queries_title_highlight" class="form-control" value="{{ $settings['queries_title_highlight'] ?? 'Feel Free To Ask !' }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Ask Card Heading</label>
                            <input type="text" name="queries_card_title" class="form-control" value="{{ $settings['queries_card_title'] ?? 'Ask Question' }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Ask Card Subtitle</label>
                            <input type="text" name="queries_card_subtitle" class="form-control" value="{{ $settings['queries_card_subtitle'] ?? 'If you have Any Queries Feel Free To ask !' }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Input Box Placeholder</label>
                            <input type="text" name="queries_placeholder" class="form-control" value="{{ $settings['queries_placeholder'] ?? 'Type............' }}">
                        </div>
                    </div>

                    <h6 class="fw-bold text-dark mt-4 mb-3 border-bottom pb-2">Ready to Contact / CTA Banner</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">CTA Banner Title</label>
                            <input type="text" name="cta_title" class="form-control" value="{{ $settings['cta_title'] ?? 'Ready to Contact with us ?' }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">CTA Button Text</label>
                            <input type="text" name="cta_btn_text" class="form-control" value="{{ $settings['cta_btn_text'] ?? 'Get Started' }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">CTA Button Link</label>
                            <input type="text" name="cta_btn_url" class="form-control" value="{{ $settings['cta_btn_url'] ?? '#contact' }}">
                        </div>
                    </div>

                    <h6 class="fw-bold text-dark mt-4 mb-3 border-bottom pb-2">Testimonials & Client Sections Headers</h6>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Testimonials Header Prefix</label>
                            <input type="text" name="testimonials_heading_prefix" class="form-control" value="{{ $settings['testimonials_heading_prefix'] ?? 'Testimonials By' }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Testimonials Header Highlight</label>
                            <input type="text" name="testimonials_heading_highlight" class="form-control" value="{{ $settings['testimonials_heading_highlight'] ?? 'Our Clients' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Testimonials Subtitle</label>
                            <input type="text" name="testimonials_subtitle" class="form-control" value="{{ $settings['testimonials_subtitle'] ?? "Begin planning your child's career at the right time with internationally recognised career psychologists" }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Clients Header</label>
                            <input type="text" name="clients_heading" class="form-control" value="{{ $settings['clients_heading'] ?? 'Our Valuable Clients' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Clients Subtitle</label>
                            <input type="text" name="clients_subtitle" class="form-control" value="{{ $settings['clients_subtitle'] ?? 'Supported By' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-end mt-4 mb-5">
        <button type="submit" class="btn btn-primary-admin btn-lg px-5 shadow">
            <i class="fa-solid fa-floppy-disk me-2"></i> Save All Changes
        </button>
    </div>
</form>
@endsection
