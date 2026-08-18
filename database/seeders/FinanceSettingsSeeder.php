<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class FinanceSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Intro Section
            ['key' => 'finance_intro_title', 'value' => 'Finance & Taxation', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_intro_heading', 'value' => 'Fueling Your Financial Growth and Ensuring Regulatory Compliance', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_intro_desc', 'value' => 'Managing finances and navigating complex tax laws can be challenging. We provide comprehensive financial and taxation services tailored to individuals, startups, and established enterprises. Our team of experienced professionals helps you maintain financial health, ensure regulatory compliance, and optimize your tax strategies for sustained growth.', 'type' => 'textarea', 'group' => 'finance'],
            ['key' => 'finance_intro_img_left', 'value' => 'images/Finance-1.png', 'type' => 'image', 'group' => 'finance'],
            ['key' => 'finance_intro_img_right', 'value' => 'images/Finance-2.png', 'type' => 'image', 'group' => 'finance'],
            ['key' => 'finance_intro_badge1', 'value' => 'Grow up your Business', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_intro_badge2_count', 'value' => '400+', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_intro_badge2_text', 'value' => 'Tax Audit Completed', 'type' => 'text', 'group' => 'finance'],
            ['key' => 'finance_intro_badge2_icon', 'value' => 'images/badge.webp', 'type' => 'image', 'group' => 'finance'],
            ['key' => 'finance_intro_bottom_text', 'value' => 'At Roy Infinity Edge, we provide tailored financial strategies and expert tax solutions to help businesses and individuals thrive with confidence.', 'type' => 'textarea', 'group' => 'finance'],

            // Core Services Section
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
    }
}
