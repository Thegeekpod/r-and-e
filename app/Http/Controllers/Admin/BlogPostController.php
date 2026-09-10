<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogPostController extends Controller
{
    /**
     * Display a listing of blog posts.
     */
    public function index(Request $request)
    {
        $query = BlogPost::with('category')->latest();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('author_name', 'like', "%{$search}%")
                  ->orWhere('tags', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $posts = $query->paginate(12)->withQueryString();
        $categories = BlogCategory::orderBy('name')->get();

        return view('admin.blog.posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new blog post.
     */
    public function create()
    {
        $categories = BlogCategory::where('status', 'active')->orderBy('name')->get();
        return view('admin.blog.posts.create', compact('categories'));
    }

    /**
     * Store a newly created blog post in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'          => 'required|string|max:255',
            'slug'           => 'nullable|string|max:255|unique:blog_posts,slug',
            'category_id'    => 'nullable|exists:blog_categories,id',
            'excerpt'        => 'nullable|string|max:1000',
            'content'        => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'author_name'    => 'nullable|string|max:255',
            'reading_time'   => 'nullable|string|max:50',
            'tags'           => 'nullable|string|max:255',
            'status'         => 'required|in:published,draft',
            'is_featured'    => 'nullable|boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $validated['author_name'] = $validated['author_name'] ?: 'Roy Infinity Team';
        $validated['is_featured'] = $request->has('is_featured') ? true : false;

        // Handle Image Upload
        if ($request->hasFile('featured_image')) {
            $uploadDir = public_path('uploads/blog');
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $file = $request->file('featured_image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $validated['featured_image'] = 'uploads/blog/' . $filename;
        }

        BlogPost::create($validated);

        return redirect()->route('admin.blog-posts.index')->with('success', 'Blog article created successfully.');
    }

    /**
     * Show the form for editing the specified blog post.
     */
    public function edit(BlogPost $blog_post)
    {
        $categories = BlogCategory::orderBy('name')->get();
        return view('admin.blog.posts.edit', compact('blog_post', 'categories'));
    }

    /**
     * Update the specified blog post in storage.
     */
    public function update(Request $request, BlogPost $blog_post)
    {
        $validated = $request->validate([
            'title'          => 'required|string|max:255',
            'slug'           => ['nullable', 'string', 'max:255', Rule::unique('blog_posts', 'slug')->ignore($blog_post->id)],
            'category_id'    => 'nullable|exists:blog_categories,id',
            'excerpt'        => 'nullable|string|max:1000',
            'content'        => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'author_name'    => 'nullable|string|max:255',
            'reading_time'   => 'nullable|string|max:50',
            'tags'           => 'nullable|string|max:255',
            'status'         => 'required|in:published,draft',
            'is_featured'    => 'nullable|boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $validated['author_name'] = $validated['author_name'] ?: 'Roy Infinity Team';
        $validated['is_featured'] = $request->has('is_featured') ? true : false;

        // Handle Image Upload
        if ($request->hasFile('featured_image')) {
            $uploadDir = public_path('uploads/blog');
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            // Remove old image if stored in uploads/blog
            if (!empty($blog_post->featured_image) && file_exists(public_path($blog_post->featured_image))) {
                @unlink(public_path($blog_post->featured_image));
            }

            $file = $request->file('featured_image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $validated['featured_image'] = 'uploads/blog/' . $filename;
        }

        $blog_post->update($validated);

        return redirect()->route('admin.blog-posts.index')->with('success', 'Blog article updated successfully.');
    }

    /**
     * Remove the specified blog post from storage.
     */
    public function destroy(BlogPost $blog_post)
    {
        if (!empty($blog_post->featured_image) && file_exists(public_path($blog_post->featured_image))) {
            @unlink(public_path($blog_post->featured_image));
        }

        $blog_post->delete();

        return redirect()->route('admin.blog-posts.index')->with('success', 'Blog article deleted successfully.');
    }
}
