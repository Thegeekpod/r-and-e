<?php

namespace Database\Seeders;

use App\Models\SeoSetting;
use Illuminate\Database\Seeder;

class SeoSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seoEntries = [
            [
                'page_url'         => '/',
                'meta_title'       => 'Roy Infinity Edge Consulting | Finance, Education, Placement',
                'meta_description' => 'Roy Infinity Edge Consulting provides premier multidisciplinary consulting across Finance & Taxation, College Education Consultancy, and Healthcare Job Placements.',
                'other_scripts'    => null,
            ],
            [
                'page_url'         => '/about',
                'meta_title'       => 'About Us | Roy Infinity Edge Consulting',
                'meta_description' => 'Learn more about Roy Infinity Edge Consulting, our leadership, core values, mission, and dedication to delivering top-tier strategic consulting across India.',
                'other_scripts'    => null,
            ],
            [
                'page_url'         => '/finance',
                'meta_title'       => 'Finance & Taxation Services | Roy Infinity Edge Consulting',
                'meta_description' => 'Expert financial planning, corporate tax returns, GST filings, DPR project reports, and strategic business consulting with Roy Infinity Edge.',
                'other_scripts'    => null,
            ],
            [
                'page_url'         => '/education',
                'meta_title'       => 'Education Consultancy & College Admissions | Roy Infinity Edge Consulting',
                'meta_description' => 'Discover top medical, nursing, paramedical, and engineering college admissions guidance with expert career counselors at Roy Infinity Edge.',
                'other_scripts'    => null,
            ],
            [
                'page_url'         => '/placement',
                'meta_title'       => 'Job Placement & Hospital Staffing Solutions | Roy Infinity Edge Consulting',
                'meta_description' => 'Strategic talent recruitment for healthcare, doctors, nursing staff, corporate, and finance professionals across leading national organizations.',
                'other_scripts'    => null,
            ],
            [
                'page_url'         => '/jobs',
                'meta_title'       => 'Current Job Openings & Career Opportunities | Roy Infinity Edge',
                'meta_description' => 'Browse and apply for the latest verified job openings in hospitals, healthcare clinics, corporate firms, and accounting institutions.',
                'other_scripts'    => null,
            ],
            [
                'page_url'         => '/blog',
                'meta_title'       => 'Insights & Articles | Roy Infinity Edge Consulting',
                'meta_description' => 'Explore expert insights on tax planning, GST filings, higher education admissions, and healthcare staffing recruitment from Roy Infinity Edge.',
                'other_scripts'    => null,
            ],
            [
                'page_url'         => '/contact',
                'meta_title'       => 'Contact Us | Roy Infinity Edge Consulting',
                'meta_description' => 'Get in touch with Roy Infinity Edge Consulting team for tailored financial advisory, educational admissions, or recruitment solutions.',
                'other_scripts'    => null,
            ],
        ];

        foreach ($seoEntries as $entry) {
            SeoSetting::updateOrCreate(
                ['page_url' => $entry['page_url']],
                $entry
            );
        }
    }
}
