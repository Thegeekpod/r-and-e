<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->pluck('value', 'key');
        return view('admin.finance.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);

        // Handle uploaded images
        $imageFields = [
            'finance_hero_img_graphics',
            'finance_hero_img_person',
            'finance_intro_img1',
            'finance_intro_img2',
            'finance_intro_badge2_icon',
            'finance_srv1_img',
            'finance_srv2_img',
            'finance_srv3_img',
            'finance_srv4_img',
            'finance_srv5_img',
            'finance_srv6_img',
            'finance_srv7_img',
            'finance_srv8_img',
            'finance_add_left_img',
        ];

        // Ensure target folder exists
        $uploadPath = public_path('uploads/finance');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
                $file->move($uploadPath, $filename);
                SiteSetting::set($field, 'uploads/finance/' . $filename, 'image', 'finance');
            }
        }

        // Handle text/textarea inputs
        foreach ($data as $key => $value) {
            if (!in_array($key, $imageFields) && is_string($value)) {
                SiteSetting::set($key, $value, 'text', 'finance');
            }
        }

        return redirect()->back()->with('success', 'Finance page content updated successfully!');
    }
}
