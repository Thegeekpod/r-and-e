@extends('layouts.app')

@section('title', 'Education Consultancy | Roy Infinity Edge Consulting')
@section('main-class', 'education')

@section('content')
<section class="education-feature-section bg-light">
    <div class="container">
        <div class="edu-feature-card" data-aos="zoom-in-up">
            <div class="edu-feature-card-image">
                <img src="{{ \App\Models\SiteSetting::getImageUrl('edu_hero_img_graphics', 'images/woment-graphics.webp') }}" class="animate" alt="{{ $settings['edu_hero_heading'] ?? 'Choose the right college' }}" />
                <img src="{{ \App\Models\SiteSetting::getImageUrl('edu_hero_img_person', 'images/woment.webp') }}" alt="{{ $settings['edu_hero_heading'] ?? 'Choose the right college' }}" />
            </div>
            <div class="edu-feature-card-content" data-aos="fade-left" data-aos-delay="300"
                data-aos-anchor-placement="center-bottom">
                <h2>{{ $settings['edu_hero_heading'] ?? 'Choose the right college with us.' }}</h2>
                <p>{{ $settings['edu_hero_subtitle'] ?? 'Choose smart. Choose the right college.' }}</p>
                <a href="{{ $settings['edu_hero_btn_url'] ?? '#business-model' }}" class="btn-learn-more btn-dark-outline">{{ $settings['edu_hero_btn_text'] ?? 'Learn More' }}</a>
            </div>

            <div class="brochure-card" data-aos="flip-right" data-aos-delay="800">
                <p>{{ $settings['edu_hero_brochure_text'] ?? 'To Know More Download Our Brochure' }}</p>
                <img src="{{ \App\Models\SiteSetting::getImageUrl('edu_hero_qr_img', 'images/qr-code.png') }}" alt="QR Code" />
            </div>
        </div>
    </div>
</section>

<!-- Business Model Section -->
<section class="business-model-section" id="business-model">
    <!-- Full Width Top Category Bar -->
    <div class="biz-category-bar-full" data-aos="fade-down">
        <div class="container">
            @php
                $catItems = explode('|', $settings['edu_biz_category_items'] ?? 'Nursing|Pharmacy|Management|Medical');
            @endphp
            @foreach($catItems as $i => $cat)
                <span class="cat-item">{{ trim($cat) }}</span>
                @if($i < count($catItems) - 1)
                    <span class="divider">|</span>
                @endif
            @endforeach
        </div>
    </div>

    <div class="container">
        <!-- Section Header -->
        <div class="biz-header" data-aos="fade-up">
            <h2>{{ $settings['edu_biz_section_title'] ?? 'Our Business Model' }}</h2>
            <p>{{ $settings['edu_biz_section_subtitle'] ?? 'Because every rupee saved is a step toward growth.' }}</p>
        </div>

        <!-- Tree Diagram Container -->
        <div class="biz-diagram-container" data-aos="zoom-in" data-aos-delay="200">

            <!-- Top Node: Siksha Pathik Logo Card -->
            <div class="biz-main-node">
                <img src="{{ \App\Models\SiteSetting::getImageUrl('edu_siksha_logo', 'images/sikshapathik.webp') }}"
                    alt="Siksha Pathik - An initiative by Roy Infinity Edge Consulting"
                    class="siksha-logo-img" />
            </div>

            <!-- SVG Tree Connector Top (Desktop): Exact SVGs provided by user -->
            <div class="biz-connector-top-desktop">
                <div class="connector-svg-wrapper">
                    <!-- Left connector SVG -->
                    <svg width="483" height="143" viewBox="0 0 483 143" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M479 0V43.3071C479 70.0286 463.339 82.56 443.557 84.7714C423.775 86.9829 172.653 85.6929 49.5641 84.7714C36.3761 84.7714 10 93.6171 10 129"
                            stroke="#11473E" stroke-width="8" />
                        <circle cx="9.5" cy="133.5" r="9.5" fill="#13433B" />
                    </svg>

                    <!-- Middle connector SVG -->
                    <svg width="19" height="174" viewBox="0 0 19 174" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="9.5" cy="164" r="9.5" fill="#15433B" />
                        <path d="M10 0V164.5" stroke="#14433B" stroke-width="8" />
                    </svg>

                    <svg width="496" height="138" viewBox="0 0 496 138" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4 0V43.3071C4 70.0286 20.1283 82.56 40.5009 84.7714C60.8735 86.9829 319.492 85.6929 446.255 84.7714C459.837 84.7714 487 93.6171 487 129"
                            stroke="#13443C" stroke-width="8" />
                        <circle cx="486.5" cy="128.5" r="9.5" fill="#14423B" />
                    </svg>

                </div>
            </div>

            <!-- Middle 3 Cards Row -->
            <div class="biz-sub-cards-row">
                <!-- Card 1: For Students -->
                <div class="biz-sub-card-col" id="student-sub-card" style="cursor: pointer;">
                    <div class="biz-sub-card">
                        <div class="biz-card-head">
                            <svg width="66" height="66" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<rect y="23.4667" width="48.225" height="48.225" transform="rotate(-29.1179 0 23.4667)" fill="url(#pattern0_3840_625)"/>
<defs>
<pattern id="pattern0_3840_625" patternContentUnits="objectBoundingBox" width="1" height="1">
<use xlink:href="#image0_3840_625" transform="scale(0.0078125)"/>
</pattern>
<image id="image0_3840_625" width="128" height="128" preserveAspectRatio="none" xlink:href="data:image/png;base64,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"/>
</defs>
</svg>


                            <h3>{{ $settings['edu_student_card_title'] ?? 'For Students' }}</h3>
                        </div>
                        <span class="biz-click-text">Click Here</span>
                    </div>
                    <span class="biz-sub-caption">Click Here To Know More</span>
                </div>

                <!-- Card 2: For Institutions -->
                <div class="biz-sub-card-col" id="institution-sub-card" style="cursor: pointer;">
                    <div class="biz-sub-card">
                        <div class="biz-card-head">
                           <svg width="66" height="66" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<rect y="23.4667" width="48.225" height="48.225" transform="rotate(-29.1179 0 23.4667)" fill="url(#pattern0_3840_626)"/>
<defs>
<pattern id="pattern0_3840_626" patternContentUnits="objectBoundingBox" width="1" height="1">
<use xlink:href="#image0_3840_626" transform="scale(0.0078125)"/>
</pattern>
<image id="image0_3840_626" width="128" height="128" preserveAspectRatio="none" xlink:href="data:image/png;base64,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"/>
</defs>
</svg>


                            <h3>{{ $settings['edu_inst_card_title'] ?? 'For Institutions' }}</h3>
                        </div>
                        <span class="biz-click-text">Click Here</span>
                    </div>
                    <span class="biz-sub-caption">Click Here To Know More</span>
                </div>

                <!-- Card 3: Sikha pratik App -->
                <div class="biz-sub-card-col">
                    <div class="biz-sub-card biz-card-app">
                        <h3>{{ $settings['edu_app_card_title'] ?? 'Sikha pratik App' }}</h3>
                    </div>
                    <span class="biz-sub-caption">{{ $settings['edu_app_card_caption'] ?? 'Coming Soon' }}</span>
                </div>
            </div>

            <!-- SVG Tree Connector Bottom (Desktop): Exact SVGs provided by user -->
            <div class="biz-connector-bottom-desktop">
                <div class="connector-bottom-svg-wrapper">
                    <!-- For Student SVG -->
                    <svg width="19" height="140" viewBox="0 0 19 140" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="conn-bottom-student">
                        <circle cx="9.5" cy="9.5" r="9.5" fill="#15433B" />
                        <circle cx="9.5" cy="130.5" r="9.5" fill="#15433B" />
                        <path d="M9.21191 6.00378L9.60283 68.5019L9.99375 131" stroke="#14433B"
                            stroke-width="8" />
                    </svg>

                    <!-- For Institution SVG -->
                    <svg width="355" height="150" viewBox="0 0 355 150" fill="none"
                        xmlns="http://www.w3.org/2000/svg" class="conn-bottom-institution">
                        <path
                            d="M346 141V99.0357C346 73.1429 334.78 61 320.608 58.8571C306.436 56.7143 126.527 57.9643 38.3445 58.8571C28.8963 58.8571 10 50.2857 10 16"
                            stroke="#13443C" stroke-width="8" />
                        <circle cx="345.5" cy="140.5" r="9.5" fill="#14423B" />
                        <circle cx="9.5" cy="9.5" r="9.5" fill="#15433B" />
                    </svg>
                </div>
            </div>

            <!-- Bottom Level: 2 Detail Cards -->
            <div class="biz-detail-cards-row">
                <!-- Left Detail Card -->
                <div class="biz-detail-card student-trigger-card selected" id="student-card-trigger"
                    data-aos="fade-right" style="cursor: pointer;">
                    <div class="biz-detail-header">
                        <i class="fa-solid fa-magnifying-glass search-icon"></i>
                        <h4>{{ $settings['edu_student_cover_title'] ?? 'What You Will Cover' }}</h4>
                    </div>
                    <ul class="biz-detail-list">
                        @foreach(array_filter(array_map('trim', explode("\n", $settings['edu_student_cover_items'] ?? "Career Counselling\nCourse Selection\nAdmission Guidance\nDocumentation/Loan Assistance\nRegistration Guidance\nPost-Passout Guidance\nPlacement via Edge Hire"))) as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>

                <!-- Right Detail Card -->
                <div class="biz-detail-card institution-trigger-card" id="institution-card-trigger" data-aos="fade-left" style="cursor: pointer;">
                    <div class="biz-detail-header">
                        <i class="fa-solid fa-magnifying-glass search-icon"></i>
                        <h4>{{ $settings['edu_inst_cover_title'] ?? 'What You Will Cover' }}</h4>
                    </div>
                    <ul class="biz-detail-list">
                        @foreach(array_filter(array_map('trim', explode("\n", $settings['edu_inst_cover_items'] ?? "Academic Consultancy\nFaculty Assistance\nFaculty Recruitment\nWBNC / INC / WBUHS Support\nReciprocal / NRTS / NUID\nInspection Preparation\nInspection Coordination & Liaison\nLong-term Institutional Support"))) as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Connection Wrapper & Student Section -->
    <div class="student-connection-wrapper active" id="student-connection">
        <div class="student-connector-svg-container container">
            <svg width="388" height="150" viewBox="0 0 388 150" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M380 141V99.0357C380 73.1429 367.645 61 352.039 58.8571C336.432 56.7143 138.319 57.9643 41.2127 58.8571C30.8084 58.8571 10 50.2857 10 16"
                    stroke="#13443C" stroke-width="8" />
                <circle cx="378.5" cy="140.5" r="9.5" fill="#14423B" />
                <circle cx="9.5" cy="9.5" r="9.5" fill="#14423B" />
            </svg>
        </div>

        <!-- For Students Section -->
        <div class="for-students-section">
            <div class="for-students-banner">
                <h2>{{ $settings['edu_student_section_banner'] ?? 'For Students' }}</h2>
            </div>
            <div class="container">
                <div class="student-support-container">
                    <h3 class="student-support-title">{{ $settings['edu_student_support_title'] ?? 'Student Admission Support' }}</h3>
                    <div class="student-support-card">
                        <div class="student-support-image">
                            <img src="{{ \App\Models\SiteSetting::getImageUrl('edu_student_support_img', 'images/education-student.png') }}" alt="{{ $settings['edu_student_support_title'] ?? 'Student Admission Support' }}" />
                        </div>
                        <div class="student-support-content">
                            <p>{{ $settings['edu_student_support_desc'] ?? 'At Siksha Pathik, we believe that choosing the right course and institution is one of the most important decisions in a student\'s life.' }}</p>
                        </div>
                    </div>

                    <!-- Our Admission Journey Section -->
                    <div class="admission-journey-section" data-aos="fade-up">
                        <div class="admission-journey-header">
                            <h2>{{ $settings['edu_admission_journey_title'] ?? 'Our Admission Journey' }}</h2>
                            <p>{{ $settings['edu_admission_journey_subtitle'] ?? 'Because every rupee saved is a step toward growth.' }}</p>
                        </div>
                        <div class="admission-journey-diagram">
                            <img src="{{ \App\Models\SiteSetting::getImageUrl('edu_admission_journey_img', 'images/education-01.webp') }}" alt="{{ $settings['edu_admission_journey_title'] ?? 'Our Admission Journey' }}" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Academic Programmes We Facilitate Section -->
            <div class="academic-prog-section" data-aos="fade-up">
                <div class="container">
                    <h2 class="academic-prog-title">{{ $settings['edu_academic_prog_title'] ?? 'Academic Programmes We Facilitate' }}</h2>
                    <div class="academic-prog-grid">
                        <div class="academic-prog-content">
                            <p>{{ $settings['edu_academic_prog_content'] ?? '' }}</p>
                            <a href="#" class="btn-read-more">Read More</a>
                        </div>
                        <div class="academic-prog-image">
                            <img src="{{ \App\Models\SiteSetting::getImageUrl('edu_academic_prog_img', 'images/education-02.webp') }}" alt="{{ $settings['edu_academic_prog_title'] ?? 'Academic Programmes We Facilitate' }}" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Programme Cards Grid Section -->
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
                    // Default fallback
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
            @if(count($progCards) > 0)
            <div class="programme-cards-section" data-aos="fade-up">
                <div class="container">
                    <div class="programme-cards-grid" id="programmeCardsGrid">
                        @foreach($progCards as $index => $card)
                        @php
                            $dot      = $card['dot'] ?? 'dot-blue';
                            $title    = $card['title'] ?? '';
                            $readTime = !empty($card['read_time']) ? $card['read_time'] : '5 min read';
                            $content  = $card['content'] ?? '';
                            $isFilled = ($index === 3) ? 'btn-filled' : '';
                            $isExtra  = ($index >= 6);
                        @endphp
                        <div class="prog-card {{ $isExtra ? 'prog-card-extra' : '' }}" {!! $isExtra ? 'style="display:none;"' : '' !!}>
                            <div class="prog-card-top">
                                <span class="prog-dot {{ $dot }}"></span>
                                <span class="prog-read-time">{{ $readTime }}</span>
                            </div>
                            <h3 class="prog-card-title">{{ $title }}</h3>
                            <div class="prog-card-body">
                                <p>{!! nl2br(e($content)) !!}</p>
                            </div>
                            <div class="prog-card-bottom">
                                <button class="prog-arrow-btn {{ $isFilled }}" aria-label="Open">
                                    <i class="fa-solid fa-arrow-down"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @if(count($progCards) > 6)
                    <div class="prog-see-more-wrap">
                        <button type="button" class="btn-see-more" id="btnSeeMoreProgCards" data-expanded="false">
                            See more
                        </button>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- Why Our Admission Support is Different Banner Section -->
            <div class="why-admission-different-section" data-aos="fade-up">
                <div class="container">
                    <div class="why-diff-content">
                        <h2>{!! nl2br(e($settings['edu_why_diff_title'] ?? "Why Our Admission Support\nis Different")) !!}</h2>
                        <p>{{ $settings['edu_why_diff_content'] ?? '' }}</p>
                    </div>
                </div>
            </div>

            <!-- Our Commitment Section -->
            <div class="our-commitment-section" data-aos="fade-up">
                <div class="container">
                    <div class="commitment-card">
                        <div class="commitment-content">
                            <h2>{{ $settings['edu_commitment_title'] ?? 'Our Commitment' }}</h2>
                            <p>{{ $settings['edu_commitment_desc'] ?? '' }}</p>
                        </div>
                        <div class="commitment-image-wrap">
                            <img src="{{ \App\Models\SiteSetting::getImageUrl('edu_commitment_img', 'images/education-03.png') }}" alt="{{ $settings['edu_commitment_title'] ?? 'Our Commitment' }}" class="commitment-img" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Why Students Trust Us Section -->
            <div class="why-trust-us-section" data-aos="fade-up">
                <div class="container">
                    <h2 class="why-trust-title">{{ $settings['edu_trust_title'] ?? 'Why Students Trust Us' }}</h2>
                    <div class="why-trust-grid">
                        @foreach(array_filter(array_map('trim', explode('|', $settings['edu_trust_items'] ?? 'Personalized counselling|Transparent admission process|Experienced education consultants|Complete documentation support|End-to-end academic guidance|Professional registration support|Career development assistance|Placement support through Edge Hire'))) as $trustItem)
                        <div class="trust-pill-item">
                            <span class="trust-check-icon"><img src="/images/check.svg" width="49" height="49" alt="check"></span>
                            <span class="trust-pill-text">{{ $trustItem }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Connection Wrapper & Institution Section -->
    <div class="institution-connection-wrapper" id="institution-connection">
        <div class="institution-connector-svg-container container">
            <svg width="424" height="144" viewBox="0 0 424 144" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10 135V93.0357C10 67.1429 23.4903 55 40.5308 52.8571C57.5712 50.7143 273.89 51.9643 379.919 52.8571C391.279 52.8571 414 44.2857 414 10" stroke="#13443C" stroke-width="8"/>
                <circle cx="9.5" cy="134.5" r="9.5" fill="#14423B"/>
                <circle cx="414.5" cy="9.5" r="9.5" fill="#14423B"/>
            </svg>
        </div>

        <!-- For Institutions Section -->
        <div class="for-institutions-section">
            <div class="for-institutions-banner">
                <h2>{{ $settings['edu_inst_section_banner'] ?? 'For Institutions' }}</h2>
            </div>
            <div class="container">
                <div class="institution-support-container">
                    <h3 class="institution-support-title">{{ $settings['edu_inst_support_title'] ?? 'Core Institutional Support' }}</h3>
                    <div class="institution-support-card">
                        <div class="institution-support-image">
                            <img src="{{ \App\Models\SiteSetting::getImageUrl('edu_inst_support_img', 'images/education-instute.png') }}" alt="{{ $settings['edu_inst_support_title'] ?? 'Core Institutional Support' }}" />
                        </div>
                        <div class="institution-support-content">
                            <p>{{ $settings['edu_inst_support_desc'] ?? '' }}</p>
                        </div>
                    </div>

                    <!-- Accordion Bar: Our Institutional Support Includes -->
                    <div class="institution-support-includes-bar">
                        <span class="bar-text">Our Institutional Support Includes</span>
                        <span class="bar-icon"><i class="fa-solid fa-chevron-up"></i></span>
                    </div>

                    <!-- Collapsible Content -->
                    <div class="institution-support-includes-content active" id="institution-support-includes-content">
                        <div class="institution-support-includes-inner">
                            <h2 class="inst-support-heading">{{ $settings['edu_inst_includes_heading'] ?? 'For Institutions Support' }}</h2>
                            <div class="inst-support-cards-grid">
                                @for($i = 1; $i <= 3; $i++)
                                @php
                                    $dot     = $settings["edu_inst_card_{$i}_dot"]     ?? ['dot-blue','dot-orange','dot-purple'][$i-1];
                                    $title   = $settings["edu_inst_card_{$i}_title"]   ?? '';
                                    $content = $settings["edu_inst_card_{$i}_content"] ?? '';
                                    $isFilled = ($i === 1) ? 'btn-filled' : '';
                                @endphp
                                <div class="prog-card">
                                    <div class="prog-card-top">
                                        <span class="prog-dot {{ $dot }}"></span>
                                        <span class="prog-read-time">5 min read</span>
                                    </div>
                                    <h3 class="prog-card-title">{{ $title }}</h3>
                                    <div class="prog-card-body">
                                        <p>{!! nl2br(e($content)) !!}</p>
                                    </div>
                                    <div class="prog-card-bottom">
                                        <button class="prog-arrow-btn {{ $isFilled }}" aria-label="Open">
                                            <i class="fa-solid fa-arrow-down"></i>
                                        </button>
                                    </div>
                                </div>
                                @endfor
                            </div>

                            <!-- Wide Card 4 -->
                            @php
                                $wDot     = $settings['edu_inst_card_4_dot']     ?? 'dot-blue';
                                $wTitle   = $settings['edu_inst_card_4_title']   ?? 'Healthcare Career Support';
                                $wContent = $settings['edu_inst_card_4_content'] ?? '';
                            @endphp
                            <div class="inst-support-wide-card">
                                <div class="prog-card-top">
                                    <span class="prog-dot {{ $wDot }}"></span>
                                    <span class="prog-read-time">5 min read</span>
                                </div>
                                <h3 class="prog-card-title">{{ $wTitle }}</h3>
                                <div class="wide-card-middle">
                                    <div class="prog-card-body">
                                        <p>{!! nl2br(e($wContent)) !!}</p>
                                    </div>
                                    <div class="prog-card-bottom">
                                        <button class="prog-arrow-btn btn-filled" aria-label="Open">
                                            <i class="fa-solid fa-arrow-down"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Upcoming - Siksha Pathik Academy Section -->
        <div class="upcoming-academy-section" data-aos="fade-up">
            <div class="container">
                <div class="academy-card">
                    <div class="academy-image-wrap">
                        <img src="{{ \App\Models\SiteSetting::getImageUrl('edu_academy_img', 'images/education-04.webp') }}" alt="{{ $settings['edu_academy_title'] ?? 'Upcoming - Siksha Pathik Academy' }}" class="academy-img" />
                    </div>
                    <div class="academy-content">
                        <h2>{{ $settings['edu_academy_title'] ?? 'Upcoming - Siksha Pathik Academy' }}</h2>
                        <p>{{ $settings['edu_academy_desc'] ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Why Siksha Pathik Section -->
        <section class="why-pathik-section" data-aos="fade-up">
            <div class="container">
                <h2 class="why-pathik-title">{{ $settings['edu_why_pathik_title'] ?? 'Why Siksha Pathik' }}</h2>
                <div class="why-trust-grid">
                    @foreach(array_filter(array_map('trim', explode('|', $settings['edu_why_pathik_items'] ?? 'More than an admission consultancy.|Faculty and institutional assistance under one roof.|Dedicated nursing institutional consultancy.|Multi-state operational network.|Complete student lifecycle support.|Integration with Edge Hire for career opportunities.'))) as $pathikItem)
                    <div class="trust-pill-item">
                        <span class="trust-check-icon"><img src="/images/check.svg" width="49" height="49" alt="check"></span>
                        <span class="trust-pill-text">{{ $pathikItem }}</span>
                    </div>
                    @endforeach
                </div>

                <div class="why-pathik-note">
                    <h3>{{ $settings['edu_pathik_note_title'] ?? 'Important Note' }}</h3>
                    <p>{{ $settings['edu_pathik_note_content'] ?? '' }}</p>
                </div>

                <div class="integrated-ecosystem-card">
                    <div class="ecosystem-left">
                        <h2>{!! nl2br(e($settings['edu_ecosystem_left_title'] ?? "Integrated\nEcosystem")) !!}</h2>
                    </div>
                    <div class="ecosystem-divider"></div>
                    <div class="ecosystem-right">
                        <p>{{ $settings['edu_ecosystem_right_desc'] ?? '' }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Healthcare Education Expertise Section -->
        <section class="healthcare-expertise-section" style="background-image: url('{{ \App\Models\SiteSetting::getImageUrl('edu_expertise_bg_img', 'images/education-05.webp') }}');" data-aos="fade-up">
            <div class="container">
                <div class="expertise-content-wrapper">
                    <div class="expertise-content">
                        <h2>{!! nl2br(e($settings['edu_expertise_title'] ?? "Our Healthcare\nEducation Expertise")) !!}</h2>
                        <p>{{ $settings['edu_expertise_desc'] ?? '' }}</p>
                        <a href="{{ $settings['edu_expertise_btn_url'] ?? '#' }}" class="btn-see-more">{{ $settings['edu_expertise_btn_text'] ?? 'See more' }}</a>
                    </div>
                </div>
            </div>
        </section>
    </div> <!-- Close institution-connection-wrapper -->

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

@push('scripts')
<script>
    const studentTrigger = document.getElementById('student-card-trigger');
    const institutionTrigger = document.getElementById('institution-card-trigger');
    const studentSubTrigger = document.getElementById('student-sub-card');
    const institutionSubTrigger = document.getElementById('institution-sub-card');
    const studentSection = document.getElementById('student-connection');
    const institutionSection = document.getElementById('institution-connection');

    function showStudents() {
        if (studentSection) studentSection.classList.add('active');
        if (studentTrigger) studentTrigger.classList.add('selected');
        if (institutionSection) institutionSection.classList.remove('active');
        if (institutionTrigger) institutionTrigger.classList.remove('selected');
    }

    function showInstitutions() {
        if (institutionSection) institutionSection.classList.add('active');
        if (institutionTrigger) institutionTrigger.classList.add('selected');
        if (studentSection) studentSection.classList.remove('active');
        if (studentTrigger) studentTrigger.classList.remove('selected');
    }

    if (studentTrigger) {
        studentTrigger.addEventListener('click', function () {
            showStudents();
            setTimeout(() => {
                studentSection?.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 200);
        });
    }

    if (studentSubTrigger) {
        studentSubTrigger.addEventListener('click', function () {
            showStudents();
            setTimeout(() => {
                studentSection?.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 200);
        });
    }

    if (institutionTrigger) {
        institutionTrigger.addEventListener('click', function () {
            showInstitutions();
            setTimeout(() => {
                institutionSection?.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 200);
        });
    }

    if (institutionSubTrigger) {
        institutionSubTrigger.addEventListener('click', function () {
            showInstitutions();
            setTimeout(() => {
                institutionSection?.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 200);
        });
    }

    // Toggle "Our Institutional Support Includes" collapsible section
    const includesBar = document.querySelector('.institution-support-includes-bar');
    const includesContent = document.getElementById('institution-support-includes-content');

    if (includesBar && includesContent) {
        includesBar.addEventListener('click', function () {
            const isActive = includesContent.classList.contains('active');
            if (isActive) {
                includesContent.classList.remove('active');
                includesBar.querySelector('.bar-icon i').className = 'fa-solid fa-chevron-down';
            } else {
                includesContent.classList.add('active');
                includesBar.querySelector('.bar-icon i').className = 'fa-solid fa-chevron-up';
                setTimeout(() => {
                    includesContent.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }, 300);
            }
        });
    }

    // Programme cards See More / See Less functionality
    const btnSeeMore = document.getElementById('btnSeeMoreProgCards');
    if (btnSeeMore) {
        btnSeeMore.addEventListener('click', function () {
            const isExpanded = this.getAttribute('data-expanded') === 'true';
            const extraCards = document.querySelectorAll('.prog-card-extra');

            if (!isExpanded) {
                // Reveal extra cards with smooth animation
                extraCards.forEach(card => {
                    card.style.display = 'flex';
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(15px)';
                    card.style.transition = 'opacity 0.35s ease, transform 0.35s ease';
                    requestAnimationFrame(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    });
                });
                this.setAttribute('data-expanded', 'true');
                this.textContent = 'See less';
            } else {
                // Hide extra cards
                extraCards.forEach(card => {
                    card.style.display = 'none';
                });
                this.setAttribute('data-expanded', 'false');
                this.textContent = 'See more';

                const progSection = document.querySelector('.programme-cards-section');
                if (progSection) {
                    progSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        });
    }
</script>
@endpush
