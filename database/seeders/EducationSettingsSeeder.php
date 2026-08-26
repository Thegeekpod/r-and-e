<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class EducationSettingsSeeder extends Seeder
{
    /**
     * Seed default Education page content into site_settings.
     * Uses updateOrCreate so existing admin-saved values are NEVER overwritten.
     */
    public function run(): void
    {
        $settings = [
            // ---------------------------------------------------------------
            // Hero Feature Card
            // ---------------------------------------------------------------
            ['key' => 'edu_hero_heading',      'value' => 'Choose the right college with us.',   'type' => 'text',     'group' => 'education'],
            ['key' => 'edu_hero_subtitle',     'value' => 'Choose smart. Choose the right college.', 'type' => 'text', 'group' => 'education'],
            ['key' => 'edu_hero_btn_text',     'value' => 'Learn More',                           'type' => 'text',     'group' => 'education'],
            ['key' => 'edu_hero_btn_url',      'value' => '#business-model',                      'type' => 'text',     'group' => 'education'],
            ['key' => 'edu_hero_img_graphics', 'value' => 'images/woment-graphics.webp',          'type' => 'image',    'group' => 'education'],
            ['key' => 'edu_hero_img_person',   'value' => 'images/woment.webp',                   'type' => 'image',    'group' => 'education'],
            ['key' => 'edu_hero_brochure_text','value' => 'To Know More Download Our Brochure',   'type' => 'text',     'group' => 'education'],
            ['key' => 'edu_hero_qr_img',       'value' => 'images/qr-code.png',                  'type' => 'image',    'group' => 'education'],

            // ---------------------------------------------------------------
            // Business Model Section
            // ---------------------------------------------------------------
            ['key' => 'edu_biz_category_items',  'value' => 'Nursing|Pharmacy|Management|Medical',          'type' => 'text',     'group' => 'education'],
            ['key' => 'edu_biz_section_title',   'value' => 'Our Business Model',                           'type' => 'text',     'group' => 'education'],
            ['key' => 'edu_biz_section_subtitle','value' => 'Because every rupee saved is a step toward growth.', 'type' => 'text','group' => 'education'],
            ['key' => 'edu_siksha_logo',          'value' => 'images/sikshapathik.webp',                     'type' => 'image',    'group' => 'education'],

            // Business Model - Student card
            ['key' => 'edu_student_card_title', 'value' => 'For Students',     'type' => 'text', 'group' => 'education'],
            // Business Model - Institution card
            ['key' => 'edu_inst_card_title',    'value' => 'For Institutions', 'type' => 'text', 'group' => 'education'],
            // Business Model - App card
            ['key' => 'edu_app_card_title',     'value' => 'Sikha pratik App', 'type' => 'text', 'group' => 'education'],
            ['key' => 'edu_app_card_caption',   'value' => 'Coming Soon',      'type' => 'text', 'group' => 'education'],

            // ---------------------------------------------------------------
            // Detail Cards - Student & Institution cover items
            // ---------------------------------------------------------------
            ['key' => 'edu_student_cover_title', 'value' => 'What You Will Cover', 'type' => 'text', 'group' => 'education'],
            ['key' => 'edu_student_cover_items',
             'value' => "Career Counselling\nCourse Selection\nAdmission Guidance\nDocumentation/Loan Assistance\nRegistration Guidance\nPost-Passout Guidance\nPlacement via Edge Hire",
             'type' => 'textarea', 'group' => 'education'],

            ['key' => 'edu_inst_cover_title', 'value' => 'What You Will Cover', 'type' => 'text', 'group' => 'education'],
            ['key' => 'edu_inst_cover_items',
             'value' => "Academic Consultancy\nFaculty Assistance\nFaculty Recruitment\nWBNC / INC / WBUHS Support\nReciprocal / NRTS / NUID\nInspection Preparation\nInspection Coordination & Liaison\nLong-term Institutional Support",
             'type' => 'textarea', 'group' => 'education'],

            // ---------------------------------------------------------------
            // For Students Section - Admission Support
            // ---------------------------------------------------------------
            ['key' => 'edu_student_section_banner',   'value' => 'For Students',               'type' => 'text',     'group' => 'education'],
            ['key' => 'edu_student_support_title',    'value' => 'Student Admission Support',  'type' => 'text',     'group' => 'education'],
            ['key' => 'edu_student_support_img',      'value' => 'images/education-student.png', 'type' => 'image',  'group' => 'education'],
            ['key' => 'edu_student_support_desc',
             'value' => 'At Siksha Pathik, we believe that choosing the right course and institution is one of the most important decisions in a student\'s life. Our admission support is designed to provide students and parents with transparent, personalized, and end-to-end guidance throughout the admission journey. From identifying the right career path to completing admission formalities, our experienced counselling team assists students at every stage, ensuring informed decisions and a smooth admission experience.',
             'type' => 'textarea', 'group' => 'education'],

            // ---------------------------------------------------------------
            // Admission Journey
            // ---------------------------------------------------------------
            ['key' => 'edu_admission_journey_title',    'value' => 'Our Admission Journey',                            'type' => 'text',  'group' => 'education'],
            ['key' => 'edu_admission_journey_subtitle', 'value' => 'Because every rupee saved is a step toward growth.','type' => 'text',  'group' => 'education'],
            ['key' => 'edu_admission_journey_img',      'value' => 'images/education-01.webp',                         'type' => 'image', 'group' => 'education'],

            // ---------------------------------------------------------------
            // Academic Programmes We Facilitate
            // ---------------------------------------------------------------
            ['key' => 'edu_academic_prog_title',
             'value' => 'Academic Programmes We Facilitate',
             'type' => 'text', 'group' => 'education'],
            ['key' => 'edu_academic_prog_content',
             'value' => 'Career Counselling & Academic Planning Personalised Course selection based on academic background and career goals Higher education planning Professional career guidance Parent counselling College & University Selection Identifying suitable colleges and universities Guidance on Government, Government-Aided, Private, and Deemed Institutions State and national-level admission options Guidance on institution recognition and approvals Course comparison and institution evaluation Admission Assistance Admission eligibility assessment Application form guidance Online and offline application support Document verification Admission documentation Merit-based and',
             'type' => 'textarea', 'group' => 'education'],
            ['key' => 'edu_academic_prog_img', 'value' => 'images/education-02.webp', 'type' => 'image', 'group' => 'education'],

            // ---------------------------------------------------------------
            // Programme Cards (6 Student Cards)
            // ---------------------------------------------------------------
            ['key' => 'edu_prog_card_1_title',   'value' => 'Admission follow-up',                'type' => 'text',     'group' => 'education'],
            ['key' => 'edu_prog_card_1_content',
             'value' => "Documentation Support\nEducational document verification Identity and address proof documentation Migration Certificate guidance",
             'type' => 'textarea', 'group' => 'education'],
            ['key' => 'edu_prog_card_1_dot',     'value' => 'dot-blue',                            'type' => 'text',     'group' => 'education'],

            ['key' => 'edu_prog_card_2_title',   'value' => 'Academic Programmes We Facilitate',  'type' => 'text',     'group' => 'education'],
            ['key' => 'edu_prog_card_2_content',
             'value' => "Nursing\nGeneral Nursing & Midwifery (GNM) B.Sc. Nursing Post Basic B.Sc. Nursing M.Sc. Nursing",
             'type' => 'textarea', 'group' => 'education'],
            ['key' => 'edu_prog_card_2_dot',     'value' => 'dot-orange',                          'type' => 'text',     'group' => 'education'],

            ['key' => 'edu_prog_card_3_title',   'value' => 'Pharmacy',                            'type' => 'text',     'group' => 'education'],
            ['key' => 'edu_prog_card_3_content',
             'value' => "Diploma in Pharmacy (D.Pharm.)\nBachelor of Pharmacy (B. Pharm.)\nDoctor of Pharmacy (Pharm.D)\nMaster of Pharmacy (M. Pharm.)",
             'type' => 'textarea', 'group' => 'education'],
            ['key' => 'edu_prog_card_3_dot',     'value' => 'dot-purple',                          'type' => 'text',     'group' => 'education'],

            ['key' => 'edu_prog_card_4_title',   'value' => 'Engineering & Technology',            'type' => 'text',     'group' => 'education'],
            ['key' => 'edu_prog_card_4_content',
             'value' => "Polytechnic Diploma B.Tech\nM.Tech Computer Applications & Information Technology BCA",
             'type' => 'textarea', 'group' => 'education'],
            ['key' => 'edu_prog_card_4_dot',     'value' => 'dot-blue',                            'type' => 'text',     'group' => 'education'],

            ['key' => 'edu_prog_card_5_title',   'value' => 'Education',                           'type' => 'text',     'group' => 'education'],
            ['key' => 'edu_prog_card_5_content', 'value' => "D.El.Ed.\nB.Ed.\nM.Ed.",              'type' => 'textarea', 'group' => 'education'],
            ['key' => 'edu_prog_card_5_dot',     'value' => 'dot-orange',                          'type' => 'text',     'group' => 'education'],

            ['key' => 'edu_prog_card_6_title',   'value' => 'Law',                                 'type' => 'text',     'group' => 'education'],
            ['key' => 'edu_prog_card_6_content', 'value' => "LL. B.\nB.A.\nB.B.\nLL. B. A.\nLL. B. L\nL.M.", 'type' => 'textarea', 'group' => 'education'],
            ['key' => 'edu_prog_card_6_dot',     'value' => 'dot-purple',                          'type' => 'text',     'group' => 'education'],

            // ---------------------------------------------------------------
            // Why Admission Different Banner
            // ---------------------------------------------------------------
            ['key' => 'edu_why_diff_title',
             'value' => "Why Our Admission Support\nis Different",
             'type' => 'text', 'group' => 'education'],
            ['key' => 'edu_why_diff_content',
             'value' => 'Unlike conventional admission consultancies, Siksha Pathik provides continuous support before, during, and after admission. Our objective is not only to help students secure admission but also to support their academic journey, professional registration, career development, and employment opportunities through our integrated education ecosystem.',
             'type' => 'textarea', 'group' => 'education'],

            // ---------------------------------------------------------------
            // Our Commitment Section
            // ---------------------------------------------------------------
            ['key' => 'edu_commitment_title',
             'value' => 'Our Commitment',
             'type' => 'text', 'group' => 'education'],
            ['key' => 'edu_commitment_desc',
             'value' => 'Our commitment continues throughout your academic journey by providing guidance for registrations, internships, professional development, higher education, and employment opportunities. Through our integrated ecosystem, students receive continuous support until they begin their professional careers.',
             'type' => 'textarea', 'group' => 'education'],
            ['key' => 'edu_commitment_img', 'value' => 'images/education-03.png', 'type' => 'image', 'group' => 'education'],

            // ---------------------------------------------------------------
            // Why Students Trust Us (8 items, pipe-separated)
            // ---------------------------------------------------------------
            ['key' => 'edu_trust_title', 'value' => 'Why Students Trust Us', 'type' => 'text', 'group' => 'education'],
            ['key' => 'edu_trust_items',
             'value' => 'Personalized counselling|Transparent admission process|Experienced education consultants|Complete documentation support|End-to-end academic guidance|Professional registration support|Career development assistance|Placement support through Edge Hire',
             'type' => 'textarea', 'group' => 'education'],

            // ---------------------------------------------------------------
            // For Institutions Section
            // ---------------------------------------------------------------
            ['key' => 'edu_inst_section_banner',   'value' => 'For Institutions',          'type' => 'text',     'group' => 'education'],
            ['key' => 'edu_inst_support_title',    'value' => 'Core Institutional Support','type' => 'text',     'group' => 'education'],
            ['key' => 'edu_inst_support_img',      'value' => 'images/education-instute.png', 'type' => 'image', 'group' => 'education'],
            ['key' => 'edu_inst_support_desc',
             'value' => 'Siksha Pathik partners with educational institutions—particularly Nursing and Healthcare institutions—to strengthen academic administration, regulatory compliance, faculty management, and institutional development. Our objective is to help institutions maintain quality standards while simplifying academic and statutory processes.',
             'type' => 'textarea', 'group' => 'education'],

            // Institution Support Includes heading
            ['key' => 'edu_inst_includes_heading', 'value' => 'For Institutions Support', 'type' => 'text', 'group' => 'education'],

            // Institution Support Cards (4)
            ['key' => 'edu_inst_card_1_title',   'value' => 'Reciprocal, NRTS & NUID Guidance', 'type' => 'text',     'group' => 'education'],
            ['key' => 'edu_inst_card_1_content',
             'value' => "Documentation Support\nEducational document verification Identity and address proof documentation Migration Certificate guidance",
             'type' => 'textarea', 'group' => 'education'],
            ['key' => 'edu_inst_card_1_dot',     'value' => 'dot-blue',                          'type' => 'text',     'group' => 'education'],

            ['key' => 'edu_inst_card_2_title',   'value' => 'Inspection & Liaison Support',      'type' => 'text',     'group' => 'education'],
            ['key' => 'edu_inst_card_2_content',
             'value' => "Nursing\nGeneral Nursing & Midwifery (GNM) B.Sc. Nursing Post Basic B.Sc. Nursing M.Sc. Nursing",
             'type' => 'textarea', 'group' => 'education'],
            ['key' => 'edu_inst_card_2_dot',     'value' => 'dot-orange',                        'type' => 'text',     'group' => 'education'],

            ['key' => 'edu_inst_card_3_title',   'value' => 'Faculty Assistance',                'type' => 'text',     'group' => 'education'],
            ['key' => 'edu_inst_card_3_content',
             'value' => "Diploma in Pharmacy (D.Pharm.)\nBachelor of Pharmacy (B.Pharm.)\nDoctor of Pharmacy (Pharm.D)\nMaster of Pharmacy (M.Pharm.)",
             'type' => 'textarea', 'group' => 'education'],
            ['key' => 'edu_inst_card_3_dot',     'value' => 'dot-purple',                        'type' => 'text',     'group' => 'education'],

            ['key' => 'edu_inst_card_4_title',   'value' => 'Healthcare Career Support',         'type' => 'text',     'group' => 'education'],
            ['key' => 'edu_inst_card_4_content',
             'value' => "Polytechnic Diploma B.Tech\nM.Tech Computer Applications & Information Technology BCA",
             'type' => 'textarea', 'group' => 'education'],
            ['key' => 'edu_inst_card_4_dot',     'value' => 'dot-blue',                          'type' => 'text',     'group' => 'education'],

            // ---------------------------------------------------------------
            // Upcoming - Siksha Pathik Academy
            // ---------------------------------------------------------------
            ['key' => 'edu_academy_title',
             'value' => 'Upcoming - Siksha Pathik Academy',
             'type' => 'text', 'group' => 'education'],
            ['key' => 'edu_academy_desc',
             'value' => 'Siksha Pathik Academy is an upcoming digital learning platform designed for nursing students and healthcare professionals. The platform will provide mentor-led sessions, recorded lectures, practical guidance, notes, doubt-solving support, interview preparation and continuous academic development under the guidance of experienced Principals, Vice Principals, Professors and senior educators.',
             'type' => 'textarea', 'group' => 'education'],
            ['key' => 'edu_academy_img', 'value' => 'images/education-04.webp', 'type' => 'image', 'group' => 'education'],

            // ---------------------------------------------------------------
            // Why Siksha Pathik Section
            // ---------------------------------------------------------------
            ['key' => 'edu_why_pathik_title', 'value' => 'Why Siksha Pathik', 'type' => 'text', 'group' => 'education'],
            ['key' => 'edu_why_pathik_items',
             'value' => 'More than an admission consultancy.|Faculty and institutional assistance under one roof.|Dedicated nursing institutional consultancy.|Multi-state operational network.|Complete student lifecycle support.|Integration with Edge Hire for career opportunities.',
             'type' => 'textarea', 'group' => 'education'],

            // Important Note
            ['key' => 'edu_pathik_note_title',
             'value' => 'Important Note',
             'type' => 'text', 'group' => 'education'],
            ['key' => 'edu_pathik_note_content',
             'value' => 'Institutional consultancy, faculty assistance, reciprocal guidance, NRTS, NUID, inspection support and academic compliance services are presently offered for the Nursing and Healthcare Education sector. Expansion into additional educational streams will be undertaken in future through the growing professional network of Roy Infinity Edge Consulting.',
             'type' => 'textarea', 'group' => 'education'],

            // ---------------------------------------------------------------
            // Integrated Ecosystem Card
            // ---------------------------------------------------------------
            ['key' => 'edu_ecosystem_left_title',  'value' => "Integrated\nEcosystem", 'type' => 'text', 'group' => 'education'],
            ['key' => 'edu_ecosystem_right_desc',
             'value' => 'Siksha Pathik works alongside Vriddhi Edge and Edge Hire under Roy Infinity Edge Consulting to provide education consulting, institutional support, compliance and placement solutions under one roof.',
             'type' => 'textarea', 'group' => 'education'],

            // ---------------------------------------------------------------
            // Healthcare Education Expertise Section
            // ---------------------------------------------------------------
            ['key' => 'edu_expertise_title',
             'value' => "Our Healthcare\nEducation Expertise",
             'type' => 'text', 'group' => 'education'],
            ['key' => 'edu_expertise_desc',
             'value' => 'At Siksha Pathik, healthcare education is our core area of expertise. Backed by a team with over 7 years of practical experience in the nursing and healthcare education sector, we work closely with students, nursing colleges, hospitals, academic leaders, and healthcare institutions to deliver comprehensive educational and institutional support.',
             'type' => 'textarea', 'group' => 'education'],
            ['key' => 'edu_expertise_bg_img', 'value' => 'images/education-05.webp', 'type' => 'image', 'group' => 'education'],
            ['key' => 'edu_expertise_btn_text', 'value' => 'See more', 'type' => 'text', 'group' => 'education'],
            ['key' => 'edu_expertise_btn_url',  'value' => '#',        'type' => 'text', 'group' => 'education'],

            // ---------------------------------------------------------------
            // Queries Section
            // ---------------------------------------------------------------
            ['key' => 'edu_queries_heading',    'value' => 'If You Have any Queries Feel Free To Ask !', 'type' => 'text', 'group' => 'education'],
            ['key' => 'edu_queries_cta_text',   'value' => 'Ask Question',                               'type' => 'text', 'group' => 'education'],
            ['key' => 'edu_queries_sub_text',   'value' => 'If you have Any Queries Feel Free To ask !', 'type' => 'text', 'group' => 'education'],

            // ---------------------------------------------------------------
            // CTA Banner Section
            // ---------------------------------------------------------------
            ['key' => 'edu_cta_banner_title',    'value' => 'Ready to Contact with us ?', 'type' => 'text', 'group' => 'education'],
            ['key' => 'edu_cta_banner_btn_text', 'value' => 'Get Started',                'type' => 'text', 'group' => 'education'],
            ['key' => 'edu_cta_banner_btn_url',  'value' => '#contact',                   'type' => 'text', 'group' => 'education'],
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
