<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientPartner;
use App\Models\ContactMessage;
use App\Models\JobApplication;
use App\Models\JobPosting;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'testimonials_count' => Testimonial::count(),
            'clients_count'      => ClientPartner::count(),
            'settings_count'     => SiteSetting::count(),
            'inquiries_count'    => ContactMessage::count(),
            'unread_inquiries'   => ContactMessage::where('is_read', false)->count(),
            'jobs_count'         => JobPosting::count(),
            'applications_count' => JobApplication::count(),
            'pending_apps'       => JobApplication::where('status', 'pending')->count(),
        ];

        $recent_inquiries = ContactMessage::latest()->take(5)->get();
        $recent_testimonials = Testimonial::latest()->take(5)->get();
        $recent_clients = ClientPartner::latest()->take(5)->get();
        $recent_applications = JobApplication::with('job')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_inquiries', 'recent_testimonials', 'recent_clients', 'recent_applications'));
    }
}

