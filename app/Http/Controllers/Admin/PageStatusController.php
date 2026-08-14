<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class PageStatusController extends Controller
{
    public function index()
    {
        $pages = [
            'home' => [
                'name' => 'Home Page',
                'url'  => '/',
                'route'=> 'home',
                'desc' => 'Main landing page with Hero, Services, and Testimonials',
            ],
            'finance' => [
                'name' => 'Finance & Taxation',
                'url'  => '/finance',
                'route'=> 'finance',
                'desc' => 'Comprehensive financial & taxation services page',
            ],
            'education' => [
                'name' => 'Education Consultancy',
                'url'  => '/education',
                'route'=> 'education',
                'desc' => 'Student admission support, tree diagrams, and programmes',
            ],
            'placement' => [
                'name' => 'Job Placement Services',
                'url'  => '/placement',
                'route'=> 'placement',
                'desc' => 'Healthcare and corporate job placement services',
            ],
            'about' => [
                'name' => 'About Us',
                'url'  => '/about',
                'route'=> 'about',
                'desc' => 'Company profile, team, and mission information',
            ],
            'contact' => [
                'name' => 'Contact Us',
                'url'  => '/contact',
                'route'=> 'contact',
                'desc' => 'Inquiry form, office address, and contact numbers',
            ],
        ];

        $settings = SiteSetting::where('group', 'page_status')->pluck('value', 'key');

        return view('admin.pages.index', compact('pages', 'settings'));
    }

    public function update(Request $request)
    {
        $pages = ['home', 'finance', 'education', 'placement', 'about', 'contact'];

        foreach ($pages as $page) {
            $statusKey = 'page_' . $page . '_status';
            $msgKey = 'page_' . $page . '_msg';

            // If checkbox is checked, status is 1, else 0
            $statusValue = $request->has($statusKey) ? '1' : '0';
            SiteSetting::set($statusKey, $statusValue, 'boolean', 'page_status');

            if ($request->has($msgKey)) {
                SiteSetting::set($msgKey, $request->input($msgKey), 'textarea', 'page_status');
            }
        }

        return redirect()->back()->with('success', 'Page statuses and visibility updated successfully!');
    }
}
