<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SeoSettingController extends Controller
{
    /**
     * Display a listing of SEO entries.
     */
    public function index(Request $request)
    {
        $query = SeoSetting::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('page_url', 'like', "%{$search}%")
                  ->orWhere('meta_title', 'like', "%{$search}%")
                  ->orWhere('meta_description', 'like', "%{$search}%");
            });
        }

        $seoEntries = $query->orderBy('page_url', 'asc')->paginate(15)->withQueryString();

        return view('admin.seo.index', compact('seoEntries'));
    }

    /**
     * Show the form for creating a new SEO entry.
     */
    public function create()
    {
        return view('admin.seo.create');
    }

    /**
     * Store a newly created SEO entry in storage.
     */
    public function store(Request $request)
    {
        // Normalize the URL input before validation
        $rawUrl = trim($request->input('page_url', ''));
        $normalizedUrl = ($rawUrl === '' || $rawUrl === '/') ? '/' : '/' . ltrim($rawUrl, '/');
        $request->merge(['page_url' => $normalizedUrl]);

        $validated = $request->validate([
            'page_url'         => ['required', 'string', 'max:255', 'unique:seo_settings,page_url'],
            'meta_title'       => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:3000'],
            'other_scripts'    => ['nullable', 'string'],
        ], [
            'page_url.required' => 'The Page URL field is required.',
            'page_url.unique'   => 'An SEO configuration already exists for this Page URL.',
        ]);

        SeoSetting::create($validated);

        return redirect()->route('admin.seo.index')->with('success', 'SEO entry created successfully.');
    }

    /**
     * Show the form for editing the specified SEO entry.
     */
    public function edit(SeoSetting $seo)
    {
        return view('admin.seo.edit', compact('seo'));
    }

    /**
     * Update the specified SEO entry in storage.
     */
    public function update(Request $request, SeoSetting $seo)
    {
        $rawUrl = trim($request->input('page_url', ''));
        $normalizedUrl = ($rawUrl === '' || $rawUrl === '/') ? '/' : '/' . ltrim($rawUrl, '/');
        $request->merge(['page_url' => $normalizedUrl]);

        $validated = $request->validate([
            'page_url'         => ['required', 'string', 'max:255', Rule::unique('seo_settings', 'page_url')->ignore($seo->id)],
            'meta_title'       => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:3000'],
            'other_scripts'    => ['nullable', 'string'],
        ], [
            'page_url.required' => 'The Page URL field is required.',
            'page_url.unique'   => 'An SEO configuration already exists for this Page URL.',
        ]);

        $seo->update($validated);

        return redirect()->route('admin.seo.index')->with('success', 'SEO entry updated successfully.');
    }

    /**
     * Remove the specified SEO entry from storage.
     */
    public function destroy(SeoSetting $seo)
    {
        $seo->delete();

        return redirect()->route('admin.seo.index')->with('success', 'SEO entry removed successfully.');
    }
}
