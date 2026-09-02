<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobCategoryController extends Controller
{
    public function index()
    {
        $categories = JobCategory::withCount('jobs')->latest()->paginate(15);
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:job_categories,name',
            'icon'        => 'nullable|string|max:100',
            'description' => 'nullable|string|max:1000',
            'status'      => 'required|in:active,inactive',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        JobCategory::create($validated);

        return redirect()->back()->with('success', 'Job Category created successfully!');
    }

    public function update(Request $request, JobCategory $jobCategory)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255|unique:job_categories,name,' . $jobCategory->id,
            'icon'        => 'nullable|string|max:100',
            'description' => 'nullable|string|max:1000',
            'status'      => 'required|in:active,inactive',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $jobCategory->update($validated);

        return redirect()->back()->with('success', 'Job Category updated successfully!');
    }

    public function destroy(JobCategory $jobCategory)
    {
        $jobCategory->delete();
        return redirect()->back()->with('success', 'Job Category deleted successfully!');
    }
}
