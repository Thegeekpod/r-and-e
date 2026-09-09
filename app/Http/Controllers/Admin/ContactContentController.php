<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ContactContentController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->pluck('value', 'key');
        return view('admin.contact-content', compact('settings'));
    }

    public function update(Request $request)
    {
        $textFields = [
            // Hero
            'contact_hero_badge',
            'contact_hero_title',
            'contact_hero_title_highlight',
            'contact_hero_subtitle',

            // Quick Cards
            'contact_card1_title',
            'contact_card1_subtitle',
            'contact_card1_phone',
            'contact_card2_title',
            'contact_card2_subtitle',
            'contact_card2_email',
            'contact_card3_title',
            'contact_card3_subtitle',
            'contact_card3_address',

            // Form Box
            'contact_form_title',
            'contact_form_intro',

            // Info Panel
            'contact_info_title',
            'contact_info_desc',
            'contact_feat1_title',
            'contact_feat1_desc',
            'contact_feat2_title',
            'contact_feat2_desc',
            'contact_feat3_title',
            'contact_feat3_desc',
            'contact_hours_title',
            'contact_hours_text',

            // Queries Section
            'contact_queries_heading',
            'contact_queries_highlight',
            'contact_queries_card_title',
            'contact_queries_card_subtitle',
        ];

        foreach ($textFields as $field) {
            if ($request->has($field)) {
                $val = $request->input($field);
                $type = (str_contains($field, 'subtitle') || str_contains($field, 'desc') || str_contains($field, 'intro') || str_contains($field, 'address') || str_contains($field, 'text')) ? 'textarea' : 'text';
                SiteSetting::updateOrCreate(
                    ['key' => $field],
                    ['value' => $val, 'group' => 'contact', 'type' => $type]
                );
            }
        }

        return redirect()->back()->with('success', 'Contact page content updated successfully!');
    }
}
