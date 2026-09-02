<?php

namespace Database\Seeders;

use App\Models\JobPosting;
use Illuminate\Database\Seeder;

class JobPostingSeeder extends Seeder
{
    public function run(): void
    {
        $jobs = [
            [
                'title'               => 'Senior Staff Nurse (ICU/CCU)',
                'category'            => 'Healthcare / Nursing',
                'type'                => 'Full-time',
                'company_name'        => 'MetroCare Hospital & Research Centre',
                'location'            => 'Durgapur, West Bengal',
                'salary_range'        => '₹25,000 - ₹35,000 / month',
                'experience_required' => '2-5 Years',
                'description'         => 'We are seeking experienced Senior Staff Nurses for ICU and Critical Care Units. Responsibilities include patient monitoring, administering medication, assisting doctors in procedures, and maintaining nursing documentation.',
                'requirements'        => "• B.Sc Nursing or GNM with WBNC Registration\n• Minimum 2 years experience in ICU/CCU\n• Strong communication and emergency handling skills",
                'benefits'            => "• Free Accommodation & Meals\n• Health Insurance & Provident Fund\n• Overtime Allowance",
                'status'              => 'published',
                'is_featured'         => true,
            ],
            [
                'title'               => 'Medical Officer / Resident Doctor',
                'category'            => 'Healthcare / Medical',
                'type'                => 'Full-time',
                'company_name'        => 'CityLife Superspeciality Hospital',
                'location'            => 'Kolkata, West Bengal',
                'salary_range'        => '₹60,000 - ₹85,000 / month',
                'experience_required' => '1-3 Years',
                'description'         => 'Responsible for attending outdoor and indoor patients, managing clinical rounds, responding to emergency calls, and coordinating patient care plans.',
                'requirements'        => "• MBBS degree with valid Medical Council Registration\n• ACLS/BLS certification preferred\n• Good clinical diagnostic skills",
                'benefits'            => "• Professional Development Allowance\n• Performance Bonus\n• Subsidized Family Healthcare",
                'status'              => 'published',
                'is_featured'         => true,
            ],
            [
                'title'               => 'Senior Accounts & GST Consultant',
                'category'            => 'Finance & Accounting',
                'type'                => 'Full-time',
                'company_name'        => 'Roy Infinity Edge Consulting',
                'location'            => 'Asansol / Durgapur, West Bengal',
                'salary_range'        => '₹30,000 - ₹45,000 / month',
                'experience_required' => '3+ Years',
                'description'         => 'Handling corporate client accounts, GST return filings, TDS compliance, finalization of financial statements, and auditing assistance.',
                'requirements'        => "• B.Com / M.Com / CA Inter\n• Hands-on expertise in Tally Prime, Zoho Books, and GST Portal\n• Minimum 3 years in audit firm or corporate accounting",
                'benefits'            => "• Annual Performance Bonus\n• Paid Leaves & PF\n• Career Advancement Track",
                'status'              => 'published',
                'is_featured'         => false,
            ],
            [
                'title'               => 'Nursing College Faculty / Tutor',
                'category'            => 'Education / Academic',
                'type'                => 'Full-time',
                'company_name'        => 'Siksha Pathik Partner Institute',
                'location'            => 'Burdwan, West Bengal',
                'salary_range'        => '₹28,000 - ₹40,000 / month',
                'experience_required' => '1+ Year',
                'description'         => 'Teaching B.Sc Nursing and GNM students, conducting clinical demonstrations, evaluating student performance, and maintaining INC/WBNC compliance records.',
                'requirements'        => "• M.Sc Nursing or B.Sc Nursing with 1 year teaching experience\n• Active State Nursing Council Registration",
                'benefits'            => "• Academic Research Grant\n• Summer Vacation & Paid Leaves",
                'status'              => 'published',
                'is_featured'         => false,
            ],
            [
                'title'               => 'Hospital Administrator',
                'category'            => 'Management / Healthcare',
                'type'                => 'Full-time',
                'company_name'        => 'Sunrise Healthcare Institute',
                'location'            => 'Siliguri, West Bengal',
                'salary_range'        => '₹40,000 - ₹55,000 / month',
                'experience_required' => '3-5 Years',
                'description'         => 'Overseeing day-to-day hospital operations, staff coordination, patient relations, facility maintenance, and compliance management.',
                'requirements'        => "• MHA (Master of Hospital Administration) or MBA Healthcare\n• Proven operational leadership in a 50+ bedded hospital",
                'benefits'            => "• Travel Allowance\n• Executive Health Package",
                'status'              => 'published',
                'is_featured'         => true,
            ],
        ];

        foreach ($jobs as $j) {
            JobPosting::create($j);
        }
    }
}
