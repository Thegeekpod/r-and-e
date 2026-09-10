@extends('admin.layouts.master')

@section('title', 'Blog Posts')
@section('page-title', 'Blog & Articles')

@section('content')
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div>
        <h4 class="fw-bold m-0 text-dark">Blog & Articles Management</h4>
        <p class="text-muted small m-0">Create, edit, and publish editorial content and industry insights.</p>
    </div>
    <a href="{{ route('admin.blog-posts.create') }}" class="btn btn-primary-admin px-4">
        <i class="fa-solid fa-plus me-2"></i> Write New Article
    </a>
</div>

{{-- Search & Filter Card --}}
<div class="admin-card mb-4">
    <div class="admin-card-body p-3">
        <form method="GET" action="{{ route('admin.blog-posts.index') }}" class="row g-2 align-items-center">
            <div class="col-md-5 col-sm-12">
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
                    <input type="text" name="search" class="form-control border-start-0" placeholder="Search by title, author, or tags..." value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <select name="category_id" class="form-select">
                    <option value="">-- All Categories --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 col-sm-6">
                <select name="status" class="form-select">
                    <option value="">-- All Status --</option>
                    <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
            <div class="col-md-2 col-sm-12 d-flex gap-2">
                <button type="submit" class="btn btn-primary-admin flex-grow-1">Filter</button>
                @if(request('search') || request('category_id') || request('status'))
                    <a href="{{ route('admin.blog-posts.index') }}" class="btn btn-outline-secondary">Reset</a>
                @endif
            </div>
        </form>
    </div>
</div>

{{-- Articles Table Card --}}
<div class="admin-card">
    <div class="admin-card-header d-flex justify-content-between align-items-center">
        <h5><i class="fa-solid fa-newspaper me-2" style="color: var(--primary-accent);"></i> Published Articles ({{ $posts->total() }})</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 35%;">Article</th>
                    <th style="width: 15%;">Category</th>
                    <th style="width: 15%;">Author & Date</th>
                    <th style="width: 10%;" class="text-center">Views</th>
                    <th style="width: 10%;">Status</th>
                    <th style="width: 15%;" class="text-end pe-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div style="width: 56px; height: 56px; min-width: 56px; border-radius: 8px; overflow: hidden; background: #e9ecef;">
                                    <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <div>
                                    <div class="fw-bold text-dark mb-1">
                                        <a href="{{ route('admin.blog-posts.edit', $post->id) }}" class="text-dark text-decoration-none">
                                            {{ $post->title }}
                                        </a>
                                        @if($post->is_featured)
                                            <span class="badge bg-warning text-dark ms-1"><i class="fa-solid fa-star me-1"></i> Featured</span>
                                        @endif
                                    </div>
                                    <div class="text-muted small text-truncate" style="max-width: 280px;">
                                        {{ $post->excerpt ?: Str::limit(strip_tags($post->content), 80) }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            @if($post->category)
                                <span class="badge bg-light text-dark border px-2 py-1">{{ $post->category->name }}</span>
                            @else
                                <span class="badge bg-light text-muted border px-2 py-1">Uncategorized</span>
                            @endif
                        </td>
                        <td>
                            <div class="small fw-semibold text-dark">{{ $post->author_name }}</div>
                            <div class="text-muted small">{{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}</div>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-light text-dark border px-2 py-1">
                                <i class="fa-regular fa-eye me-1 text-primary"></i> {{ number_format($post->views_count) }}
                            </span>
                        </td>
                        <td>
                            @if($post->status === 'published')
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">
                                    <i class="fa-solid fa-circle-check me-1"></i> Published
                                </span>
                            @else
                                <span class="badge bg-secondary-subtle text-secondary border px-2 py-1">
                                    <i class="fa-solid fa-clock me-1"></i> Draft
                                </span>
                            @endif
                        </td>
                        <td class="text-end pe-4">
                            <div class="d-inline-flex gap-2">
                                @if($post->status === 'published')
                                    <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="btn btn-sm btn-outline-info" title="View on Site">
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    </a>
                                @endif
                                <a href="{{ route('admin.blog-posts.edit', $post->id) }}" class="btn btn-sm btn-outline-primary" title="Edit Article">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.blog-posts.destroy', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete \'{{ $post->title }}\'?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Article">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-newspaper fs-2 mb-3 text-secondary d-block"></i>
                            <h6 class="fw-bold">No blog articles found</h6>
                            <p class="small text-muted mb-3">Get started by creating your first blog article.</p>
                            <a href="{{ route('admin.blog-posts.create') }}" class="btn btn-sm btn-primary-admin">
                                <i class="fa-solid fa-plus me-1"></i> Write New Article
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($posts->hasPages())
        <div class="card-footer bg-white border-top p-3">
            {{ $posts->links() }}
        </div>
    @endif
</div>
@endsection
