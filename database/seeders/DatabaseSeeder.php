<?php

namespace Database\Seeders;

use App\Models\ClientPartner;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name'     => 'Administrator',
                'password' => Hash::make('password'),
            ]
        );

        // 2. Default Site Settings (Home Page)
        $settings = [
            // General / Header / Footer
            ['key' => 'site_title', 'value' => 'Roy Infinity Edge Consulting | Finance, Education, Placement', 'type' => 'text', 'group' => 'general'],
            ['key' => 'site_logo', 'value' => 'images/logo.webp', 'type' => 'image', 'group' => 'general'],
            ['key' => 'contact_phone', 'value' => '(406) 555-0120', 'type' => 'text', 'group' => 'general'],
            ['key' => 'contact_email', 'value' => 'hey@forestin.com', 'type' => 'text', 'group' => 'general'],
            ['key' => 'contact_address', 'value' => '2972 Westheimer Rd. Santa Ana, Illinois 85486', 'type' => 'textarea', 'group' => 'general'],
            ['key' => 'footer_about', 'value' => 'We offers a comprehensive suite of digital marketing services that cover all aspects of our online presence. From SEO and social media marketing to content creations and PPC advertising, they have the expertise and resources to handle our diverse marketing needs.', 'type' => 'textarea', 'group' => 'general'],
            ['key' => 'social_facebook', 'value' => '#', 'type' => 'text', 'group' => 'general'],
            ['key' => 'social_twitter', 'value' => '#', 'type' => 'text', 'group' => 'general'],
            ['key' => 'social_linkedin', 'value' => '#', 'type' => 'text', 'group' => 'general'],
            ['key' => 'social_instagram', 'value' => '#', 'type' => 'text', 'group' => 'general'],

            // Hero Section
            ['key' => 'hero_title_line1', 'value' => 'One Partner.', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_title_line2', 'value' => 'Infinite Solutions.', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_subtitle', 'value' => 'Expert Consulting in Finance, Education & Placement', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_btn1_text', 'value' => 'Explore Services', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_btn1_url', 'value' => '#services', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_btn2_text', 'value' => 'Book Consultation', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_btn2_url', 'value' => '#consultation', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_arrow_img', 'value' => 'images/arrow.png', 'type' => 'image', 'group' => 'hero'],
            ['key' => 'hero_stat1_label', 'value' => 'Downloads', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_stat1_value', 'value' => '432K+', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_stat2_label', 'value' => 'User', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_stat2_value', 'value' => '200K+', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_stat3_label', 'value' => 'Community', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_stat3_value', 'value' => '20K+', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_growth_arrow_img', 'value' => 'images/angle-arrow.webp', 'type' => 'image', 'group' => 'hero'],
            ['key' => 'hero_trust_count', 'value' => '230+', 'type' => 'text', 'group' => 'hero'],
            ['key' => 'hero_trust_text', 'value' => 'some big companies that we work with, and trust us very much', 'type' => 'textarea', 'group' => 'hero'],
            ['key' => 'hero_banner2_img', 'value' => 'images/banner-2.webp', 'type' => 'image', 'group' => 'hero'],

            // Bottom Banner
            ['key' => 'bottom_banner_text', 'value' => 'Finance & Taxation | Education Consultancy | Job Placement services', 'type' => 'text', 'group' => 'hero'],

            // About & 3 Services
            ['key' => 'about_heading_prefix', 'value' => 'About Roy', 'type' => 'text', 'group' => 'about'],
            ['key' => 'about_heading_highlight', 'value' => 'Infinity Edge', 'type' => 'text', 'group' => 'about'],
            ['key' => 'about_heading_suffix', 'value' => 'Consulting', 'type' => 'text', 'group' => 'about'],
            ['key' => 'about_subtitle', 'value' => 'Your Trusted Partner in Finance, Education, and Recruitment Solutions.', 'type' => 'text', 'group' => 'about'],

            // Service 1: Finance
            ['key' => 'service1_title', 'value' => 'Finance & Taxation', 'type' => 'text', 'group' => 'about'],
            ['key' => 'service1_img', 'value' => 'images/finance.webp', 'type' => 'image', 'group' => 'about'],
            ['key' => 'service1_points', 'value' => "Taxation & Compliance\nBusiness Advisory\nGST & Accounting\nExplore Finance Services", 'type' => 'textarea', 'group' => 'about'],
            ['key' => 'service1_btn_text', 'value' => 'Explore Finance Services', 'type' => 'text', 'group' => 'about'],
            ['key' => 'service1_btn_url', 'value' => '/finance', 'type' => 'text', 'group' => 'about'],

            // Service 2: Education
            ['key' => 'service2_title', 'value' => 'Education Consultancy', 'type' => 'text', 'group' => 'about'],
            ['key' => 'service2_img', 'value' => 'images/eduction.webp', 'type' => 'image', 'group' => 'about'],
            ['key' => 'service2_points', 'value' => "College Admissions\nNursing & Medical Courses\nINC & WBNC Assistance\nExplore Education Services", 'type' => 'textarea', 'group' => 'about'],
            ['key' => 'service2_btn_text', 'value' => 'Explore Education Services', 'type' => 'text', 'group' => 'about'],
            ['key' => 'service2_btn_url', 'value' => '/education', 'type' => 'text', 'group' => 'about'],

            // Service 3: Placement
            ['key' => 'service3_title', 'value' => 'Job Placement Services', 'type' => 'text', 'group' => 'about'],
            ['key' => 'service3_img', 'value' => 'images/job.webp', 'type' => 'image', 'group' => 'about'],
            ['key' => 'service3_points', 'value' => "Doctor Recruitment\nHospital Staffing\nHealthcare Jobs\nExplore Placement Portal", 'type' => 'textarea', 'group' => 'about'],
            ['key' => 'service3_btn_text', 'value' => 'Explore Placement Services', 'type' => 'text', 'group' => 'about'],
            ['key' => 'service3_btn_url', 'value' => '#', 'type' => 'text', 'group' => 'about'],

            // Feature Section 1: Taxation
            ['key' => 'feat_tax_title_line1', 'value' => 'Turning financial complexity', 'type' => 'text', 'group' => 'taxation'],
            ['key' => 'feat_tax_title_line2', 'value' => 'into', 'type' => 'text', 'group' => 'taxation'],
            ['key' => 'feat_tax_title_highlight', 'value' => 'confident success.', 'type' => 'text', 'group' => 'taxation'],
            ['key' => 'feat_tax_subtitle', 'value' => 'Because every rupee saved is a step toward growth.', 'type' => 'text', 'group' => 'taxation'],
            ['key' => 'feat_tax_card_title', 'value' => 'Where smart taxation meets smarter business growth.', 'type' => 'text', 'group' => 'taxation'],
            ['key' => 'feat_tax_card_desc', 'value' => "We don't just manage taxes — we maximize your potential.", 'type' => 'textarea', 'group' => 'taxation'],
            ['key' => 'feat_tax_btn_text', 'value' => 'Learn More', 'type' => 'text', 'group' => 'taxation'],
            ['key' => 'feat_tax_btn_url', 'value' => '/finance', 'type' => 'text', 'group' => 'taxation'],
            ['key' => 'feat_tax_img_graphics', 'value' => 'images/man-1-graphics.webp', 'type' => 'image', 'group' => 'taxation'],
            ['key' => 'feat_tax_img_person', 'value' => 'images/man-1.webp', 'type' => 'image', 'group' => 'taxation'],

            // Queries Section
            ['key' => 'queries_title_line1', 'value' => 'If You Have any Queries', 'type' => 'text', 'group' => 'queries'],
            ['key' => 'queries_title_highlight', 'value' => 'Feel Free To Ask !', 'type' => 'text', 'group' => 'queries'],
            ['key' => 'queries_card_title', 'value' => 'Ask Question', 'type' => 'text', 'group' => 'queries'],
            ['key' => 'queries_card_subtitle', 'value' => 'If you have Any Queries Feel Free To ask !', 'type' => 'text', 'group' => 'queries'],
            ['key' => 'queries_placeholder', 'value' => 'Type............', 'type' => 'text', 'group' => 'queries'],

            // Feature Section 2: Education
            ['key' => 'feat_edu_title_line1', 'value' => 'Guiding you to the right', 'type' => 'text', 'group' => 'education'],
            ['key' => 'feat_edu_title_line2', 'value' => 'college, the right way.', 'type' => 'text', 'group' => 'education'],
            ['key' => 'feat_edu_subtitle', 'value' => 'Expert guidance for the right college choice.', 'type' => 'text', 'group' => 'education'],
            ['key' => 'feat_edu_card_title', 'value' => 'Choose the right college with us.', 'type' => 'text', 'group' => 'education'],
            ['key' => 'feat_edu_card_desc', 'value' => 'Choose smart. Choose the right college.', 'type' => 'textarea', 'group' => 'education'],
            ['key' => 'feat_edu_btn_text', 'value' => 'Learn More', 'type' => 'text', 'group' => 'education'],
            ['key' => 'feat_edu_btn_url', 'value' => '/education', 'type' => 'text', 'group' => 'education'],
            ['key' => 'feat_edu_img_graphics', 'value' => 'images/woment-graphics.webp', 'type' => 'image', 'group' => 'education'],
            ['key' => 'feat_edu_img_person', 'value' => 'images/woment.webp', 'type' => 'image', 'group' => 'education'],
            ['key' => 'feat_edu_brochure_text', 'value' => "To Know More\nDownload\nOur Brochure", 'type' => 'textarea', 'group' => 'education'],
            ['key' => 'feat_edu_brochure_qr', 'value' => 'images/qr-code.png', 'type' => 'image', 'group' => 'education'],

            // Feature Section 3: Placement
            ['key' => 'feat_place_title_line1', 'value' => 'Strategic placements for', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'feat_place_title_highlight', 'value' => 'ambitious professionals.', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'feat_place_subtitle', 'value' => 'Because every rupee saved is a step toward growth.', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'feat_place_card_title', 'value' => 'Connecting talent with the right opportunities.', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'feat_place_card_desc', 'value' => 'Your career starts with the right placement.', 'type' => 'textarea', 'group' => 'placement'],
            ['key' => 'feat_place_btn_text', 'value' => 'Learn More', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'feat_place_btn_url', 'value' => '#', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'feat_place_img_graphics', 'value' => 'images/man2-graphics.webp', 'type' => 'image', 'group' => 'placement'],
            ['key' => 'feat_place_img_person', 'value' => 'images/man-2.webp', 'type' => 'image', 'group' => 'placement'],

            // CTA Banner Section
            ['key' => 'cta_title', 'value' => 'Ready to Contact with us ?', 'type' => 'text', 'group' => 'cta'],
            ['key' => 'cta_btn_text', 'value' => 'Get Started', 'type' => 'text', 'group' => 'cta'],
            ['key' => 'cta_btn_url', 'value' => '#contact', 'type' => 'text', 'group' => 'cta'],

            // Testimonials Section Header
            ['key' => 'testimonials_heading_prefix', 'value' => 'Testimonials By', 'type' => 'text', 'group' => 'testimonials'],
            ['key' => 'testimonials_heading_highlight', 'value' => 'Our Clients', 'type' => 'text', 'group' => 'testimonials'],
            ['key' => 'testimonials_subtitle', 'value' => "Begin planning your child's career at the right time with internationally recognised career psychologists", 'type' => 'textarea', 'group' => 'testimonials'],

            // Clients Section Header
            ['key' => 'clients_heading', 'value' => 'Our Valuable Clients', 'type' => 'text', 'group' => 'clients'],
            ['key' => 'clients_subtitle', 'value' => 'Supported By', 'type' => 'text', 'group' => 'clients'],

            // ==========================================
            // FINANCE PAGE SETTINGS
            // ==========================================
            // Page Meta & Hero Section
            ['key' => 'finance_meta_title', 'value' => 'Finance & Taxation | Roy Infinity Edge Consulting', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_hero_title', 'value' => 'Where smart taxation meets smarter business growth.', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_hero_subtitle', 'value' => "We don't just manage taxes — we maximize your potential.", 'type' => 'textarea', 'group' => 'finance'],
            ['key' => 'finance_hero_btn_text', 'value' => 'Learn More', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_hero_btn_url', 'value' => '#services', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_hero_img_graphics', 'value' => 'images/man-1-graphics.webp', 'type' => 'image', 'group' => 'finance'],
            ['key' => 'finance_hero_img_person', 'value' => 'images/man-1.webp', 'type' => 'image', 'group' => 'finance'],

            // Introduction Section
            ['key' => 'finance_intro_title', 'value' => 'Introduction', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_intro_text1', 'value' => 'Roy Infinity Edge Consulting is a comprehensive <strong>financial services firm dedicated to empowering businesses</strong> of all sizes achieve their financial goals.', 'type' => 'textarea', 'group' => 'finance'],
            ['key' => 'finance_intro_text2', 'value' => 'We offer a wide range of expert services, from compliance and bookkeeping to strategic tax planning and growth support.', 'type' => 'textarea', 'group' => 'finance'],
            ['key' => 'finance_intro_img1', 'value' => 'images/Financial-1.webp', 'type' => 'image', 'group' => 'finance'],
            ['key' => 'finance_intro_badge1', 'value' => 'Financial', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_intro_img2', 'value' => 'images/Financial-2.webp', 'type' => 'image', 'group' => 'finance'],
            ['key' => 'finance_intro_badge2_icon', 'value' => 'images/financial.svg', 'type' => 'image', 'group' => 'finance'],
            ['key' => 'finance_intro_badge2_text', 'value' => 'Financial Services', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_intro_bg_line1', 'value' => 'Financial', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_intro_bg_line2', 'value' => 'Services', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_intro_bottom_desc', 'value' => 'Roy Infinity Edge Consulting is a comprehensive <strong>financial services firm dedicated to empowering businesses</strong> of all sizes achieve their financial goals.', 'type' => 'textarea', 'group' => 'finance'],

            // Core Services Section Header
            ['key' => 'finance_services_title', 'value' => 'Our Services', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_services_subtitle', 'value' => 'Because every rupee saved is a step toward growth.', 'type' => 'textarea', 'group' => 'finance'],

            // Service 1: Financial Reporting & Analysis
            ['key' => 'finance_srv1_title', 'value' => 'Financial Reporting & Analysis', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv1_desc', 'value' => 'We provide comprehensive financial reporting and analysis, including:', 'type' => 'textarea', 'group' => 'finance'],
            ['key' => 'finance_srv1_points', 'value' => 'Detailed Project Reports (DPR) for securing funding or tenders | Financial statements prepared to legal standards | CMA Data and financial analysis for loan applications', 'type' => 'textarea', 'group' => 'finance'],
            ['key' => 'finance_srv1_tag', 'value' => 'Financial', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv1_tag_url', 'value' => '#', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv1_btn_text', 'value' => 'Learn more', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv1_btn_url', 'value' => '#', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv1_img', 'value' => 'images/Financial-Reporting-Analysis.png', 'type' => 'image', 'group' => 'finance'],

            // Service 2: Taxation
            ['key' => 'finance_srv2_title', 'value' => 'Taxation', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv2_desc', 'value' => 'Our team of tax specialists ensures you remain compliant with all regulations while optimizing your tax position. Services include:', 'type' => 'textarea', 'group' => 'finance'],
            ['key' => 'finance_srv2_points', 'value' => 'Personal and corporate tax filings | Strategic tax planning to minimize liabilities | Assistance with tax assessments, appeals, and disputes', 'type' => 'textarea', 'group' => 'finance'],
            ['key' => 'finance_srv2_tag', 'value' => 'Financial', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv2_tag_url', 'value' => '#', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv2_btn_text', 'value' => 'Learn more', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv2_btn_url', 'value' => '#', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv2_img', 'value' => 'images/Taxation.png', 'type' => 'image', 'group' => 'finance'],

            // Service 3: TDS Compliance
            ['key' => 'finance_srv3_title', 'value' => 'TDS Compliance', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv3_desc', 'value' => 'Our experts ensure your business remains compliant with TDS regulations, including:', 'type' => 'textarea', 'group' => 'finance'],
            ['key' => 'finance_srv3_points', 'value' => 'Accurate calculation, deduction, and deposit of TDS as per applicable rules | Timely filing of quarterly TDS returns | Issuance of Form 16/16A certificates to employees and contractors', 'type' => 'textarea', 'group' => 'finance'],
            ['key' => 'finance_srv3_tag', 'value' => 'Financial', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv3_tag_url', 'value' => '#', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv3_btn_text', 'value' => 'Learn more', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv3_btn_url', 'value' => '#', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv3_img', 'value' => 'images/Financial-Reporting-Analysis.png', 'type' => 'image', 'group' => 'finance'],

            // Service 4: GST Compliance
            ['key' => 'finance_srv4_title', 'value' => 'GST Compliance', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv4_desc', 'value' => 'We navigate the complexities of Goods and Services Tax (GST) for you, providing:', 'type' => 'textarea', 'group' => 'finance'],
            ['key' => 'finance_srv4_points', 'value' => 'GST registration and compliance assistance | Timely and accurate GST return filings | GST advisory to optimize your tax management | E-Way Billing & GST Audits & Services', 'type' => 'textarea', 'group' => 'finance'],
            ['key' => 'finance_srv4_tag', 'value' => 'Financial', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv4_tag_url', 'value' => '#', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv4_btn_text', 'value' => 'Learn more', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv4_btn_url', 'value' => '#', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv4_img', 'value' => 'images/Taxation.png', 'type' => 'image', 'group' => 'finance'],

            // Service 5: Company Incorporation & Compliance
            ['key' => 'finance_srv5_title', 'value' => 'Company Incorporation & Compliance:', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv5_desc', 'value' => 'We guide you through the process of incorporating your business and ensure ongoing compliance with the Registrar of Companies (ROC). This includes:', 'type' => 'textarea', 'group' => 'finance'],
            ['key' => 'finance_srv5_points', 'value' => 'Company formation (LLP, Pvt. Ltd., etc.) | Filing of annual returns and financial statements | Company law advisory services', 'type' => 'textarea', 'group' => 'finance'],
            ['key' => 'finance_srv5_tag', 'value' => 'Financial', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv5_tag_url', 'value' => '#', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv5_btn_text', 'value' => 'Learn more', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv5_btn_url', 'value' => '#', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv5_img', 'value' => 'images/Financial-Reporting-Analysis.png', 'type' => 'image', 'group' => 'finance'],

            // Service 6: Compliance Management
            ['key' => 'finance_srv6_title', 'value' => 'Compliance Management', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv6_desc', 'value' => 'We help you stay compliant with various regulations:', 'type' => 'textarea', 'group' => 'finance'],
            ['key' => 'finance_srv6_points', 'value' => "Employee Provident Fund Organization (EPFO) & Employees' State Insurance Corporation (ESIC) registrations and contributions | Trade license applications and renewals | UDYAM & Professional Tax (P. Tax) registrations | Digital Signature Certificate (DSC) issuance for secure transactions", 'type' => 'textarea', 'group' => 'finance'],
            ['key' => 'finance_srv6_tag', 'value' => 'Financial', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv6_tag_url', 'value' => '#', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv6_btn_text', 'value' => 'Learn more', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv6_btn_url', 'value' => '#', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv6_img', 'value' => 'images/Taxation.png', 'type' => 'image', 'group' => 'finance'],

            // Service 7: Financial Reporting & Analysis (Second Block)
            ['key' => 'finance_srv7_title', 'value' => 'Financial Reporting & Analysis', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv7_desc', 'value' => 'We provide comprehensive financial reporting and analysis, including:', 'type' => 'textarea', 'group' => 'finance'],
            ['key' => 'finance_srv7_points', 'value' => 'Detailed Project Reports (DPR) for securing funding or tenders | Financial statements prepared to legal standards | CMA Data and financial analysis for loan applications', 'type' => 'textarea', 'group' => 'finance'],
            ['key' => 'finance_srv7_tag', 'value' => 'Financial', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv7_tag_url', 'value' => '#', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv7_btn_text', 'value' => 'Learn more', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv7_btn_url', 'value' => '#', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv7_img', 'value' => 'images/Financial-Reporting-Analysis.png', 'type' => 'image', 'group' => 'finance'],

            // Service 8: Strategic Support
            ['key' => 'finance_srv8_title', 'value' => 'Strategic Support', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv8_desc', 'value' => 'Our team offers additional services to propel your business forward:', 'type' => 'textarea', 'group' => 'finance'],
            ['key' => 'finance_srv8_points', 'value' => 'Advance tax calculations to avoid penalties | Strategic tax planning for optimal financial outcomes | Comprehensive Intellectual Property (IP) including Trademark Registration, Patent Filing, Copyrights, Design Registration, IP Advisory, Infringement Support, and International IP Protection', 'type' => 'textarea', 'group' => 'finance'],
            ['key' => 'finance_srv8_tag', 'value' => 'Financial', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv8_tag_url', 'value' => '#', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv8_btn_text', 'value' => 'Learn more', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv8_btn_url', 'value' => '#', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_srv8_img', 'value' => 'images/Taxation.png', 'type' => 'image', 'group' => 'finance'],

            // Additional Services Section
            ['key' => 'finance_add_title', 'value' => 'Additional Services', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_add_subtitle', 'value' => 'Because every rupee saved is a step toward growth.', 'type' => 'textarea', 'group' => 'finance'],
            ['key' => 'finance_add_left_img', 'value' => 'images/additional-left.png', 'type' => 'image', 'group' => 'finance'],

            ['key' => 'finance_add1_title', 'value' => 'FSSAI License', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_add1_desc', 'value' => 'We assist food businesses with acquiring and renewing their Food Safety and Standards Authority of India (FSSAI) license, ensuring compliance with safety standards.', 'type' => 'textarea', 'group' => 'finance'],

            ['key' => 'finance_add2_title', 'value' => 'RERA Registration', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_add2_desc', 'value' => 'Our experts provide support for Real Estate Regulatory Authority (RERA) registration, ensuring your real estate projects adhere to legal requirements.', 'type' => 'textarea', 'group' => 'finance'],

            ['key' => 'finance_add3_title', 'value' => 'Stock Audit', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_add3_desc', 'value' => 'We conduct thorough stock audits to help you maintain accurate inventory records, identify discrepancies, and ensure optimal stock levels.', 'type' => 'textarea', 'group' => 'finance'],

            ['key' => 'finance_add4_title', 'value' => 'Import Export Code (IEC) Registration', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_add4_desc', 'value' => 'We assist businesses in obtaining IEC registration for engaging in international trade, ensuring compliance with export-import regulations', 'type' => 'textarea', 'group' => 'finance'],

            ['key' => 'finance_add5_title', 'value' => 'FCRA Registration', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_add5_desc', 'value' => 'For NGOs and associations receiving foreign contributions, we provide Foreign Contribution (Regulation) Act (FCRA) registration and compliance services.', 'type' => 'textarea', 'group' => 'finance'],

            ['key' => 'finance_add6_title', 'value' => 'MSME/SSI Registration', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_add6_desc', 'value' => 'We help small businesses and micro-enterprises obtain MSME (Micro, Small & Medium Enterprises) registration to avail government schemes and benefits.', 'type' => 'textarea', 'group' => 'finance'],

            ['key' => 'finance_add7_title', 'value' => 'CE (Clinical Establishment) License', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_add7_desc', 'value' => 'We provide Clinical Establishment Licensing services obtaining compliance, application preparation, inspections, policies, training, and ongoing support for regulatory changes and renewals.', 'type' => 'textarea', 'group' => 'finance'],

            // CTA Banner
            ['key' => 'finance_cta_title', 'value' => 'Ready to Contact with us ?', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_cta_btn_text', 'value' => 'Get Started', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_cta_btn_url', 'value' => '#contact', 'type' => 'text', 'group' => 'finance'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }

        // 3. Default Testimonials
        $testimonials = [
            [
                'name'      => 'Priti Varma Sarin',
                'role'      => 'Student',
                'review'    => 'We have had perhaps the best experience of getting our children counselled for their career with the psychologist at Tera Parichay. She was...',
                'rating'    => 5,
                'avatar'    => 'images/avatar-1.png',
                'theme'     => 'dark',
                'order'     => 1,
                'is_active' => true,
            ],
            [
                'name'      => 'Kavya Sethi',
                'role'      => 'Student',
                'review'    => 'My experience with counsellors at Tera Parichay, has been absolutely phenomenal. During the final years of my schooling, life had a lot of tough decision...',
                'rating'    => 5,
                'avatar'    => 'images/avatar-2.png',
                'theme'     => 'lime',
                'order'     => 2,
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(['name' => $t['name']], $t);
        }

        // 4. Default Clients
        $clients = [
            ['name' => 'Broadridge', 'logo' => 'images/clients/broadridge.svg', 'order' => 1, 'is_active' => true],
            ['name' => 'Deloitte.', 'logo' => 'images/clients/deloitte.svg', 'order' => 2, 'is_active' => true],
            ['name' => 'ERM', 'logo' => 'images/clients/erm.svg', 'order' => 3, 'is_active' => true],
            ['name' => 'Nasdaq', 'logo' => 'images/clients/nasdaq.svg', 'order' => 4, 'is_active' => true],
            ['name' => 'S&P Global', 'logo' => 'images/clients/spglobal.svg', 'order' => 5, 'is_active' => true],
            ['name' => 'DFIN', 'logo' => 'images/clients/dfin.svg', 'order' => 6, 'is_active' => true],
            ['name' => 'KPMG', 'logo' => 'images/clients/kpmg.svg', 'order' => 7, 'is_active' => true],
            ['name' => 'PwC', 'logo' => 'images/clients/pwc.svg', 'order' => 8, 'is_active' => true],
        ];

        foreach ($clients as $c) {
            ClientPartner::updateOrCreate(['name' => $c['name']], $c);
        }
    }
}
