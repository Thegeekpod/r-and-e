<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class PlacementController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->pluck('value', 'key');
        return view('admin.placement.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);

        // Image fields that support file upload
        $imageFields = [
            'placement_hero_img_graphics',
            'placement_hero_img_person',
            'placement_about_logo',
            'placement_about_network_img',
            'placement_v1_img',
            'placement_v2_img',
            'placement_v3_img',
            'placement_future_bg_img',
            'placement_vision_bg_img',
        ];

        // Ensure upload directory exists
        $uploadPath = public_path('uploads/placement');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        // Handle image uploads
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $file     = $request->file($field);
                $filename = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
                $file->move($uploadPath, $filename);
                SiteSetting::set($field, 'uploads/placement/' . $filename, 'image', 'placement');
            }
        }

        // Handle all text / textarea fields
        foreach ($data as $key => $value) {
            if (!in_array($key, $imageFields) && is_string($value)) {
                SiteSetting::set($key, $value, 'text', 'placement');
            }
        }

        return redirect()->back()->with('success', 'Placement page content updated successfully!');
    }
}
