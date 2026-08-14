@extends('admin.layouts.master')

@section('title', 'Edit Testimonial')
@section('page-title', 'Edit Testimonial')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold m-0 text-dark">Edit Testimonial</h4>
        <p class="text-muted small m-0">Modify client review, rating, or photo.</p>
    </div>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary">
        <i class="fa-solid fa-arrow-left me-2"></i> Back to List
    </a>
</div>

<div class="admin-card">
    <div class="admin-card-body">
        <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Client Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $testimonial->name) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Role / Designation</label>
                    <input type="text" name="role" class="form-control" value="{{ old('role', $testimonial->role) }}">
                </div>

                <div class="col-12">
                    <label class="form-label">Review / Feedback Text <span class="text-danger">*</span></label>
                    <textarea name="review" rows="4" class="form-control" required>{{ old('review', $testimonial->review) }}</textarea>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Rating Stars</label>
                    <select name="rating" class="form-select">
                        <option value="5" {{ old('rating', $testimonial->rating) == 5 ? 'selected' : '' }}>★★★★★ (5 Stars)</option>
                        <option value="4" {{ old('rating', $testimonial->rating) == 4 ? 'selected' : '' }}>★★★★☆ (4 Stars)</option>
                        <option value="3" {{ old('rating', $testimonial->rating) == 3 ? 'selected' : '' }}>★★★☆☆ (3 Stars)</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Card Color Theme</label>
                    <select name="theme" class="form-select">
                        <option value="dark" {{ old('theme', $testimonial->theme) == 'dark' ? 'selected' : '' }}>Dark Card (#12302A)</option>
                        <option value="lime" {{ old('theme', $testimonial->theme) == 'lime' ? 'selected' : '' }}>Lime Card (#B9FF66)</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Display Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $testimonial->order) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Client Avatar Photo</label>
                    <input type="file" name="avatar" class="form-control">
                    @if($testimonial->avatar)
                        <div class="img-preview-box mt-2" style="max-width: 120px;">
                            <img src="{{ $testimonial->avatar_url }}" alt="Current Avatar">
                        </div>
                    @endif
                </div>

                <div class="col-md-6 d-flex align-items-center mt-4 pt-3">
                    <div class="form-check form-switch fs-5">
                        <input class="form-check-input" type="checkbox" name="is_active" id="isActive" {{ $testimonial->is_active ? 'checked' : '' }}>
                        <label class="form-check-label fs-6 fw-semibold text-dark" for="isActive">Show on Home Page (Active)</label>
                    </div>
                </div>

                <div class="col-12 mt-4 text-end">
                    <button type="submit" class="btn btn-primary-admin px-5">
                        <i class="fa-solid fa-check me-2"></i> Update Testimonial
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
