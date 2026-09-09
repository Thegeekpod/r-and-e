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

            {{-- — Programme Cards (Dynamic Repeater) — --}}
            @php
                $progCards = [];
                if (!empty($settings['edu_prog_cards'])) {
                    $decoded = json_decode($settings['edu_prog_cards'], true);
                    if (is_array($decoded)) {
                        $progCards = $decoded;
                    }
                }
                if (empty($progCards)) {
                    // Fallback to legacy single settings if available
                    for ($i = 1; $i <= 6; $i++) {
                        if (!empty($settings["edu_prog_card_{$i}_title"]) || !empty($settings["edu_prog_card_{$i}_content"])) {
                            $progCards[] = [
                                'title'     => $settings["edu_prog_card_{$i}_title"] ?? '',
                                'dot'       => $settings["edu_prog_card_{$i}_dot"] ?? (['dot-blue','dot-orange','dot-purple','dot-blue','dot-orange','dot-purple'][$i-1] ?? 'dot-blue'),
                                'read_time' => '5 min read',
                                'content'   => $settings["edu_prog_card_{$i}_content"] ?? '',
                            ];
                        }
                    }
                }
                if (empty($progCards)) {
                    // Fallback default initial cards
                    $progCards = [
                        ['title' => 'Admission follow-up', 'dot' => 'dot-blue', 'read_time' => '5 min read', 'content' => "Documentation Support\nEducational document verification Identity and address proof documentation Migration Certificate guidance"],
                        ['title' => 'Academic Programmes We Facilitate', 'dot' => 'dot-orange', 'read_time' => '5 min read', 'content' => "Nursing\nGeneral Nursing & Midwifery (GNM) B.Sc. Nursing Post Basic B.Sc. Nursing M.Sc. Nursing"],
                        ['title' => 'Pharmacy', 'dot' => 'dot-purple', 'read_time' => '5 min read', 'content' => "Diploma in Pharmacy (D.Pharm.)\nBachelor of Pharmacy (B. Pharm.)\nDoctor of Pharmacy (Pharm.D)\nMaster of Pharmacy (M. Pharm.)"],
                        ['title' => 'Engineering & Technology', 'dot' => 'dot-blue', 'read_time' => '5 min read', 'content' => "Polytechnic Diploma B.Tech\nM.Tech Computer Applications & Information Technology BCA"],
                        ['title' => 'Education', 'dot' => 'dot-orange', 'read_time' => '5 min read', 'content' => "D.El.Ed.\nB.Ed.\nM.Ed."],
                        ['title' => 'Law', 'dot' => 'dot-purple', 'read_time' => '5 min read', 'content' => "LL. B.\nB.A.\nB.B.\nLL. B. A.\nLL. B. L\nLL.M."],
                    ];
                }
            @endphp

            <div class="admin-card">
                <input type="hidden" name="edu_prog_cards_submitted" value="1">
                <div class="admin-card-header d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-2">
                        <h5><i class="fa-solid fa-grid-2 text-success me-2"></i> Programme Cards</h5>
                        <span class="badge bg-success rounded-pill" id="progCardCountBadge">{{ count($progCards) }} Cards</span>
                    </div>
                    <button type="button" class="btn btn-sm btn-success" id="addProgCardBtn">
                        <i class="fa-solid fa-plus me-1"></i> Add New Card
                    </button>
                </div>
                <div class="admin-card-body">
                    <div class="row g-4" id="progCardsContainer">
                        @foreach($progCards as $index => $card)
                        <div class="col-md-6 prog-card-item" data-index="{{ $index }}">
                            <div class="p-3 border rounded-3 bg-light position-relative shadow-sm h-100">
                                <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge bg-dark px-2 py-1 card-num-badge">Card {{ $index + 1 }}</span>
                                        <span class="prog-dot-preview {{ $card['dot'] ?? 'dot-blue' }}" style="width:12px; height:12px; border-radius:50%; display:inline-block;"></span>
                                    </div>
                                    <div class="btn-group btn-group-sm">
                                        <button type="button" class="btn btn-outline-secondary btn-move-card-up" title="Move Up">
                                            <i class="fa-solid fa-arrow-up"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary btn-move-card-down" title="Move Down">
                                            <i class="fa-solid fa-arrow-down"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger btn-delete-card" title="Delete Card">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-md-7">
                                        <label class="form-label small mb-1">Card Title</label>
                                        <input type="text" name="edu_prog_cards[{{ $index }}][title]" class="form-control form-control-sm"
                                            value="{{ $card['title'] ?? '' }}" placeholder="e.g. Admission follow-up">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label small mb-1">Dot Color</label>
                                        <select name="edu_prog_cards[{{ $index }}][dot]" class="form-select form-select-sm prog-dot-select">
                                            @foreach(['dot-blue' => 'Blue', 'dot-orange' => 'Orange', 'dot-purple' => 'Purple', 'dot-green' => 'Green', 'dot-teal' => 'Teal', 'dot-red' => 'Red', 'dot-yellow' => 'Yellow'] as $val => $label)
                                                <option value="{{ $val }}" {{ ($card['dot'] ?? '') === $val ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label small mb-1">Read Time / Tag <small class="text-muted">(e.g. 5 min read)</small></label>
                                        <input type="text" name="edu_prog_cards[{{ $index }}][read_time]" class="form-control form-control-sm"
                                            value="{{ $card['read_time'] ?? '5 min read' }}" placeholder="5 min read">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label small mb-1">Content <small class="text-muted">(one item per line or description)</small></label>
                                        <textarea name="edu_prog_cards[{{ $index }}][content]" rows="4" class="form-control form-control-sm" placeholder="Enter card content...">{{ $card['content'] ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div id="noProgCardsMsg" class="text-center py-4 text-muted {{ count($progCards) === 0 ? '' : 'd-none' }}">
                        <i class="fa-solid fa-layer-group fa-2x mb-2 text-secondary"></i>
                        <p class="m-0">No programme cards added. Click "Add New Card" to create one.</p>
                    </div>

                    <div class="mt-3 pt-3 border-top d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <small class="text-muted">Cards will automatically render and align nicely in the frontend grid.</small>
                        <button type="button" class="btn btn-sm btn-outline-success" id="addProgCardBtnBottom">
                            <i class="fa-solid fa-plus me-1"></i> Add Another Card
                        </button>
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('progCardsContainer');
    const badge = document.getElementById('progCardCountBadge');
    const noMsg = document.getElementById('noProgCardsMsg');
    const addBtnTop = document.getElementById('addProgCardBtn');
    const addBtnBottom = document.getElementById('addProgCardBtnBottom');

    function updateCardCount() {
        const cards = container.querySelectorAll('.prog-card-item');
        if (badge) {
            badge.textContent = `${cards.length} Cards`;
        }
        if (noMsg) {
            if (cards.length === 0) {
                noMsg.classList.remove('d-none');
            } else {
                noMsg.classList.add('d-none');
            }
        }
    }

    function reindexCards() {
        const cards = container.querySelectorAll('.prog-card-item');
        cards.forEach((card, index) => {
            card.setAttribute('data-index', index);

            // Update badge
            const numBadge = card.querySelector('.card-num-badge');
            if (numBadge) numBadge.textContent = `Card ${index + 1}`;

            // Update input names
            const titleInput = card.querySelector('input[name*="[title]"]');
            if (titleInput) titleInput.setAttribute('name', `edu_prog_cards[${index}][title]`);

            const dotSelect = card.querySelector('select[name*="[dot]"]');
            if (dotSelect) dotSelect.setAttribute('name', `edu_prog_cards[${index}][dot]`);

            const readTimeInput = card.querySelector('input[name*="[read_time]"]');
            if (readTimeInput) readTimeInput.setAttribute('name', `edu_prog_cards[${index}][read_time]`);

            const contentTextarea = card.querySelector('textarea[name*="[content]"]');
            if (contentTextarea) contentTextarea.setAttribute('name', `edu_prog_cards[${index}][content]`);

            // Update move buttons disabled state
            const moveUpBtn = card.querySelector('.btn-move-card-up');
            const moveDownBtn = card.querySelector('.btn-move-card-down');
            if (moveUpBtn) moveUpBtn.disabled = (index === 0);
            if (moveDownBtn) moveDownBtn.disabled = (index === cards.length - 1);
        });

        updateCardCount();
    }

    function createCardElement(index) {
        const div = document.createElement('div');
        div.className = 'col-md-6 prog-card-item';
        div.setAttribute('data-index', index);
        div.innerHTML = `
            <div class="p-3 border rounded-3 bg-light position-relative shadow-sm h-100">
                <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-dark px-2 py-1 card-num-badge">Card ${index + 1}</span>
                        <span class="prog-dot-preview dot-blue" style="width:12px; height:12px; border-radius:50%; display:inline-block;"></span>
                    </div>
                    <div class="btn-group btn-group-sm">
                        <button type="button" class="btn btn-outline-secondary btn-move-card-up" title="Move Up">
                            <i class="fa-solid fa-arrow-up"></i>
                        </button>
                        <button type="button" class="btn btn-outline-secondary btn-move-card-down" title="Move Down">
                            <i class="fa-solid fa-arrow-down"></i>
                        </button>
                        <button type="button" class="btn btn-outline-danger btn-delete-card" title="Delete Card">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md-7">
                        <label class="form-label small mb-1">Card Title</label>
                        <input type="text" name="edu_prog_cards[${index}][title]" class="form-control form-control-sm"
                            value="" placeholder="e.g. Admission follow-up">
                    </div>
                    <div class="col-md-5">
                        <label class="form-label small mb-1">Dot Color</label>
                        <select name="edu_prog_cards[${index}][dot]" class="form-select form-select-sm prog-dot-select">
                            <option value="dot-blue" selected>Blue</option>
                            <option value="dot-orange">Orange</option>
                            <option value="dot-purple">Purple</option>
                            <option value="dot-green">Green</option>
                            <option value="dot-teal">Teal</option>
                            <option value="dot-red">Red</option>
                            <option value="dot-yellow">Yellow</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label small mb-1">Read Time / Tag <small class="text-muted">(e.g. 5 min read)</small></label>
                        <input type="text" name="edu_prog_cards[${index}][read_time]" class="form-control form-control-sm"
                            value="5 min read" placeholder="5 min read">
                    </div>
                    <div class="col-12">
                        <label class="form-label small mb-1">Content <small class="text-muted">(one item per line or description)</small></label>
                        <textarea name="edu_prog_cards[${index}][content]" rows="4" class="form-control form-control-sm" placeholder="Enter card content..."></textarea>
                    </div>
                </div>
            </div>
        `;
        return div;
    }

    function addCard() {
        const count = container.querySelectorAll('.prog-card-item').length;
        const newCard = createCardElement(count);
        container.appendChild(newCard);
        reindexCards();

        const titleInput = newCard.querySelector('input[name*="[title]"]');
        if (titleInput) {
            titleInput.focus();
        }
    }

    if (addBtnTop) addBtnTop.addEventListener('click', addCard);
    if (addBtnBottom) addBtnBottom.addEventListener('click', addCard);

    // Event delegation on container
    container.addEventListener('click', function (e) {
        const deleteBtn = e.target.closest('.btn-delete-card');
        if (deleteBtn) {
            const cardItem = deleteBtn.closest('.prog-card-item');
            if (cardItem) {
                if (confirm('Are you sure you want to remove this programme card?')) {
                    cardItem.remove();
                    reindexCards();
                }
            }
            return;
        }

        const moveUpBtn = e.target.closest('.btn-move-card-up');
        if (moveUpBtn) {
            const cardItem = moveUpBtn.closest('.prog-card-item');
            const prevItem = cardItem ? cardItem.previousElementSibling : null;
            if (cardItem && prevItem && prevItem.classList.contains('prog-card-item')) {
                container.insertBefore(cardItem, prevItem);
                reindexCards();
            }
            return;
        }

        const moveDownBtn = e.target.closest('.btn-move-card-down');
        if (moveDownBtn) {
            const cardItem = moveDownBtn.closest('.prog-card-item');
            const nextItem = cardItem ? cardItem.nextElementSibling : null;
            if (cardItem && nextItem && nextItem.classList.contains('prog-card-item')) {
                container.insertBefore(nextItem, cardItem);
                reindexCards();
            }
            return;
        }
    });

    // Dot select change preview update
    container.addEventListener('change', function (e) {
        if (e.target.classList.contains('prog-dot-select')) {
            const cardItem = e.target.closest('.prog-card-item');
            if (cardItem) {
                const preview = cardItem.querySelector('.prog-dot-preview');
                if (preview) {
                    preview.className = `prog-dot-preview ${e.target.value}`;
                }
            }
        }
    });

    // Initial indexing
    reindexCards();
});
</script>
@endpush
