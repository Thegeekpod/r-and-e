@extends('admin.layouts.master')

@section('title', 'Placement Page Content Editor')
@section('page-title', 'Placement Page Content Management')

@section('content')
<form action="{{ route('admin.placement.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold m-0 text-dark">Customize Job Placement (Edge Hire) Page</h4>
            <p class="text-muted small m-0">Edit hero, about section, business model, verticals, future initiatives, vision & brand promise — all from one place.</p>
        </div>
        <button type="submit" class="btn btn-primary-admin px-4 shadow-sm">
            <i class="fa-solid fa-floppy-disk me-2"></i> Save All Changes
        </button>
    </div>

    <!-- Navigation Tabs -->
    <ul class="nav nav-tabs mb-4 bg-white p-2 rounded-3 shadow-sm" id="placementTabs" role="tablist" style="flex-wrap:wrap; gap:4px;">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="place-hero-tab" data-bs-toggle="tab" data-bs-target="#place-hero-pane" type="button" role="tab">
                <i class="fa-solid fa-star me-2"></i> 1. Hero Card
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="place-about-tab" data-bs-toggle="tab" data-bs-target="#place-about-pane" type="button" role="tab">
                <i class="fa-solid fa-circle-info me-2"></i> 2. About Edge Hire
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="place-jobs-tab" data-bs-toggle="tab" data-bs-target="#place-jobs-pane" type="button" role="tab">
                <i class="fa-solid fa-briefcase me-2"></i> 3. Current Jobs
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="place-biz-tab" data-bs-toggle="tab" data-bs-target="#place-biz-pane" type="button" role="tab">
                <i class="fa-solid fa-sitemap me-2"></i> 4. Model & Verticals
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="place-vision-tab" data-bs-toggle="tab" data-bs-target="#place-vision-pane" type="button" role="tab">
                <i class="fa-solid fa-eye me-2"></i> 5. Initiatives & Vision
            </button>
        </li>
    </ul>

    <!-- Tab Contents -->
    <div class="tab-content" id="placementTabsContent">

        {{-- TAB 1: HERO CARD --}}
        <div class="tab-pane fade show active" id="place-hero-pane" role="tabpanel">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-star text-warning me-2"></i> Hero Feature Card</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Hero Heading</label>
                            <input type="text" name="placement_hero_heading" class="form-control"
                                value="{{ $settings['placement_hero_heading'] ?? 'Connecting talent with the right opportunities.' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Hero Subheading</label>
                            <input type="text" name="placement_hero_subheading" class="form-control"
                                value="{{ $settings['placement_hero_subheading'] ?? 'Doctor Recruitment, Hospital Staffing, Healthcare Jobs, and Corporate Placement Support.' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Button Text</label>
                            <input type="text" name="placement_hero_btn_text" class="form-control"
                                value="{{ $settings['placement_hero_btn_text'] ?? 'Get In Touch' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Button URL</label>
                            <input type="text" name="placement_hero_btn_url" class="form-control"
                                value="{{ $settings['placement_hero_btn_url'] ?? '#contact' }}">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="form-label">Hero Background / Graphics Image</label>
                            <input type="file" name="placement_hero_img_graphics" class="form-control" accept="image/*">
                            <div class="img-preview-box mt-2">
                                <span class="d-block small text-muted mb-1">Current:</span>
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('placement_hero_img_graphics', 'images/man2-graphics.webp') }}" alt="Graphics">
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="form-label">Hero Person Image</label>
                            <input type="file" name="placement_hero_img_person" class="form-control" accept="image/*">
                            <div class="img-preview-box mt-2">
                                <span class="d-block small text-muted mb-1">Current:</span>
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('placement_hero_img_person', 'images/man-2.webp') }}" alt="Person">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TAB 2: ABOUT EDGE HIRE --}}
        <div class="tab-pane fade" id="place-about-pane" role="tabpanel">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-circle-info text-primary me-2"></i> About Edge Hire Section</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Section Title</label>
                            <input type="text" name="placement_about_title" class="form-control"
                                value="{{ $settings['placement_about_title'] ?? 'About Edge Hire' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Green Banner Text</label>
                            <input type="text" name="placement_about_banner_text" class="form-control"
                                value="{{ $settings['placement_about_banner_text'] ?? 'Edge Hire is the Recruitment, Staffing, Workforce Solutions & Healthcare Consultancy Division of Roy Infinity Edge Consulting.' }}">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label class="form-label">Edge Hire Logo</label>
                            <input type="file" name="placement_about_logo" class="form-control" accept="image/*">
                            <div class="img-preview-box mt-2">
                                <span class="d-block small text-muted mb-1">Current:</span>
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('placement_about_logo', 'images/edgehire.webp') }}" alt="Logo">
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Paragraph 1</label>
                            <textarea name="placement_about_p1" rows="3" class="form-control">{{ $settings['placement_about_p1'] ?? 'We are committed to connecting businesses with skilled professionals while creating meaningful employment opportunities for job seekers, freelancers, consultants, and remote professionals across India.' }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Paragraph 2</label>
                            <textarea name="placement_about_p2" rows="3" class="form-control">{{ $settings['placement_about_p2'] ?? 'Our expertise extends beyond traditional recruitment. We provide workforce solutions, healthcare consultancy, institutional manpower support, freelance professional networks, and technology-driven employment services designed to meet the evolving needs of employers and professionals.' }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Paragraph 3</label>
                            <textarea name="placement_about_p3" rows="3" class="form-control">{{ $settings['placement_about_p3'] ?? 'Our vision is to build a unified workforce ecosystem where employers, institutions, hospitals, and professionals can collaborate through one trusted platform.' }}</textarea>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label">Network Illustration Image</label>
                            <input type="file" name="placement_about_network_img" class="form-control" accept="image/*">
                            <div class="img-preview-box mt-2">
                                <span class="d-block small text-muted mb-1">Current:</span>
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('placement_about_network_img', 'images/placement-01.webp') }}" alt="Network Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TAB 3: CURRENT JOBS --}}
        <div class="tab-pane fade" id="place-jobs-pane" role="tabpanel">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-briefcase text-success me-2"></i> View Current Jobs Section</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Section Title</label>
                            <input type="text" name="placement_jobs_title" class="form-control"
                                value="{{ $settings['placement_jobs_title'] ?? 'View Current jobs' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Section Subtitle</label>
                            <input type="text" name="placement_jobs_subtitle" class="form-control"
                                value="{{ $settings['placement_jobs_subtitle'] ?? 'Because every rupee saved is a step toward growth.' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">View More Button Text</label>
                            <input type="text" name="placement_jobs_btn_text" class="form-control"
                                value="{{ $settings['placement_jobs_btn_text'] ?? 'View More Jobs' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">View More Button Link</label>
                            <input type="text" name="placement_jobs_btn_url" class="form-control"
                                value="{{ $settings['placement_jobs_btn_url'] ?? '#' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TAB 4: MODEL & VERTICALS --}}
        <div class="tab-pane fade" id="place-biz-pane" role="tabpanel">
            {{-- Business Model --}}
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-sitemap text-primary me-2"></i> Our Business Model Section</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" name="placement_biz_title" class="form-control"
                                value="{{ $settings['placement_biz_title'] ?? 'Our Business Model' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Subtitle / Description</label>
                            <textarea name="placement_biz_subtitle" rows="3" class="form-control">{{ $settings['placement_biz_subtitle'] ?? 'Edge Hire operates as an integrated workforce solutions platform that supports businesses at every stage of talent acquisition and workforce management.' }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Pill Items <small class="text-muted">(pipe-separated: Item 1|Item 2|Item 3)</small></label>
                            <textarea name="placement_biz_items" rows="4" class="form-control">{{ $settings['placement_biz_items'] ?? 'Permanent Recruitment|Executive Search|Hospital Consultancy|Finance & Accounts Freelancer Network|Contract & Temporary Staffing|Healthcare Workforce Solutions|Academic Manpower Solutions|Remote & Home-Based Employment' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Business Verticals --}}
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-layer-group text-success me-2"></i> Business Verticals Section</h5>
                </div>
                <div class="admin-card-body">
                    <div class="mb-4">
                        <label class="form-label">Main Section Title</label>
                        <input type="text" name="placement_verticals_title" class="form-control"
                            value="{{ $settings['placement_verticals_title'] ?? 'Our Business Verticals' }}">
                    </div>

                    {{-- Vertical 1 --}}
                    <div class="p-3 border rounded-3 bg-light mb-4">
                        <h6 class="fw-bold text-dark mb-3">Vertical 1: Recruitment & Talent Acquisition</h6>
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Title</label>
                                <input type="text" name="placement_v1_title" class="form-control"
                                    value="{{ $settings['placement_v1_title'] ?? 'Recruitment & Talent Acquisition' }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea name="placement_v1_desc" rows="3" class="form-control">{{ $settings['placement_v1_desc'] ?? 'We provide end-to-end recruitment solutions across multiple industries, helping organisations identify, evaluate, and recruit qualified professionals for permanent, contractual, temporary, project-based, and executive positions.' }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Green Box Sub-Title</label>
                                <input type="text" name="placement_v1_sub_title" class="form-control"
                                    value="{{ $settings['placement_v1_sub_title'] ?? 'Our Recruitment Services' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Dropdown Button Text</label>
                                <input type="text" name="placement_v1_btn_text" class="form-control"
                                    value="{{ $settings['placement_v1_btn_text'] ?? 'Industries We Serve' }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Services List <small class="text-muted">(pipe-separated: Item 1|Item 2)</small></label>
                                <textarea name="placement_v1_services" rows="3" class="form-control">{{ $settings['placement_v1_services'] ?? 'Permanent Recruitment|Contract Staffing|Temporary Staffing|Payroll Staffing|Executive Search|Campus Recruitment|Bulk Hiring|Project-Based Hiring Recruitment|Process Outsourcing (RPO)|HR Outsourcing|Workforce Planning' }}</textarea>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label class="form-label">Block 1 Image</label>
                                <input type="file" name="placement_v1_img" class="form-control" accept="image/*">
                                <div class="img-preview-box mt-2">
                                    <span class="d-block small text-muted mb-1">Current:</span>
                                    <img src="{{ \App\Models\SiteSetting::getImageUrl('placement_v1_img', 'images/placement-02.webp') }}" alt="V1 Image">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Vertical 2 --}}
                    <div class="p-3 border rounded-3 bg-light mb-4">
                        <h6 class="fw-bold text-dark mb-3">Vertical 2: Healthcare Workforce Solutions</h6>
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Title</label>
                                <input type="text" name="placement_v2_title" class="form-control"
                                    value="{{ $settings['placement_v2_title'] ?? 'Healthcare Workforce Solutions & Hospital Consultancy' }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description Line 1</label>
                                <textarea name="placement_v2_desc1" rows="2" class="form-control">{{ $settings['placement_v2_desc1'] ?? "Healthcare is one of Edge Hire's strongest areas of expertise." }}</textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description Line 2</label>
                                <textarea name="placement_v2_desc2" rows="3" class="form-control">{{ $settings['placement_v2_desc2'] ?? 'We support hospitals, nursing colleges, medical colleges, clinics, diagnostic centres, rehabilitation centres, and healthcare organisations with recruitment, manpower planning, and consultancy services.' }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Dropdown Button Text</label>
                                <input type="text" name="placement_v2_btn_text" class="form-control"
                                    value="{{ $settings['placement_v2_btn_text'] ?? 'Healthcare Recruitment' }}">
                            </div>
                            <div class="col-md-6 mt-2">
                                <label class="form-label">Block 2 Image</label>
                                <input type="file" name="placement_v2_img" class="form-control" accept="image/*">
                                <div class="img-preview-box mt-2">
                                    <span class="d-block small text-muted mb-1">Current:</span>
                                    <img src="{{ \App\Models\SiteSetting::getImageUrl('placement_v2_img', 'images/placement-03.webp') }}" alt="V2 Image">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Vertical 3 --}}
                    <div class="p-3 border rounded-3 bg-light">
                        <h6 class="fw-bold text-dark mb-3">Vertical 3: Academic & Institutional Workforce Solutions</h6>
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Title</label>
                                <input type="text" name="placement_v3_title" class="form-control"
                                    value="{{ $settings['placement_v3_title'] ?? 'Academic & Institutional Workforce Solutions' }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea name="placement_v3_desc" rows="3" class="form-control">{{ $settings['placement_v3_desc'] ?? 'Through our extensive academic network, we provide workforce solutions for Nursing Colleges, Medical Colleges, Universities, Healthcare Institutions, and Educational Organisations.' }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Dropdown Button Text</label>
                                <input type="text" name="placement_v3_btn_text" class="form-control"
                                    value="{{ $settings['placement_v3_btn_text'] ?? 'Services' }}">
                            </div>
                            <div class="col-md-6 mt-2">
                                <label class="form-label">Block 3 Image</label>
                                <input type="file" name="placement_v3_img" class="form-control" accept="image/*">
                                <div class="img-preview-box mt-2">
                                    <span class="d-block small text-muted mb-1">Current:</span>
                                    <img src="{{ \App\Models\SiteSetting::getImageUrl('placement_v3_img', 'images/placement-04.webp') }}" alt="V3 Image">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- TAB 5: INITIATIVES, PARTNER, VISION & PROMISE --}}
        <div class="tab-pane fade" id="place-vision-pane" role="tabpanel">

            {{-- Future Initiatives --}}
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-rocket text-warning me-2"></i> Future Initiatives Section</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" name="placement_future_title" class="form-control"
                                value="{{ $settings['placement_future_title'] ?? 'Future Initiatives' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Subtitle</label>
                            <input type="text" name="placement_future_subtitle" class="form-control"
                                value="{{ $settings['placement_future_subtitle'] ?? "To strengthen India's workforce ecosystem, Edge Hire is expanding into:" }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Initiative Items <small class="text-muted">(pipe-separated: Item 1|Item 2)</small></label>
                            <textarea name="placement_future_items" rows="4" class="form-control">{{ $settings['placement_future_items'] ?? 'Digital Job Portal|Healthcare Workforce Exchange|Finance Freelancer Marketplace|Remote Work Network|Employer Subscription Platform|Skill Verification Services|Professional Background Verification|Interview Preparation & Employability Programmes|Integration with Siksha Pathik Academy|Integration with Vriddhi Edge Finance Network' }}</textarea>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label">Section Background Banner</label>
                            <input type="file" name="placement_future_bg_img" class="form-control" accept="image/*">
                            <div class="img-preview-box mt-2">
                                <span class="d-block small text-muted mb-1">Current:</span>
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('placement_future_bg_img', 'images/placement-05.webp') }}" alt="Future BG">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Why Partner with Edge Hire --}}
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-handshake text-success me-2"></i> Why Partner with Edge Hire? Section</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" name="placement_partner_title" class="form-control"
                                value="{{ $settings['placement_partner_title'] ?? 'Why Partner with Edge Hire?' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Partner Pill Items <small class="text-muted">(pipe-separated: Item 1|Item 2)</small></label>
                            <textarea name="placement_partner_items" rows="4" class="form-control">{{ $settings['placement_partner_items'] ?? 'Pan-India Recruitment Network|Dedicated Healthcare & Education|Multi-Industry Recruitment Solutions|Hospital & Medical College Consultancy|Faculty & Academic Workforce Support|Finance & Accounts Freelancer Network|Remote & Home-Based Employment|Digital Employment Platform (Coming Soon)|Experienced Professional Network|One Trusted Workforce Solutions Partner' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Our Vision --}}
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-eye text-info me-2"></i> Our Vision Section</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" name="placement_vision_title" class="form-control"
                                value="{{ $settings['placement_vision_title'] ?? 'Our Vision' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Vision Description</label>
                            <textarea name="placement_vision_desc" rows="3" class="form-control">{{ $settings['placement_vision_desc'] ?? "To become India's most trusted workforce solutions platform by connecting employers, institutions, hospitals, freelancers, and professionals through recruitment, staffing, healthcare consultancy, digital employment, and technology-driven talent solutions." }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Button Text</label>
                            <input type="text" name="placement_vision_btn_text" class="form-control"
                                value="{{ $settings['placement_vision_btn_text'] ?? 'See more' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Button URL</label>
                            <input type="text" name="placement_vision_btn_url" class="form-control"
                                value="{{ $settings['placement_vision_btn_url'] ?? '#' }}">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label">Vision Background Banner</label>
                            <input type="file" name="placement_vision_bg_img" class="form-control" accept="image/*">
                            <div class="img-preview-box mt-2">
                                <span class="d-block small text-muted mb-1">Current:</span>
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('placement_vision_bg_img', 'images/placement-06.webp') }}" alt="Vision BG">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Our Brand Promise --}}
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-award text-danger me-2"></i> Our Brand Promise Section</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Left Title <small class="text-muted">(\n = new line)</small></label>
                            <input type="text" name="placement_promise_title" class="form-control"
                                value="{{ $settings['placement_promise_title'] ?? "Our Brand\nPromise" }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Right Quote Text</label>
                            <textarea name="placement_promise_quote" rows="2" class="form-control">{{ $settings['placement_promise_quote'] ?? '"Empowering Talent. Enabling Businesses. Strengthening Institutions. Transforming India\'s Workforce."' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Save Button (bottom) -->
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary-admin px-5 shadow">
                    <i class="fa-solid fa-floppy-disk me-2"></i> Save All Changes
                </button>
            </div>
        </div>

    </div>{{-- end tab-content --}}
</form>
@endsection
