<?php

namespace Database\Seeders;

use App\Models\JobCategory;
use Illuminate\Database\Seeder;

class JobCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name'        => 'Healthcare / Nursing',
                'slug'        => 'healthcare-nursing',
                'icon'        => 'fa-user-nurse',
                'description' => 'Staff nurses, ICU/CCU specialists, ANM, GNM, OT technicians & medical attendants.',
                'status'      => 'active',
            ],
            [
                'name'        => 'Hospital Administration',
                'slug'        => 'hospital-administration',
                'icon'        => 'fa-hospital',
                'description' => 'Hospital managers, operations heads, billing executives, and patient care coordinators.',
                'status'      => 'active',
            ],
            [
                'name'        => 'Finance & Accounts',
                'slug'        => 'finance-accounts',
                'icon'        => 'fa-file-invoice-dollar',
                'description' => 'GST consultants, chartered accountants, bookkeepers, audit & tax specialists.',
                'status'      => 'active',
            ],
            [
                'name'        => 'Academic / Teaching',
                'slug'        => 'academic-teaching',
                'icon'        => 'fa-graduation-cap',
                'description' => 'College professors, lecturers, lab instructors, and academic coordinators.',
                'status'      => 'active',
            ],
            [
                'name'        => 'IT & Digital',
                'slug'        => 'it-digital',
                'icon'        => 'fa-laptop-code',
                'description' => 'Software developers, web administrators, system engineers, and IT support specialists.',
                'status'      => 'active',
            ],
            [
                'name'        => 'Human Resources',
                'slug'        => 'human-resources',
                'icon'        => 'fa-users-gear',
                'description' => 'HR managers, talent acquisition specialists, payroll officers, and recruiters.',
                'status'      => 'active',
            ],
            [
                'name'        => 'General Management',
                'slug'        => 'general-management',
                'icon'        => 'fa-briefcase',
                'description' => 'Executive assistants, facility managers, project coordinators, and operational leaders.',
                'status'      => 'active',
            ],
        ];

        foreach ($categories as $cat) {
            JobCategory::updateOrCreate(
                ['slug' => $cat['slug']],
                $cat
            );
        }
    }
}
