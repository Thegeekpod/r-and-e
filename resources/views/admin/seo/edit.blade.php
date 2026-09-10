@extends('admin.layouts.master')

@section('title', 'Edit SEO Entry')
@section('page-title', 'SEO Management')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div class="d-flex align-items-center gap-2">
        <i class="fa-solid fa-pen-to-square fs-3" style="color: var(--primary-accent);"></i>
        <div>
            <h4 class="fw-bold m-0 text-dark">Edit SEO Entry</h4>
            <p class="text-muted small m-0">Update meta tags, descriptions, or custom head scripts for this URL.</p>
        </div>
    </div>
    <a href="{{ route('admin.seo.index') }}" class="btn btn-outline-secondary px-3">
        <i class="fa-solid fa-arrow-left me-1"></i> Back
    </a>
</div>

<form action="{{ route('admin.seo.update', $seo->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="admin-card mb-4">
        <div class="admin-card-header">
            <h5><i class="fa-solid fa-magnifying-glass me-2" style="color: var(--primary-accent);"></i> SEO Details</h5>
        </div>
        <div class="admin-card-body p-4">
            {{-- Page URL --}}
            <div class="mb-4">
                <label class="form-label fw-bold" for="page_url">
                    Page URL <span class="text-danger">*</span>
                </label>
                <input 
                    type="text" 
                    id="page_url"
                    name="page_url" 
                    class="form-control @error('page_url') is-invalid @enderror" 
                    placeholder="e.g. /about" 
                    value="{{ old('page_url', $seo->page_url) }}" 
                    required
                >
                <div class="form-text text-muted mt-1">Relative URL starting with /</div>
                @error('page_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Meta Title --}}
            <div class="mb-4">
                <label class="form-label fw-bold" for="meta_title">Meta Title</label>
                <input 
                    type="text" 
                    id="meta_title"
                    name="meta_title" 
                    class="form-control @error('meta_title') is-invalid @enderror" 
                    value="{{ old('meta_title', $seo->meta_title) }}"
                    placeholder="e.g. About Us | Roy Infinity Edge Consulting"
                >
                @error('meta_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Meta Description --}}
            <div class="mb-4">
                <label class="form-label fw-bold" for="meta_description">Meta Description</label>
                <textarea 
                    id="meta_description"
                    name="meta_description" 
                    rows="4" 
                    class="form-control @error('meta_description') is-invalid @enderror"
                    placeholder="Enter meta description for search engines..."
                >{{ old('meta_description', $seo->meta_description) }}</textarea>
                @error('meta_description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Other Scripts / Tags --}}
            <div class="mb-4">
                <label class="form-label fw-bold" for="other_scripts">Other Scripts / Tags</label>
                <textarea 
                    id="other_scripts"
                    name="other_scripts" 
                    rows="6" 
                    class="form-control font-monospace @error('other_scripts') is-invalid @enderror"
                    placeholder="<script>...</script> or <meta ...>"
                >{{ old('other_scripts', $seo->other_scripts) }}</textarea>
                <div class="form-text text-muted mt-1">Raw HTML to be injected into the head section. Be careful with this field.</div>
                @error('other_scripts')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    {{-- Form Buttons --}}
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('admin.seo.index') }}" class="btn btn-outline-secondary px-4 py-2">
            Cancel
        </a>
        <button type="submit" class="btn btn-primary-admin px-4 py-2">
            <i class="fa-solid fa-floppy-disk me-1"></i> Update Changes
        </button>
    </div>
</form>
@endsection
