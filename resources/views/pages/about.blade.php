@extends('layouts.app')

@section('title', 'About Us | Roy Infinity Edge Consulting')
@section('main-class', 'education about-clean-page')

@push('styles')
<style>
    /* ===================================================
       Founder & Leadership Section Styles
    =================================================== */
    .ab-founder-area {
        background: linear-gradient(180deg, #FFFFFF 0%, #F5F9F7 50%, #FFFFFF 100%);
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }

    .ab-founder-grid {
        display: grid;
        grid-template-columns: 440px 1fr;
        gap: 50px;
        align-items: stretch;
    }

    /* Founder Card Left */
    .founder-card-wrapper {
        position: relative;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .founder-image-box {
        position: relative;
        border-radius: 28px;
        overflow: hidden;
        background: #0C2924;
        box-shadow: 0 25px 65px -12px rgba(9, 81, 69, 0.28), 0 0 0 1px rgba(9, 81, 69, 0.08);
        border: 2px solid rgba(185, 255, 102, 0.25);
        transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.35s ease;
        height: 100%;
        min-height: 520px;
    }

    .founder-card-wrapper:hover .founder-image-box {
        transform: translateY(-4px);
        box-shadow: 0 35px 80px -15px rgba(9, 81, 69, 0.35);
    }

    .founder-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top center;
        display: block;
        transition: transform 0.5s ease;
    }

    .founder-card-wrapper:hover .founder-img {
        transform: scale(1.02);
    }

    .founder-top-badge {
        position: absolute;
        top: 20px;
        left: 20px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(9, 46, 39, 0.92);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        color: #B9FF66;
        font-family: var(--font-plus-jakarta);
        font-size: 12.5px;
        font-weight: 700;
        letter-spacing: 0.3px;
        padding: 7px 18px;
        border-radius: 50px;
        border: 1px solid rgba(185, 255, 102, 0.35);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.25);
        z-index: 2;
    }

    .founder-badge-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #B9FF66;
        display: inline-block;
        box-shadow: 0 0 8px #B9FF66;
    }

    .founder-bottom-card {
        position: absolute;
        bottom: 20px;
        left: 20px;
        right: 20px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        border-radius: 18px;
        padding: 14px 20px;
        box-shadow: 0 16px 36px rgba(0, 0, 0, 0.16);
        border: 1px solid rgba(255, 255, 255, 0.85);
        z-index: 2;
    }

    .founder-motto {
        font-family: var(--font-soliden);
        font-size: 16px;
        font-weight: 700;
        color: #0C2924;
        letter-spacing: 0.3px;
        margin-bottom: 2px;
    }

    .founder-submotto {
        font-family: var(--font-plus-jakarta);
        font-size: 11px;
        font-weight: 700;
        color: #03594A;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Founder Content Right */
    .ab-founder-content-col {
        padding-left: 10px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .ab-founder-lead-quote {
        font-family: var(--font-plus-jakarta);
        font-size: 16px;
        font-weight: 700;
        color: #03594A;
        line-height: 1.55;
        background: #E8F5F1;
        border-left: 4px solid #03594A;
        padding: 14px 20px;
        border-radius: 0 14px 14px 0;
        margin: 16px 0 18px;
    }

    .ab-founder-body-text {
        font-family: var(--font-plus-jakarta);
        font-size: 15px;
        color: #475569;
        line-height: 1.7;
        margin-bottom: 20px;
    }

    .founder-pillars-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin: 16px 0 18px;
    }

    .founder-pillar-card {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        background: #FFFFFF;
        padding: 13px 18px;
        border-radius: 16px;
        border: 1.5px solid #E5E7EB;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
        transition: all 0.25s ease;
    }

    .founder-pillar-card:hover {
        border-color: #03594A;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(3, 89, 74, 0.07);
    }

    .founder-pillar-icon {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        background: #E6F7F0;
        color: #03594A;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
        flex-shrink: 0;
        margin-top: 2px;
    }

    .founder-pillar-text h5 {
        font-family: var(--font-plus-jakarta);
        font-size: 14.5px;
        font-weight: 800;
        color: #0F172A;
        margin-bottom: 2px;
    }

    .founder-pillar-text p {
        font-family: var(--font-plus-jakarta);
        font-size: 12.5px;
        color: #64748B;
        line-height: 1.45;
        margin: 0;
    }

    /* Founder Quote Highlight Banner */
    .founder-quote-banner {
        display: flex;
        align-items: center;
        gap: 14px;
        background: linear-gradient(135deg, #0C2924 0%, #03594A 100%);
        color: #FFFFFF;
        padding: 13px 18px;
        border-radius: 16px;
        margin-bottom: 18px;
        box-shadow: 0 8px 24px rgba(12, 41, 36, 0.15);
    }

    .quote-banner-icon {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: rgba(185, 255, 102, 0.2);
        color: #B9FF66;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        flex-shrink: 0;
    }

    .quote-banner-text {
        font-family: var(--font-plus-jakarta);
        font-size: 12.5px;
        line-height: 1.45;
        color: rgba(255, 255, 255, 0.92);
    }

    .quote-banner-text strong {
        color: #B9FF66;
        display: block;
        font-size: 13px;
        font-family: var(--font-soliden);
        letter-spacing: 0.3px;
        margin-bottom: 1px;
    }

    /* Founder Metrics Row */
    .founder-metrics-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #F8FAFC;
        border: 1px solid #E2E8F0;
        border-radius: 14px;
        padding: 10px 18px;
        margin-bottom: 18px;
    }

    .founder-metric-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .founder-metric-item strong {
        font-family: var(--font-soliden);
        font-size: 18px;
        color: #03594A;
        line-height: 1.1;
    }

    .founder-metric-item span {
        font-family: var(--font-plus-jakarta);
        font-size: 11px;
        font-weight: 600;
        color: #64748B;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        margin-top: 2px;
    }

    .founder-metric-sep {
        width: 1px;
        height: 26px;
        background: #CBD5E1;
    }

    .founder-action-strip {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
        padding-top: 18px;
        border-top: 1px solid #E2E8F0;
    }

    .founder-sign-name {
        font-family: var(--font-soliden);
        font-size: 17px;
        font-weight: 700;
        color: #0F172A;
    }

    .founder-sign-title {
        font-family: var(--font-plus-jakarta);
        font-size: 12.5px;
        color: #64748B;
        font-weight: 600;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .ab-founder-grid {
            grid-template-columns: 1fr;
            gap: 40px;
            align-items: flex-start;
        }

        .founder-image-box {
            min-height: 480px;
            max-height: 540px;
        }

        .ab-founder-content-col {
            padding-left: 0;
        }

        .founder-pillars-row {
            grid-template-columns: 1fr;
            gap: 10px;
        }
    }

    @media (max-width: 576px) {
        .founder-image-box {
            min-height: 400px;
        }

        .founder-top-badge {
            top: 14px;
            left: 14px;
            font-size: 11.5px;
            padding: 6px 14px;
        }

        .founder-bottom-card {
            bottom: 14px;
            left: 14px;
            right: 14px;
            padding: 12px 16px;
        }

        .founder-motto {
            font-size: 15px;
        }

        .founder-action-strip {
            flex-direction: column;
            align-items: flex-start;
            gap: 14px;
        }

        .founder-action-strip .ab-btn-primary {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endpush

@section('content')

{{-- 1. Minimalist High-Impact Hero --}}
<section class="ab-hero-section">
    <div class="container">


        <div class="ab-hero-box" data-aos="fade-up">
            <div class="ab-hero-top-badge">
                <i class="fa-solid fa-star me-2 text-warning"></i> {{ $settings['about_hero_badge'] ?? 'About Roy Infinity Edge' }}
            </div>
            
            <h1 class="ab-hero-title">
                {!! e($settings['about_hero_title'] ?? 'Empowering Futures Across Finance, Education & Talent Placement') !!}
            </h1>
            
            <p class="ab-hero-lead">
                {{ $settings['about_hero_subtitle'] ?? 'We are an integrated multi-disciplinary consulting organization committed to driving sustainable growth, institutional strength, and professional success across India.' }}
            </p>

            <div class="ab-hero-btns">
                <a href="{{ route('contact') }}" class="ab-btn-primary">
                    <i class="fa-solid fa-envelope me-2"></i> Get In Touch
                </a>
                <a href="#about-story" class="ab-btn-secondary">
                    Our Legacy <i class="fa-solid fa-arrow-down ms-2"></i>
                </a>
            </div>

            {{-- Inline Quick Stats --}}
            <div class="ab-hero-stats-inline">
                <div class="ab-stat-item">
                    <span class="ab-stat-val">{{ $settings['about_exp_years'] ?? '12+' }}</span>
                    <span class="ab-stat-lbl">{{ $settings['about_exp_label'] ?? 'Years Excellence' }}</span>
                </div>
                <div class="ab-stat-divider"></div>
                <div class="ab-stat-item">
                    <span class="ab-stat-val">{{ $settings['about_stat1_number'] ?? '500+' }}</span>
                    <span class="ab-stat-lbl">{{ $settings['about_stat1_label'] ?? 'Corporate Clients' }}</span>
                </div>
                <div class="ab-stat-divider"></div>
                <div class="ab-stat-item">
                    <span class="ab-stat-val">{{ $settings['about_stat2_number'] ?? '1,200+' }}</span>
                    <span class="ab-stat-lbl">{{ $settings['about_stat2_label'] ?? 'Admissions' }}</span>
                </div>
                <div class="ab-stat-divider"></div>
                <div class="ab-stat-item">
                    <span class="ab-stat-val">{{ $settings['about_stat3_number'] ?? '2,500+' }}</span>
                    <span class="ab-stat-lbl">{{ $settings['about_stat3_label'] ?? 'Placements' }}</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 2. Who We Are & Our Legacy Section (Text & Icon Driven, Minimal Image) --}}
<section class="ab-section ab-story-area" id="about-story" data-aos="fade-up">
    <div class="container">
        <div class="ab-grid-2">
            {{-- Left Side Content --}}
            <div class="ab-story-left">
                <span class="ab-tag-pill"><i class="fa-solid fa-building-columns me-1"></i> Company Overview</span>
                <h2 class="ab-section-heading">
                    {{ $settings['about_story_heading'] ?? 'Who We Are & Our Legacy' }}
                </h2>
                <div class="ab-body-text">
                    <p>
                        {{ $settings['about_story_content_p1'] ?? 'Roy Infinity Edge Consulting was established with a singular vision: to bridge critical gaps in financial management, academic admissions, and professional recruitment under one trusted corporate roof.' }}
                    </p>
                    <p>
                        {{ $settings['about_story_content_p2'] ?? 'With deep industry expertise across taxation compliance, nursing & medical college admissions, and pan-India hospital staffing, we empower businesses, students, and healthcare institutions to excel with confidence.' }}
                    </p>
                </div>
            </div>

            {{-- Right Side Highlights Box --}}
            <div class="ab-story-right">
                <div class="ab-highlight-box">
                    <h3 class="ab-hl-title"><i class="fa-solid fa-award me-2 text-warning"></i> {{ $settings['about_pillar_title'] ?? 'Key Pillars of Success' }}</h3>
                    
                    <ul class="ab-hl-list">
                        <li>
                            <div class="ab-hl-icon"><i class="fa-solid fa-calculator"></i></div>
                            <div>
                                <h4>{{ $settings['about_pillar1_title'] ?? 'Finance & Taxation' }}</h4>
                                <p>{{ $settings['about_pillar1_desc'] ?? 'GST filings, audit compliance, and strategic financial planning for enterprises.' }}</p>
                            </div>
                        </li>
                        <li>
                            <div class="ab-hl-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                            <div>
                                <h4>{{ $settings['about_pillar2_title'] ?? 'Education Consultancy' }}</h4>
                                <p>{{ $settings['about_pillar2_desc'] ?? 'Nursing & Medical admissions with full INC & WBNC accreditation guidance.' }}</p>
                            </div>
                        </li>
                        <li>
                            <div class="ab-hl-icon"><i class="fa-solid fa-user-doctor"></i></div>
                            <div>
                                <h4>{{ $settings['about_pillar3_title'] ?? 'Healthcare Recruitment' }}</h4>
                                <p>{{ $settings['about_pillar3_desc'] ?? 'Doctor & Nursing staff placements across leading hospitals in India.' }}</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 2.5 Founder & Leadership Section --}}
<section class="ab-section ab-founder-area" id="about-founder" data-aos="fade-up">
    <div class="container">
        <div class="ab-founder-container">
            <div class="ab-founder-grid">
                {{-- Left: Founder Executive Portrait Card --}}
                <div class="ab-founder-image-col" data-aos="fade-right">
                    <div class="founder-card-wrapper">
                        <div class="founder-image-box">
                            <img src="{{ \App\Models\SiteSetting::getImageUrl('about_founder_img', 'images/owner.jpeg') }}" alt="{{ $settings['about_founder_name'] ?? 'Founder of Roy Infinity Edge Consulting' }}" class="founder-img">
                            
                            {{-- Top Floating Badge --}}
                            <div class="founder-top-badge">
                                <span class="founder-badge-dot"></span>
                                <span>{{ $settings['about_founder_badge'] ?? 'Founder & Visionary Leader' }}</span>
                            </div>

                            {{-- Bottom Floating Card --}}
                            <div class="founder-bottom-card">
                                <div class="founder-motto">{{ $settings['about_founder_motto'] ?? '“Bigger. Brighter. Beyond.”' }}</div>
                                <div class="founder-submotto">{{ $settings['about_founder_submotto'] ?? 'Roy Infinity Edge Consulting' }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right: Message & Story (Rich Content Perfectly Filling Height) --}}
                <div class="ab-founder-content-col" data-aos="fade-left">
                    <div>
                        <span class="ab-tag-pill"><i class="fa-solid fa-crown me-1 text-warning"></i> {{ $settings['about_founder_tag'] ?? "Founder's Vision & Leadership" }}</span>
                    </div>
                    
                    <h2 class="ab-section-heading mb-2">
                        {{ $settings['about_founder_title'] ?? 'Driven by Vision. Powered by Trust & Innovation.' }}
                    </h2>

                    <p class="ab-founder-lead-quote">
                        {{ $settings['about_founder_lead_quote'] ?? '“Your Edge. Our Insight. Creating boundless opportunities for individuals, ambitious students, and growing enterprises across India.”' }}
                    </p>

                    <p class="ab-founder-body-text">
                        {{ $settings['about_founder_body'] ?? 'Founded on the belief that strategic consulting should never be fragmented or impersonal, Roy Infinity Edge Consulting bridges critical gaps across Finance & Taxation, Academic Admissions, and Healthcare Talent Acquisition. We bring focused expertise and transparent accountability to every single engagement—transforming complex challenges into enduring competitive advantages.' }}
                    </p>

                    {{-- 3 Core Strategic Pillar Cards --}}
                    <div class="founder-pillars-list">
                        <div class="founder-pillar-card">
                            <div class="founder-pillar-icon"><i class="fa-solid fa-chart-line"></i></div>
                            <div class="founder-pillar-text">
                                <h5>{{ $settings['about_founder_p1_title'] ?? 'Strategy & Enterprise Growth' }}</h5>
                                <p>{{ $settings['about_founder_p1_desc'] ?? 'Comprehensive corporate tax planning, audit readiness, and scalable financial frameworks tailored for modern businesses.' }}</p>
                            </div>
                        </div>

                        <div class="founder-pillar-card">
                            <div class="founder-pillar-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                            <div class="founder-pillar-text">
                                <h5>{{ $settings['about_founder_p2_title'] ?? 'Academic Mentorship & Admissions' }}</h5>
                                <p>{{ $settings['about_founder_p2_desc'] ?? 'Direct counseling for Nursing, Medical, and professional degree admissions with accredited INC & WBNC recognized institutions.' }}</p>
                            </div>
                        </div>

                        <div class="founder-pillar-card">
                            <div class="founder-pillar-icon"><i class="fa-solid fa-user-doctor"></i></div>
                            <div class="founder-pillar-text">
                                <h5>{{ $settings['about_founder_p3_title'] ?? 'Pan-India Healthcare Talent Placement' }}</h5>
                                <p>{{ $settings['about_founder_p3_desc'] ?? 'Connecting qualified doctors, nursing specialists, and corporate talent with leading hospitals and enterprise organizations nationwide.' }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Founder Quote Banner --}}
                    <div class="founder-quote-banner">
                        <div class="quote-banner-icon"><i class="fa-solid fa-quote-left"></i></div>
                        <div class="quote-banner-text">
                            <strong>{{ $settings['about_founder_quote_head'] ?? '"Ideas • People • Possibilities"' }}</strong>
                            <span>{{ $settings['about_founder_quote_text'] ?? 'We don’t just offer advisory — we stand beside our clients as long-term growth partners, turning ambitious goals into measurable realities.' }}</span>
                        </div>
                    </div>

                    {{-- Executive Signature & Contact Action --}}
                    <div class="founder-action-strip">
                        <div class="founder-sign-info">
                            <div class="founder-sign-name">{{ $settings['about_founder_name'] ?? 'Founder & Managing Director' }}</div>
                            <div class="founder-sign-title">{{ $settings['about_founder_role'] ?? 'Roy Infinity Edge Consulting' }}</div>
                        </div>
                        <a href="{{ $settings['about_founder_btn_url'] ?? route('contact') }}" class="ab-btn-primary">
                            <span>{{ $settings['about_founder_btn_text'] ?? 'Get in Touch' }}</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 3. Mission, Vision & Institutional Commitment (3 Cards) --}}
<section class="ab-section ab-mv-area" data-aos="fade-up">
    <div class="container">
        <div class="ab-header-center mb-5">
            <span class="ab-tag-pill"><i class="fa-solid fa-bullseye me-1"></i> Strategic Direction</span>
            <h2 class="ab-section-heading center">Mission &amp; Vision</h2>
        </div>

        <div class="ab-grid-3">
            {{-- Mission Card --}}
            <div class="ab-mv-card dark-green-card">
                <div class="ab-mv-icon"><i class="fa-solid fa-bullseye"></i></div>
                <h3>{{ $settings['about_mission_title'] ?? 'Our Mission' }}</h3>
                <p>{{ $settings['about_mission_desc'] ?? 'To deliver ethical, accurate, and seamless consulting services in taxation, academic admissions, and talent acquisition, helping individuals and enterprises navigate complex landscapes with complete peace of mind.' }}</p>
            </div>

            {{-- Vision Card --}}
            <div class="ab-mv-card lime-card">
                <div class="ab-mv-icon dark"><i class="fa-solid fa-eye"></i></div>
                <h3>{{ $settings['about_vision_title'] ?? 'Our Vision' }}</h3>
                <p>{{ $settings['about_vision_desc'] ?? "To become India's most trusted multi-sector consulting ecosystem, celebrated for institutional integrity, healthcare workforce innovation, and financial empowerment." }}</p>
            </div>

            {{-- Institutional Promise Card --}}
            <div class="ab-mv-card white-card">
                <div class="ab-mv-icon green"><i class="fa-solid fa-shield-halved"></i></div>
                <h3>{{ $settings['about_promise_title'] ?? 'Our Institutional Promise' }}</h3>
                <p>{{ $settings['about_promise_desc'] ?? 'We maintain 100% compliance transparency, zero hidden charges, and continuous support for students, job applicants, and corporate clients nationwide.' }}</p>
            </div>
        </div>
    </div>
</section>


{{-- 4. Core Values Section --}}
<section class="ab-section ab-values-area" data-aos="fade-up">
    <div class="container">
        <div class="ab-header-center mb-5">
            <span class="ab-tag-pill"><i class="fa-solid fa-gem me-1"></i> Guiding Principles</span>
            <h2 class="ab-section-heading center">Our Core Values</h2>
        </div>

        <div class="ab-grid-4">
            <div class="ab-val-card">
                <div class="ab-val-icon"><i class="fa-solid fa-handshake-simple"></i></div>
                <h4>{{ $settings['about_value1_title'] ?? 'Uncompromising Integrity' }}</h4>
                <p>{{ $settings['about_value1_desc'] ?? 'Complete transparency and ethical standards in every tax filing, college admission, and hiring process.' }}</p>
            </div>

            <div class="ab-val-card">
                <div class="ab-val-icon"><i class="fa-solid fa-award"></i></div>
                <h4>{{ $settings['about_value2_title'] ?? 'Sectoral Expertise' }}</h4>
                <p>{{ $settings['about_value2_desc'] ?? 'Specialized knowledge in Healthcare recruitment, INC/WBNC compliance, and corporate finance.' }}</p>
            </div>

            <div class="ab-val-card">
                <div class="ab-val-icon"><i class="fa-solid fa-user-gear"></i></div>
                <h4>{{ $settings['about_value3_title'] ?? 'Client-Centric Dedication' }}</h4>
                <p>{{ $settings['about_value3_desc'] ?? 'Tailored strategic guidance designed to address unique business challenges and career goals.' }}</p>
            </div>

            <div class="ab-val-card">
                <div class="ab-val-icon"><i class="fa-solid fa-lightbulb"></i></div>
                <h4>{{ $settings['about_value4_title'] ?? 'Continuous Innovation' }}</h4>
                <p>{{ $settings['about_value4_desc'] ?? 'Leveraging digital employment tools, automated workflows, and modern financial reporting.' }}</p>
            </div>
        </div>
    </div>
</section>

{{-- 5. Queries & CTA Sections --}}
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const counters = document.querySelectorAll('.ab-stat-val');
    
    if (!counters.length) return;

    function animateCounter(el) {
        const rawText = el.getAttribute('data-raw') || el.innerText.trim();
        const matches = rawText.match(/([\d,\.]+)\s*(.*)/);
        if (!matches) return;

        const numStr = matches[1].replace(/,/g, '');
        const suffix = matches[2] || '';
        const target = parseFloat(numStr);
        const hasComma = matches[1].includes(',');
        const isDecimal = numStr.includes('.');

        let start = 0;
        const duration = 3000; // 3.0s duration for smoother, slower count-up
        const startTime = performance.now();


        function updateCount(currentTime) {
            const elapsedTime = currentTime - startTime;
            const progress = Math.min(elapsedTime / duration, 1);
            
            // Easing function (easeOutQuad)
            const easeProgress = 1 - (1 - progress) * (1 - progress);
            const currentVal = start + (target - start) * easeProgress;

            let formattedVal = isDecimal ? currentVal.toFixed(1) : Math.floor(currentVal);
            if (hasComma) {
                formattedVal = formattedVal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
            }

            el.innerHTML = formattedVal + suffix;

            if (progress < 1) {
                requestAnimationFrame(updateCount);
            } else {
                let finalVal = isDecimal ? target.toFixed(1) : target;
                if (hasComma) {
                    finalVal = finalVal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                }
                el.innerHTML = finalVal + suffix;
            }
        }

        requestAnimationFrame(updateCount);
    }

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                obs.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    counters.forEach(counter => {
        counter.setAttribute('data-raw', counter.innerText.trim());
        observer.observe(counter);
    });
});
</script>
@endpush
@endsection

