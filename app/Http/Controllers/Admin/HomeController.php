<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->pluck('value', 'key');
        return view('admin.home.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);

        // Handle uploaded images
        $imageFields = [
            'hero_arrow_img',
            'hero_growth_arrow_img',
            'hero_banner2_img',
            'service1_img',
            'service2_img',
            'service3_img',
            'feat_tax_img_graphics',
            'feat_tax_img_person',
            'feat_edu_img_graphics',
            'feat_edu_img_person',
            'feat_edu_brochure_qr',
            'feat_place_img_graphics',
            'feat_place_img_person',
        ];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/home'), $filename);
                SiteSetting::set($field, 'uploads/home/' . $filename, 'image', 'home');
            }
        }

        // Handle text/textarea inputs
        foreach ($data as $key => $value) {
            if (!in_array($key, $imageFields) && is_string($value)) {
                SiteSetting::set($key, $value, 'text', 'home');
            }
        }

        return redirect()->back()->with('success', 'Home page content updated successfully!');
    }
}
