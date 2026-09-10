@extends('admin.layouts.master')

@section('title', 'Post New Job')
@section('page-title', 'Post New Job Opening')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold m-0 text-dark">Post New Job Opening</h4>
        <p class="text-muted small m-0">Fill out vacancy details, requirements, and publishing status.</p>
    </div>
    <a href="{{ route('admin.jobs.index') }}" class="btn btn-outline-secondary px-4">
        <i class="fa-solid fa-arrow-left me-2"></i> Back to Jobs List
    </a>
</div>

<form action="{{ route('admin.jobs.store') }}" method="POST">
    @csrf

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="admin-card mb-4">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-briefcase text-primary me-2"></i> Job Details</h5>
                </div>
                <div class="admin-card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-bold">Job Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" placeholder="e.g. Senior Staff Nurse (ICU)" value="{{ old('title') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Job Category <span class="text-danger">*</span></label>
                            <select name="category" class="form-select" required>
                                <option value="">-- Select Category --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->name }}" {{ old('category') === $cat->name ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-md-6">
                            <label class="form-label fw-bold">Job Type <span class="text-danger">*</span></label>
                            <select name="type" class="form-select" required>
                                <option value="Full-time" {{ old('type') === 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                <option value="Part-time" {{ old('type') === 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                <option value="Contract" {{ old('type') === 'Contract' ? 'selected' : '' }}>Contract</option>
                                <option value="Freelance" {{ old('type') === 'Freelance' ? 'selected' : '' }}>Freelance</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Company / Hospital Name <small class="text-muted fw-normal">(Optional)</small></label>
                            <input type="text" name="company_name" class="form-control" placeholder="e.g. MetroCare Hospital" value="{{ old('company_name') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Location <span class="text-danger">*</span></label>
                            <input type="text" name="location" class="form-control" placeholder="e.g. Durgapur, West Bengal" value="{{ old('location') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Salary Range</label>
                            <input type="text" name="salary_range" class="form-control" placeholder="e.g. ₹25,000 - ₹35,000 / month" value="{{ old('salary_range') }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Experience Required</label>
                            <input type="text" name="experience_required" class="form-control" placeholder="e.g. 2-5 Years" value="{{ old('experience_required') }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Job Description <span class="text-danger">*</span></label>
                            <textarea name="description" rows="6" class="form-control" placeholder="Detailed job summary and key responsibilities..." required>{{ old('description') }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold">Job Requirements & Qualifications</label>
                            <textarea name="requirements" rows="5" class="form-control" placeholder="• B.Sc Nursing or GNM&#10;• Minimum 2 years ICU experience">{{ old('requirements') }}</textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Perks & Benefits</label>
                            <textarea name="benefits" rows="4" class="form-control" placeholder="• Free Accommodation&#10;• Health Insurance">{{ old('benefits') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="admin-card mb-4">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-sliders text-success me-2"></i> Publishing Settings</h5>
                </div>
                <div class="admin-card-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-select" required>
                            <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published (Active on site)</option>
                            <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft (Hidden)</option>
                            <option value="closed" {{ old('status') === 'closed' ? 'selected' : '' }}>Closed (Applications Stopped)</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Application Deadline</label>
                        <input type="date" name="deadline" class="form-control" value="{{ old('deadline') }}">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="is_featured" value="1" id="is_featured" {{ old('is_featured') ? 'checked' : '' }}>
                        <label class="form-check-label fw-bold" for="is_featured">Mark as Featured Job</label>
                    </div>

                    <hr>

                    <button type="submit" class="btn btn-primary-admin w-100 py-2 shadow-sm">
                        <i class="fa-solid fa-floppy-disk me-2"></i> Save & Publish Job
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
