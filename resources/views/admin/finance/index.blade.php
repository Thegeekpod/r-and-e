@extends('admin.layouts.master')

@section('title', 'Finance Page Content Editor')
@section('page-title', 'Finance Page Content Management')

@section('content')
<form action="{{ route('admin.finance.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold m-0 text-dark">Customize Finance & Taxation Page</h4>
            <p class="text-muted small m-0">Edit hero cards, introduction visuals, 8 core services, additional service modules, and CTA banner.</p>
        </div>
        <button type="submit" class="btn btn-primary-admin px-4 shadow-sm">
            <i class="fa-solid fa-floppy-disk me-2"></i> Save All Changes
        </button>
    </div>

    <!-- Navigation Tabs -->
    <ul class="nav nav-tabs mb-4 bg-white p-2 rounded-3 shadow-sm" id="financeTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="hero-tab" data-bs-toggle="tab" data-bs-target="#hero-pane" type="button" role="tab">
                <i class="fa-solid fa-calculator me-2"></i> 1. Hero & Top Card
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="intro-tab" data-bs-toggle="tab" data-bs-target="#intro-pane" type="button" role="tab">
                <i class="fa-solid fa-info-circle me-2"></i> 2. Introduction
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="services-tab" data-bs-toggle="tab" data-bs-target="#services-pane" type="button" role="tab">
                <i class="fa-solid fa-briefcase me-2"></i> 3. Core Services (8 Cards)
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="additional-tab" data-bs-toggle="tab" data-bs-target="#additional-pane" type="button" role="tab">
                <i class="fa-solid fa-layer-group me-2"></i> 4. Additional Services
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="cta-tab" data-bs-toggle="tab" data-bs-target="#cta-pane" type="button" role="tab">
                <i class="fa-solid fa-bullhorn me-2"></i> 5. CTA & Meta
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="edge-tab" data-bs-toggle="tab" data-bs-target="#edge-pane" type="button" role="tab">
                <i class="fa-solid fa-network-wired me-2"></i> 6. EDGE Accounts Network
            </button>
        </li>
    </ul>

    <!-- Tab Contents -->
    <div class="tab-content" id="financeTabsContent">
        
        <!-- 1. HERO & TOP FEATURE CARD -->
        <div class="tab-pane fade show active" id="hero-pane" role="tabpanel">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-star text-warning me-2"></i> Hero Feature Card</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Hero Card Title</label>
                            <input type="text" name="finance_hero_title" class="form-control" value="{{ $settings['finance_hero_title'] ?? 'Where smart taxation meets smarter business growth.' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Hero Card Subtitle / Description</label>
                            <textarea name="finance_hero_subtitle" rows="2" class="form-control">{{ $settings['finance_hero_subtitle'] ?? "We don't just manage taxes — we maximize your potential." }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Button Text</label>
                            <input type="text" name="finance_hero_btn_text" class="form-control" value="{{ $settings['finance_hero_btn_text'] ?? 'Learn More' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Button Link URL</label>
                            <input type="text" name="finance_hero_btn_url" class="form-control" value="{{ $settings['finance_hero_btn_url'] ?? '#services' }}">
                        </div>
                        
                        <div class="col-md-6 mt-4">
                            <label class="form-label">Hero Graphics Background Image</label>
                            <input type="file" name="finance_hero_img_graphics" class="form-control" accept="image/*">
                            <div class="img-preview-box mt-2">
                                <span class="d-block small text-muted mb-1">Current Graphic:</span>
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_hero_img_graphics', 'images/man-1-graphics.webp') }}" alt="Hero Graphics">
                            </div>
                        </div>
                        <div class="col-md-6 mt-4">
                            <label class="form-label">Hero Person Image</label>
                            <input type="file" name="finance_hero_img_person" class="form-control" accept="image/*">
                            <div class="img-preview-box mt-2">
                                <span class="d-block small text-muted mb-1">Current Image:</span>
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_hero_img_person', 'images/man-1.webp') }}" alt="Hero Person">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. INTRODUCTION SECTION -->
        <div class="tab-pane fade" id="intro-pane" role="tabpanel">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-circle-info text-primary me-2"></i> Introduction Section Content</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label">Section Title</label>
                            <input type="text" name="finance_intro_title" class="form-control" value="{{ $settings['finance_intro_title'] ?? 'Introduction' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Introduction Paragraph 1 (HTML allowed e.g. &lt;strong&gt;)</label>
                            <textarea name="finance_intro_text1" rows="4" class="form-control">{{ $settings['finance_intro_text1'] ?? 'Roy Infinity Edge Consulting is a comprehensive <strong>financial services firm dedicated to empowering businesses</strong> of all sizes achieve their financial goals.' }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Introduction Paragraph 2</label>
                            <textarea name="finance_intro_text2" rows="4" class="form-control">{{ $settings['finance_intro_text2'] ?? 'We offer a wide range of expert services, from compliance and bookkeeping to strategic tax planning and growth support.' }}</textarea>
                        </div>
                    </div>

                    <h6 class="fw-bold text-dark mt-4 mb-3 border-bottom pb-2">Visual Showcase Cards</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="card p-3 border shadow-none bg-light rounded-3 h-100">
                                <label class="form-label fw-bold">Left Card Image & Badge</label>
                                <input type="file" name="finance_intro_img1" class="form-control mb-2" accept="image/*">
                                <div class="img-preview-box mb-2">
                                    <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_intro_img1', 'images/Financial-1.webp') }}" alt="Intro Left Image">
                                </div>
                                <label class="form-label small text-muted">Left Badge Text (Green Tag)</label>
                                <input type="text" name="finance_intro_badge1" class="form-control" value="{{ $settings['finance_intro_badge1'] ?? 'Financial' }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card p-3 border shadow-none bg-light rounded-3 h-100">
                                <label class="form-label fw-bold">Right Card Image & Floating Badge</label>
                                <input type="file" name="finance_intro_img2" class="form-control mb-2" accept="image/*">
                                <div class="img-preview-box mb-2">
                                    <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_intro_img2', 'images/Financial-2.webp') }}" alt="Intro Right Image">
                                </div>
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label class="form-label small text-muted">Badge Icon</label>
                                        <input type="file" name="finance_intro_badge2_icon" class="form-control" accept="image/*">
                                        <div class="img-preview-box mt-1" style="max-height: 70px;">
                                            <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_intro_badge2_icon', 'images/financial.svg') }}" style="max-height: 40px;" alt="Badge Icon">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small text-muted">Badge Label</label>
                                        <input type="text" name="finance_intro_badge2_text" class="form-control" value="{{ $settings['finance_intro_badge2_text'] ?? 'Financial Services' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h6 class="fw-bold text-dark mt-4 mb-3 border-bottom pb-2">Background Overlay Text & Bottom Description</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Background Big Text - Line 1 (Gray)</label>
                            <input type="text" name="finance_intro_bg_line1" class="form-control" value="{{ $settings['finance_intro_bg_line1'] ?? 'Financial' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Background Big Text - Line 2 (Green)</label>
                            <input type="text" name="finance_intro_bg_line2" class="form-control" value="{{ $settings['finance_intro_bg_line2'] ?? 'Services' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Bottom Paragraph (HTML allowed e.g. &lt;strong&gt;)</label>
                            <textarea name="finance_intro_bottom_desc" rows="3" class="form-control">{{ $settings['finance_intro_bottom_desc'] ?? 'Roy Infinity Edge Consulting is a comprehensive <strong>financial services firm dedicated to empowering businesses</strong> of all sizes achieve their financial goals.' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. CORE SERVICES (8 CARDS) -->
        <div class="tab-pane fade" id="services-pane" role="tabpanel">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-list-check text-success me-2"></i> Core Services Section Header</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Section Title</label>
                            <input type="text" name="finance_services_title" class="form-control" value="{{ $settings['finance_services_title'] ?? 'Our Services' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Section Subtitle</label>
                            <input type="text" name="finance_services_subtitle" class="form-control" value="{{ $settings['finance_services_subtitle'] ?? 'Because every rupee saved is a step toward growth.' }}">
                        </div>
                    </div>
                </div>
            </div>

            @php
                $coreServices = [
                    1 => ['title' => 'Financial Reporting & Analysis', 'theme' => 'lime-card', 'default_img' => 'images/Financial-Reporting-Analysis.png', 'desc' => 'We provide comprehensive financial reporting and analysis, including:', 'points' => 'Detailed Project Reports (DPR) for securing funding or tenders | Financial statements prepared to legal standards | CMA Data and financial analysis for loan applications'],
                    2 => ['title' => 'Taxation', 'theme' => 'dark-card inverted', 'default_img' => 'images/Taxation.png', 'desc' => 'Our team of tax specialists ensures you remain compliant with all regulations while optimizing your tax position. Services include:', 'points' => 'Personal and corporate tax filings | Strategic tax planning to minimize liabilities | Assistance with tax assessments, appeals, and disputes'],
                    3 => ['title' => 'TDS Compliance', 'theme' => 'light-card', 'default_img' => 'images/Financial-Reporting-Analysis.png', 'desc' => 'Our experts ensure your business remains compliant with TDS regulations, including:', 'points' => 'Accurate calculation, deduction, and deposit of TDS as per applicable rules | Timely filing of quarterly TDS returns | Issuance of Form 16/16A certificates to employees and contractors'],
                    4 => ['title' => 'GST Compliance', 'theme' => 'lime-card inverted', 'default_img' => 'images/Taxation.png', 'desc' => 'We navigate the complexities of Goods and Services Tax (GST) for you, providing:', 'points' => 'GST registration and compliance assistance | Timely and accurate GST return filings | GST advisory to optimize your tax management | E-Way Billing & GST Audits & Services'],
                    5 => ['title' => 'Company Incorporation & Compliance', 'theme' => 'dark-card', 'default_img' => 'images/Financial-Reporting-Analysis.png', 'desc' => 'We guide you through the process of incorporating your business and ensure ongoing compliance with the Registrar of Companies (ROC). This includes:', 'points' => 'Company formation (LLP, Pvt. Ltd., etc.) | Filing of annual returns and financial statements | Company law advisory services'],
                    6 => ['title' => 'Compliance Management', 'theme' => 'light-card inverted', 'default_img' => 'images/Taxation.png', 'desc' => 'We help you stay compliant with various regulations:', 'points' => "Employee Provident Fund Organization (EPFO) & Employees' State Insurance Corporation (ESIC) registrations and contributions | Trade license applications and renewals | UDYAM & Professional Tax (P. Tax) registrations | Digital Signature Certificate (DSC) issuance for secure transactions"],
                    7 => ['title' => 'Financial Reporting & Analysis', 'theme' => 'lime-card', 'default_img' => 'images/Financial-Reporting-Analysis.png', 'desc' => 'We provide comprehensive financial reporting and analysis, including:', 'points' => 'Detailed Project Reports (DPR) for securing funding or tenders | Financial statements prepared to legal standards | CMA Data and financial analysis for loan applications'],
                    8 => ['title' => 'Strategic Support', 'theme' => 'dark-card inverted', 'default_img' => 'images/Taxation.png', 'desc' => 'Our team offers additional services to propel your business forward:', 'points' => 'Advance tax calculations to avoid penalties | Strategic tax planning for optimal financial outcomes | Comprehensive Intellectual Property (IP) including Trademark Registration, Patent Filing, Copyrights, Design Registration, IP Advisory, Infringement Support, and International IP Protection'],
                ];
            @endphp

            <div class="row g-4">
                @foreach($coreServices as $num => $info)
                    <div class="col-lg-6">
                        <div class="admin-card h-100 mb-0">
                            <div class="admin-card-header d-flex justify-content-between align-items-center">
                                <h5><i class="fa-solid fa-folder-open text-primary me-2"></i> Service {{ $num }}: {{ $settings['finance_srv'.$num.'_title'] ?? $info['title'] }}</h5>
                                <span class="badge bg-secondary">{{ $info['theme'] }}</span>
                            </div>
                            <div class="admin-card-body">
                                <div class="mb-3">
                                    <label class="form-label">Service Title</label>
                                    <input type="text" name="finance_srv{{ $num }}_title" class="form-control" value="{{ $settings['finance_srv'.$num.'_title'] ?? $info['title'] }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Short Description</label>
                                    <textarea name="finance_srv{{ $num }}_desc" rows="2" class="form-control">{{ $settings['finance_srv'.$num.'_desc'] ?? $info['desc'] }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Bullet Points (Separate with <code>|</code>)</label>
                                    <small class="text-muted d-block mb-2">Separate each bullet point using <code>|</code>. If there are more than 3 points, "Learn more" will expand them on the live page.</small>
                                    <textarea name="finance_srv{{ $num }}_points" rows="4" class="form-control">{{ $settings['finance_srv'.$num.'_points'] ?? $info['points'] }}</textarea>
                                </div>
                                <div class="row g-2 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Tag Text</label>
                                        <input type="text" name="finance_srv{{ $num }}_tag" class="form-control" value="{{ $settings['finance_srv'.$num.'_tag'] ?? 'Financial' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Tag Link URL</label>
                                        <input type="text" name="finance_srv{{ $num }}_tag_url" class="form-control" value="{{ $settings['finance_srv'.$num.'_tag_url'] ?? '#' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Button Text</label>
                                        <input type="text" name="finance_srv{{ $num }}_btn_text" class="form-control" value="{{ $settings['finance_srv'.$num.'_btn_text'] ?? 'Learn more' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Button Link URL</label>
                                        <input type="text" name="finance_srv{{ $num }}_btn_url" class="form-control" value="{{ $settings['finance_srv'.$num.'_btn_url'] ?? '#' }}">
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label">Card Illustration / Image</label>
                                    <input type="file" name="finance_srv{{ $num }}_img" class="form-control" accept="image/*">
                                    <div class="img-preview-box mt-2">
                                        <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_srv'.$num.'_img', $info['default_img']) }}" alt="Service {{ $num }} Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 4. ADDITIONAL SERVICES -->
        <div class="tab-pane fade" id="additional-pane" role="tabpanel">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-cube text-info me-2"></i> Additional Services Section Header & Left Banner</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Section Title</label>
                            <input type="text" name="finance_add_title" class="form-control" value="{{ $settings['finance_add_title'] ?? 'Additional Services' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Section Subtitle</label>
                            <input type="text" name="finance_add_subtitle" class="form-control" value="{{ $settings['finance_add_subtitle'] ?? 'Because every rupee saved is a step toward growth.' }}">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="form-label">Left Tall Banner Graphic / Image</label>
                            <input type="file" name="finance_add_left_img" class="form-control" accept="image/*">
                            <div class="img-preview-box mt-2">
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_add_left_img', 'images/additional-left.png') }}" alt="Additional Services Graphic">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @php
                $additionalServices = [
                    1 => ['title' => 'FSSAI License', 'desc' => 'We assist food businesses with acquiring and renewing their Food Safety and Standards Authority of India (FSSAI) license, ensuring compliance with safety standards.'],
                    2 => ['title' => 'RERA Registration', 'desc' => 'Our experts provide support for Real Estate Regulatory Authority (RERA) registration, ensuring your real estate projects adhere to legal requirements.'],
                    3 => ['title' => 'Stock Audit', 'desc' => 'We conduct thorough stock audits to help you maintain accurate inventory records, identify discrepancies, and ensure optimal stock levels.'],
                    4 => ['title' => 'Import Export Code (IEC) Registration', 'desc' => 'We assist businesses in obtaining IEC registration for engaging in international trade, ensuring compliance with export-import regulations'],
                    5 => ['title' => 'FCRA Registration', 'desc' => 'For NGOs and associations receiving foreign contributions, we provide Foreign Contribution (Regulation) Act (FCRA) registration and compliance services.'],
                    6 => ['title' => 'MSME/SSI Registration', 'desc' => 'We help small businesses and micro-enterprises obtain MSME (Micro, Small & Medium Enterprises) registration to avail government schemes and benefits.'],
                    7 => ['title' => 'CE (Clinical Establishment) License', 'desc' => 'We provide Clinical Establishment Licensing services obtaining compliance, application preparation, inspections, policies, training, and ongoing support for regulatory changes and renewals.'],
                ];
            @endphp

            <div class="row g-4">
                @foreach($additionalServices as $addNum => $addInfo)
                    <div class="col-md-6 col-lg-4">
                        <div class="admin-card h-100 mb-0">
                            <div class="admin-card-header">
                                <h5><i class="fa-solid fa-stamp text-warning me-2"></i> Card {{ $addNum }}</h5>
                            </div>
                            <div class="admin-card-body">
                                <div class="mb-3">
                                    <label class="form-label">Service Title</label>
                                    <input type="text" name="finance_add{{ $addNum }}_title" class="form-control" value="{{ $settings['finance_add'.$addNum.'_title'] ?? $addInfo['title'] }}">
                                </div>
                                <div>
                                    <label class="form-label">Description</label>
                                    <textarea name="finance_add{{ $addNum }}_desc" rows="4" class="form-control">{{ $settings['finance_add'.$addNum.'_desc'] ?? $addInfo['desc'] }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- 5. CTA BANNER & META -->
        <div class="tab-pane fade" id="cta-pane" role="tabpanel">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-globe text-primary me-2"></i> Page Meta Title & Bottom CTA</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3 mb-4">
                        <div class="col-12">
                            <label class="form-label">Browser Page Title (&lt;title&gt;)</label>
                            <input type="text" name="finance_meta_title" class="form-control" value="{{ $settings['finance_meta_title'] ?? 'Finance & Taxation | Roy Infinity Edge Consulting' }}">
                        </div>
                    </div>

                    <h6 class="fw-bold text-dark mb-3 border-bottom pb-2">Bottom CTA Banner</h6>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">CTA Banner Heading</label>
                            <input type="text" name="finance_cta_title" class="form-control" value="{{ $settings['finance_cta_title'] ?? 'Ready to Contact with us ?' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">CTA Button Text</label>
                            <input type="text" name="finance_cta_btn_text" class="form-control" value="{{ $settings['finance_cta_btn_text'] ?? 'Get Started' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">CTA Button Link URL</label>
                            <input type="text" name="finance_cta_btn_url" class="form-control" value="{{ $settings['finance_cta_btn_url'] ?? '#contact' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 6. EDGE ACCOUNTS NETWORK SECTION -->
        <div class="tab-pane fade" id="edge-pane" role="tabpanel">
            
            {{-- Header & Branding --}}
            <div class="admin-card mb-4">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-gem text-success me-2"></i> Network Header, Branding &amp; Images</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Top Badge Text</label>
                            <input type="text" name="finance_edge_badge_text" class="form-control" value="{{ $settings['finance_edge_badge_text'] ?? 'A Product of Vriddhi Edge' }}">
                            <small class="text-muted">Displays inside the top pill badge.</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Subtitle / Tagline</label>
                            <input type="text" name="finance_edge_subtitle" class="form-control" value="{{ $settings['finance_edge_subtitle'] ?? 'Accounting Expertise. On Demand.' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Brand Title Prefix (Bold)</label>
                            <input type="text" name="finance_edge_title_bold" class="form-control" value="{{ $settings['finance_edge_title_bold'] ?? 'EDGE' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Brand Title Suffix (Light)</label>
                            <input type="text" name="finance_edge_title_light" class="form-control" value="{{ $settings['finance_edge_title_light'] ?? 'Accounts Network' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Lead Description</label>
                            <textarea name="finance_edge_lead_desc" rows="2" class="form-control">{{ $settings['finance_edge_lead_desc'] ?? 'A professional online accounting network connecting credible accounting professionals with businesses that need reliable accounting support.' }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Left Vertical Banner Text (Multiline)</label>
                            <textarea name="finance_edge_side_tag" rows="3" class="form-control">{{ $settings['finance_edge_side_tag'] ?? "YOUR\nSKILLS\nCAN CREATE\nMORE\nOPPORTUNITIES" }}</textarea>
                            <small class="text-muted">Each line will wrap vertically on the left banner.</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Right Decorative Script Accent (Multiline)</label>
                            <textarea name="finance_edge_script_accent" rows="3" class="form-control">{{ $settings['finance_edge_script_accent'] ?? "Skills\nMeet\nOpportunity" }}</textarea>
                            <small class="text-muted">Stylish script accent on the right side.</small>
                        </div>

                        {{-- Logo Upload --}}
                        <div class="col-md-6 mt-4">
                            <label class="form-label fw-bold">Vriddhi Edge Logo (Used in badge, footer &amp; popup)</label>
                            <input type="file" name="finance_edge_vriddhi_logo" class="form-control" accept="image/*">
                            <div class="img-preview-box mt-2 p-2 bg-light rounded text-center">
                                <span class="d-block small text-muted mb-1">Current Logo Preview:</span>
                                <img src="{{ \App\Models\SiteSetting::getImageUrl('finance_edge_vriddhi_logo', 'images/vriddhi-edge-logo.png') }}" alt="Vriddhi Edge Logo" style="max-height: 55px; width: auto; object-fit: contain;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Dual Cards Configuration --}}
            <div class="row g-4 mb-4">
                {{-- Left: Professionals Card --}}
                <div class="col-lg-6">
                    <div class="admin-card h-100 mb-0">
                        <div class="admin-card-header bg-success-subtle">
                            <h5 class="text-success"><i class="fa-solid fa-user-graduate me-2"></i> Left Card: For Accounting Professionals</h5>
                        </div>
                        <div class="admin-card-body">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Card Title (Multiline)</label>
                                <textarea name="finance_edge_pro_title" rows="2" class="form-control">{{ $settings['finance_edge_pro_title'] ?? "FOR ACCOUNTING\nPROFESSIONALS" }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Card Subtitle</label>
                                <input type="text" name="finance_edge_pro_subtitle" class="form-control" value="{{ $settings['finance_edge_pro_subtitle'] ?? 'Your Expertise. Your Profile. Your Opportunities.' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Checklist Items (One item per line)</label>
                                <textarea name="finance_edge_pro_points" rows="6" class="form-control">{{ $settings['finance_edge_pro_points'] ?? "Create your professional profile\nShowcase your skills, experience & areas of expertise\nDiscover relevant accounting assignments\nChoose suitable clients and engagements\nWork remotely on project-based or ongoing assignments\nBuild an additional source of professional income" }}</textarea>
                                <small class="text-muted">Enter each bullet point on a new line.</small>
                            </div>
                            <div>
                                <label class="form-label fw-bold">Button CTA Text</label>
                                <input type="text" name="finance_edge_pro_btn_text" class="form-control" value="{{ $settings['finance_edge_pro_btn_text'] ?? 'Login / Submit Your Profile' }}">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right: Businesses Card --}}
                <div class="col-lg-6">
                    <div class="admin-card h-100 mb-0">
                        <div class="admin-card-header bg-primary-subtle">
                            <h5 class="text-primary"><i class="fa-solid fa-building-user me-2"></i> Right Card: For Businesses</h5>
                        </div>
                        <div class="admin-card-body">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Card Title</label>
                                <input type="text" name="finance_edge_biz_title" class="form-control" value="{{ $settings['finance_edge_biz_title'] ?? 'FOR BUSINESSES' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Card Subtitle</label>
                                <input type="text" name="finance_edge_biz_subtitle" class="form-control" value="{{ $settings['finance_edge_biz_subtitle'] ?? 'Find Accounting Support Online.' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Card Short Description</label>
                                <textarea name="finance_edge_biz_desc" rows="2" class="form-control">{{ $settings['finance_edge_biz_desc'] ?? 'Get access to suitable accounting professionals without the commitment and overhead of hiring a full-time accountant.' }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Checklist Items (One item per line)</label>
                                <textarea name="finance_edge_biz_points" rows="5" class="form-control">{{ $settings['finance_edge_biz_points'] ?? "Submit your accounting assignment details\nSpecify your requirements and scope of work\nMention your Expected Budget / Professional Fees (Approx.)\nConnect with suitable accounting professionals\nEngage for project-based or ongoing accounting work" }}</textarea>
                                <small class="text-muted">Enter each bullet point on a new line.</small>
                            </div>
                            <div>
                                <label class="form-label fw-bold">Button CTA Text</label>
                                <input type="text" name="finance_edge_biz_btn_text" class="form-control" value="{{ $settings['finance_edge_biz_btn_text'] ?? 'Submit Your Requirement' }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Center Badge, Values Bar & Footer Strip --}}
            <div class="admin-card mb-4">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-award text-warning me-2"></i> Center Badge, Value Strip &amp; Footer Text</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Center Infinity Badge Text (Multiline)</label>
                            <textarea name="finance_edge_center_text" rows="2" class="form-control">{{ $settings['finance_edge_center_text'] ?? "TWO SIDES\nONE EDGE" }}</textarea>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label fw-bold">Values Bar - Tagline</label>
                            <input type="text" name="finance_edge_val_tagline" class="form-control mb-2" value="{{ $settings['finance_edge_val_tagline'] ?? 'A network designed to create value for both professionals and businesses.' }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label fw-bold">Value 1 (Left)</label>
                            <input type="text" name="finance_edge_val1" class="form-control" value="{{ $settings['finance_edge_val1'] ?? 'Credible Professionals' }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Value 2 (Middle)</label>
                            <input type="text" name="finance_edge_val2" class="form-control" value="{{ $settings['finance_edge_val2'] ?? 'Relevant Opportunities' }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Value 3 (Right)</label>
                            <input type="text" name="finance_edge_val3" class="form-control" value="{{ $settings['finance_edge_val3'] ?? 'Flexible Accounting Support' }}">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label class="form-label fw-bold">Footer Strip Quote</label>
                            <textarea name="finance_edge_foot_quote" rows="2" class="form-control">{{ $settings['finance_edge_foot_quote'] ?? 'Not every skilled accounting professional has access to the right clients. And not every business needs — or wants — the cost of a full-time accountant.' }}</textarea>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label class="form-label fw-bold">Footer Powered By Organization</label>
                            <input type="text" name="finance_edge_foot_powered" class="form-control mb-2" value="{{ $settings['finance_edge_foot_powered'] ?? 'Roy Infinity Edge Consulting' }}">
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Bottom Floating Save Bar -->
    <div class="d-flex justify-content-end mt-4">
        <button type="submit" class="btn btn-primary-admin px-5 py-2 fs-6 shadow">
            <i class="fa-solid fa-floppy-disk me-2"></i> Save All Changes
        </button>
    </div>
</form>
@endsection
