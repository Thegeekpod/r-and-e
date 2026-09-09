<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->pluck('value', 'key');
        return view('admin.education.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);

        // Image fields that support file upload
        $imageFields = [
            'edu_hero_img_graphics',
            'edu_hero_img_person',
            'edu_hero_qr_img',
            'edu_siksha_logo',
            'edu_student_support_img',
            'edu_admission_journey_img',
            'edu_academic_prog_img',
            'edu_commitment_img',
            'edu_inst_support_img',
            'edu_academy_img',
            'edu_expertise_bg_img',
        ];

        // Ensure upload directory exists
        $uploadPath = public_path('uploads/education');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        // Handle image uploads
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $file     = $request->file($field);
                $filename = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
                $file->move($uploadPath, $filename);
                SiteSetting::set($field, 'uploads/education/' . $filename, 'image', 'education');
            }
        }

        // Programme Cards array handling
        if ($request->has('edu_prog_cards')) {
            $progCards = $request->input('edu_prog_cards');
            if (is_array($progCards)) {
                $cleanedCards = [];
                foreach ($progCards as $card) {
                    if (!empty($card['title']) || !empty($card['content'])) {
                        $cleanedCards[] = [
                            'title'     => $card['title'] ?? '',
                            'dot'       => $card['dot'] ?? 'dot-blue',
                            'read_time' => $card['read_time'] ?? '5 min read',
                            'content'   => $card['content'] ?? '',
                        ];
                    }
                }
                SiteSetting::set('edu_prog_cards', json_encode(array_values($cleanedCards)), 'json', 'education');
            }
        } elseif ($request->has('edu_prog_cards_submitted')) {
            // Case where user deleted all cards
            SiteSetting::set('edu_prog_cards', json_encode([]), 'json', 'education');
        }

        // Handle all text / textarea fields
        foreach ($data as $key => $value) {
            if (!in_array($key, $imageFields) && $key !== 'edu_prog_cards' && $key !== 'edu_prog_cards_submitted') {
                if (is_array($value)) {
                    SiteSetting::set($key, json_encode(array_values($value)), 'json', 'education');
                } elseif (is_string($value)) {
                    SiteSetting::set($key, $value, 'text', 'education');
                }
            }
        }

        return redirect()->back()->with('success', 'Education page content updated successfully!');
    }
}
