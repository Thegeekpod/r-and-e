@extends('layouts.app')

@section('title', $settings['finance_meta_title'] ?? 'Finance & Taxation | Roy Infinity Edge Consulting')

@push('styles')
<style>
    .service-extra-point.is-hidden {
        display: none !important;
    }
    .service-extra-point {
        animation: servicePointFadeIn 0.35s ease forwards;
    }
    @keyframes servicePointFadeIn {
        from {
            opacity: 0;
            transform: translateY(-6px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .btn-learn-more-round.js-toggle-service-points {
        cursor: pointer;
        user-select: none;
    }
    .btn-learn-more-round .toggle-arrow-img {
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .btn-learn-more-round.is-expanded .toggle-arrow-img {
        transform: rotate(90deg);
    }
</style>
@endpush

@section('content')
<section class="taxation-feature-section pt-100">
    <div class="container">
        <div class="taxation-card" data-aos="zoom-in-up">
            <div class="taxation-card-content" data-aos="fade-right" data-aos-delay="300"
                data-aos-anchor-placement="center-bottom">
                <h2>{{ $settings['finance_hero_title'] ?? 'Where smart taxation meets smarter business growth.' }}</h2>
                <p>{{ $settings['finance_hero_subtitle'] ?? "We don't just manage taxes — we maximize your potential." }}</p>
                <a href="{{ $settings['finance_hero_btn_url'] ?? '#services' }}" class="btn-learn-more">{{ $settings['finance_hero_btn_text'] ?? 'Learn More' }}</a>
            </div>
            <div class="taxation-card-image">
                <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_hero_img_graphics', 'images/man-1-graphics.webp') }}" class="animate" alt="Smart Taxation Graphic" />
                <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_hero_img_person', 'images/man-1.webp') }}" alt="Smart Taxation" />
            </div>
        </div>
    </div>
</section>

<section class="intro-section pt-100">
    <div class="container">
        <h2 class="intro-title" data-aos="fade-up">{{ $settings['finance_intro_title'] ?? 'Introduction' }}</h2>
        <div class="intro-top-grid" data-aos="fade-up" data-aos-delay="200">
            <div class="intro-top-text">
                <p>{!! $settings['finance_intro_text1'] ?? 'Roy Infinity Edge Consulting is a comprehensive <strong>financial services firm dedicated to empowering businesses</strong> of all sizes achieve their financial goals.' !!}</p>
            </div>
            <div class="intro-top-text">
                <p>{!! $settings['finance_intro_text2'] ?? 'We offer a wide range of expert services, from compliance and bookkeeping to strategic tax planning and growth support.' !!}</p>
            </div>
        </div>

        <div class="intro-visual-container" data-aos="zoom-in" data-aos-delay="400">
            <div class="intro-img-left-wrapper">
                <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_intro_img1', 'images/Financial-1.webp') }}" alt="Financial 1" class="intro-img-left">
                <div class="intro-badge-green">{{ $settings['finance_intro_badge1'] ?? 'Financial' }}</div>
            </div>
            <div class="intro-img-right-wrapper">
                <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_intro_img2', 'images/Financial-2.webp') }}" alt="Financial 2" class="intro-img-right">
                <div class="intro-badge-white">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_intro_badge2_icon', 'images/financial.svg') }}" alt="Badge Icon">
                    <span>{{ $settings['finance_intro_badge2_text'] ?? 'Financial Services' }}</span>
                </div>
            </div>
        </div>

        <div class="intro-bottom-content" data-aos="fade-up" data-aos-delay="600">
            <div class="intro-bg-text">
                <h2 class="bg-text-gray">{{ $settings['finance_intro_bg_line1'] ?? 'Financial' }}</h2>
                <div class="intro-bottom-row">
                    <h2 class="bg-text-green">{{ $settings['finance_intro_bg_line2'] ?? 'Services' }}</h2>
                    <div class="intro-bottom-desc">
                        <p>{!! $settings['finance_intro_bottom_desc'] ?? 'Roy Infinity Edge Consulting is a comprehensive <strong>financial services firm dedicated to empowering businesses</strong> of all sizes achieve their financial goals.' !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services-section" id="services">
    <div class="container">
        <div class="services-header" data-aos="fade-up">
            <h2>{{ $settings['finance_services_title'] ?? 'Our Services' }}</h2>
            <p>{{ $settings['finance_services_subtitle'] ?? 'Because every rupee saved is a step toward growth.' }}</p>
        </div>

        <div class="services-grid">
            <!-- 1. Financial Reporting & Analysis -->
            @php
                $raw1 = $settings['finance_srv1_points'] ?? 'Detailed Project Reports (DPR) for securing funding or tenders | Financial statements prepared to legal standards | CMA Data and financial analysis for loan applications';
                $srv1_points = array_values(array_filter(array_map('trim', preg_split('/[\|\n\r]+/', $raw1))));
                $srv1_has_more = count($srv1_points) > 3;
            @endphp
            <div class="service-row lime-card" data-aos="fade-up">
                <div class="service-image">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_srv1_img', 'images/Financial-Reporting-Analysis.png') }}" alt="{{ $settings['finance_srv1_title'] ?? 'Financial Reporting & Analysis' }}">
                </div>
                <div class="service-content">
                    <h3 class="highlight-title">{{ $settings['finance_srv1_title'] ?? 'Financial Reporting & Analysis' }}</h3>
                    <p>{{ $settings['finance_srv1_desc'] ?? 'We provide comprehensive financial reporting and analysis, including:' }}</p>
                    <ul>
                        @foreach($srv1_points as $idx => $point)
                            <li class="{{ $idx >= 3 ? 'service-extra-point is-hidden' : '' }}">{{ $point }}</li>
                        @endforeach
                    </ul>
                    <div class="service-actions">
                        <a href="{{ $settings['finance_srv1_tag_url'] ?? '#' }}" class="btn-service-dark">{{ $settings['finance_srv1_tag'] ?? 'Financial' }}</a>
                        @if($srv1_has_more)
                            <a href="javascript:void(0);" class="btn-learn-more-round js-toggle-service-points" data-more-text="{{ $settings['finance_srv1_btn_text'] ?? 'Learn more' }}" data-less-text="Show less">
                                <img src="{{ asset('images/right-uparrow.svg') }}" alt="arrow" class="toggle-arrow-img">
                                <span class="btn-learn-label">{{ $settings['finance_srv1_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @else
                            <a href="{{ $settings['finance_srv1_btn_url'] ?? '#' }}" class="btn-learn-more-round">
                                <img src="{{ asset('images/right-uparrow.svg') }}" alt="arrow">
                                <span>{{ $settings['finance_srv1_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- 2. Taxation -->
            @php
                $raw2 = $settings['finance_srv2_points'] ?? 'Personal and corporate tax filings | Strategic tax planning to minimize liabilities | Assistance with tax assessments, appeals, and disputes';
                $srv2_points = array_values(array_filter(array_map('trim', preg_split('/[\|\n\r]+/', $raw2))));
                $srv2_has_more = count($srv2_points) > 3;
            @endphp
            <div class="service-row dark-card inverted" data-aos="fade-up">
                <div class="service-content">
                    <h3 class="highlight-title">{{ $settings['finance_srv2_title'] ?? 'Taxation' }}</h3>
                    <p>{{ $settings['finance_srv2_desc'] ?? 'Our team of tax specialists ensures you remain compliant with all regulations while optimizing your tax position. Services include:' }}</p>
                    <ul>
                        @foreach($srv2_points as $idx => $point)
                            <li class="{{ $idx >= 3 ? 'service-extra-point is-hidden' : '' }}">{{ $point }}</li>
                        @endforeach
                    </ul>
                    <div class="service-actions">
                        @if($srv2_has_more)
                            <a href="javascript:void(0);" class="btn-learn-more-round js-toggle-service-points" data-more-text="{{ $settings['finance_srv2_btn_text'] ?? 'Learn more' }}" data-less-text="Show less">
                                <img src="{{ asset('images/right-uparrowwhite.svg') }}" alt="arrow" class="toggle-arrow-img">
                                <span class="btn-learn-label">{{ $settings['finance_srv2_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @else
                            <a href="{{ $settings['finance_srv2_btn_url'] ?? '#' }}" class="btn-learn-more-round">
                                <img src="{{ asset('images/right-uparrowwhite.svg') }}" alt="arrow">
                                <span>{{ $settings['finance_srv2_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @endif
                        <a href="{{ $settings['finance_srv2_tag_url'] ?? '#' }}" class="btn-service-green">{{ $settings['finance_srv2_tag'] ?? 'Financial' }}</a>
                    </div>
                </div>
                <div class="service-image">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_srv2_img', 'images/Taxation.png') }}" alt="{{ $settings['finance_srv2_title'] ?? 'Taxation' }}">
                </div>
            </div>

            <!-- 3. TDS Compliance -->
            @php
                $raw3 = $settings['finance_srv3_points'] ?? 'Accurate calculation, deduction, and deposit of TDS as per applicable rules | Timely filing of quarterly TDS returns | Issuance of Form 16/16A certificates to employees and contractors';
                $srv3_points = array_values(array_filter(array_map('trim', preg_split('/[\|\n\r]+/', $raw3))));
                $srv3_has_more = count($srv3_points) > 3;
            @endphp
            <div class="service-row light-card" data-aos="fade-up">
                <div class="service-image">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_srv3_img', 'images/Financial-Reporting-Analysis.png') }}" alt="{{ $settings['finance_srv3_title'] ?? 'TDS Compliance' }}">
                </div>
                <div class="service-content">
                    <h3 class="highlight-title">{{ $settings['finance_srv3_title'] ?? 'TDS Compliance' }}</h3>
                    <p>{{ $settings['finance_srv3_desc'] ?? 'Our experts ensure your business remains compliant with TDS regulations, including:' }}</p>
                    <ul>
                        @foreach($srv3_points as $idx => $point)
                            <li class="{{ $idx >= 3 ? 'service-extra-point is-hidden' : '' }}">{{ $point }}</li>
                        @endforeach
                    </ul>
                    <div class="service-actions">
                        <a href="{{ $settings['finance_srv3_tag_url'] ?? '#' }}" class="btn-service-dark">{{ $settings['finance_srv3_tag'] ?? 'Financial' }}</a>
                        @if($srv3_has_more)
                            <a href="javascript:void(0);" class="btn-learn-more-round js-toggle-service-points" data-more-text="{{ $settings['finance_srv3_btn_text'] ?? 'Learn more' }}" data-less-text="Show less">
                                <img src="{{ asset('images/right-uparrow.svg') }}" alt="arrow" class="toggle-arrow-img">
                                <span class="btn-learn-label">{{ $settings['finance_srv3_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @else
                            <a href="{{ $settings['finance_srv3_btn_url'] ?? '#' }}" class="btn-learn-more-round">
                                <img src="{{ asset('images/right-uparrow.svg') }}" alt="arrow">
                                <span>{{ $settings['finance_srv3_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- 4. GST Compliance -->
            @php
                $raw4 = $settings['finance_srv4_points'] ?? 'GST registration and compliance assistance | Timely and accurate GST return filings | GST advisory to optimize your tax management | E-Way Billing & GST Audits & Services';
                $srv4_points = array_values(array_filter(array_map('trim', preg_split('/[\|\n\r]+/', $raw4))));
                $srv4_has_more = count($srv4_points) > 3;
            @endphp
            <div class="service-row lime-card inverted" data-aos="fade-up">
                <div class="service-content">
                    <h3 class="highlight-title">{{ $settings['finance_srv4_title'] ?? 'GST Compliance' }}</h3>
                    <p>{{ $settings['finance_srv4_desc'] ?? 'We navigate the complexities of Goods and Services Tax (GST) for you, providing:' }}</p>
                    <ul>
                        @foreach($srv4_points as $idx => $point)
                            <li class="{{ $idx >= 3 ? 'service-extra-point is-hidden' : '' }}">{{ $point }}</li>
                        @endforeach
                    </ul>
                    <div class="service-actions">
                        @if($srv4_has_more)
                            <a href="javascript:void(0);" class="btn-learn-more-round js-toggle-service-points" data-more-text="{{ $settings['finance_srv4_btn_text'] ?? 'Learn more' }}" data-less-text="Show less">
                                <img src="{{ asset('images/right-uparrowwhite.svg') }}" alt="arrow" class="toggle-arrow-img">
                                <span class="btn-learn-label">{{ $settings['finance_srv4_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @else
                            <a href="{{ $settings['finance_srv4_btn_url'] ?? '#' }}" class="btn-learn-more-round">
                                <img src="{{ asset('images/right-uparrowwhite.svg') }}" alt="arrow">
                                <span>{{ $settings['finance_srv4_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @endif
                        <a href="{{ $settings['finance_srv4_tag_url'] ?? '#' }}" class="btn-service-dark">{{ $settings['finance_srv4_tag'] ?? 'Financial' }}</a>
                    </div>
                </div>
                <div class="service-image">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_srv4_img', 'images/Taxation.png') }}" alt="{{ $settings['finance_srv4_title'] ?? 'GST Compliance' }}">
                </div>
            </div>

            <!-- 5. Company Incorporation & Compliance -->
            @php
                $raw5 = $settings['finance_srv5_points'] ?? 'Company formation (LLP, Pvt. Ltd., etc.) | Filing of annual returns and financial statements | Company law advisory services';
                $srv5_points = array_values(array_filter(array_map('trim', preg_split('/[\|\n\r]+/', $raw5))));
                $srv5_has_more = count($srv5_points) > 3;
            @endphp
            <div class="service-row dark-card" data-aos="fade-up">
                <div class="service-image">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_srv5_img', 'images/Financial-Reporting-Analysis.png') }}" alt="{{ $settings['finance_srv5_title'] ?? 'Company Incorporation' }}">
                </div>
                <div class="service-content">
                    <h3 class="highlight-title">{{ $settings['finance_srv5_title'] ?? 'Company Incorporation & Compliance:' }}</h3>
                    <p>{{ $settings['finance_srv5_desc'] ?? 'We guide you through the process of incorporating your business and ensure ongoing compliance with the Registrar of Companies (ROC). This includes:' }}</p>
                    <ul>
                        @foreach($srv5_points as $idx => $point)
                            <li class="{{ $idx >= 3 ? 'service-extra-point is-hidden' : '' }}">{{ $point }}</li>
                        @endforeach
                    </ul>
                    <div class="service-actions">
                        <a href="{{ $settings['finance_srv5_tag_url'] ?? '#' }}" class="btn-service-green">{{ $settings['finance_srv5_tag'] ?? 'Financial' }}</a>
                        @if($srv5_has_more)
                            <a href="javascript:void(0);" class="btn-learn-more-round js-toggle-service-points" data-more-text="{{ $settings['finance_srv5_btn_text'] ?? 'Learn more' }}" data-less-text="Show less">
                                <img src="{{ asset('images/right-uparrow.svg') }}" alt="arrow" class="toggle-arrow-img">
                                <span class="btn-learn-label">{{ $settings['finance_srv5_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @else
                            <a href="{{ $settings['finance_srv5_btn_url'] ?? '#' }}" class="btn-learn-more-round">
                                <img src="{{ asset('images/right-uparrow.svg') }}" alt="arrow">
                                <span>{{ $settings['finance_srv5_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- 6. Compliance Management -->
            @php
                $raw6 = $settings['finance_srv6_points'] ?? "Employee Provident Fund Organization (EPFO) & Employees' State Insurance Corporation (ESIC) registrations and contributions | Trade license applications and renewals | UDYAM & Professional Tax (P. Tax) registrations | Digital Signature Certificate (DSC) issuance for secure transactions";
                $srv6_points = array_values(array_filter(array_map('trim', preg_split('/[\|\n\r]+/', $raw6))));
                $srv6_has_more = count($srv6_points) > 3;
            @endphp
            <div class="service-row light-card inverted" data-aos="fade-up">
                <div class="service-content">
                    <h3 class="highlight-title">{{ $settings['finance_srv6_title'] ?? 'Compliance Management' }}</h3>
                    <p>{{ $settings['finance_srv6_desc'] ?? 'We help you stay compliant with various regulations:' }}</p>
                    <ul>
                        @foreach($srv6_points as $idx => $point)
                            <li class="{{ $idx >= 3 ? 'service-extra-point is-hidden' : '' }}">{{ $point }}</li>
                        @endforeach
                    </ul>
                    <div class="service-actions">
                        @if($srv6_has_more)
                            <a href="javascript:void(0);" class="btn-learn-more-round js-toggle-service-points" data-more-text="{{ $settings['finance_srv6_btn_text'] ?? 'Learn more' }}" data-less-text="Show less">
                                <img src="{{ asset('images/right-uparrowwhite.svg') }}" alt="arrow" class="toggle-arrow-img">
                                <span class="btn-learn-label">{{ $settings['finance_srv6_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @else
                            <a href="{{ $settings['finance_srv6_btn_url'] ?? '#' }}" class="btn-learn-more-round">
                                <img src="{{ asset('images/right-uparrowwhite.svg') }}" alt="arrow">
                                <span>{{ $settings['finance_srv6_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @endif
                        <a href="{{ $settings['finance_srv6_tag_url'] ?? '#' }}" class="btn-service-dark">{{ $settings['finance_srv6_tag'] ?? 'Financial' }}</a>
                    </div>
                </div>
                <div class="service-image">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_srv6_img', 'images/Taxation.png') }}" alt="{{ $settings['finance_srv6_title'] ?? 'Compliance Management' }}">
                </div>
            </div>

            <!-- 7. Financial Reporting & Analysis -->
            @php
                $raw7 = $settings['finance_srv7_points'] ?? 'Detailed Project Reports (DPR) for securing funding or tenders | Financial statements prepared to legal standards | CMA Data and financial analysis for loan applications';
                $srv7_points = array_values(array_filter(array_map('trim', preg_split('/[\|\n\r]+/', $raw7))));
                $srv7_has_more = count($srv7_points) > 3;
            @endphp
            <div class="service-row lime-card" data-aos="fade-up">
                <div class="service-image">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_srv7_img', 'images/Financial-Reporting-Analysis.png') }}" alt="{{ $settings['finance_srv7_title'] ?? 'Financial Reporting & Analysis' }}">
                </div>
                <div class="service-content">
                    <h3 class="highlight-title">{{ $settings['finance_srv7_title'] ?? 'Financial Reporting & Analysis' }}</h3>
                    <p>{{ $settings['finance_srv7_desc'] ?? 'We provide comprehensive financial reporting and analysis, including:' }}</p>
                    <ul>
                        @foreach($srv7_points as $idx => $point)
                            <li class="{{ $idx >= 3 ? 'service-extra-point is-hidden' : '' }}">{{ $point }}</li>
                        @endforeach
                    </ul>
                    <div class="service-actions">
                        <a href="{{ $settings['finance_srv7_tag_url'] ?? '#' }}" class="btn-service-dark">{{ $settings['finance_srv7_tag'] ?? 'Financial' }}</a>
                        @if($srv7_has_more)
                            <a href="javascript:void(0);" class="btn-learn-more-round js-toggle-service-points" data-more-text="{{ $settings['finance_srv7_btn_text'] ?? 'Learn more' }}" data-less-text="Show less">
                                <img src="{{ asset('images/right-uparrow.svg') }}" alt="arrow" class="toggle-arrow-img">
                                <span class="btn-learn-label">{{ $settings['finance_srv7_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @else
                            <a href="{{ $settings['finance_srv7_btn_url'] ?? '#' }}" class="btn-learn-more-round">
                                <img src="{{ asset('images/right-uparrow.svg') }}" alt="arrow">
                                <span>{{ $settings['finance_srv7_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- 8. Strategic Support -->
            @php
                $raw8 = $settings['finance_srv8_points'] ?? 'Advance tax calculations to avoid penalties | Strategic tax planning for optimal financial outcomes | Comprehensive Intellectual Property (IP) including Trademark Registration, Patent Filing, Copyrights, Design Registration, IP Advisory, Infringement Support, and International IP Protection';
                $srv8_points = array_values(array_filter(array_map('trim', preg_split('/[\|\n\r]+/', $raw8))));
                $srv8_has_more = count($srv8_points) > 3;
            @endphp
            <div class="service-row dark-card inverted" data-aos="fade-up">
                <div class="service-content">
                    <h3 class="highlight-title">{{ $settings['finance_srv8_title'] ?? 'Strategic Support' }}</h3>
                    <p>{{ $settings['finance_srv8_desc'] ?? 'Our team offers additional services to propel your business forward:' }}</p>
                    <ul>
                        @foreach($srv8_points as $idx => $point)
                            <li class="{{ $idx >= 3 ? 'service-extra-point is-hidden' : '' }}">{{ $point }}</li>
                        @endforeach
                    </ul>
                    <div class="service-actions">
                        @if($srv8_has_more)
                            <a href="javascript:void(0);" class="btn-learn-more-round js-toggle-service-points" data-more-text="{{ $settings['finance_srv8_btn_text'] ?? 'Learn more' }}" data-less-text="Show less">
                                <img src="{{ asset('images/right-uparrowwhite.svg') }}" alt="arrow" class="toggle-arrow-img">
                                <span class="btn-learn-label">{{ $settings['finance_srv8_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @else
                            <a href="{{ $settings['finance_srv8_btn_url'] ?? '#' }}" class="btn-learn-more-round">
                                <img src="{{ asset('images/right-uparrowwhite.svg') }}" alt="arrow">
                                <span>{{ $settings['finance_srv8_btn_text'] ?? 'Learn more' }}</span>
                            </a>
                        @endif
                        <a href="{{ $settings['finance_srv8_tag_url'] ?? '#' }}" class="btn-service-green">{{ $settings['finance_srv8_tag'] ?? 'Financial' }}</a>
                    </div>
                </div>
                <div class="service-image">
                    <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_srv8_img', 'images/Taxation.png') }}" alt="{{ $settings['finance_srv8_title'] ?? 'Strategic Support' }}">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="additional-services-section">
    <div class="container">
        <div class="additional-header-banner" data-aos="fade-up">
            <div>
                <h2>{{ $settings['finance_add_title'] ?? 'Additional Services' }}</h2>
                <p>{{ $settings['finance_add_subtitle'] ?? 'Because every rupee saved is a step toward growth.' }}</p>
            </div>

            <div class="additional-content-grid">
                <!-- FSSAI License -->
                <div class="additional-card bg-dark-green-v2" data-aos="zoom-in">
                    <h4>{{ $settings['finance_add1_title'] ?? 'FSSAI License' }}</h4>
                    <p>{{ $settings['finance_add1_desc'] ?? 'We assist food businesses with acquiring and renewing their Food Safety and Standards Authority of India (FSSAI) license, ensuring compliance with safety standards.' }}</p>
                </div>

                <!-- RERA Registration -->
                <div class="additional-card bg-lime-v2" data-aos="zoom-in">
                    <h4>{{ $settings['finance_add2_title'] ?? 'RERA Registration' }}</h4>
                    <p>{{ $settings['finance_add2_desc'] ?? 'Our experts provide support for Real Estate Regulatory Authority (RERA) registration, ensuring your real estate projects adhere to legal requirements.' }}</p>
                </div>
            </div>
        </div>

        <div class="additional-content-grid">
            <!-- Left Tall Image Box -->
            <div class="additional-left-box" data-aos="fade-right">
                <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_add_left_img', 'images/additional-left.png') }}" alt="Financial background">
            </div>

            <!-- Stock Audit -->
            <div class="additional-card bg-light-v2" data-aos="zoom-in">
                <h4>{{ $settings['finance_add3_title'] ?? 'Stock Audit' }}</h4>
                <p>{{ $settings['finance_add3_desc'] ?? 'We conduct thorough stock audits to help you maintain accurate inventory records, identify discrepancies, and ensure optimal stock levels.' }}</p>
            </div>

            <!-- IEC Registration -->
            <div class="additional-card bg-black-v2" data-aos="zoom-in">
                <h4>{{ $settings['finance_add4_title'] ?? 'Import Export Code (IEC) Registration' }}</h4>
                <p>{{ $settings['finance_add4_desc'] ?? 'We assist businesses in obtaining IEC registration for engaging in international trade, ensuring compliance with export-import regulations' }}</p>
            </div>

            <!-- FCRA Registration -->
            <div class="additional-card bg-dark-green-v2" data-aos="zoom-in">
                <h4>{{ $settings['finance_add5_title'] ?? 'FCRA Registration' }}</h4>
                <p>{{ $settings['finance_add5_desc'] ?? 'For NGOs and associations receiving foreign contributions, we provide Foreign Contribution (Regulation) Act (FCRA) registration and compliance services.' }}</p>
            </div>

            <!-- MSME/SSI Registration -->
            <div class="additional-card bg-lime-v2" data-aos="zoom-in">
                <h4>{{ $settings['finance_add6_title'] ?? 'MSME/SSI Registration' }}</h4>
                <p>{{ $settings['finance_add6_desc'] ?? 'We help small businesses and micro-enterprises obtain MSME (Micro, Small & Medium Enterprises) registration to avail government schemes and benefits.' }}</p>
            </div>

            <!-- CE License -->
            <div class="additional-card bg-black-v2 card-ce-v2" data-aos="fade-up">
                <h4>{{ $settings['finance_add7_title'] ?? 'CE (Clinical Establishment) License' }}</h4>
                <p>{{ $settings['finance_add7_desc'] ?? 'We provide Clinical Establishment Licensing services obtaining compliance, application preparation, inspections, policies, training, and ongoing support for regulatory changes and renewals.' }}</p>
            </div>
        </div>
    </div>
</section>

<section class="cta-banner-section" data-aos="zoom-in">
    <div class="container">
        <div class="cta-banner-card">
            <h2>{{ $settings['finance_cta_title'] ?? 'Ready to Contact with us ?' }}</h2>
            <a href="{{ $settings['finance_cta_btn_url'] ?? '#contact' }}" class="btn-get-started-white">{{ $settings['finance_cta_btn_text'] ?? 'Get Started' }} <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.js-toggle-service-points').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const card = this.closest('.service-row');
                if (!card) return;

                const hiddenPoints = card.querySelectorAll('.service-extra-point');
                const label = this.querySelector('.btn-learn-label');
                const moreText = this.getAttribute('data-more-text') || 'Learn more';
                const lessText = this.getAttribute('data-less-text') || 'Show less';
                const isExpanded = this.classList.contains('is-expanded');

                if (isExpanded) {
                    hiddenPoints.forEach(function(el) {
                        el.classList.add('is-hidden');
                    });
                    this.classList.remove('is-expanded');
                    if (label) label.textContent = moreText;
                } else {
                    hiddenPoints.forEach(function(el) {
                        el.classList.remove('is-hidden');
                    });
                    this.classList.add('is-expanded');
                    if (label) label.textContent = lessText;
                }
            });
        });
    });
</script>
@endpush
