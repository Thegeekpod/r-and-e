@extends('layouts.app')

@section('title', $settings['site_title'] ?? 'Roy Infinity Edge Consulting | Finance, Education, Placement')

@section('content')
<section id="hero" class="hero-section">
    <div class="container hero-container">
        <div class="hero-content">
            <h1 class="hero-title" data-aos="fade-right">
                <span class="text-black">{{ $settings['hero_title_line1'] ?? 'One Partner.' }}</span><br />
                <span class="text-green">{{ $settings['hero_title_line2'] ?? 'Infinite Solutions.' }}</span>
            </h1>
            <p class="hero-subtitle" data-aos="fade-right" data-aos-delay="200">
                {{ $settings['hero_subtitle'] ?? 'Expert Consulting in Finance, Education & Placement' }}
            </p>

            <div class="hero-actions-wrapper" data-aos="fade-right" data-aos-delay="400">
                <div class="hero-actions">
                    <a href="{{ $settings['hero_btn1_url'] ?? '#services' }}" class="btn btn-primary">{{ $settings['hero_btn1_text'] ?? 'Explore Services' }}</a>
                    <a href="{{ $settings['hero_btn2_url'] ?? '#consultation' }}" class="btn btn-secondary">{{ $settings['hero_btn2_text'] ?? 'Book Consultation' }}</a>
                </div>
                <img src="{{ \App\Models\SiteSetting::getImageUrl('hero_arrow_img', 'images/arrow.png') }}" alt="pointing arrow" class="hero-arrow" />
            </div>

            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-label">{{ $settings['hero_stat1_label'] ?? 'Downloads' }}</span>
                    <span class="stat-value">{{ $settings['hero_stat1_value'] ?? '432K+' }}</span>
                </div>
                <div class="stat-item">
                    <span class="stat-label">{{ $settings['hero_stat2_label'] ?? 'User' }}</span>
                    <span class="stat-value">{{ $settings['hero_stat2_value'] ?? '200K+' }}</span>
                </div>
                <div class="stat-item">
                    <span class="stat-label">{{ $settings['hero_stat3_label'] ?? 'Community' }}</span>
                    <span class="stat-value">{{ $settings['hero_stat3_value'] ?? '20K+' }}</span>
                </div>
            </div>
        </div>

        <div class="hero-visuals">
            <img src="{{ \App\Models\SiteSetting::getImageUrl('hero_growth_arrow_img', 'images/angle-arrow.webp') }}" alt="growth arrow" class="circle-arrow-img" data-aos="zoom-in"
                data-aos-delay="600" />

            <div class="visual-card stats-card" data-aos="fade-up" data-aos-delay="800">
                <h2>{{ $settings['hero_trust_count'] ?? '230+' }}</h2>
                <p>
                    {{ $settings['hero_trust_text'] ?? 'some big companies that we work with, and trust us very much' }}
                </p>
                <div class="progress-bar">
                    <div class="progress-fill"></div>
                </div>
            </div>

            <div class="visual-card analysis-card" data-aos="fade-up" data-aos-delay="1000">
                <img src="{{ \App\Models\SiteSetting::getImageUrl('hero_banner2_img', 'images/banner-2.webp') }}" alt="" />
            </div>
        </div>
    </div>
</section>

<section class="bottom-banner">
    <div class="container">
        <p>
            {{ $settings['bottom_banner_text'] ?? 'Finance & Taxation | Education Consultancy | Job Placement services' }}
        </p>
    </div>
</section>

<section class="about-services-section" id="services">
    <div class="container">
        <div class="section-header">
            <h2>
                {{ $settings['about_heading_prefix'] ?? 'About Roy' }} <span class="text-green">{{ $settings['about_heading_highlight'] ?? 'Infinity Edge' }}</span> {{ $settings['about_heading_suffix'] ?? 'Consulting' }}
            </h2>
            <p>
                {{ $settings['about_subtitle'] ?? 'Your Trusted Partner in Finance, Education, and Recruitment Solutions.' }}
            </p>
        </div>

        <div class="services-cards">
            <!-- Card 1: Finance -->
            <article class="service-card finance-card" data-aos="fade-up" data-aos-delay="0">
                <div class="card-image">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('service1_img', 'images/finance.webp') }}" alt="{{ $settings['service1_title'] ?? 'Finance & Taxation' }}" />
                </div>
                <div class="card-content">
                    <h3>{{ $settings['service1_title'] ?? 'Finance & Taxation' }}</h3>
                    <ul>
                        @php
                            $service1_points = explode("\n", $settings['service1_points'] ?? "Taxation & Compliance\nBusiness Advisory\nGST & Accounting\nExplore Finance Services");
                        @endphp
                        @foreach($service1_points as $point)
                            @if(trim($point))
                                <li>{{ trim($point) }}</li>
                            @endif
                        @endforeach
                    </ul>
                    <a href="{{ $settings['service1_btn_url'] ?? route('finance') }}" class="btn btn-card-gold">{{ $settings['service1_btn_text'] ?? 'Explore Finance Services' }}</a>
                </div>
            </article>

            <!-- Card 2: Education -->
            <article class="service-card education-card" data-aos="fade-up" data-aos-delay="200">
                <div class="card-image">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('service2_img', 'images/eduction.webp') }}" alt="{{ $settings['service2_title'] ?? 'Education Consultancy' }}" />
                </div>
                <div class="card-content">
                    <h3>{{ $settings['service2_title'] ?? 'Education Consultancy' }}</h3>
                    <ul>
                        @php
                            $service2_points = explode("\n", $settings['service2_points'] ?? "College Admissions\nNursing & Medical Courses\nINC & WBNC Assistance\nExplore Education Services");
                        @endphp
                        @foreach($service2_points as $point)
                            @if(trim($point))
                                <li>{{ trim($point) }}</li>
                            @endif
                        @endforeach
                    </ul>
                    <a href="{{ $settings['service2_btn_url'] ?? route('education') }}" class="btn btn-card-green">{{ $settings['service2_btn_text'] ?? 'Explore Education Services' }}</a>
                </div>
            </article>

            <!-- Card 3: Placement -->
            <article class="service-card placement-card" data-aos="fade-up" data-aos-delay="400">
                <div class="card-image">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('service3_img', 'images/job.webp') }}" alt="{{ $settings['service3_title'] ?? 'Job Placement Services' }}" />
                </div>
                <div class="card-content">
                    <h3>{{ $settings['service3_title'] ?? 'Job Placement Services' }}</h3>
                    <ul>
                        @php
                            $service3_points = explode("\n", $settings['service3_points'] ?? "Doctor Recruitment\nHospital Staffing\nHealthcare Jobs\nExplore Placement Portal");
                        @endphp
                        @foreach($service3_points as $point)
                            @if(trim($point))
                                <li>{{ trim($point) }}</li>
                            @endif
                        @endforeach
                    </ul>
                    <a href="{{ $settings['service3_btn_url'] ?? '#' }}" class="btn btn-card-gold">{{ $settings['service3_btn_text'] ?? 'Explore Placement Services' }}</a>
                </div>
            </article>
        </div>
    </div>
</section>

<section class="taxation-feature-section">
    <div class="container">
        <div class="taxation-header">
            <h2>
                {{ $settings['feat_tax_title_line1'] ?? 'Turning financial complexity' }}<br />{{ $settings['feat_tax_title_line2'] ?? 'into' }}
                <span class="text-green">{{ $settings['feat_tax_title_highlight'] ?? 'confident success.' }}</span>
            </h2>
            <p>{{ $settings['feat_tax_subtitle'] ?? 'Because every rupee saved is a step toward growth.' }}</p>
        </div>

        <div class="taxation-card" data-aos="zoom-in-up">
            <div class="taxation-card-content" data-aos="fade-right" data-aos-delay="300"
                data-aos-anchor-placement="center-bottom">
                <h2>{{ $settings['feat_tax_card_title'] ?? 'Where smart taxation meets smarter business growth.' }}</h2>
                <p>{{ $settings['feat_tax_card_desc'] ?? "We don't just manage taxes — we maximize your potential." }}</p>
                <a href="{{ $settings['feat_tax_btn_url'] ?? route('finance') }}" class="btn-learn-more">{{ $settings['feat_tax_btn_text'] ?? 'Learn More' }}</a>
            </div>
            <div class="taxation-card-image">
                <img src="{{ \App\Models\SiteSetting::getImageUrl('feat_tax_img_graphics', 'images/man-1-graphics.webp') }}" class="animate" alt="Smart Taxation" />
                <img src="{{ \App\Models\SiteSetting::getImageUrl('feat_tax_img_person', 'images/man-1.webp') }}" alt="Smart Taxation" />
            </div>
        </div>
    </div>
</section>

<section class="queries-final-section">
    <div class="container queries-flex">
        <div class="queries-left">
            <h2>
                {{ $settings['queries_title_line1'] ?? 'If You Have any Queries' }}
                <span class="text-green">{{ $settings['queries_title_highlight'] ?? 'Feel Free To Ask !' }}</span>
            </h2>
        </div>
        <div class="queries-right">
            <div class="ask-card">
                <h3>{{ $settings['queries_card_title'] ?? 'Ask Question' }}</h3>
                <p>{{ $settings['queries_card_subtitle'] ?? 'If you have Any Queries Feel Free To ask !' }}</p>
                <div class="input-wrapper">
                    <input type="text" placeholder="{{ $settings['queries_placeholder'] ?? 'Type............' }}" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="education-feature-section">
    <div class="container">
        <div class="education-header">
            <h2>{{ $settings['feat_edu_title_line1'] ?? 'Guiding you to the right' }}<br />{{ $settings['feat_edu_title_line2'] ?? 'college, the right way.' }}</h2>
            <p>{{ $settings['feat_edu_subtitle'] ?? 'Expert guidance for the right college choice.' }}</p>
        </div>

        <div class="edu-feature-card" data-aos="zoom-in-up">
            <div class="edu-feature-card-image">
                <img src="{{ \App\Models\SiteSetting::getImageUrl('feat_edu_img_graphics', 'images/woment-graphics.webp') }}" class="animate" alt="Choose the right college" />
                <img src="{{ \App\Models\SiteSetting::getImageUrl('feat_edu_img_person', 'images/woment.webp') }}" alt="Choose the right college" />
            </div>
            <div class="edu-feature-card-content" data-aos="fade-left" data-aos-delay="300"
                data-aos-anchor-placement="center-bottom">
                <h2>{{ $settings['feat_edu_card_title'] ?? 'Choose the right college with us.' }}</h2>
                <p>{{ $settings['feat_edu_card_desc'] ?? 'Choose smart. Choose the right college.' }}</p>
                <a href="{{ $settings['feat_edu_btn_url'] ?? route('education') }}" class="btn-learn-more btn-dark-outline">{{ $settings['feat_edu_btn_text'] ?? 'Learn More' }}</a>
            </div>

            <div class="brochure-card" data-aos="flip-right" data-aos-delay="800">
                <p>{!! nl2br(e($settings['feat_edu_brochure_text'] ?? "To Know More\nDownload\nOur Brochure")) !!}</p>
                <img src="{{ \App\Models\SiteSetting::getImageUrl('feat_edu_brochure_qr', 'images/qr-code.png') }}" alt="QR Code" />
            </div>
        </div>
    </div>
</section>

<section class="taxation-feature-section">
    <div class="container">
        <div class="taxation-header">
            <h2>
                {{ $settings['feat_place_title_line1'] ?? 'Strategic placements for' }}<br />
                <span class="text-green">{{ $settings['feat_place_title_highlight'] ?? 'ambitious professionals.' }}</span>
            </h2>
            <p>{{ $settings['feat_place_subtitle'] ?? 'Because every rupee saved is a step toward growth.' }}</p>
        </div>

        <div class="taxation-card">
            <div class="taxation-card-content">
                <h2>{{ $settings['feat_place_card_title'] ?? 'Connecting talent with the right opportunities.' }}</h2>
                <p>{{ $settings['feat_place_card_desc'] ?? 'Your career starts with the right placement.' }}</p>
                <a href="{{ $settings['feat_place_btn_url'] ?? '#' }}" class="btn-learn-more">{{ $settings['feat_place_btn_text'] ?? 'Learn More' }}</a>
            </div>
            <div class="taxation-card-image">
                <img src="{{ \App\Models\SiteSetting::getImageUrl('feat_place_img_graphics', 'images/man2-graphics.webp') }}" class="animate" alt="" />
                <img src="{{ \App\Models\SiteSetting::getImageUrl('feat_place_img_person', 'images/man-2.webp') }}" alt="Smart Taxation" />
            </div>
        </div>
    </div>
</section>

<section class="cta-banner-section">
    <div class="container">
        <div class="cta-card">
            <h2 class="cta-title">{{ $settings['cta_title'] ?? 'Ready to Contact with us ?' }}</h2>
            <a href="{{ $settings['cta_btn_url'] ?? '#contact' }}" class="btn-get-started">{{ $settings['cta_btn_text'] ?? 'Get Started' }} <span class="arrow">→</span></a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section">
    <div class="container">
        <div class="section-header">
            <h2>{{ $settings['testimonials_heading_prefix'] ?? 'Testimonials By' }} <span class="text-green">{{ $settings['testimonials_heading_highlight'] ?? 'Our Clients' }}</span></h2>
            <p>
                {{ $settings['testimonials_subtitle'] ?? "Begin planning your child's career at the right time with internationally recognised career psychologists" }}
            </p>
        </div>

        <div class="testimonials-grid">
            @foreach($testimonials as $index => $testimonial)
                <div class="testimonial-card {{ $testimonial->theme == 'lime' ? 'lime-card' : 'dark-card' }}" data-aos="{{ $index % 2 == 0 ? 'fade-right' : 'fade-left' }}" data-aos-delay="{{ $index * 200 }}">
                    <div class="testimonial-avatar">
                        <img src="{{ $testimonial->avatar_url }}" alt="{{ $testimonial->name }}" />
                    </div>
                    <div class="testimonial-stars" data-aos="fade-left" data-aos-delay="200">
                        @for($i=0; $i<$testimonial->rating; $i++) ★ @endfor
                    </div>
                    <p class="testimonial-text">
                        {{ $testimonial->review }}
                    </p>
                    <a href="#" class="read-more">Read More</a>
                    <div class="testimonial-footer">
                        <div class="user-info">
                            <h4>{{ $testimonial->name }}</h4>
                            <span>{{ $testimonial->role ?? 'Client' }}</span>
                        </div>
                        <div class="testimonial-badge">Testimonial</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Clients Section -->
<section class="clients-section">
    <div class="container">
        <div class="clients-header">
            <h2>{{ $settings['clients_heading'] ?? 'Our Valuable Clients' }}</h2>
            <p>{{ $settings['clients_subtitle'] ?? 'Supported By' }}</p>
        </div>
    </div>
    
    <div class="clients-marquee-wrapper">
        <div class="clients-marquee-track">
            {{-- Loop twice to create a seamless infinite scrolling loop --}}
            @for ($i = 0; $i < 2; $i++)
                @foreach($clients as $client)
                    <div class="client-logo-item" title="{{ $client->name }}">
                        @if($client->logo)
                            <img src="{{ $client->logo_url }}" alt="{{ $client->name }}">
                        @else
                            <span class="client-logo-text">{{ $client->name }}</span>
                        @endif
                    </div>
                @endforeach
            @endfor
        </div>
    </div>
</section>
@endsection
