<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Categories
        $categoriesData = [
            [
                'name'        => 'Finance & Taxation',
                'slug'        => 'finance-taxation',
                'description' => 'Insights, updates, and strategic guides on tax planning, GST filings, and business financial compliance in India.',
                'status'      => 'active',
                'order'       => 1,
            ],
            [
                'name'        => 'Education & Admissions',
                'slug'        => 'education-admissions',
                'description' => 'Comprehensive guidance for higher education, nursing, medical, and paramedical college admissions.',
                'status'      => 'active',
                'order'       => 2,
            ],
            [
                'name'        => 'Healthcare & Placement',
                'slug'        => 'healthcare-placement',
                'description' => 'Recruitment trends, career roadmaps, and hospital staffing opportunities for medical professionals.',
                'status'      => 'active',
                'order'       => 3,
            ],
            [
                'name'        => 'Business Advisory',
                'slug'        => 'business-advisory',
                'description' => 'Strategic guidance on DPR reports, MSME schemes, company registration, and institutional growth.',
                'status'      => 'active',
                'order'       => 4,
            ],
        ];

        $createdCategories = [];
        foreach ($categoriesData as $cat) {
            $createdCategories[$cat['slug']] = BlogCategory::updateOrCreate(
                ['slug' => $cat['slug']],
                $cat
            );
        }

        // 2. Blog Posts
        $postsData = [
            [
                'category_id'    => $createdCategories['finance-taxation']->id,
                'title'          => 'Essential Tax Saving Strategies for Growing Businesses in 2026',
                'slug'           => 'essential-tax-saving-strategies-businesses-2026',
                'excerpt'        => 'Discover actionable tax planning approaches, depreciation benefits, and compliance checkpoints designed to optimize your company cash flow and bottom line.',
                'content'        => '<p class="lead">Navigating the Indian tax landscape requires proactive planning, meticulous documentation, and an understanding of modern tax incentives. For emerging enterprises and established corporate houses alike, intelligent tax strategy is one of the most effective levers for protecting margins and fueling growth.</p>
<h2>1. Maximize Allowable Business Deductions</h2>
<p>Many business owners leave money on the table by missing legitimate operational deductions. Ensuring that all eligible expenditures—from technology infrastructure and employee upskilling to professional consultancy fees—are cleanly categorized under appropriate accounting heads can substantially reduce taxable income.</p>
<blockquote>"Tax efficiency is not merely an annual filing task; it is an ongoing financial habit that determines your enterprise\'s scalability."</blockquote>
<h2>2. Strategic Depreciation & Capital Asset Planning</h2>
<p>Investing in capital equipment, computerized systems, and business vehicles unlocks substantial depreciation write-offs. Coordinating large asset acquisitions with the financial calendar allows businesses to claim full or half-year depreciation advantages effectively.</p>
<h2>3. Structuring Advance Taxes to Prevent Penalties</h2>
<p>Under Indian tax law, businesses must pay advance taxes in quarterly installments (15%, 45%, 75%, and 100%). Maintaining ongoing quarterly reconciliations avoids steep interest penalties under Sections 234B and 234C while maintaining smooth liquidity.</p>
<h3>Key Takeaways for Business Leaders:</h3>
<ul>
    <li>Conduct quarterly tax reviews rather than waiting for year-end closing.</li>
    <li>Ensure all GST input tax credits (ITC) are matched and reconciled regularly.</li>
    <li>Leverage Section 80JJAA benefits if you are expanding your workforce.</li>
</ul>
<p>At <strong>Roy Infinity Edge Consulting</strong>, our tax advisory specialists assist companies in structuring seamless compliance roadmaps that safeguard wealth while adhering rigorously to current legal standards.</p>',
                'author_name'    => 'Financial Advisory Desk',
                'reading_time'   => '5 min read',
                'tags'           => 'Tax Planning, Corporate Finance, GST, Business Growth',
                'status'         => 'published',
                'is_featured'    => true,
                'views_count'    => 342,
                'published_at'   => now()->subDays(2),
            ],
            [
                'category_id'    => $createdCategories['education-admissions']->id,
                'title'          => 'Step-by-Step Guide to Top Nursing & Medical Admissions in India',
                'slug'           => 'step-by-step-guide-nursing-medical-admissions',
                'excerpt'        => 'A comprehensive roadmap for students and parents navigating INC/WBNC approved nursing colleges, entrance cutoffs, and counseling procedures.',
                'content'        => '<p class="lead">Pursuing a career in healthcare offers unparalleled stability, respect, and long-term professional fulfillment. However, navigating college eligibility criteria, state council recognitions, and entrance examinations can often seem overwhelming for aspiring students and their families.</p>
<h2>Understanding Council Approvals: INC & WBNC</h2>
<p>Before enrolling in any B.Sc Nursing, GNM, or Post Basic course, verifying that the institution holds valid accreditation from the <strong>Indian Nursing Council (INC)</strong> and the respective <strong>State Nursing Council (such as WBNC)</strong> is imperative. Accreditation guarantees that degrees are recognized for clinical licensure and future international licensing exams (NCLEX, HAAD, OET).</p>
<h2>Choosing Between B.Sc Nursing and GNM</h2>
<p>While GNM (General Nursing and Midwifery) provides a foundational 3-year diploma entry into clinical care, B.Sc Nursing is a 4-year undergraduate degree program that offers accelerated career progression into critical care specialties, clinical instruction, and overseas placements.</p>
<blockquote>"Quality education coupled with hands-on hospital exposure creates healthcare leaders ready for modern clinical challenges."</blockquote>
<h2>Key Admission Milestones to Track:</h2>
<ul>
    <li><strong>Entrance Examinations:</strong> Prepare thoroughly for state entrance exams (e.g., JENPAS UG) and central criteria.</li>
    <li><strong>Seat Allotment & Document Verification:</strong> Keep academic mark sheets, caste/category certificates, and medical fitness records updated.</li>
    <li><strong>Clinical Affiliations:</strong> Ensure the college provides on-site hospital rotations and high patient-bed density for clinical practice.</li>
</ul>
<p>Our experienced education consultants at <strong>Roy Infinity Edge</strong> provide end-to-end admission counseling, scholarship assistance, and institutional selection to match every student\'s academic aspirations.</p>',
                'author_name'    => 'Academic Guidance Team',
                'reading_time'   => '6 min read',
                'tags'           => 'Nursing Admissions, Medical Colleges, INC Approval, Higher Education',
                'status'         => 'published',
                'is_featured'    => true,
                'views_count'    => 518,
                'published_at'   => now()->subDays(5),
            ],
            [
                'category_id'    => $createdCategories['healthcare-placement']->id,
                'title'          => 'Healthcare Recruitment Trends: What Top Multi-Specialty Hospitals Look For',
                'slug'           => 'healthcare-recruitment-trends-hospital-staffing',
                'excerpt'        => 'Explore the evolving skillsets, certifications, and clinical competencies commanding top compensation across modern tertiary care hospitals.',
                'content'        => '<p class="lead">The healthcare landscape across India is witnessing unprecedented expansion, with new super-specialty hospitals and trauma centers demanding highly skilled nursing professionals, resident doctors, and allied healthcare specialists.</p>
<h2>1. High Demand for Specialized ICU & Critical Care Competence</h2>
<p>Hospitals are placing a premium on nursing professionals certified in Advanced Cardiac Life Support (ACLS), Basic Life Support (BLS), and ventilator management. Critical care nurses with 2+ years of hands-on ICU experience receive prioritized offers and enhanced compensation packages.</p>
<h2>2. Effective Interpersonal Communication & Patient Safety</h2>
<p>Beyond clinical excellence, NABH-accredited hospitals actively evaluate bedside empathy, protocol compliance, and interdisciplinary team coordination during candidate evaluations.</p>
<h2>How Healthcare Professionals Can Prepare:</h2>
<ul>
    <li>Maintain structured, verified documentation of clinical rotations and specializations.</li>
    <li>Continuously upgrade skillsets through certified continuing medical education (CME) modules.</li>
    <li>Partner with dedicated recruitment agencies that maintain direct institutional ties with top hospital chains.</li>
</ul>
<p>Roy Infinity Edge Placement Division connects qualified nurses, medical doctors, and paramedical personnel directly with leading healthcare institutions across the country.</p>',
                'author_name'    => 'Healthcare Staffing Desk',
                'reading_time'   => '4 min read',
                'tags'           => 'Hospital Staffing, Healthcare Jobs, Nurse Recruitment, Careers',
                'status'         => 'published',
                'is_featured'    => false,
                'views_count'    => 289,
                'published_at'   => now()->subDays(8),
            ],
            [
                'category_id'    => $createdCategories['business-advisory']->id,
                'title'          => 'How Detailed Project Reports (DPR) Secure Bank Financing for MSMEs',
                'slug'           => 'how-dpr-reports-secure-bank-financing-msmes',
                'excerpt'        => 'Learn what financial institutions look for in Detailed Project Reports (DPR) and CMA data when assessing loan eligibility for business expansion.',
                'content'        => '<p class="lead">Securing bank financing or institutional capital is often the pivotal milestone in transforming a promising business venture into a market leader. However, loan applications frequently face delays due to inadequately prepared financial dossiers.</p>
<h2>What Makes an Effective DPR?</h2>
<p>A high-impact Detailed Project Report (DPR) presents a clear narrative backed by robust quantitative modeling. It synthesizes market feasibility, capital expenditure requirements, revenue projections, and debt service coverage ratios (DSCR).</p>
<h2>Key Components Financial Institutions Scrutinize:</h2>
<ul>
    <li><strong>Cash Flow Sensitivity:</strong> Demonstrating liquidity resilience under varied market conditions.</li>
    <li><strong>CMA Data Accuracy:</strong> Accurate past financial records coupled with realistic working capital calculations.</li>
    <li><strong>Break-Even & Payback Horizon:</strong> Quantifying the precise timeline required to achieve operational profitability.</li>
</ul>
<p>Our corporate advisory team at <strong>Roy Infinity Edge</strong> specializes in crafting bank-grade DPRs and CMA reports tailored to bank underwriting guidelines.</p>',
                'author_name'    => 'Corporate Advisory Desk',
                'reading_time'   => '5 min read',
                'tags'           => 'DPR Reports, Bank Loans, MSME Funding, Business Advisory',
                'status'         => 'published',
                'is_featured'    => false,
                'views_count'    => 194,
                'published_at'   => now()->subDays(12),
            ],
        ];

        foreach ($postsData as $p) {
            BlogPost::updateOrCreate(
                ['slug' => $p['slug']],
                $p
            );
        }
    }
}
