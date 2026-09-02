@extends('layouts.app')

@section('title', 'About Us | Roy Infinity Edge Consulting')
@section('main-class', 'education about-clean-page')

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

