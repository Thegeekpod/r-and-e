@extends('layouts.app')

@section('title', $settings['placement_hero_heading'] ?? 'Job Placement Services | Roy Infinity Edge Consulting')
@section('main-class', 'placement education')

@section('content')

{{-- Hero Feature Section --}}
<section class="education-feature-section taxation-feature-section bg-light">
    <div class="container">
        <div class="taxation-card" data-aos="zoom-in-up">
            <div class="taxation-card-content">
                <h2>{{ $settings['placement_hero_heading'] ?? 'Connecting talent with the right opportunities.' }}</h2>
                <p>{{ $settings['placement_hero_subheading'] ?? 'Doctor Recruitment, Hospital Staffing, Healthcare Jobs, and Corporate Placement Support.' }}</p>
                <a href="{{ $settings['placement_hero_btn_url'] ?? '#contact' }}" class="btn-learn-more">{{ $settings['placement_hero_btn_text'] ?? 'Get In Touch' }}</a>
            </div>
            <div class="taxation-card-image">
                <img src="{{ \App\Models\SiteSetting::getImageUrl('placement_hero_img_graphics', 'images/man2-graphics.webp') }}" class="animate" alt="" />
                <img src="{{ \App\Models\SiteSetting::getImageUrl('placement_hero_img_person', 'images/man-2.webp') }}" alt="Placement" />
            </div>
        </div>
    </div>
</section>

{{-- About Edge Hire Section --}}
<section class="about-edgehire-section">
    <div class="container">

        {{-- Section Title --}}
        <h2 class="about-edgehire-title" data-aos="fade-up">{{ $settings['placement_about_title'] ?? 'About Edge Hire' }}</h2>

        {{-- Green Banner --}}
        <div class="edgehire-banner" data-aos="fade-up" data-aos-delay="100">
            <p>{{ $settings['placement_about_banner_text'] ?? 'Edge Hire is the Recruitment, Staffing, Workforce Solutions & Healthcare Consultancy Division of Roy Infinity Edge Consulting.' }}</p>
        </div>

        {{-- Main Content Row --}}
        <div class="edgehire-content-row" data-aos="fade-up" data-aos-delay="200">

            {{-- Left: Logo + Text --}}
            <div class="edgehire-left">
                <div class="edgehire-logo-wrap">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('placement_about_logo', 'images/edgehire.webp') }}" alt="Edge Hire Logo" class="edgehire-logo" />
                </div>
                <div class="edgehire-text">
                    <p>{{ $settings['placement_about_p1'] ?? 'We are committed to connecting businesses with skilled professionals while creating meaningful employment opportunities for job seekers, freelancers, consultants, and remote professionals across India.' }}</p>
                    <p>{{ $settings['placement_about_p2'] ?? 'Our expertise extends beyond traditional recruitment. We provide workforce solutions, healthcare consultancy, institutional manpower support, freelance professional networks, and technology-driven employment services designed to meet the evolving needs of employers and professionals.' }}</p>
                    <p>{{ $settings['placement_about_p3'] ?? 'Our vision is to build a unified workforce ecosystem where employers, institutions, hospitals, and professionals can collaborate through one trusted platform.' }}</p>
                </div>
            </div>

            {{-- Right: Network Image --}}
            <div class="edgehire-right">
                <img src="{{ \App\Models\SiteSetting::getImageUrl('placement_about_network_img', 'images/placement-01.webp') }}" alt="Edge Hire Network" class="edgehire-network-img" />
            </div>

        </div>
    </div>
</section>

{{-- View Current Jobs Section --}}
<section class="view-jobs-section" id="current-jobs">
    <div class="container">

        {{-- Section Header --}}
        <h2 class="view-jobs-title" data-aos="fade-up">{{ $settings['placement_jobs_title'] ?? 'View Current jobs' }}</h2>
        <p class="view-jobs-subtitle" data-aos="fade-up" data-aos-delay="80">{{ $settings['placement_jobs_subtitle'] ?? 'Because every rupee saved is a step toward growth.' }}</p>

        {{-- Search Bar Form --}}
        <form action="{{ route('placement') }}#current-jobs" method="GET" class="jobs-search-bar" data-aos="fade-up" data-aos-delay="160">
            {{-- Job Title / Keyword Field --}}
            <div class="jobs-search-field">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="keyword" placeholder="Nurse, Doctor, Accounts..." value="{{ request('keyword') }}" />
            </div>
            <div class="jobs-search-divider"></div>
            {{-- Location Field --}}
            <div class="jobs-search-field">
                <i class="fa-solid fa-location-dot"></i>
                <input type="text" name="location" placeholder="Durgapur, Kolkata..." value="{{ request('location') }}" />
            </div>
            <div class="jobs-search-divider"></div>
            {{-- Category Field --}}
            <div class="jobs-search-field">
                <i class="fa-solid fa-layer-group"></i>
                <select name="category">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>
            <div class="jobs-search-divider"></div>
            {{-- Job Type Field --}}
            <div class="jobs-search-field">
                <i class="fa-regular fa-clock"></i>
                <select name="type">
                    <option value="">All Types</option>
                    <option value="Full-time" {{ request('type') === 'Full-time' ? 'selected' : '' }}>Full-time</option>
                    <option value="Part-time" {{ request('type') === 'Part-time' ? 'selected' : '' }}>Part-time</option>
                    <option value="Contract" {{ request('type') === 'Contract' ? 'selected' : '' }}>Contract</option>
                    <option value="Freelance" {{ request('type') === 'Freelance' ? 'selected' : '' }}>Freelance</option>
                </select>
            </div>
            <button type="submit" class="jobs-search-btn" id="jobs-search-btn">Search jobs</button>
        </form>



        {{-- Jobs Grid --}}
        <div class="jobs-grid" data-aos="fade-up" data-aos-delay="200">
            @forelse($jobs as $job)
            <div class="job-card">
                <div class="job-card-top">
                    <h3 class="job-card-title">{{ $job->title }}</h3>
                    <span class="job-card-type">{{ $job->type }}</span>
                </div>
                @if(!empty($job->company_name))
                    <p class="job-card-company">{{ $job->company_name }}</p>
                @endif
                <div class="job-card-meta">
                    <span><i class="fa-solid fa-location-dot" style="color:#e53935;"></i> {{ $job->location }}</span>
                    @if($job->salary_range)
                        <span><i class="fa-solid fa-indian-rupee-sign" style="color:#2e7d32;"></i> {{ $job->salary_range }}</span>
                    @endif
                </div>
                <p class="job-card-desc">
                    {{ Str::limit($job->description, 130) }}
                </p>
                <a href="{{ route('jobs.show', $job->slug) }}" class="job-card-btn">View Details & Apply</a>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fa-solid fa-briefcase fa-3x text-muted mb-3 d-block"></i>
                <h4 class="fw-bold text-dark">No Vacancies Found</h4>
                <p class="text-muted">Try adjusting your keyword or location search criteria.</p>
            </div>
            @endforelse
        </div>

        {{-- View More Jobs Button --}}
        <div class="jobs-view-more-wrap" data-aos="fade-up">
            <a href="{{ route('jobs.index') }}" class="jobs-view-more-btn">View More Jobs <i class="fa-solid fa-arrow-right"></i></a>
        </div>



    </div>
</section>

{{-- Our Business Model section --}}
<section class="placement why-trust-us-section" data-aos="fade-up">
    <div class="container">
        <h2 class="why-trust-title">{{ $settings['placement_biz_title'] ?? 'Our Business Model' }}</h2>
        <p>{{ $settings['placement_biz_subtitle'] ?? 'Edge Hire operates as an integrated workforce solutions platform that supports businesses at every stage of talent acquisition and workforce management.' }}</p>
        <div class="why-trust-grid">
            @foreach(array_filter(array_map('trim', explode('|', $settings['placement_biz_items'] ?? 'Permanent Recruitment|Executive Search|Hospital Consultancy|Finance & Accounts Freelancer Network|Contract & Temporary Staffing|Healthcare Workforce Solutions|Academic Manpower Solutions|Remote & Home-Based Employment'))) as $trustItem)
            <div class="trust-pill-item">
                <span class="trust-check-icon"><img src="/images/check.svg" width="49" height="49" alt="check"></span>
                <span class="trust-pill-text">{{ $trustItem }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Our Business Verticals section --}}
<section class="placement-verticals-section" data-aos="fade-up">
    <div class="container">
        <h2 class="verticals-main-title">{{ $settings['placement_verticals_title'] ?? 'Our Business Verticals' }}</h2>

        {{-- Block 1 --}}
        <div class="vertical-block vertical-block-1">
            <div class="vertical-block-grid">
                <div class="vertical-img-col">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('placement_v1_img', 'images/placement-02.webp') }}" alt="{{ $settings['placement_v1_title'] ?? 'Recruitment & Talent Acquisition' }}" class="vertical-img" />
                </div>
                <div class="vertical-content-col">
                    <h3 class="vertical-item-title">{{ $settings['placement_v1_title'] ?? 'Recruitment & Talent Acquisition' }}</h3>
                    <p class="vertical-item-desc">{{ $settings['placement_v1_desc'] ?? 'We provide end-to-end recruitment solutions across multiple industries, helping organisations identify, evaluate, and recruit qualified professionals for permanent, contractual, temporary, project-based, and executive positions.' }}</p>
                    <h4 class="vertical-sub-title">{{ $settings['placement_v1_sub_title'] ?? 'Our Recruitment Services' }}</h4>
                    <div class="green-services-box">
                        <ul>
                            @foreach(array_filter(array_map('trim', explode('|', $settings['placement_v1_services'] ?? 'Permanent Recruitment|Contract Staffing|Temporary Staffing|Payroll Staffing|Executive Search|Campus Recruitment|Bulk Hiring|Project-Based Hiring Recruitment|Process Outsourcing (RPO)|HR Outsourcing|Workforce Planning'))) as $srv)
                                <li>{{ $srv }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="vertical-full-btn">
                <span>{{ $settings['placement_v1_btn_text'] ?? 'Industries We Serve' }}</span>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
        </div>

        {{-- Block 2 --}}
        <div class="vertical-block vertical-block-2">
            <div class="vertical-block-grid reverse-grid">
                <div class="vertical-content-col">
                    <h3 class="vertical-item-title">{{ $settings['placement_v2_title'] ?? 'Healthcare Workforce Solutions & Hospital Consultancy' }}</h3>
                    <p class="vertical-item-desc">{{ $settings['placement_v2_desc1'] ?? "Healthcare is one of Edge Hire's strongest areas of expertise." }}</p>
                    <p class="vertical-item-desc">{{ $settings['placement_v2_desc2'] ?? 'We support hospitals, nursing colleges, medical colleges, clinics, diagnostic centres, rehabilitation centres, and healthcare organisations with recruitment, manpower planning, and consultancy services.' }}</p>
                    <div class="vertical-full-btn inline-btn">
                        <span>{{ $settings['placement_v2_btn_text'] ?? 'Healthcare Recruitment' }}</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                </div>
                <div class="vertical-img-col">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('placement_v2_img', 'images/placement-03.webp') }}" alt="{{ $settings['placement_v2_title'] ?? 'Healthcare Workforce Solutions & Hospital Consultancy' }}" class="vertical-img" />
                </div>
            </div>
        </div>

        {{-- Block 3 --}}
        <div class="vertical-block vertical-block-3">
            <div class="vertical-block-grid">
                <div class="vertical-img-col">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('placement_v3_img', 'images/placement-04.webp') }}" alt="{{ $settings['placement_v3_title'] ?? 'Academic & Institutional Workforce Solutions' }}" class="vertical-img" />
                </div>
                <div class="vertical-content-col">
                    <h3 class="vertical-item-title">{{ $settings['placement_v3_title'] ?? 'Academic & Institutional Workforce Solutions' }}</h3>
                    <p class="vertical-item-desc">{{ $settings['placement_v3_desc'] ?? 'Through our extensive academic network, we provide workforce solutions for Nursing Colleges, Medical Colleges, Universities, Healthcare Institutions, and Educational Organisations.' }}</p>
                    <div class="vertical-full-btn inline-btn">
                        <span>{{ $settings['placement_v3_btn_text'] ?? 'Services' }}</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- Future Initiatives Section --}}
<section class="future-initiatives-section" data-aos="fade-up" style="background-image: url('{{ \App\Models\SiteSetting::getImageUrl('placement_future_bg_img', 'images/placement-05.webp') }}');">
    <div class="container">
        <div class="future-initiatives-content">
            <h2 class="future-main-title">{{ $settings['placement_future_title'] ?? 'Future Initiatives' }}</h2>
            <h3 class="future-sub-title">{{ $settings['placement_future_subtitle'] ?? "To strengthen India's workforce ecosystem, Edge Hire is expanding into:" }}</h3>
            <ul class="future-list">
                @foreach(array_filter(array_map('trim', explode('|', $settings['placement_future_items'] ?? 'Digital Job Portal|Healthcare Workforce Exchange|Finance Freelancer Marketplace|Remote Work Network|Employer Subscription Platform|Skill Verification Services|Professional Background Verification|Interview Preparation & Employability Programmes|Integration with Siksha Pathik Academy|Integration with Vriddhi Edge Finance Network'))) as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

<!-- Why Partner with Edge Hire Section -->
<div class="why-trust-us-section" data-aos="fade-up">
    <div class="container">
        <h2 class="why-trust-title">{{ $settings['placement_partner_title'] ?? 'Why Partner with Edge Hire?' }}</h2>
        <div class="why-trust-grid">
            @foreach(array_filter(array_map('trim', explode('|', $settings['placement_partner_items'] ?? 'Pan-India Recruitment Network|Dedicated Healthcare & Education|Multi-Industry Recruitment Solutions|Hospital & Medical College Consultancy|Faculty & Academic Workforce Support|Finance & Accounts Freelancer Network|Remote & Home-Based Employment|Digital Employment Platform (Coming Soon)|Experienced Professional Network|One Trusted Workforce Solutions Partner'))) as $trustItem)
            <div class="trust-pill-item">
                <span class="trust-check-icon"><img src="/images/check.svg" width="49" height="49" alt="check"></span>
                <span class="trust-pill-text">{{ $trustItem }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Our Vision Section -->
<section class="placement-vision-section" data-aos="fade-up" style="background-image: url('{{ \App\Models\SiteSetting::getImageUrl('placement_vision_bg_img', 'images/placement-06.webp') }}');">
    <div class="container">
        <div class="placement-vision-content">
            <h2 class="placement-vision-title">{{ $settings['placement_vision_title'] ?? 'Our Vision' }}</h2>
            <p class="placement-vision-desc">
                {{ $settings['placement_vision_desc'] ?? "To become India's most trusted workforce solutions platform by connecting employers, institutions, hospitals, freelancers, and professionals through recruitment, staffing, healthcare consultancy, digital employment, and technology-driven talent solutions." }}
            </p>
            <a href="{{ $settings['placement_vision_btn_url'] ?? '#' }}" class="placement-vision-btn">{{ $settings['placement_vision_btn_text'] ?? 'See more' }}</a>
        </div>
    </div>
</section>

<!-- Our Brand Promise Section -->
<section class="brand-promise-section" data-aos="fade-up">
    <div class="container">
        <div class="brand-promise-card">
            <div class="promise-left">
                <h2>{!! nl2br(e($settings['placement_promise_title'] ?? "Our Brand\nPromise")) !!}</h2>
            </div>
            <div class="promise-divider"></div>
            <div class="promise-right">
                <p>{{ $settings['placement_promise_quote'] ?? '"Empowering Talent. Enabling Businesses. Strengthening Institutions. Transforming India\'s Workforce."' }}</p>
            </div>
        </div>
    </div>
</section>

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
@endsection
