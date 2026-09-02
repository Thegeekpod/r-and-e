<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class PlacementSettingsSeeder extends Seeder
{
    /**
     * Seed default Placement page content into site_settings.
     * Uses updateOrCreate so existing values are maintained.
     */
    public function run(): void
    {
        $settings = [
            // ---------------------------------------------------------------
            // Hero Feature Section
            // ---------------------------------------------------------------
            ['key' => 'placement_hero_heading',      'value' => 'Connecting talent with the right opportunities.', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_hero_subheading',   'value' => 'Doctor Recruitment, Hospital Staffing, Healthcare Jobs, and Corporate Placement Support.', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_hero_btn_text',     'value' => 'Get In Touch', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_hero_btn_url',      'value' => '#contact', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_hero_img_graphics', 'value' => 'images/man2-graphics.webp', 'type' => 'image', 'group' => 'placement'],
            ['key' => 'placement_hero_img_person',   'value' => 'images/man-2.webp', 'type' => 'image', 'group' => 'placement'],

            // ---------------------------------------------------------------
            // About Edge Hire Section
            // ---------------------------------------------------------------
            ['key' => 'placement_about_title',       'value' => 'About Edge Hire', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_about_banner_text', 'value' => 'Edge Hire is the Recruitment, Staffing, Workforce Solutions & Healthcare Consultancy Division of Roy Infinity Edge Consulting.', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_about_logo',        'value' => 'images/edgehire.webp', 'type' => 'image', 'group' => 'placement'],
            ['key' => 'placement_about_p1',          'value' => 'We are committed to connecting businesses with skilled professionals while creating meaningful employment opportunities for job seekers, freelancers, consultants, and remote professionals across India.', 'type' => 'textarea', 'group' => 'placement'],
            ['key' => 'placement_about_p2',          'value' => 'Our expertise extends beyond traditional recruitment. We provide workforce solutions, healthcare consultancy, institutional manpower support, freelance professional networks, and technology-driven employment services designed to meet the evolving needs of employers and professionals.', 'type' => 'textarea', 'group' => 'placement'],
            ['key' => 'placement_about_p3',          'value' => 'Our vision is to build a unified workforce ecosystem where employers, institutions, hospitals, and professionals can collaborate through one trusted platform.', 'type' => 'textarea', 'group' => 'placement'],
            ['key' => 'placement_about_network_img', 'value' => 'images/placement-01.webp', 'type' => 'image', 'group' => 'placement'],

            // ---------------------------------------------------------------
            // View Current Jobs Section
            // ---------------------------------------------------------------
            ['key' => 'placement_jobs_title',        'value' => 'View Current jobs', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_jobs_subtitle',     'value' => 'Because every rupee saved is a step toward growth.', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_jobs_btn_text',     'value' => 'View More Jobs', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_jobs_btn_url',      'value' => '#', 'type' => 'text', 'group' => 'placement'],

            // ---------------------------------------------------------------
            // Our Business Model Section
            // ---------------------------------------------------------------
            ['key' => 'placement_biz_title',        'value' => 'Our Business Model', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_biz_subtitle',     'value' => 'Edge Hire operates as an integrated workforce solutions platform that supports businesses at every stage of talent acquisition and workforce management.', 'type' => 'textarea', 'group' => 'placement'],
            ['key' => 'placement_biz_items',        'value' => 'Permanent Recruitment|Executive Search|Hospital Consultancy|Finance & Accounts Freelancer Network|Contract & Temporary Staffing|Healthcare Workforce Solutions|Academic Manpower Solutions|Remote & Home-Based Employment', 'type' => 'textarea', 'group' => 'placement'],

            // ---------------------------------------------------------------
            // Our Business Verticals Section
            // ---------------------------------------------------------------
            ['key' => 'placement_verticals_title',  'value' => 'Our Business Verticals', 'type' => 'text', 'group' => 'placement'],

            // Vertical 1
            ['key' => 'placement_v1_title',          'value' => 'Recruitment & Talent Acquisition', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_v1_desc',           'value' => 'We provide end-to-end recruitment solutions across multiple industries, helping organisations identify, evaluate, and recruit qualified professionals for permanent, contractual, temporary, project-based, and executive positions.', 'type' => 'textarea', 'group' => 'placement'],
            ['key' => 'placement_v1_sub_title',     'value' => 'Our Recruitment Services', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_v1_services',      'value' => 'Permanent Recruitment|Contract Staffing|Temporary Staffing|Payroll Staffing|Executive Search|Campus Recruitment|Bulk Hiring|Project-Based Hiring Recruitment|Process Outsourcing (RPO)|HR Outsourcing|Workforce Planning', 'type' => 'textarea', 'group' => 'placement'],
            ['key' => 'placement_v1_btn_text',      'value' => 'Industries We Serve', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_v1_img',           'value' => 'images/placement-02.webp', 'type' => 'image', 'group' => 'placement'],

            // Vertical 2
            ['key' => 'placement_v2_title',          'value' => 'Healthcare Workforce Solutions & Hospital Consultancy', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_v2_desc1',          'value' => 'Healthcare is one of Edge Hire\'s strongest areas of expertise.', 'type' => 'textarea', 'group' => 'placement'],
            ['key' => 'placement_v2_desc2',          'value' => 'We support hospitals, nursing colleges, medical colleges, clinics, diagnostic centres, rehabilitation centres, and healthcare organisations with recruitment, manpower planning, and consultancy services.', 'type' => 'textarea', 'group' => 'placement'],
            ['key' => 'placement_v2_btn_text',      'value' => 'Healthcare Recruitment', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_v2_img',           'value' => 'images/placement-03.webp', 'type' => 'image', 'group' => 'placement'],

            // Vertical 3
            ['key' => 'placement_v3_title',          'value' => 'Academic & Institutional Workforce Solutions', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_v3_desc',           'value' => 'Through our extensive academic network, we provide workforce solutions for Nursing Colleges, Medical Colleges, Universities, Healthcare Institutions, and Educational Organisations.', 'type' => 'textarea', 'group' => 'placement'],
            ['key' => 'placement_v3_btn_text',      'value' => 'Services', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_v3_img',           'value' => 'images/placement-04.webp', 'type' => 'image', 'group' => 'placement'],

            // ---------------------------------------------------------------
            // Future Initiatives Section
            // ---------------------------------------------------------------
            ['key' => 'placement_future_title',     'value' => 'Future Initiatives', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_future_subtitle',  'value' => 'To strengthen India\'s workforce ecosystem, Edge Hire is expanding into:', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_future_items',     'value' => 'Digital Job Portal|Healthcare Workforce Exchange|Finance Freelancer Marketplace|Remote Work Network|Employer Subscription Platform|Skill Verification Services|Professional Background Verification|Interview Preparation & Employability Programmes|Integration with Siksha Pathik Academy|Integration with Vriddhi Edge Finance Network', 'type' => 'textarea', 'group' => 'placement'],
            ['key' => 'placement_future_bg_img',    'value' => 'images/placement-05.webp', 'type' => 'image', 'group' => 'placement'],

            // ---------------------------------------------------------------
            // Why Partner with Edge Hire Section
            // ---------------------------------------------------------------
            ['key' => 'placement_partner_title',    'value' => 'Why Partner with Edge Hire?', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_partner_items',    'value' => 'Pan-India Recruitment Network|Dedicated Healthcare & Education|Multi-Industry Recruitment Solutions|Hospital & Medical College Consultancy|Faculty & Academic Workforce Support|Finance & Accounts Freelancer Network|Remote & Home-Based Employment|Digital Employment Platform (Coming Soon)|Experienced Professional Network|One Trusted Workforce Solutions Partner', 'type' => 'textarea', 'group' => 'placement'],

            // ---------------------------------------------------------------
            // Our Vision Section
            // ---------------------------------------------------------------
            ['key' => 'placement_vision_title',     'value' => 'Our Vision', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_vision_desc',      'value' => 'To become India\'s most trusted workforce solutions platform by connecting employers, institutions, hospitals, freelancers, and professionals through recruitment, staffing, healthcare consultancy, digital employment, and technology-driven talent solutions.', 'type' => 'textarea', 'group' => 'placement'],
            ['key' => 'placement_vision_btn_text',  'value' => 'See more', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_vision_btn_url',   'value' => '#', 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_vision_bg_img',   'value' => 'images/placement-06.webp', 'type' => 'image', 'group' => 'placement'],

            // ---------------------------------------------------------------
            // Our Brand Promise Section
            // ---------------------------------------------------------------
            ['key' => 'placement_promise_title',    'value' => "Our Brand\nPromise", 'type' => 'text', 'group' => 'placement'],
            ['key' => 'placement_promise_quote',    'value' => '"Empowering Talent. Enabling Businesses. Strengthening Institutions. Transforming India\'s Workforce."', 'type' => 'textarea', 'group' => 'placement'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                [
                    'value' => $setting['value'],
                    'type'  => $setting['type'],
                    'group' => $setting['group'],
                ]
            );
        }
    }
}
