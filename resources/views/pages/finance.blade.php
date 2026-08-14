@extends('layouts.app')

@section('title', 'Finance & Taxation | Roy Infinity Edge Consulting')

@section('content')
<section class="taxation-feature-section pt-100">
    <div class="container">
        <div class="taxation-card" data-aos="zoom-in-up">
            <div class="taxation-card-content" data-aos="fade-right" data-aos-delay="300"
                data-aos-anchor-placement="center-bottom">
                <h2>Where smart taxation meets smarter business growth.</h2>
                <p>We don't just manage taxes — we maximize your potential.</p>
                <a href="#services" class="btn-learn-more">Learn More</a>
            </div>
            <div class="taxation-card-image">
                <img src="{{ asset('images/man-1-graphics.webp') }}" class="animate" alt="Smart Taxation" />
                <img src="{{ asset('images/man-1.webp') }}" alt="Smart Taxation" />
            </div>
        </div>
    </div>
</section>

<section class="intro-section pt-100">
    <div class="container">
        <h2 class="intro-title" data-aos="fade-up">Introduction</h2>
        <div class="intro-top-grid" data-aos="fade-up" data-aos-delay="200">
            <div class="intro-top-text">
                <p>Roy Infinity Edge Consulting is a comprehensive <strong>financial services firm dedicated to
                        empowering businesses</strong> of all sizes achieve their financial goals.</p>
            </div>
            <div class="intro-top-text">
                <p>We offer a wide range of expert services, from compliance and bookkeeping to strategic tax
                    planning and growth support.</p>
            </div>
        </div>

        <div class="intro-visual-container" data-aos="zoom-in" data-aos-delay="400">
            <div class="intro-img-left-wrapper">
                <img src="{{ asset('images/Financial-1.webp') }}" alt="Financial 1" class="intro-img-left">
                <div class="intro-badge-green">Financial</div>
            </div>
            <div class="intro-img-right-wrapper">
                <img src="{{ asset('images/Financial-2.webp') }}" alt="Financial 2" class="intro-img-right">
                <div class="intro-badge-white">
                    <img src="{{ asset('images/financial.svg') }}" alt="">
                    <span>Financial Services</span>
                </div>
            </div>
        </div>

        <div class="intro-bottom-content" data-aos="fade-up" data-aos-delay="600">
            <div class="intro-bg-text">
                <h2 class="bg-text-gray">Financial</h2>
                <div class="intro-bottom-row">
                    <h2 class="bg-text-green">Services</h2>
                    <div class="intro-bottom-desc">
                        <p>Roy Infinity Edge Consulting is a comprehensive <strong>financial services firm
                                dedicated to empowering businesses</strong> of all sizes achieve their financial
                            goals.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services-section" id="services">
    <div class="container">
        <div class="services-header" data-aos="fade-up">
            <h2>Our Services</h2>
            <p>Because every rupee saved is a step toward growth.</p>
        </div>

        <div class="services-grid">
            <!-- 1. Financial Reporting & Analysis -->
            <div class="service-row lime-card" data-aos="fade-up">
                <div class="service-image">
                    <img src="{{ asset('images/Financial-Reporting-Analysis.png') }}" alt="Financial Reporting & Analysis">
                </div>
                <div class="service-content">
                    <h3 class="highlight-title">Financial Reporting & Analysis</h3>
                    <p>We provide comprehensive financial reporting and analysis, including:</p>
                    <ul>
                        <li>Detailed Project Reports (DPR) for securing funding or tenders</li>
                        <li>Financial statements prepared to legal standards</li>
                        <li>CMA Data and financial analysis for loan applications</li>
                    </ul>
                    <div class="service-actions">
                        <a href="#" class="btn-service-dark">Financial</a>
                        <a href="#" class="btn-learn-more-round">
                            <img src="{{ asset('images/right-uparrow.svg') }}" alt="arrow">
                            Learn more
                        </a>
                    </div>
                </div>
            </div>

            <!-- 2. Taxation -->
            <div class="service-row dark-card inverted" data-aos="fade-up">
                <div class="service-content">
                    <h3 class="highlight-title">Taxation</h3>
                    <p>Our team of tax specialists ensures you remain compliant with all regulations while
                        optimizing your tax position. Services include:</p>
                    <ul>
                        <li>Personal and corporate tax filings</li>
                        <li>Strategic tax planning to minimize liabilities</li>
                        <li>Assistance with tax assessments, appeals, and disputes</li>
                    </ul>
                    <div class="service-actions">
                        <a href="#" class="btn-learn-more-round">
                            <img src="{{ asset('images/right-uparrowwhite.svg') }}" alt="arrow">
                            Learn more
                        </a>
                        <a href="#" class="btn-service-green">Financial</a>
                    </div>
                </div>
                <div class="service-image">
                    <img src="{{ asset('images/Taxation.png') }}" alt="Taxation">
                </div>
            </div>

            <!-- 3. TDS Compliance -->
            <div class="service-row light-card" data-aos="fade-up">
                <div class="service-image">
                    <img src="{{ asset('images/Financial-Reporting-Analysis.png') }}" alt="TDS Compliance">
                </div>
                <div class="service-content">
                    <h3 class="highlight-title">TDS Compliance</h3>
                    <p>Our experts ensure your business remains compliant with TDS regulations, including:</p>
                    <ul>
                        <li>Accurate calculation, deduction, and deposit of TDS as per applicable rules</li>
                        <li>Timely filing of quarterly TDS returns</li>
                        <li>Issuance of Form 16/16A certificates to employees and contractors</li>
                    </ul>
                    <div class="service-actions">
                        <a href="#" class="btn-service-dark">Financial</a>
                        <a href="#" class="btn-learn-more-round">
                            <img src="{{ asset('images/right-uparrow.svg') }}" alt="arrow">
                            Learn more
                        </a>
                    </div>
                </div>
            </div>

            <!-- 4. GST Compliance -->
            <div class="service-row lime-card inverted" data-aos="fade-up">
                <div class="service-content">
                    <h3 class="highlight-title">GST Compliance</h3>
                    <p>We navigate the complexities of Goods and Services Tax (GST) for you, providing:</p>
                    <ul>
                        <li>GST registration and compliance assistance</li>
                        <li>Timely and accurate GST return filings</li>
                        <li>GST advisory to optimize your tax management</li>
                        <li>E-Way Billing & GST Audits & Services</li>
                    </ul>
                    <div class="service-actions">
                        <a href="#" class="btn-learn-more-round">
                            <img src="{{ asset('images/right-uparrowwhite.svg') }}" alt="arrow">
                            Learn more
                        </a>
                        <a href="#" class="btn-service-dark">Financial</a>
                    </div>
                </div>
                <div class="service-image">
                    <img src="{{ asset('images/Taxation.png') }}" alt="GST Compliance">
                </div>
            </div>

            <!-- 5. Company Incorporation & Compliance -->
            <div class="service-row dark-card" data-aos="fade-up">
                <div class="service-image">
                    <img src="{{ asset('images/Financial-Reporting-Analysis.png') }}" alt="Company Incorporation">
                </div>
                <div class="service-content">
                    <h3 class="highlight-title">Company Incorporation & Compliance:</h3>
                    <p>We guide you through the process of incorporating your business and ensure ongoing
                        compliance with the Registrar of Companies (ROC). This includes:</p>
                    <ul>
                        <li>Company formation (LLP, Pvt. Ltd., etc.)</li>
                        <li>Filing of annual returns and financial statements</li>
                        <li>Company law advisory services</li>
                    </ul>
                    <div class="service-actions">
                        <a href="#" class="btn-service-green">Financial</a>
                        <a href="#" class="btn-learn-more-round">
                            <img src="{{ asset('images/right-uparrow.svg') }}" alt="arrow">
                            Learn more
                        </a>
                    </div>
                </div>
            </div>

            <!-- 6. Compliance Management -->
            <div class="service-row light-card inverted" data-aos="fade-up">
                <div class="service-content">
                    <h3 class="highlight-title">Compliance Management</h3>
                    <p>We help you stay compliant with various regulations:</p>
                    <ul>
                        <li>Employee Provident Fund Organization (EPFO) & Employees' State Insurance Corporation
                            (ESIC) registrations and contributions</li>
                        <li>Trade license applications and renewals</li>
                        <li>UDYAM & Professional Tax (P. Tax) registrations</li>
                        <li>Digital Signature Certificate (DSC) issuance for secure transactions</li>
                    </ul>
                    <div class="service-actions">
                        <a href="#" class="btn-learn-more-round">
                            <img src="{{ asset('images/right-uparrowwhite.svg') }}" alt="arrow">
                            Learn more
                        </a>
                        <a href="#" class="btn-service-dark">Financial</a>
                    </div>
                </div>
                <div class="service-image">
                    <img src="{{ asset('images/Taxation.png') }}" alt="Compliance Management">
                </div>
            </div>

            <!-- 7. Financial Reporting & Analysis -->
            <div class="service-row lime-card" data-aos="fade-up">
                <div class="service-image">
                    <img src="{{ asset('images/Financial-Reporting-Analysis.png') }}" alt="Financial Reporting & Analysis">
                </div>
                <div class="service-content">
                    <h3 class="highlight-title">Financial Reporting & Analysis</h3>
                    <p>We provide comprehensive financial reporting and analysis, including:</p>
                    <ul>
                        <li>Detailed Project Reports (DPR) for securing funding or tenders</li>
                        <li>Financial statements prepared to legal standards</li>
                        <li>CMA Data and financial analysis for loan applications</li>
                    </ul>
                    <div class="service-actions">
                        <a href="#" class="btn-service-dark">Financial</a>
                        <a href="#" class="btn-learn-more-round">
                            <img src="{{ asset('images/right-uparrow.svg') }}" alt="arrow">
                            Learn more
                        </a>
                    </div>
                </div>
            </div>

            <!-- 8. Strategic Support -->
            <div class="service-row dark-card inverted" data-aos="fade-up">
                <div class="service-content">
                    <h3 class="highlight-title">Strategic Support</h3>
                    <p>Our team offers additional services to propel your business forward:</p>
                    <ul>
                        <li>Advance tax calculations to avoid penalties</li>
                        <li>Strategic tax planning for optimal financial outcomes</li>
                        <li>Comprehensive Intellectual Property (IP) including Trademark Registration, Patent
                            Filing, Copyrights, Design Registration, IP Advisory, Infringement Support, and
                            International IP Protection</li>
                    </ul>
                    <div class="service-actions">
                        <a href="#" class="btn-learn-more-round">
                            <img src="{{ asset('images/right-uparrowwhite.svg') }}" alt="arrow">
                            Learn more
                        </a>
                        <a href="#" class="btn-service-green">Financial</a>
                    </div>
                </div>
                <div class="service-image">
                    <img src="{{ asset('images/Taxation.png') }}" alt="Strategic Support">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="additional-services-section">
    <div class="container">
        <div class="additional-header-banner" data-aos="fade-up">
            <div>
                <h2>Additional Services</h2>
                <p>Because every rupee saved is a step toward growth.</p>
            </div>

            <div class="additional-content-grid">
                <!-- FSSAI License -->
                <div class="additional-card bg-dark-green-v2" data-aos="zoom-in">
                    <h4>FSSAI License</h4>
                    <p>We assist food businesses with acquiring and renewing their Food Safety and Standards
                        Authority of India (FSSAI) license, ensuring compliance with safety standards.</p>
                </div>

                <!-- RERA Registration -->
                <div class="additional-card bg-lime-v2" data-aos="zoom-in">
                    <h4>RERA Registration</h4>
                    <p>Our experts provide support for Real Estate Regulatory Authority (RERA) registration,
                        ensuring your real estate projects adhere to legal requirements.</p>
                </div>
            </div>
        </div>

        <div class="additional-content-grid">
            <!-- Left Tall Image Box -->
            <div class="additional-left-box" data-aos="fade-right">
                <img src="{{ asset('images/additional-left.png') }}" alt="Financial background">
            </div>

            <!-- Stock Audit -->
            <div class="additional-card bg-light-v2" data-aos="zoom-in">
                <h4>Stock Audit</h4>
                <p>We conduct thorough stock audits to help you maintain accurate inventory records, identify
                    discrepancies, and ensure optimal stock levels.</p>
            </div>

            <!-- IEC Registration -->
            <div class="additional-card bg-black-v2" data-aos="zoom-in">
                <h4>Import Export Code (IEC) Registration</h4>
                <p>We assist businesses in obtaining IEC registration for engaging in international trade,
                    ensuring compliance with export-import regulations</p>
            </div>

            <!-- FCRA Registration -->
            <div class="additional-card bg-dark-green-v2" data-aos="zoom-in">
                <h4>FCRA Registration</h4>
                <p>For NGOs and associations receiving foreign contributions, we provide Foreign Contribution
                    (Regulation) Act (FCRA) registration and compliance services.</p>
            </div>

            <!-- MSME/SSI Registration -->
            <div class="additional-card bg-lime-v2" data-aos="zoom-in">
                <h4>MSME/SSI Registration</h4>
                <p>We help small businesses and micro-enterprises obtain MSME (Micro, Small & Medium
                    Enterprises) registration to avail government schemes and benefits.</p>
            </div>

            <!-- CE License -->
            <div class="additional-card bg-black-v2 card-ce-v2" data-aos="fade-up">
                <h4>CE (Clinical Establishment) License</h4>
                <p>We provide Clinical Establishment Licensing services obtaining compliance, application
                    preparation, inspections, policies, training, and ongoing support for regulatory changes and
                    renewals.</p>
            </div>
        </div>
    </div>
</section>

<section class="cta-banner-section" data-aos="zoom-in">
    <div class="container">
        <div class="cta-banner-card">
            <h2>Ready to Contact with us ?</h2>
            <a href="#contact" class="btn-get-started-white">Get Started <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</section>
@endsection
