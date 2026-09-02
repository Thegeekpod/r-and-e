<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::where('group', 'about')->get()->keyBy('key');
        return view('admin.about', compact('settings'));
    }

    public function update(Request $request)
    {
        $textFields = [
            'about_hero_badge',
            'about_hero_title',
            'about_hero_subtitle',
            'about_exp_years',
            'about_exp_label',
            'about_stat1_number',
            'about_stat1_label',
            'about_stat2_number',
            'about_stat2_label',
            'about_stat3_number',
            'about_stat3_label',
            'about_story_heading',
            'about_story_content_p1',
            'about_story_content_p2',
            'about_pillar_title',
            'about_pillar1_title',
            'about_pillar1_desc',
            'about_pillar2_title',
            'about_pillar2_desc',
            'about_pillar3_title',
            'about_pillar3_desc',
            'about_mission_title',
            'about_mission_desc',
            'about_vision_title',
            'about_vision_desc',
            'about_promise_title',
            'about_promise_desc',
            'about_value1_title',
            'about_value1_desc',
            'about_value2_title',
            'about_value2_desc',
            'about_value3_title',
            'about_value3_desc',
            'about_value4_title',
            'about_value4_desc',
        ];

        foreach ($textFields as $field) {
            if ($request->has($field)) {
                SiteSetting::updateOrCreate(
                    ['key' => $field],
                    ['value' => $request->input($field), 'group' => 'about', 'type' => 'text']
                );
            }
        }

        // Handle Optional Image Uploads if provided
        $imageFields = ['about_hero_image', 'about_story_img'];

        foreach ($imageFields as $imgField) {
            if ($request->hasFile($imgField)) {
                $file = $request->file($imgField);
                $uploadPath = public_path('images');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                $filename = time() . '_' . $imgField . '.' . $file->getClientOriginalExtension();
                $file->move($uploadPath, $filename);

                SiteSetting::updateOrCreate(
                    ['key' => $imgField],
                    ['value' => 'images/' . $filename, 'group' => 'about', 'type' => 'image']
                );
            }
        }

        return redirect()->back()->with('success', 'About Us page content updated successfully!');
    }
}
