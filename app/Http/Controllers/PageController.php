<?php

namespace App\Http\Controllers;

use App\Models\ClientPartner;
use App\Models\ContactMessage;
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

        return view('pages.finance');
    }

    public function education()
    {
        if (SiteSetting::get('page_education_status', '1') === '0') {
            return view('pages.coming-soon', [
                'pageTitle' => 'Education Consultancy',
                'message'   => SiteSetting::get('page_education_msg', 'Our Education Consultancy section is coming soon!'),
            ]);
        }

        return view('pages.education');
    }

    public function placement()
    {
        if (SiteSetting::get('page_placement_status', '0') === '0') {
            return view('pages.coming-soon', [
                'pageTitle' => 'Job Placement Services',
                'message'   => SiteSetting::get('page_placement_msg', 'Our Healthcare and Corporate Job Placement portal is currently under active development. Stay tuned!'),
            ]);
        }

        return view('pages.placement');
    }

    public function about()
    {
        if (SiteSetting::get('page_about_status', '1') === '0') {
            return view('pages.coming-soon', [
                'pageTitle' => 'About Us',
                'message'   => SiteSetting::get('page_about_msg', 'Our About Us page is coming soon!'),
            ]);
        }

        return view('pages.about');
    }

    public function contact()
    {
        if (SiteSetting::get('page_contact_status', '1') === '0') {
            return view('pages.coming-soon', [
                'pageTitle' => 'Contact Us',
                'message'   => SiteSetting::get('page_contact_msg', 'Our Contact page is coming soon! Feel free to email us directly.'),
            ]);
        }

        return view('pages.contact');
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
}
