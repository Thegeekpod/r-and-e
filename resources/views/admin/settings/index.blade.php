@extends('admin.layouts.master')

@section('title', 'Global Site Settings')
@section('page-title', 'Global Settings & Contact Information')

@section('content')
<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold m-0 text-dark">Global Site Settings</h4>
            <p class="text-muted small m-0">Manage website brand identity, contact info, and footer links.</p>
        </div>
        <button type="submit" class="btn btn-primary-admin px-4">
            <i class="fa-solid fa-floppy-disk me-2"></i> Save Settings
        </button>
    </div>

    <div class="row g-4">
        <!-- Brand & Logo -->
        <div class="col-md-6">
            <div class="admin-card h-100">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-image text-primary me-2"></i> Brand Identity</h5>
                </div>
                <div class="admin-card-body">
                    <div class="mb-3">
                        <label class="form-label">Site Title (Meta / Header)</label>
                        <input type="text" name="site_title" class="form-control" value="{{ $settings['site_title'] ?? 'Roy Infinity Edge Consulting | Finance, Education, Placement' }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Brand Logo Image</label>
                        <input type="file" name="site_logo" class="form-control">
                        <div class="img-preview-box mt-3 p-3 bg-dark rounded-3">
                            <img src="{{ \App\Models\SiteSetting::getImageUrl('site_logo', 'images/logo.webp') }}" alt="Brand Logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Details -->
        <div class="col-md-6">
            <div class="admin-card h-100">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-address-book text-success me-2"></i> Contact Information</h5>
                </div>
                <div class="admin-card-body">
                    <div class="mb-3">
                        <label class="form-label">Contact Phone Number</label>
                        <input type="text" name="contact_phone" class="form-control" value="{{ $settings['contact_phone'] ?? '(406) 555-0120' }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contact Email Address</label>
                        <input type="email" name="contact_email" class="form-control" value="{{ $settings['contact_email'] ?? 'hey@forestin.com' }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Office Address</label>
                        <textarea name="contact_address" rows="3" class="form-control">{{ $settings['contact_address'] ?? '2972 Westheimer Rd. Santa Ana, Illinois 85486' }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer & Socials -->
        <div class="col-12">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h5><i class="fa-solid fa-share-nodes text-warning me-2"></i> Footer Description & Social Media Links</h5>
                </div>
                <div class="admin-card-body">
                    <div class="mb-4">
                        <label class="form-label">Footer About Description</label>
                        <textarea name="footer_about" rows="3" class="form-control">{{ $settings['footer_about'] ?? 'We offers a comprehensive suite of digital marketing services that cover all aspects of our online presence...' }}</textarea>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label"><i class="fa-brands fa-facebook-f text-primary me-1"></i> Facebook URL</label>
                            <input type="text" name="social_facebook" class="form-control" value="{{ $settings['social_facebook'] ?? '#' }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><i class="fa-brands fa-twitter text-info me-1"></i> Twitter / X URL</label>
                            <input type="text" name="social_twitter" class="form-control" value="{{ $settings['social_twitter'] ?? '#' }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><i class="fa-brands fa-linkedin-in text-primary me-1"></i> LinkedIn URL</label>
                            <input type="text" name="social_linkedin" class="form-control" value="{{ $settings['social_linkedin'] ?? '#' }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><i class="fa-brands fa-instagram text-danger me-1"></i> Instagram URL</label>
                            <input type="text" name="social_instagram" class="form-control" value="{{ $settings['social_instagram'] ?? '#' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
