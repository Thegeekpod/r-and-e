@extends('admin.layouts.master')

@section('title', 'Write New Blog Article')
@section('page-title', 'Create Blog Post')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold m-0 text-dark">Write New Blog Article</h4>
        <p class="text-muted small m-0">Compose articles, manage editorial content, and publish to the live portal.</p>
    </div>
    <a href="{{ route('admin.blog-posts.index') }}" class="btn btn-outline-secondary px-3">
        <i class="fa-solid fa-arrow-left me-1"></i> Back to Articles
    </a>
</div>

<form action="{{ route('admin.blog-posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row g-4">
        {{-- Main Article Details --}}
        <div class="col-lg-8">
            <div class="admin-card mb-4">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-pen-nib me-2" style="color: var(--primary-accent);"></i> Article Content</h5>
                </div>
                <div class="admin-card-body p-4">
                    <div class="mb-4">
                        <label class="form-label fw-bold" for="title">Article Title <span class="text-danger">*</span></label>
                        <input type="text" id="title" name="title" class="form-control form-control-lg @error('title') is-invalid @enderror" placeholder="e.g. Essential Tax Saving Strategies for Growing Businesses in 2026" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold" for="slug">URL Slug <small class="text-muted fw-normal">(Optional, auto-generated from title)</small></label>
                        <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="e.g. essential-tax-saving-strategies-2026" value="{{ old('slug') }}">
                        @error('slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold" for="excerpt">Short Summary / Excerpt</label>
                        <textarea id="excerpt" name="excerpt" rows="3" class="form-control @error('excerpt') is-invalid @enderror" placeholder="A brief preview shown in search results and blog listing cards...">{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold" for="article_content">Full Article Body <span class="text-danger">*</span></label>
                        <textarea id="article_content" name="content" rows="14" class="form-control font-monospace @error('content') is-invalid @enderror" placeholder="Write full article body. HTML formatting tags (<h2>, <p>, <ul>, <li>, <blockquote>, <strong>) are supported." required>{{ old('content') }}</textarea>
                        <div class="form-text text-muted mt-1">Tip: You can use standard HTML formatting tags like &lt;h2&gt;, &lt;p&gt;, &lt;blockquote&gt;, &lt;ul&gt;, &lt;li&gt;, and &lt;strong&gt;.</div>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- Publishing & Meta Sidebar --}}
        <div class="col-lg-4">
            {{-- Publish Card --}}
            <div class="admin-card mb-4">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-sliders me-2" style="color: var(--primary-accent);"></i> Publishing</h5>
                </div>
                <div class="admin-card-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-select" required>
                            <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published (Active on site)</option>
                            <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft (Hidden)</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Category</label>
                        <select name="category_id" class="form-select">
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured" {{ old('is_featured') ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="is_featured">Featured Spotlight Article</label>
                    </div>

                    <hr>

                    <button type="submit" class="btn btn-primary-admin w-100 py-2 shadow-sm">
                        <i class="fa-solid fa-floppy-disk me-2"></i> Save &amp; Publish Article
                    </button>
                </div>
            </div>

            {{-- Media & Author Card --}}
            <div class="admin-card mb-4">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-image me-2" style="color: var(--primary-accent);"></i> Featured Image &amp; Author</h5>
                </div>
                <div class="admin-card-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Featured Image</label>
                        <input type="file" id="featured_image" name="featured_image" class="form-control @error('featured_image') is-invalid @enderror" accept="image/*">
                        @error('featured_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <div id="imagePreviewContainer" class="img-preview-box mt-3 d-none w-100">
                            <img id="imagePreview" src="#" alt="Preview" class="img-fluid rounded">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Author Name</label>
                        <input type="text" name="author_name" class="form-control" placeholder="e.g. Roy Infinity Editorial" value="{{ old('author_name', 'Roy Infinity Team') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Reading Time <small class="text-muted fw-normal">(e.g. 5 min read)</small></label>
                        <input type="text" name="reading_time" class="form-control" placeholder="Auto-calculated if left blank" value="{{ old('reading_time') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Article Tags <small class="text-muted fw-normal">(Comma-separated)</small></label>
                        <input type="text" name="tags" class="form-control" placeholder="e.g. Finance, Tax Planning, GST" value="{{ old('tags') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@push('scripts')
<script>
    document.getElementById('featured_image')?.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(evt) {
                const img = document.getElementById('imagePreview');
                const container = document.getElementById('imagePreviewContainer');
                img.src = evt.target.result;
                container.classList.remove('d-none');
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection
