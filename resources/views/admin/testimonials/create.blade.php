@extends('admin.layouts.master')

@section('title', 'Add Testimonial')
@section('page-title', 'Create New Testimonial')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold m-0 text-dark">Add New Testimonial</h4>
        <p class="text-muted small m-0">Fill in client review details and avatar.</p>
    </div>
    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary">
        <i class="fa-solid fa-arrow-left me-2"></i> Back to List
    </a>
</div>

<div class="admin-card">
    <div class="admin-card-body">
        <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Client Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required placeholder="e.g. John Doe">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Role / Designation</label>
                    <input type="text" name="role" class="form-control" value="{{ old('role') }}" placeholder="e.g. Student / Business Owner">
                </div>

                <div class="col-12">
                    <label class="form-label">Review / Feedback Text <span class="text-danger">*</span></label>
                    <textarea name="review" rows="4" class="form-control" required placeholder="Write the testimonial content here...">{{ old('review') }}</textarea>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Rating Stars</label>
                    <select name="rating" class="form-select">
                        <option value="5" {{ old('rating', 5) == 5 ? 'selected' : '' }}>★★★★★ (5 Stars)</option>
                        <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>★★★★☆ (4 Stars)</option>
                        <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>★★★☆☆ (3 Stars)</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Card Color Theme</label>
                    <select name="theme" class="form-select">
                        <option value="dark" {{ old('theme') == 'dark' ? 'selected' : '' }}>Dark Card (#12302A)</option>
                        <option value="lime" {{ old('theme') == 'lime' ? 'selected' : '' }}>Lime Card (#B9FF66)</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Display Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Client Avatar Photo</label>
                    <input type="file" name="avatar" class="form-control">
                </div>

                <div class="col-md-6 d-flex align-items-center mt-4 pt-3">
                    <div class="form-check form-switch fs-5">
                        <input class="form-check-input" type="checkbox" name="is_active" id="isActive" checked>
                        <label class="form-check-label fs-6 fw-semibold text-dark" for="isActive">Show on Home Page (Active)</label>
                    </div>
                </div>

                <div class="col-12 mt-4 text-end">
                    <button type="submit" class="btn btn-primary-admin px-5">
                        <i class="fa-solid fa-check me-2"></i> Save Testimonial
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
