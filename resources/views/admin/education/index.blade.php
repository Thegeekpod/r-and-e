@extends('admin.layouts.master')

@section('title', 'Education Page Content Editor')
@section('page-title', 'Education Page Content Management')

@section('content')
<form action="{{ route('admin.education.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold m-0 text-dark">Customize Education (Siksha Pathik) Page</h4>
            <p class="text-muted small m-0">Edit hero, business model, student sections, institution sections, and CTA — all from one place.</p>
        </div>
        <button type="submit" class="btn btn-primary-admin px-4 shadow-sm">
            <i class="fa-solid fa-floppy-disk me-2"></i> Save All Changes
        </button>
    </div>

    <!-- Navigation Tabs -->
    <ul class="nav nav-tabs mb-4 bg-white p-2 rounded-3 shadow-sm" id="eduTabs" role="tablist" style="flex-wrap:wrap; gap:4px;">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="edu-hero-tab" data-bs-toggle="tab" data-bs-target="#edu-hero-pane" type="button" role="tab">
                <i class="fa-solid fa-star me-2"></i> 1. Hero Card
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="edu-biz-tab" data-bs-toggle="tab" data-bs-target="#edu-biz-pane" type="button" role="tab">
                <i class="fa-solid fa-diagram-project me-2"></i> 2. Business Model
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="edu-students-tab" data-bs-toggle="tab" data-bs-target="#edu-students-pane" type="button" role="tab">
                <i class="fa-solid fa-user-graduate me-2"></i> 3. Students Section
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="edu-inst-tab" data-bs-toggle="tab" data-bs-target="#edu-inst-pane" type="button" role="tab">
                <i class="fa-solid fa-building-columns me-2"></i> 4. Institutions Section
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="edu-cta-tab" data-bs-toggle="tab" data-bs-target="#edu-cta-pane" type="button" role="tab">
                <i class="fa-solid fa-bullhorn me-2"></i> 5. CTA & Queries
            </button>
        </li>
    </ul>

    <!-- Tab Contents -->
    <div class="tab-content" id="eduTabsContent">

        {{-- ================================================================ --}}
        {{-- TAB 1: HERO CARD --}}
        {{-- ================================================================ --}}
        <div class="tab-pane fade show active" id="edu-hero-pane" role="tabpanel">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-star text-warning me-2"></i> Hero Feature Card</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Hero Heading</label>
                            <input type="text" name="edu_hero_heading" class="form-control"
                                value="{{ $settings['edu_hero_heading'] ?? 'Choose the right college with us.' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Hero Subtitle</label>
                            <input type="text" name="edu_hero_subtitle" class="form-control"
                                value="{{ $settings['edu_hero_subtitle'] ?? 'Choose smart. Choose the right college.' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Button Text</label>
                            <input type="text" name="edu_hero_btn_text" class="form-control"
                                value="{{ $settings['edu_hero_btn_text'] ?? 'Learn More' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Button URL</label>
                            <input type="text" name="edu_hero_btn_url" class="form-control"
                                value="{{ $settings['edu_hero_btn_url'] ?? '#business-model' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Brochure Card Text</label>
                            <input type="text" name="edu_hero_brochure_text" class="form-control"
                                value="{{ $settings['edu_hero_brochure_text'] ?? 'To Know More Download Our Brochure' }}">
                        </div>

                        <div class="col-md-4 mt-3">
                            <label class="form-label">Hero Graphics / Background Image</label>
                            <input type="file" name="edu_hero_img_graphics" class="form-control" accept="image/*">
                            <div class="img-preview-box mt-2">
                                <span class="d-block small text-muted mb-1">Current:</span>
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('edu_hero_img_graphics', 'images/woment-graphics.webp') }}" alt="Hero Graphics">
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-label">Hero Person Image</label>
                            <input type="file" name="edu_hero_img_person" class="form-control" accept="image/*">
                            <div class="img-preview-box mt-2">
                                <span class="d-block small text-muted mb-1">Current:</span>
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('edu_hero_img_person', 'images/woment.webp') }}" alt="Hero Person">
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label class="form-label">Brochure QR Code Image</label>
                            <input type="file" name="edu_hero_qr_img" class="form-control" accept="image/*">
                            <div class="img-preview-box mt-2">
                                <span class="d-block small text-muted mb-1">Current:</span>
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('edu_hero_qr_img', 'images/qr-code.png') }}" alt="QR Code">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ================================================================ --}}
        {{-- TAB 2: BUSINESS MODEL --}}
        {{-- ================================================================ --}}
        <div class="tab-pane fade" id="edu-biz-pane" role="tabpanel">
            <!-- Section Header -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-diagram-project text-primary me-2"></i> Business Model Section Header</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Category Bar Items <small class="text-muted">(pipe-separated: Nursing|Pharmacy|Management|Medical)</small></label>
                            <input type="text" name="edu_biz_category_items" class="form-control"
                                value="{{ $settings['edu_biz_category_items'] ?? 'Nursing|Pharmacy|Management|Medical' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Section Title</label>
                            <input type="text" name="edu_biz_section_title" class="form-control"
                                value="{{ $settings['edu_biz_section_title'] ?? 'Our Business Model' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Section Subtitle</label>
                            <input type="text" name="edu_biz_section_subtitle" class="form-control"
                                value="{{ $settings['edu_biz_section_subtitle'] ?? 'Because every rupee saved is a step toward growth.' }}">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label class="form-label">Siksha Pathik Logo</label>
                            <input type="file" name="edu_siksha_logo" class="form-control" accept="image/*">
                            <div class="img-preview-box mt-2">
                                <span class="d-block small text-muted mb-1">Current:</span>
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('edu_siksha_logo', 'images/sikshapathik.webp') }}" alt="Siksha Pathik Logo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Labels -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-layer-group text-success me-2"></i> Tree Card Labels</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Student Card Title</label>
                            <input type="text" name="edu_student_card_title" class="form-control"
                                value="{{ $settings['edu_student_card_title'] ?? 'For Students' }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Institution Card Title</label>
                            <input type="text" name="edu_inst_card_title" class="form-control"
                                value="{{ $settings['edu_inst_card_title'] ?? 'For Institutions' }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">App Card Title</label>
                            <input type="text" name="edu_app_card_title" class="form-control"
                                value="{{ $settings['edu_app_card_title'] ?? 'Sikha pratik App' }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">App Card Caption</label>
                            <input type="text" name="edu_app_card_caption" class="form-control"
                                value="{{ $settings['edu_app_card_caption'] ?? 'Coming Soon' }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail Cards Cover Items -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-list-check text-warning me-2"></i> Detail Cards — Cover Item Lists</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label">Student Detail Card — Title</label>
                            <input type="text" name="edu_student_cover_title" class="form-control mb-2"
                                value="{{ $settings['edu_student_cover_title'] ?? 'What You Will Cover' }}">
                            <label class="form-label">Student Cover Items <small class="text-muted">(one item per line)</small></label>
                            <textarea name="edu_student_cover_items" rows="8" class="form-control">{{ $settings['edu_student_cover_items'] ?? "Career Counselling\nCourse Selection\nAdmission Guidance\nDocumentation/Loan Assistance\nRegistration Guidance\nPost-Passout Guidance\nPlacement via Edge Hire" }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Institution Detail Card — Title</label>
                            <input type="text" name="edu_inst_cover_title" class="form-control mb-2"
                                value="{{ $settings['edu_inst_cover_title'] ?? 'What You Will Cover' }}">
                            <label class="form-label">Institution Cover Items <small class="text-muted">(one item per line)</small></label>
                            <textarea name="edu_inst_cover_items" rows="8" class="form-control">{{ $settings['edu_inst_cover_items'] ?? "Academic Consultancy\nFaculty Assistance\nFaculty Recruitment\nWBNC / INC / WBUHS Support\nReciprocal / NRTS / NUID\nInspection Preparation\nInspection Coordination & Liaison\nLong-term Institutional Support" }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ================================================================ --}}
        {{-- TAB 3: STUDENTS SECTION (incl. Trust & Commitment) --}}
        {{-- ================================================================ --}}
        <div class="tab-pane fade" id="edu-students-pane" role="tabpanel">

            {{-- — Admission Support — --}}
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-user-graduate text-success me-2"></i> Admission Support Card</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Section Banner Heading</label>
                            <input type="text" name="edu_student_section_banner" class="form-control"
                                value="{{ $settings['edu_student_section_banner'] ?? 'For Students' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Support Card Title</label>
                            <input type="text" name="edu_student_support_title" class="form-control"
                                value="{{ $settings['edu_student_support_title'] ?? 'Student Admission Support' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Support Card Description</label>
                            <textarea name="edu_student_support_desc" rows="5" class="form-control">{{ $settings['edu_student_support_desc'] ?? '' }}</textarea>
                        </div>
                        <div class="col-md-4 mt-2">
                            <label class="form-label">Support Card Image</label>
                            <input type="file" name="edu_student_support_img" class="form-control" accept="image/*">
                            <div class="img-preview-box mt-2">
                                <span class="d-block small text-muted mb-1">Current:</span>
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('edu_student_support_img', 'images/education-student.png') }}" alt="Student Support">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- — Admission Journey — --}}
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-route text-primary me-2"></i> Admission Journey Section</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" name="edu_admission_journey_title" class="form-control"
                                value="{{ $settings['edu_admission_journey_title'] ?? 'Our Admission Journey' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Subtitle</label>
                            <input type="text" name="edu_admission_journey_subtitle" class="form-control"
                                value="{{ $settings['edu_admission_journey_subtitle'] ?? 'Because every rupee saved is a step toward growth.' }}">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label class="form-label">Journey Diagram Image</label>
                            <input type="file" name="edu_admission_journey_img" class="form-control" accept="image/*">
                            <div class="img-preview-box mt-2">
                                <span class="d-block small text-muted mb-1">Current:</span>
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('edu_admission_journey_img', 'images/education-01.webp') }}" alt="Admission Journey">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- — Academic Programmes — --}}
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-book-open text-warning me-2"></i> Academic Programmes Section</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Section Title</label>
                            <input type="text" name="edu_academic_prog_title" class="form-control"
                                value="{{ $settings['edu_academic_prog_title'] ?? 'Academic Programmes We Facilitate' }}">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Section Content / Description</label>
                            <textarea name="edu_academic_prog_content" rows="6" class="form-control">{{ $settings['edu_academic_prog_content'] ?? '' }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Section Image</label>
                            <input type="file" name="edu_academic_prog_img" class="form-control" accept="image/*">
                            <div class="img-preview-box mt-2">
                                <span class="d-block small text-muted mb-1">Current:</span>
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('edu_academic_prog_img', 'images/education-02.webp') }}" alt="Academic Programmes">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- — Programme Cards (6) — --}}
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-grid-2 text-success me-2"></i> Programme Cards (6 Cards)</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-4">
                        @for($i = 1; $i <= 6; $i++)
                        <div class="col-md-6">
                            <div class="p-3 border rounded-3 bg-light">
                                <h6 class="fw-bold text-dark mb-3">Card {{ $i }}</h6>
                                <div class="row g-2">
                                    <div class="col-md-8">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="edu_prog_card_{{ $i }}_title" class="form-control"
                                            value="{{ $settings["edu_prog_card_{$i}_title"] ?? '' }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Dot Color</label>
                                        <select name="edu_prog_card_{{ $i }}_dot" class="form-select">
                                            @foreach(['dot-blue' => 'Blue', 'dot-orange' => 'Orange', 'dot-purple' => 'Purple'] as $val => $label)
                                                <option value="{{ $val }}" {{ ($settings["edu_prog_card_{$i}_dot"] ?? '') === $val ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Content <small class="text-muted">(one item per line)</small></label>
                                        <textarea name="edu_prog_card_{{ $i }}_content" rows="4" class="form-control">{{ $settings["edu_prog_card_{$i}_content"] ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>

            {{-- — Why Admission Different — --}}
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-award text-warning me-2"></i> Why Our Admission Support is Different</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Banner Title <small class="text-muted">(\n = new line)</small></label>
                            <input type="text" name="edu_why_diff_title" class="form-control"
                                value="{{ $settings['edu_why_diff_title'] ?? "Why Our Admission Support\nis Different" }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Banner Description</label>
                            <textarea name="edu_why_diff_content" rows="5" class="form-control">{{ $settings['edu_why_diff_content'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- — Our Commitment — --}}
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-handshake-angle text-success me-2"></i> Our Commitment Section</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Commitment Title</label>
                            <input type="text" name="edu_commitment_title" class="form-control"
                                value="{{ $settings['edu_commitment_title'] ?? 'Our Commitment' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Commitment Description</label>
                            <textarea name="edu_commitment_desc" rows="5" class="form-control">{{ $settings['edu_commitment_desc'] ?? '' }}</textarea>
                        </div>
                        <div class="col-md-4 mt-2">
                            <label class="form-label">Commitment Image</label>
                            <input type="file" name="edu_commitment_img" class="form-control" accept="image/*">
                            <div class="img-preview-box mt-2">
                                <span class="d-block small text-muted mb-1">Current:</span>
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('edu_commitment_img', 'images/education-03.png') }}" alt="Commitment">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- — Why Students Trust Us — --}}
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-shield-heart text-primary me-2"></i> Why Students Trust Us</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Section Title</label>
                            <input type="text" name="edu_trust_title" class="form-control"
                                value="{{ $settings['edu_trust_title'] ?? 'Why Students Trust Us' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Trust Items <small class="text-muted">(pipe-separated: Item 1|Item 2|Item 3)</small></label>
                            <textarea name="edu_trust_items" rows="5" class="form-control">{{ $settings['edu_trust_items'] ?? 'Personalized counselling|Transparent admission process|Experienced education consultants|Complete documentation support|End-to-end academic guidance|Professional registration support|Career development assistance|Placement support through Edge Hire' }}</textarea>
                            <div class="form-text text-muted mt-1">Each item separated by <code>|</code> will render as a separate checkmark pill.</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>{{-- end students pane --}}

        {{-- ================================================================ --}}
        {{-- TAB 4: INSTITUTIONS SECTION (incl. Why Siksha Pathik) --}}
        {{-- ================================================================ --}}
        <div class="tab-pane fade" id="edu-inst-pane" role="tabpanel">

            {{-- — Core Institutional Support — --}}
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-building-columns text-primary me-2"></i> Core Institutional Support Card</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Section Banner Heading</label>
                            <input type="text" name="edu_inst_section_banner" class="form-control"
                                value="{{ $settings['edu_inst_section_banner'] ?? 'For Institutions' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Support Card Title</label>
                            <input type="text" name="edu_inst_support_title" class="form-control"
                                value="{{ $settings['edu_inst_support_title'] ?? 'Core Institutional Support' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Support Card Description</label>
                            <textarea name="edu_inst_support_desc" rows="5" class="form-control">{{ $settings['edu_inst_support_desc'] ?? '' }}</textarea>
                        </div>
                        <div class="col-md-4 mt-2">
                            <label class="form-label">Support Card Image</label>
                            <input type="file" name="edu_inst_support_img" class="form-control" accept="image/*">
                            <div class="img-preview-box mt-2">
                                <span class="d-block small text-muted mb-1">Current:</span>
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('edu_inst_support_img', 'images/education-instute.png') }}" alt="Institution Support">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- — Institution Support Cards (4) — --}}
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-grid-2 text-success me-2"></i> Institution Support Cards (4 Cards)</h5>
                </div>
                <div class="admin-card-body">
                    <div class="mb-3">
                        <label class="form-label">Section Heading (above cards)</label>
                        <input type="text" name="edu_inst_includes_heading" class="form-control"
                            value="{{ $settings['edu_inst_includes_heading'] ?? 'For Institutions Support' }}">
                    </div>
                    <div class="row g-4">
                        @for($i = 1; $i <= 4; $i++)
                        <div class="col-md-6">
                            <div class="p-3 border rounded-3 bg-light">
                                <h6 class="fw-bold text-dark mb-3">Card {{ $i }} @if($i === 4)<span class="badge bg-primary ms-2">Wide Card</span>@endif</h6>
                                <div class="row g-2">
                                    <div class="col-md-8">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="edu_inst_card_{{ $i }}_title" class="form-control"
                                            value="{{ $settings["edu_inst_card_{$i}_title"] ?? '' }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Dot Color</label>
                                        <select name="edu_inst_card_{{ $i }}_dot" class="form-select">
                                            @foreach(['dot-blue' => 'Blue', 'dot-orange' => 'Orange', 'dot-purple' => 'Purple'] as $val => $label)
                                                <option value="{{ $val }}" {{ ($settings["edu_inst_card_{$i}_dot"] ?? '') === $val ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Content <small class="text-muted">(one item per line)</small></label>
                                        <textarea name="edu_inst_card_{{ $i }}_content" rows="4" class="form-control">{{ $settings["edu_inst_card_{$i}_content"] ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
            </div>

            {{-- — Upcoming Academy — --}}
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-school text-warning me-2"></i> Upcoming — Siksha Pathik Academy</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Academy Title</label>
                            <input type="text" name="edu_academy_title" class="form-control"
                                value="{{ $settings['edu_academy_title'] ?? 'Upcoming - Siksha Pathik Academy' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Academy Description</label>
                            <textarea name="edu_academy_desc" rows="5" class="form-control">{{ $settings['edu_academy_desc'] ?? '' }}</textarea>
                        </div>
                        <div class="col-md-4 mt-2">
                            <label class="form-label">Academy Image</label>
                            <input type="file" name="edu_academy_img" class="form-control" accept="image/*">
                            <div class="img-preview-box mt-2">
                                <span class="d-block small text-muted mb-1">Current:</span>
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('edu_academy_img', 'images/education-04.webp') }}" alt="Academy">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- — Why Siksha Pathik — --}}
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-leaf text-success me-2"></i> Why Siksha Pathik Section</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Section Title</label>
                            <input type="text" name="edu_why_pathik_title" class="form-control"
                                value="{{ $settings['edu_why_pathik_title'] ?? 'Why Siksha Pathik' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Trust Items <small class="text-muted">(pipe-separated: Item 1|Item 2)</small></label>
                            <textarea name="edu_why_pathik_items" rows="5" class="form-control">{{ $settings['edu_why_pathik_items'] ?? 'More than an admission consultancy.|Faculty and institutional assistance under one roof.|Dedicated nursing institutional consultancy.|Multi-state operational network.|Complete student lifecycle support.|Integration with Edge Hire for career opportunities.' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- — Important Note — --}}
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-triangle-exclamation text-warning me-2"></i> Important Note Box</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Note Title</label>
                            <input type="text" name="edu_pathik_note_title" class="form-control"
                                value="{{ $settings['edu_pathik_note_title'] ?? 'Important Note' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Note Content</label>
                            <textarea name="edu_pathik_note_content" rows="4" class="form-control">{{ $settings['edu_pathik_note_content'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- — Integrated Ecosystem — --}}
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-circle-nodes text-primary me-2"></i> Integrated Ecosystem Card</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Left Title <small class="text-muted">(\n = new line)</small></label>
                            <input type="text" name="edu_ecosystem_left_title" class="form-control"
                                value="{{ $settings['edu_ecosystem_left_title'] ?? "Integrated\nEcosystem" }}">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Right Description</label>
                            <textarea name="edu_ecosystem_right_desc" rows="4" class="form-control">{{ $settings['edu_ecosystem_right_desc'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- — Healthcare Education Expertise — --}}
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-hospital text-danger me-2"></i> Healthcare Education Expertise Section</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Title <small class="text-muted">(\n = new line)</small></label>
                            <input type="text" name="edu_expertise_title" class="form-control"
                                value="{{ $settings['edu_expertise_title'] ?? "Our Healthcare\nEducation Expertise" }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Description</label>
                            <textarea name="edu_expertise_desc" rows="4" class="form-control">{{ $settings['edu_expertise_desc'] ?? '' }}</textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Button Text</label>
                            <input type="text" name="edu_expertise_btn_text" class="form-control"
                                value="{{ $settings['edu_expertise_btn_text'] ?? 'See more' }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Button URL</label>
                            <input type="text" name="edu_expertise_btn_url" class="form-control"
                                value="{{ $settings['edu_expertise_btn_url'] ?? '#' }}">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label class="form-label">Background Image</label>
                            <input type="file" name="edu_expertise_bg_img" class="form-control" accept="image/*">
                            <div class="img-preview-box mt-2">
                                <span class="d-block small text-muted mb-1">Current:</span>
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('edu_expertise_bg_img', 'images/education-05.webp') }}" alt="Expertise BG">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>{{-- end institutions pane --}}

        {{-- ================================================================ --}}
        {{-- TAB 5: CTA & QUERIES --}}
        {{-- ================================================================ --}}
        <div class="tab-pane fade" id="edu-cta-pane" role="tabpanel">
            <!-- Queries Section -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-circle-question text-primary me-2"></i> Queries Section</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Queries Heading</label>
                            <input type="text" name="edu_queries_heading" class="form-control"
                                value="{{ $settings['edu_queries_heading'] ?? 'If You Have any Queries Feel Free To Ask !' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ask Card Title</label>
                            <input type="text" name="edu_queries_cta_text" class="form-control"
                                value="{{ $settings['edu_queries_cta_text'] ?? 'Ask Question' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ask Card Subtitle</label>
                            <input type="text" name="edu_queries_sub_text" class="form-control"
                                value="{{ $settings['edu_queries_sub_text'] ?? 'If you have Any Queries Feel Free To ask !' }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Banner -->
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-bullhorn text-warning me-2"></i> CTA Banner</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Banner Title</label>
                            <input type="text" name="edu_cta_banner_title" class="form-control"
                                value="{{ $settings['edu_cta_banner_title'] ?? 'Ready to Contact with us ?' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Button Text</label>
                            <input type="text" name="edu_cta_banner_btn_text" class="form-control"
                                value="{{ $settings['edu_cta_banner_btn_text'] ?? 'Get Started' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Button URL</label>
                            <input type="text" name="edu_cta_banner_btn_url" class="form-control"
                                value="{{ $settings['edu_cta_banner_btn_url'] ?? '#contact' }}">
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
