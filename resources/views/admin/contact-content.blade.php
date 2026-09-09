@extends('admin.layouts.master')

@section('title', 'Contact Us Page Content Editor')
@section('page-title', 'Contact Page Content Management')

@section('content')
<form action="{{ route('admin.contact-content.update') }}" method="POST">
    @csrf

    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
        <div>
            <h4 class="fw-bold m-0 text-dark">Customize Contact Us Page Content</h4>
            <p class="text-muted small m-0">Edit hero, quick contact cards, form intro, 'Why Connect With Us' panel, and queries section.</p>
        </div>
        <button type="submit" class="btn btn-primary-admin px-4 shadow-sm">
            <i class="fa-solid fa-floppy-disk me-2"></i> Save All Changes
        </button>
    </div>

    <!-- Navigation Tabs -->
    <ul class="nav nav-tabs mb-4 bg-white p-2 rounded-3 shadow-sm" id="contactTabs" role="tablist" style="flex-wrap:wrap; gap:4px;">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="contact-hero-tab" data-bs-toggle="tab" data-bs-target="#contact-hero-pane" type="button" role="tab">
                <i class="fa-solid fa-star me-2"></i> 1. Hero Section
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-cards-tab" data-bs-toggle="tab" data-bs-target="#contact-cards-pane" type="button" role="tab">
                <i class="fa-solid fa-id-card-clip me-2"></i> 2. Quick Contact Cards
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-form-tab" data-bs-toggle="tab" data-bs-target="#contact-form-pane" type="button" role="tab">
                <i class="fa-solid fa-envelope-open-text me-2"></i> 3. Form Intro Box
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-info-tab" data-bs-toggle="tab" data-bs-target="#contact-info-pane" type="button" role="tab">
                <i class="fa-solid fa-shield-halved me-2"></i> 4. Why Connect Panel
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-queries-tab" data-bs-toggle="tab" data-bs-target="#contact-queries-pane" type="button" role="tab">
                <i class="fa-solid fa-circle-question me-2"></i> 5. Queries Section
            </button>
        </li>
    </ul>

    <!-- Tab Contents -->
    <div class="tab-content" id="contactTabsContent">

        {{-- ================================================================ --}}
        {{-- TAB 1: HERO SECTION --}}
        {{-- ================================================================ --}}
        <div class="tab-pane fade show active" id="contact-hero-pane" role="tabpanel">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-star text-warning me-2"></i> Contact Hero Header</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Hero Badge Text</label>
                            <input type="text" name="contact_hero_badge" class="form-control"
                                value="{{ $settings['contact_hero_badge'] ?? 'Get In Touch' }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Hero Title (Prefix)</label>
                            <input type="text" name="contact_hero_title" class="form-control"
                                value="{{ $settings['contact_hero_title'] ?? "Let's Start a" }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Hero Title (Highlight / Green Word)</label>
                            <input type="text" name="contact_hero_title_highlight" class="form-control"
                                value="{{ $settings['contact_hero_title_highlight'] ?? 'Conversation.' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Hero Subtitle / Description</label>
                            <textarea name="contact_hero_subtitle" rows="3" class="form-control">{{ $settings['contact_hero_subtitle'] ?? 'Whether you require taxation advisory, college admission guidance, or healthcare talent recruitment, our consultants are here to assist you every step of the way.' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary-admin px-4 shadow-sm">
                    <i class="fa-solid fa-floppy-disk me-2"></i> Save Changes
                </button>
            </div>
        </div>

        {{-- ================================================================ --}}
        {{-- TAB 2: QUICK CONTACT CARDS --}}
        {{-- ================================================================ --}}
        <div class="tab-pane fade" id="contact-cards-pane" role="tabpanel">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-id-card-clip text-primary me-2"></i> 3 Quick Contact Info Cards</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-4">
                        <!-- Card 1: Phone -->
                        <div class="col-md-4">
                            <div class="p-3 border rounded-3 bg-light h-100">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <span class="badge bg-primary p-2"><i class="fa-solid fa-phone-volume"></i></span>
                                    <h6 class="fw-bold m-0">Card 1: Phone Call</h6>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label small">Card Title</label>
                                    <input type="text" name="contact_card1_title" class="form-control form-control-sm"
                                        value="{{ $settings['contact_card1_title'] ?? 'Call Our Specialists' }}">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label small">Subtitle / Available Timings</label>
                                    <input type="text" name="contact_card1_subtitle" class="form-control form-control-sm"
                                        value="{{ $settings['contact_card1_subtitle'] ?? 'Mon - Sat from 9:00 AM to 7:00 PM' }}">
                                </div>
                                <div>
                                    <label class="form-label small">Display Phone Number</label>
                                    <input type="text" name="contact_card1_phone" class="form-control form-control-sm"
                                        value="{{ $settings['contact_card1_phone'] ?? ($settings['contact_phone'] ?? '(406) 555-0120') }}">
                                </div>
                            </div>
                        </div>

                        <!-- Card 2: Email -->
                        <div class="col-md-4">
                            <div class="p-3 border rounded-3 bg-light h-100">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <span class="badge bg-success p-2"><i class="fa-solid fa-envelope-open-text"></i></span>
                                    <h6 class="fw-bold m-0">Card 2: Email Inquiry</h6>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label small">Card Title</label>
                                    <input type="text" name="contact_card2_title" class="form-control form-control-sm"
                                        value="{{ $settings['contact_card2_title'] ?? 'Send Us an Email' }}">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label small">Subtitle / Response SLA</label>
                                    <input type="text" name="contact_card2_subtitle" class="form-control form-control-sm"
                                        value="{{ $settings['contact_card2_subtitle'] ?? 'Our team replies within 24 business hours.' }}">
                                </div>
                                <div>
                                    <label class="form-label small">Display Email Address</label>
                                    <input type="text" name="contact_card2_email" class="form-control form-control-sm"
                                        value="{{ $settings['contact_card2_email'] ?? ($settings['contact_email'] ?? 'hey@forestin.com') }}">
                                </div>
                            </div>
                        </div>

                        <!-- Card 3: Address / Location -->
                        <div class="col-md-4">
                            <div class="p-3 border rounded-3 bg-light h-100">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <span class="badge bg-danger p-2"><i class="fa-solid fa-location-dot"></i></span>
                                    <h6 class="fw-bold m-0">Card 3: Main Headquarters</h6>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label small">Card Title</label>
                                    <input type="text" name="contact_card3_title" class="form-control form-control-sm"
                                        value="{{ $settings['contact_card3_title'] ?? 'Main Headquarters' }}">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label small">Subtitle</label>
                                    <input type="text" name="contact_card3_subtitle" class="form-control form-control-sm"
                                        value="{{ $settings['contact_card3_subtitle'] ?? 'Visit our corporate consultation office.' }}">
                                </div>
                                <div>
                                    <label class="form-label small">Display Office Address</label>
                                    <textarea name="contact_card3_address" rows="2" class="form-control form-control-sm">{{ $settings['contact_card3_address'] ?? ($settings['contact_address'] ?? '2972 Westheimer Rd. Santa Ana, Illinois 85486') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary-admin px-4 shadow-sm">
                    <i class="fa-solid fa-floppy-disk me-2"></i> Save Changes
                </button>
            </div>
        </div>

        {{-- ================================================================ --}}
        {{-- TAB 3: FORM INTRO BOX --}}
        {{-- ================================================================ --}}
        <div class="tab-pane fade" id="contact-form-pane" role="tabpanel">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-pen-to-square text-success me-2"></i> Contact Form Header & Intro</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Form Box Heading</label>
                            <input type="text" name="contact_form_title" class="form-control"
                                value="{{ $settings['contact_form_title'] ?? 'Send Us a Message' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Form Box Intro Description</label>
                            <textarea name="contact_form_intro" rows="3" class="form-control">{{ $settings['contact_form_intro'] ?? 'Fill in your inquiry details below and a dedicated consultant will get in touch with you shortly.' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary-admin px-4 shadow-sm">
                    <i class="fa-solid fa-floppy-disk me-2"></i> Save Changes
                </button>
            </div>
        </div>

        {{-- ================================================================ --}}
        {{-- TAB 4: WHY CONNECT PANEL --}}
        {{-- ================================================================ --}}
        <div class="tab-pane fade" id="contact-info-pane" role="tabpanel">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-shield-halved text-info me-2"></i> 'Why Connect With Us?' Information Panel</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Panel Heading</label>
                            <input type="text" name="contact_info_title" class="form-control"
                                value="{{ $settings['contact_info_title'] ?? 'Why Connect With Us?' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Panel Description</label>
                            <textarea name="contact_info_desc" rows="3" class="form-control">{{ $settings['contact_info_desc'] ?? 'At Roy Infinity Edge Consulting, we offer integrated solutions across Finance, Education, and Healthcare HR under one trusted roof.' }}</textarea>
                        </div>

                        <div class="col-12 mt-4">
                            <h6 class="fw-bold border-bottom pb-2 text-dark"><i class="fa-solid fa-list-check me-2 text-primary"></i> 3 Key Feature Points</h6>
                        </div>

                        <!-- Feature 1 -->
                        <div class="col-md-4">
                            <div class="p-3 border rounded-3 bg-light h-100">
                                <label class="form-label small">Feature 1: Title</label>
                                <input type="text" name="contact_feat1_title" class="form-control form-control-sm mb-2"
                                    value="{{ $settings['contact_feat1_title'] ?? 'Transparent & Confidential' }}">
                                <label class="form-label small">Feature 1: Description</label>
                                <textarea name="contact_feat1_desc" rows="3" class="form-control form-control-sm">{{ $settings['contact_feat1_desc'] ?? 'Every consultation is handled with strict confidentiality and transparent guidance.' }}</textarea>
                            </div>
                        </div>

                        <!-- Feature 2 -->
                        <div class="col-md-4">
                            <div class="p-3 border rounded-3 bg-light h-100">
                                <label class="form-label small">Feature 2: Title</label>
                                <input type="text" name="contact_feat2_title" class="form-control form-control-sm mb-2"
                                    value="{{ $settings['contact_feat2_title'] ?? 'Multi-Disciplinary Specialists' }}">
                                <label class="form-label small">Feature 2: Description</label>
                                <textarea name="contact_feat2_desc" rows="3" class="form-control form-control-sm">{{ $settings['contact_feat2_desc'] ?? 'Certified accountants, experienced admission counsellors, and corporate recruiters.' }}</textarea>
                            </div>
                        </div>

                        <!-- Feature 3 -->
                        <div class="col-md-4">
                            <div class="p-3 border rounded-3 bg-light h-100">
                                <label class="form-label small">Feature 3: Title</label>
                                <input type="text" name="contact_feat3_title" class="form-control form-control-sm mb-2"
                                    value="{{ $settings['contact_feat3_title'] ?? 'Dedicated Relationship Manager' }}">
                                <label class="form-label small">Feature 3: Description</label>
                                <textarea name="contact_feat3_desc" rows="3" class="form-control form-control-sm">{{ $settings['contact_feat3_desc'] ?? 'End-to-end assistance from initial consultation to final outcome.' }}</textarea>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <h6 class="fw-bold border-bottom pb-2 text-dark"><i class="fa-regular fa-clock me-2 text-warning"></i> Working Hours Box</h6>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Working Hours Title</label>
                            <input type="text" name="contact_hours_title" class="form-control"
                                value="{{ $settings['contact_hours_title'] ?? 'Working Hours' }}">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label">Working Hours Details <small class="text-muted">(\n = new line)</small></label>
                            <textarea name="contact_hours_text" rows="2" class="form-control">{{ $settings['contact_hours_text'] ?? "Monday - Saturday: 9:00 AM - 7:00 PM\nSunday: Closed" }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary-admin px-4 shadow-sm">
                    <i class="fa-solid fa-floppy-disk me-2"></i> Save Changes
                </button>
            </div>
        </div>

        {{-- ================================================================ --}}
        {{-- TAB 5: BOTTOM QUERIES SECTION --}}
        {{-- ================================================================ --}}
        <div class="tab-pane fade" id="contact-queries-pane" role="tabpanel">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-circle-question text-primary me-2"></i> Bottom Queries & Question Prompt</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Queries Heading (Line 1)</label>
                            <input type="text" name="contact_queries_heading" class="form-control"
                                value="{{ $settings['contact_queries_heading'] ?? 'If You Have any Queries' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Queries Highlight (Green Text)</label>
                            <input type="text" name="contact_queries_highlight" class="form-control"
                                value="{{ $settings['contact_queries_highlight'] ?? 'Feel Free To Ask !' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ask Card Title</label>
                            <input type="text" name="contact_queries_card_title" class="form-control"
                                value="{{ $settings['contact_queries_card_title'] ?? 'Ask Question' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ask Card Subtitle</label>
                            <input type="text" name="contact_queries_card_subtitle" class="form-control"
                                value="{{ $settings['contact_queries_card_subtitle'] ?? 'If you have Any Queries Feel Free To ask !' }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary-admin px-5 shadow">
                    <i class="fa-solid fa-floppy-disk me-2"></i> Save All Changes
                </button>
            </div>
        </div>

    </div>{{-- end tab-content --}}
</form>
@endsection
