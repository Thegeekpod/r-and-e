@extends('layouts.app')

@section('title', 'Contact Us | Roy Infinity Edge Consulting')
@section('main-class', 'education')

@section('content')
<!-- Contact Hero -->
<section class="contact-hero-section">
    <div class="container">
        <span class="contact-badge" data-aos="fade-down">Get In Touch</span>
        <h1 class="contact-hero-title" data-aos="fade-up">
            Let's Start a <span class="text-green">Conversation.</span>
        </h1>
        <p class="contact-hero-subtitle" data-aos="fade-up" data-aos-delay="200">
            Whether you require taxation advisory, college admission guidance, or healthcare talent recruitment, our consultants are here to assist you every step of the way.
        </p>
    </div>
</section>

<!-- Contact Main Container -->
<section class="contact-content-section pt-100">
    <div class="container">
        <!-- 3 Quick Cards -->
        <div class="contact-quick-cards" data-aos="fade-up" data-aos-delay="300">
            <!-- Card 1: Phone -->
            <div class="contact-quick-card">
                <div>
                    <div class="contact-card-icon">
                        <i class="fa-solid fa-phone-volume"></i>
                    </div>
                    <h4>Call Our Specialists</h4>
                    <p>Mon - Sat from 9:00 AM to 7:00 PM</p>
                </div>
                <a href="tel:{{ \App\Models\SiteSetting::get('contact_phone', '(406) 555-0120') }}" class="contact-link">
                    {{ \App\Models\SiteSetting::get('contact_phone', '(406) 555-0120') }} <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <!-- Card 2: Email -->
            <div class="contact-quick-card">
                <div>
                    <div class="contact-card-icon">
                        <i class="fa-solid fa-envelope-open-text"></i>
                    </div>
                    <h4>Send Us an Email</h4>
                    <p>Our team replies within 24 business hours.</p>
                </div>
                <a href="mailto:{{ \App\Models\SiteSetting::get('contact_email', 'hey@forestin.com') }}" class="contact-link">
                    {{ \App\Models\SiteSetting::get('contact_email', 'hey@forestin.com') }} <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <!-- Card 3: Location -->
            <div class="contact-quick-card">
                <div>
                    <div class="contact-card-icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <h4>Main Headquarters</h4>
                    <p>Visit our corporate consultation office.</p>
                </div>
                <span class="contact-link text-dark" style="font-size: 15px; font-weight: 600;">
                    {{ \App\Models\SiteSetting::get('contact_address', '2972 Westheimer Rd. Santa Ana, Illinois 85486') }}
                </span>
            </div>
        </div>

        <!-- 2 Column Main Section -->
        <div class="contact-main-grid">
            <!-- Left: Interactive Form -->
            <div class="contact-form-box" data-aos="fade-right">
                <h3>Send Us a Message</h3>
                <p class="form-intro">Fill in your inquiry details below and a dedicated consultant will get in touch with you shortly.</p>

                @if(session('contact_success'))
                    <div style="background: rgba(185, 255, 102, 0.2); border: 1.5px solid #03594A; color: #0C2924; padding: 16px 20px; border-radius: 14px; font-weight: 600; margin-bottom: 25px; display: flex; align-items: center; gap: 12px;">
                        <i class="fa-solid fa-circle-check" style="color: #03594A; font-size: 20px;"></i>
                        <span>{{ session('contact_success') }}</span>
                    </div>
                @endif

                @if($errors->any())
                    <div style="background: #FEE2E2; border: 1.5px solid #EF4444; color: #991B1B; padding: 14px 20px; border-radius: 14px; margin-bottom: 25px;">
                        <ul style="margin: 0; padding-left: 18px; font-size: 14px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="contact-custom-form">
                    @csrf

                    <div class="contact-form-row">
                        <div class="form-group">
                            <label>Your Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control-input" placeholder="e.g. Rahul Sharma" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Email Address <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control-input" placeholder="name@company.com" value="{{ old('email') }}" required>
                        </div>
                    </div>

                    <div class="contact-form-row">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="tel" name="phone" class="form-control-input" placeholder="+91 98765 43210" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            <label>Service of Interest <span class="text-danger">*</span></label>
                            <select name="service" class="form-control-input" required>
                                <option value="" disabled {{ old('service') ? '' : 'selected' }}>Select a Service</option>
                                <option value="Finance & Taxation" {{ old('service') == 'Finance & Taxation' ? 'selected' : '' }}>Finance & Taxation (GST, IT, Audits)</option>
                                <option value="Education Consultancy" {{ old('service') == 'Education Consultancy' ? 'selected' : '' }}>Education Consultancy (College Admissions)</option>
                                <option value="Job Placement" {{ old('service') == 'Job Placement' ? 'selected' : '' }}>Job Placement Services (Healthcare / Corporate)</option>
                                <option value="Other Consultation" {{ old('service') == 'Other Consultation' ? 'selected' : '' }}>Other Business Consultation</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Subject / Topic</label>
                        <input type="text" name="subject" class="form-control-input" placeholder="Brief subject of your query" value="{{ old('subject') }}">
                    </div>

                    <div class="form-group">
                        <label>Your Message / Requirements <span class="text-danger">*</span></label>
                        <textarea name="message" rows="4" class="form-control-input" placeholder="Tell us about your requirements or questions..." required>{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="btn-contact-submit">
                        <span>Submit Inquiry</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </form>
            </div>

            <!-- Right: Dark Luxury Info Card -->
            <div class="contact-info-panel" data-aos="fade-left">
                <h3>Why Connect With Us?</h3>
                <p class="info-sub">At Roy Infinity Edge Consulting, we offer integrated solutions across Finance, Education, and Healthcare HR under one trusted roof.</p>

                <ul class="contact-feature-list">
                    <li class="contact-feature-item">
                        <div class="contact-feature-icon">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <div class="contact-feature-text">
                            <h5>Transparent & Confidential</h5>
                            <p>Every consultation is handled with strict confidentiality and transparent guidance.</p>
                        </div>
                    </li>

                    <li class="contact-feature-item">
                        <div class="contact-feature-icon">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <div class="contact-feature-text">
                            <h5>Multi-Disciplinary Specialists</h5>
                            <p>Certified accountants, experienced admission counsellors, and corporate recruiters.</p>
                        </div>
                    </li>

                    <li class="contact-feature-item">
                        <div class="contact-feature-icon">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <div class="contact-feature-text">
                            <h5>Dedicated Relationship Manager</h5>
                            <p>End-to-end assistance from initial consultation to final outcome.</p>
                        </div>
                    </li>
                </ul>

                <div class="contact-hours-box">
                    <div class="contact-hours-icon">
                        <i class="fa-regular fa-clock"></i>
                    </div>
                    <div class="contact-hours-text">
                        <h6>Working Hours</h6>
                        <p>Monday - Saturday: 9:00 AM - 7:00 PM<br>Sunday: Closed</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Queries Section -->
<section class="queries-final-section">
    <div class="container queries-flex">
        <div class="queries-left">
            <h2>
                If You Have any Queries
                <span class="text-green">Feel Free To Ask !</span>
            </h2>
        </div>
        <div class="queries-right">
            <div class="ask-card">
                <h3>Ask Question</h3>
                <p>If you have Any Queries Feel Free To ask !</p>
                <div class="input-wrapper">
                    <input type="text" placeholder="Type............" />
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
