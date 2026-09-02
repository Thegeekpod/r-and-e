<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class AboutSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // Hero Section
            ['key' => 'about_hero_badge', 'value' => 'About Roy Infinity Edge', 'type' => 'text', 'group' => 'about'],
            ['key' => 'about_hero_title', 'value' => 'Empowering Futures Across Finance, Education & Talent Placement', 'type' => 'text', 'group' => 'about'],
            ['key' => 'about_hero_subtitle', 'value' => 'We are an integrated multi-disciplinary consulting organization committed to driving sustainable growth, institutional strength, and professional success across India.', 'type' => 'textarea', 'group' => 'about'],
            ['key' => 'about_hero_image', 'value' => 'images/man-1.webp', 'type' => 'image', 'group' => 'about'],

            // Company Story Section
            ['key' => 'about_story_heading', 'value' => 'Who We Are & Our Legacy', 'type' => 'text', 'group' => 'about'],
            ['key' => 'about_story_content_p1', 'value' => 'Roy Infinity Edge Consulting was established with a singular vision: to bridge critical gaps in financial management, academic admissions, and professional recruitment under one trusted corporate roof.', 'type' => 'textarea', 'group' => 'about'],
            ['key' => 'about_story_content_p2', 'value' => 'With deep industry expertise across taxation compliance, nursing & medical college admissions, and pan-India hospital staffing, we empower businesses, students, and healthcare institutions to excel with confidence.', 'type' => 'textarea', 'group' => 'about'],
            ['key' => 'about_story_img', 'value' => 'images/Financial-1.webp', 'type' => 'image', 'group' => 'about'],
            ['key' => 'about_exp_years', 'value' => '12+', 'type' => 'text', 'group' => 'about'],
            ['key' => 'about_exp_label', 'value' => 'Years of Consulting Excellence', 'type' => 'text', 'group' => 'about'],

            // Mission & Vision Section
            ['key' => 'about_mission_title', 'value' => 'Our Mission', 'type' => 'text', 'group' => 'about'],
            ['key' => 'about_mission_desc', 'value' => 'To deliver ethical, accurate, and seamless consulting services in taxation, academic admissions, and talent acquisition, helping individuals and enterprises navigate complex landscapes with complete peace of mind.', 'type' => 'textarea', 'group' => 'about'],
            ['key' => 'about_vision_title', 'value' => 'Our Vision', 'type' => 'text', 'group' => 'about'],
            ['key' => 'about_vision_desc', 'value' => "To become India's most trusted multi-sector consulting ecosystem, celebrated for institutional integrity, healthcare workforce innovation, and financial empowerment.", 'type' => 'textarea', 'group' => 'about'],

            // Core Values
            ['key' => 'about_value1_title', 'value' => 'Uncompromising Integrity', 'type' => 'text', 'group' => 'about'],
            ['key' => 'about_value1_desc', 'value' => 'Complete transparency and ethical standards in every tax filing, college admission, and hiring process.', 'type' => 'textarea', 'group' => 'about'],
            ['key' => 'about_value2_title', 'value' => 'Sectoral Expertise', 'type' => 'text', 'group' => 'about'],
            ['key' => 'about_value2_desc', 'value' => 'Specialized knowledge in Healthcare recruitment, INC/WBNC compliance, and corporate finance.', 'type' => 'textarea', 'group' => 'about'],
            ['key' => 'about_value3_title', 'value' => 'Client-Centric Dedication', 'type' => 'text', 'group' => 'about'],
            ['key' => 'about_value3_desc', 'value' => 'Tailored strategic guidance designed to address unique business challenges and career goals.', 'type' => 'textarea', 'group' => 'about'],
            ['key' => 'about_value4_title', 'value' => 'Continuous Innovation', 'type' => 'text', 'group' => 'about'],
            ['key' => 'about_value4_desc', 'value' => 'Leveraging digital employment tools, automated workflows, and modern financial reporting.', 'type' => 'textarea', 'group' => 'about'],

            // Stats Counters
            ['key' => 'about_stat1_number', 'value' => '500+', 'type' => 'text', 'group' => 'about'],
            ['key' => 'about_stat1_label', 'value' => 'Corporate Clients Served', 'type' => 'text', 'group' => 'about'],
            ['key' => 'about_stat2_number', 'value' => '1,200+', 'type' => 'text', 'group' => 'about'],
            ['key' => 'about_stat2_label', 'value' => 'Successful Admissions', 'type' => 'text', 'group' => 'about'],
            ['key' => 'about_stat3_number', 'value' => '2,500+', 'type' => 'text', 'group' => 'about'],
            ['key' => 'about_stat3_label', 'value' => 'Healthcare Placements', 'type' => 'text', 'group' => 'about'],
            ['key' => 'about_stat4_number', 'value' => '99.8%', 'type' => 'text', 'group' => 'about'],
            ['key' => 'about_stat4_label', 'value' => 'Client Satisfaction Rate', 'type' => 'text', 'group' => 'about'],
        ];

        foreach ($settings as $s) {
            SiteSetting::updateOrCreate(
                ['key' => $s['key']],
                $s
            );
        }
    }
}
