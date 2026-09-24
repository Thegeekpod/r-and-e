<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\ClientPartner;
use App\Models\ContactMessage;
use App\Models\EdgeNetworkSubmission;
use App\Models\JobApplication;
use App\Models\JobCategory;
use App\Models\JobPosting;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        if (SiteSetting::get('page_home_status', '1') === '0') {
            return view('pages.coming-soon', [
                'pageTitle' => 'Home Page',
                'message'   => SiteSetting::get('page_home_msg', 'Our homepage is currently undergoing scheduled updates. Please check back shortly!'),
            ]);
        }

        $settings = SiteSetting::all()->pluck('value', 'key');
        $testimonials = Testimonial::where('is_active', true)->orderBy('order')->get();
        $clients = ClientPartner::where('is_active', true)->orderBy('order')->get();

        return view('pages.home', compact('settings', 'testimonials', 'clients'));
    }

    public function finance()
    {
        if (SiteSetting::get('page_finance_status', '1') === '0') {
            return view('pages.coming-soon', [
                'pageTitle' => 'Finance & Taxation',
                'message'   => SiteSetting::get('page_finance_msg', 'Our Finance & Taxation services page is coming soon!'),
            ]);
        }

        $settings = SiteSetting::all()->pluck('value', 'key');
        return view('pages.finance', compact('settings'));
    }

    public function education()
    {
        if (SiteSetting::get('page_education_status', '1') === '0') {
            return view('pages.coming-soon', [
                'pageTitle' => 'Education Consultancy',
                'message'   => SiteSetting::get('page_education_msg', 'Our Education Consultancy section is coming soon!'),
            ]);
        }

        $settings = SiteSetting::all()->pluck('value', 'key');
        return view('pages.education', compact('settings'));
    }

    public function placement(Request $request)
    {
        if (SiteSetting::get('page_placement_status', '1') === '0') {
            return view('pages.coming-soon', [
                'pageTitle' => 'Job Placement Services',
                'message'   => SiteSetting::get('page_placement_msg', 'Our Healthcare and Corporate Job Placement portal is currently under active development. Stay tuned!'),
            ]);
        }

        $settings = SiteSetting::all()->pluck('value', 'key');

        // Fetch dynamic published job postings with optional filters
        $jobsQuery = JobPosting::where('status', 'published');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $jobsQuery->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                  ->orWhere('category', 'like', "%{$keyword}%")
                  ->orWhere('company_name', 'like', "%{$keyword}%");
            });
        }

        if ($request->filled('category')) {
            $jobsQuery->where('category', $request->input('category'));
        }

        if ($request->filled('location')) {
            $jobsQuery->where('location', 'like', "%{$request->input('location')}%");
        }

        if ($request->filled('type')) {
            $jobsQuery->where('type', $request->input('type'));
        }

        $jobs = $jobsQuery->orderBy('is_featured', 'desc')->latest()->take(4)->get();

        $categories = JobCategory::where('status', 'active')->orderBy('name')->pluck('name');
        if ($categories->isEmpty()) {
            $categories = JobPosting::where('status', 'published')->pluck('category')->unique()->values();
        }

        return view('pages.placement', compact('settings', 'jobs', 'categories'));
    }

    public function allJobs(Request $request)
    {
        $settings = SiteSetting::all()->pluck('value', 'key');

        $jobsQuery = JobPosting::where('status', 'published');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $jobsQuery->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                  ->orWhere('category', 'like', "%{$keyword}%")
                  ->orWhere('company_name', 'like', "%{$keyword}%");
            });
        }

        if ($request->filled('category')) {
            $jobsQuery->where('category', $request->input('category'));
        }

        if ($request->filled('location')) {
            $jobsQuery->where('location', 'like', "%{$request->input('location')}%");
        }

        if ($request->filled('type')) {
            $jobsQuery->where('type', $request->input('type'));
        }

        $jobs = $jobsQuery->orderBy('is_featured', 'desc')->latest()->paginate(9)->withQueryString();

        $categories = JobCategory::where('status', 'active')->orderBy('name')->pluck('name');
        if ($categories->isEmpty()) {
            $categories = JobPosting::where('status', 'published')->pluck('category')->unique()->values();
        }

        return view('pages.jobs', compact('settings', 'jobs', 'categories'));
    }




    public function showJob($slug)
    {
        $job = JobPosting::where('slug', $slug)->where('status', 'published')->firstOrFail();
        $job->increment('views_count');

        $relatedJobs = JobPosting::where('status', 'published')
            ->where('id', '!=', $job->id)
            ->where(function ($q) use ($job) {
                $q->where('category', $job->category)
                  ->orWhere('type', $job->type);
            })
            ->take(3)
            ->get();

        return view('pages.job-details', compact('job', 'relatedJobs'));
    }

    public function applyJob(Request $request, JobPosting $job)
    {
        $validated = $request->validate([
            'applicant_name'   => 'required|string|max:255',
            'applicant_email'  => 'required|email|max:255',
            'applicant_phone'  => 'required|string|max:50',
            'experience_years' => 'nullable|string|max:100',
            'current_company'  => 'nullable|string|max:255',
            'expected_salary'  => 'nullable|string|max:100',
            'cover_note'       => 'nullable|string|max:3000',
            'resume'           => 'required|file|mimes:pdf,doc,docx|max:10240', // Max 10MB
        ]);

        $uploadPath = public_path('uploads/resumes');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        $file     = $request->file('resume');
        $filename = time() . '_' . str_replace(' ', '_', $validated['applicant_name']) . '.' . $file->getClientOriginalExtension();
        $file->move($uploadPath, $filename);

        JobApplication::create([
            'job_posting_id'   => $job->id,
            'applicant_name'   => $validated['applicant_name'],
            'applicant_email'  => $validated['applicant_email'],
            'applicant_phone'  => $validated['applicant_phone'],
            'experience_years' => $validated['experience_years'] ?? null,
            'current_company'  => $validated['current_company'] ?? null,
            'expected_salary'  => $validated['expected_salary'] ?? null,
            'cover_note'       => $validated['cover_note'] ?? null,
            'resume_path'      => 'uploads/resumes/' . $filename,
            'status'           => 'pending',
        ]);

        return redirect()->back()->with('apply_success', 'Thank you for applying! Your application and resume have been submitted successfully. Our recruitment team will review and contact you shortly.');
    }


    public function about()
    {
        if (SiteSetting::get('page_about_status', '1') === '0') {
            return view('pages.coming-soon', [
                'pageTitle' => 'About Us',
                'message'   => SiteSetting::get('page_about_msg', 'Our About Us page is coming soon!'),
            ]);
        }

        $settings = SiteSetting::all()->pluck('value', 'key');

        return view('pages.about', compact('settings'));
    }


    public function blog(Request $request)
    {
        $settings = SiteSetting::all()->pluck('value', 'key');

        $query = BlogPost::with('category')->where('status', 'published');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                  ->orWhere('excerpt', 'like', "%{$keyword}%")
                  ->orWhere('content', 'like', "%{$keyword}%")
                  ->orWhere('tags', 'like', "%{$keyword}%");
            });
        }

        if ($request->filled('category')) {
            $catSlug = $request->input('category');
            $query->whereHas('category', function ($q) use ($catSlug) {
                $q->where('slug', $catSlug);
            });
        }

        $featuredPost = BlogPost::with('category')
            ->where('status', 'published')
            ->where('is_featured', true)
            ->latest('published_at')
            ->first();

        // If search or filter is active, don't show the featured spotlight block above grid
        if ($request->filled('keyword') || $request->filled('category')) {
            $featuredPost = null;
        }

        $posts = $query->latest('published_at')->paginate(9)->withQueryString();

        $categories = BlogCategory::where('status', 'active')
            ->withCount(['posts' => function ($q) {
                $q->where('status', 'published');
            }])
            ->orderBy('order')
            ->get();

        $recentPosts = BlogPost::where('status', 'published')->latest('published_at')->take(4)->get();

        return view('pages.blog', compact('settings', 'posts', 'featuredPost', 'categories', 'recentPosts'));
    }

    public function blogCategory(Request $request, $slug)
    {
        $settings = SiteSetting::all()->pluck('value', 'key');
        $currentCategory = BlogCategory::where('slug', $slug)->where('status', 'active')->firstOrFail();

        $query = BlogPost::with('category')->where('status', 'published')->where('category_id', $currentCategory->id);

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                  ->orWhere('excerpt', 'like', "%{$keyword}%")
                  ->orWhere('content', 'like', "%{$keyword}%")
                  ->orWhere('tags', 'like', "%{$keyword}%");
            });
        }

        $posts = $query->latest('published_at')->paginate(9)->withQueryString();

        $categories = BlogCategory::where('status', 'active')
            ->withCount(['posts' => function ($q) {
                $q->where('status', 'published');
            }])
            ->orderBy('order')
            ->get();

        $recentPosts = BlogPost::where('status', 'published')->latest('published_at')->take(4)->get();

        return view('pages.blog', [
            'settings'        => $settings,
            'posts'           => $posts,
            'featuredPost'    => null,
            'categories'      => $categories,
            'recentPosts'     => $recentPosts,
            'currentCategory' => $currentCategory,
        ]);
    }

    public function showBlogPost($slug)
    {
        $settings = SiteSetting::all()->pluck('value', 'key');
        $post = BlogPost::with('category')->where('slug', $slug)->where('status', 'published')->firstOrFail();
        $post->increment('views_count');

        $relatedPosts = BlogPost::where('status', 'published')
            ->where('id', '!=', $post->id)
            ->where(function ($q) use ($post) {
                if ($post->category_id) {
                    $q->where('category_id', $post->category_id);
                }
            })
            ->latest('published_at')
            ->take(3)
            ->get();

        if ($relatedPosts->count() < 3) {
            $extra = BlogPost::where('status', 'published')
                ->where('id', '!=', $post->id)
                ->whereNotIn('id', $relatedPosts->pluck('id'))
                ->latest('published_at')
                ->take(3 - $relatedPosts->count())
                ->get();
            $relatedPosts = $relatedPosts->concat($extra);
        }

        $categories = BlogCategory::where('status', 'active')
            ->withCount(['posts' => function ($q) {
                $q->where('status', 'published');
            }])
            ->orderBy('order')
            ->get();

        return view('pages.blog-details', compact('settings', 'post', 'relatedPosts', 'categories'));
    }

    public function contact()
    {
        if (SiteSetting::get('page_contact_status', '1') === '0') {
            return view('pages.coming-soon', [
                'pageTitle' => 'Contact Us',
                'message'   => SiteSetting::get('page_contact_msg', 'Our Contact page is coming soon! Feel free to email us directly.'),
            ]);
        }

        $settings = SiteSetting::all()->pluck('value', 'key');

        return view('pages.contact', compact('settings'));
    }

    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:50',
            'service' => 'nullable|string|max:100',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        ContactMessage::create($validated);

        return redirect()->back()->with('contact_success', 'Thank you! Your message has been sent successfully. Our team will contact you shortly.');
    }

    public function submitEdgeNetwork(Request $request)
    {
        $type = $request->input('type', 'professional');

        if ($type === 'professional') {
            $validated = $request->validate([
                'type'             => 'required|in:professional,business',
                'name'             => 'required|string|max:255',
                'email'            => 'required|email|max:255',
                'phone'            => 'required|string|max:50',
                'city'             => 'required|string|max:255',
                'qualification'    => 'required|string|max:255',
                'experience_years' => 'nullable|string|max:100',
                'skills'           => 'nullable',
                'availability'     => 'nullable|string|max:100',
                'expected_fees'    => 'nullable|string|max:255',
                'bio'              => 'nullable|string|max:5000',
                'resume'           => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            ]);

            $resumePath = null;
            if ($request->hasFile('resume')) {
                $uploadDir = public_path('uploads/edge_network/resumes');
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                $file = $request->file('resume');
                $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9_-]/', '_', $validated['name']) . '.' . $file->getClientOriginalExtension();
                $file->move($uploadDir, $filename);
                $resumePath = 'uploads/edge_network/resumes/' . $filename;
            }

            // Convert skills array to comma-separated string if passed as array
            $skills = $request->input('skills');
            if (is_array($skills)) {
                $skills = implode(', ', $skills);
            }

            EdgeNetworkSubmission::create([
                'type'             => 'professional',
                'name'             => $validated['name'],
                'email'            => $validated['email'],
                'phone'            => $validated['phone'],
                'city'             => $validated['city'],
                'qualification'    => $validated['qualification'],
                'experience_years' => $validated['experience_years'] ?? null,
                'skills'           => $skills,
                'availability'     => $validated['availability'] ?? null,
                'expected_fees'    => $validated['expected_fees'] ?? null,
                'bio'              => $validated['bio'] ?? null,
                'resume_path'      => $resumePath,
                'status'           => 'pending',
                'is_read'          => false,
            ]);

            $msg = 'Thank you for registering your profile with EDGE Accounts Network! Our team will review your credentials and connect you with matching assignments.';
        } else {
            $validated = $request->validate([
                'type'                => 'required|in:professional,business',
                'company_name'        => 'required|string|max:255',
                'name'                => 'required|string|max:255',
                'email'               => 'required|email|max:255',
                'phone'               => 'required|string|max:50',
                'city'                => 'required|string|max:255',
                'business_nature'     => 'nullable|string|max:255',
                'service_needed'      => 'required|string|max:255',
                'engagement_type'     => 'nullable|string|max:100',
                'expected_budget'     => 'nullable|string|max:255',
                'requirement_details' => 'required|string|max:5000',
                'attachment'          => 'nullable|file|mimes:pdf,doc,docx,zip,png,jpg,jpeg|max:5120',
            ]);

            $attachmentPath = null;
            if ($request->hasFile('attachment')) {
                $uploadDir = public_path('uploads/edge_network/attachments');
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                $file = $request->file('attachment');
                $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9_-]/', '_', $validated['company_name']) . '.' . $file->getClientOriginalExtension();
                $file->move($uploadDir, $filename);
                $attachmentPath = 'uploads/edge_network/attachments/' . $filename;
            }

            EdgeNetworkSubmission::create([
                'type'                => 'business',
                'name'                => $validated['name'],
                'email'               => $validated['email'],
                'phone'               => $validated['phone'],
                'city'                => $validated['city'],
                'company_name'        => $validated['company_name'],
                'business_nature'     => $validated['business_nature'] ?? null,
                'service_needed'      => $validated['service_needed'],
                'engagement_type'     => $validated['engagement_type'] ?? null,
                'expected_budget'     => $validated['expected_budget'] ?? null,
                'requirement_details' => $validated['requirement_details'],
                'attachment_path'     => $attachmentPath,
                'status'              => 'pending',
                'is_read'             => false,
            ]);

            $msg = 'Thank you for submitting your accounting requirement! Our network coordinators will review your scope and introduce verified accounting professionals shortly.';
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $msg,
            ]);
        }

        return redirect()->back()->with('edge_success', $msg);
    }
}
