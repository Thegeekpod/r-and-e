<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::where('group', 'general')->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('site_logo')) {
            $file = $request->file('site_logo');
            $filename = time() . '_site_logo.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/settings'), $filename);
            SiteSetting::set('site_logo', 'uploads/settings/' . $filename, 'image', 'general');
        }

        foreach ($data as $key => $value) {
            if ($key !== 'site_logo' && is_string($value)) {
                SiteSetting::set($key, $value, 'text', 'general');
            }
        }

        return redirect()->back()->with('success', 'General site settings updated successfully!');
    }
}
