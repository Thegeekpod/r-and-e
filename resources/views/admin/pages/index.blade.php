@extends('admin.layouts.master')

@section('title', 'Page Visibility Manager')
@section('page-title', 'Page Manager & Status Controller')

@section('content')
<form action="{{ route('admin.pages.update') }}" method="POST">
    @csrf

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h4 class="fw-bold m-0 text-dark">Page Visibility & Status</h4>
            <p class="text-muted small m-0">Enable or disable specific pages. Disabled pages will automatically show the branded "Coming Soon" screen.</p>
        </div>
        <button type="submit" class="btn btn-primary-admin px-4">
            <i class="fa-solid fa-floppy-disk me-2"></i> Save Page Settings
        </button>
    </div>

    <div class="row g-4">
        @foreach($pages as $key => $page)
            @php
                $statusKey = 'page_' . $key . '_status';
                $msgKey = 'page_' . $key . '_msg';
                // Default active for home, finance, education, about, contact; placement default 0
                $defaultStatus = ($key === 'placement') ? '0' : '1';
                $isEnabled = ($settings[$statusKey] ?? $defaultStatus) === '1';
            @endphp
            <div class="col-md-6">
                <div class="admin-card h-100 border-top border-4 {{ $isEnabled ? 'border-success' : 'border-warning' }}">
                    <div class="admin-card-header d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="fw-bold m-0 text-dark">{{ $page['name'] }}</h5>
                            <small class="text-muted"><a href="{{ $page['url'] }}" target="_blank" class="text-decoration-none text-secondary"><i class="fa-solid fa-link me-1"></i> {{ $page['url'] }}</a></small>
                        </div>
                        <div class="form-check form-switch fs-4 m-0">
                            <input class="form-check-input" type="checkbox" name="{{ $statusKey }}" id="{{ $statusKey }}" {{ $isEnabled ? 'checked' : '' }}>
                        </div>
                    </div>
                    <div class="admin-card-body">
                        <p class="small text-muted mb-3">{{ $page['desc'] }}</p>

                        <div class="mb-3">
                            <label class="form-label small">Current State:</label>
                            @if($isEnabled)
                                <span class="badge bg-success px-3 py-2 rounded-pill"><i class="fa-solid fa-circle-check me-1"></i> Live Page Enabled</span>
                            @else
                                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill"><i class="fa-solid fa-hourglass-half me-1"></i> Coming Soon Screen Active</span>
                            @endif
                        </div>

                        <div>
                            <label class="form-label small">Custom "Coming Soon" Message (shown when disabled)</label>
                            <textarea name="{{ $msgKey }}" rows="2" class="form-control small" placeholder="Leave empty for default message...">{{ $settings[$msgKey] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="text-end mt-4 mb-5">
        <button type="submit" class="btn btn-primary-admin btn-lg px-5 shadow">
            <i class="fa-solid fa-floppy-disk me-2"></i> Save Page Settings
        </button>
    </div>
</form>
@endsection
