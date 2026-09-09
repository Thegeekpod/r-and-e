<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class ContactSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // -------------------------------------------------------------
            // Hero Section
            // -------------------------------------------------------------
            ['key' => 'contact_hero_badge',           'value' => 'Get In Touch',                                                                                                                                           'type' => 'text',     'group' => 'contact'],
            ['key' => 'contact_hero_title',           'value' => "Let's Start a",                                                                                                                                          'type' => 'text',     'group' => 'contact'],
            ['key' => 'contact_hero_title_highlight', 'value' => 'Conversation.',                                                                                                                                         'type' => 'text',     'group' => 'contact'],
            ['key' => 'contact_hero_subtitle',        'value' => 'Whether you require taxation advisory, college admission guidance, or healthcare talent recruitment, our consultants are here to assist you every step of the way.', 'type' => 'textarea', 'group' => 'contact'],

            // -------------------------------------------------------------
            // 3 Quick Cards
            // -------------------------------------------------------------
            ['key' => 'contact_card1_title',          'value' => 'Call Our Specialists',                                                    'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_card1_subtitle',       'value' => 'Mon - Sat from 9:00 AM to 7:00 PM',                                       'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_card1_phone',          'value' => '(406) 555-0120',                                                          'type' => 'text', 'group' => 'contact'],

            ['key' => 'contact_card2_title',          'value' => 'Send Us an Email',                                                        'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_card2_subtitle',       'value' => 'Our team replies within 24 business hours.',                              'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_card2_email',          'value' => 'hey@forestin.com',                                                        'type' => 'text', 'group' => 'contact'],

            ['key' => 'contact_card3_title',          'value' => 'Main Headquarters',                                                       'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_card3_subtitle',       'value' => 'Visit our corporate consultation office.',                                 'type' => 'text', 'group' => 'contact'],
            ['key' => 'contact_card3_address',        'value' => '2972 Westheimer Rd. Santa Ana, Illinois 85486',                          'type' => 'textarea', 'group' => 'contact'],

            // -------------------------------------------------------------
            // Form Intro Box
            // -------------------------------------------------------------
            ['key' => 'contact_form_title',           'value' => 'Send Us a Message',                                                       'type' => 'text',     'group' => 'contact'],
            ['key' => 'contact_form_intro',           'value' => 'Fill in your inquiry details below and a dedicated consultant will get in touch with you shortly.', 'type' => 'textarea', 'group' => 'contact'],

            // -------------------------------------------------------------
            // "Why Connect With Us?" Info Panel
            // -------------------------------------------------------------
            ['key' => 'contact_info_title',           'value' => 'Why Connect With Us?',                                                    'type' => 'text',     'group' => 'contact'],
            ['key' => 'contact_info_desc',            'value' => 'At Roy Infinity Edge Consulting, we offer integrated solutions across Finance, Education, and Healthcare HR under one trusted roof.', 'type' => 'textarea', 'group' => 'contact'],

            ['key' => 'contact_feat1_title',          'value' => 'Transparent & Confidential',                                              'type' => 'text',     'group' => 'contact'],
            ['key' => 'contact_feat1_desc',           'value' => 'Every consultation is handled with strict confidentiality and transparent guidance.', 'type' => 'textarea', 'group' => 'contact'],

            ['key' => 'contact_feat2_title',          'value' => 'Multi-Disciplinary Specialists',                                          'type' => 'text',     'group' => 'contact'],
            ['key' => 'contact_feat2_desc',           'value' => 'Certified accountants, experienced admission counsellors, and corporate recruiters.', 'type' => 'textarea', 'group' => 'contact'],

            ['key' => 'contact_feat3_title',          'value' => 'Dedicated Relationship Manager',                                          'type' => 'text',     'group' => 'contact'],
            ['key' => 'contact_feat3_desc',           'value' => 'End-to-end assistance from initial consultation to final outcome.',       'type' => 'textarea', 'group' => 'contact'],

            ['key' => 'contact_hours_title',          'value' => 'Working Hours',                                                           'type' => 'text',     'group' => 'contact'],
            ['key' => 'contact_hours_text',           'value' => "Monday - Saturday: 9:00 AM - 7:00 PM\nSunday: Closed",                    'type' => 'textarea', 'group' => 'contact'],

            // -------------------------------------------------------------
            // Bottom Queries Section
            // -------------------------------------------------------------
            ['key' => 'contact_queries_heading',      'value' => 'If You Have any Queries',                                                 'type' => 'text',     'group' => 'contact'],
            ['key' => 'contact_queries_highlight',    'value' => 'Feel Free To Ask !',                                                      'type' => 'text',     'group' => 'contact'],
            ['key' => 'contact_queries_card_title',   'value' => 'Ask Question',                                                            'type' => 'text',     'group' => 'contact'],
            ['key' => 'contact_queries_card_subtitle','value' => 'If you have Any Queries Feel Free To ask !',                             'type' => 'text',     'group' => 'contact'],
        ];

        foreach ($settings as $s) {
            // firstOrCreate ensures existing user custom data is NEVER overwritten
            SiteSetting::firstOrCreate(
                ['key' => $s['key']],
                $s
            );
        }
    }
}
