@extends('admin.layouts.master')

@section('title', 'SEO Management')
@section('page-title', 'SEO Settings')

@section('content')
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div>
        <h4 class="fw-bold m-0 text-dark">Search Engine Optimization (SEO)</h4>
        <p class="text-muted small m-0">Manage page titles, meta descriptions, and custom header tracking scripts per URL.</p>
    </div>
    <a href="{{ route('admin.seo.create') }}" class="btn btn-primary-admin px-4">
        <i class="fa-solid fa-plus me-2"></i> Add SEO Entry
    </a>
</div>

{{-- Search & Filter Card --}}
<div class="admin-card mb-4">
    <div class="admin-card-body p-3">
        <form method="GET" action="{{ route('admin.seo.index') }}" class="row g-2 align-items-center">
            <div class="col-md-9 col-sm-8">
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="fa-solid fa-magnifying-glass text-muted"></i></span>
                    <input type="text" name="search" class="form-control border-start-0" placeholder="Search by URL, Meta Title, or Description..." value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-3 col-sm-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary-admin flex-grow-1">Filter</button>
                @if(request('search'))
                    <a href="{{ route('admin.seo.index') }}" class="btn btn-outline-secondary">Reset</a>
                @endif
            </div>
        </form>
    </div>
</div>

{{-- SEO List Table --}}
<div class="admin-card">
    <div class="admin-card-header d-flex justify-content-between align-items-center">
        <h5><i class="fa-solid fa-magnifying-glass me-2" style="color: var(--primary-accent);"></i> Configured SEO Entries ({{ $seoEntries->total() }})</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 22%;">Page URL</th>
                    <th style="width: 28%;">Meta Title</th>
                    <th style="width: 30%;">Meta Description</th>
                    <th style="width: 10%;" class="text-center">Custom Scripts</th>
                    <th style="width: 10%;" class="text-end pe-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($seoEntries as $seo)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-dark-subtle text-dark border px-2 py-1 font-monospace fs-6">
                                    {{ $seo->page_url }}
                                </span>
                                <a href="{{ url($seo->page_url) }}" target="_blank" class="text-muted small text-decoration-none" title="Visit Page">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                </a>
                            </div>
                        </td>
                        <td>
                            <span class="fw-semibold text-dark">{{ $seo->meta_title ?: '—' }}</span>
                        </td>
                        <td>
                            <span class="text-muted small">
                                {{ $seo->meta_description ? Str::limit($seo->meta_description, 95) : '—' }}
                            </span>
                        </td>
                        <td class="text-center">
                            @if(!empty($seo->other_scripts))
                                <span class="badge bg-info-subtle text-info border border-info-subtle px-2 py-1">
                                    <i class="fa-solid fa-code me-1"></i> Injected
                                </span>
                            @else
                                <span class="badge bg-light text-secondary border px-2 py-1">None</span>
                            @endif
                        </td>
                        <td class="text-end pe-4">
                            <div class="d-inline-flex gap-2">
                                <a href="{{ route('admin.seo.edit', $seo->id) }}" class="btn btn-sm btn-outline-primary" title="Edit Entry">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.seo.destroy', $seo->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete the SEO configuration for \'{{ $seo->page_url }}\'?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Entry">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-magnifying-glass fs-2 mb-3 text-secondary d-block"></i>
                            <h6 class="fw-bold">No SEO entries found</h6>
                            <p class="small text-muted mb-3">Get started by creating your first SEO configuration for your web pages.</p>
                            <a href="{{ route('admin.seo.create') }}" class="btn btn-sm btn-primary-admin">
                                <i class="fa-solid fa-plus me-1"></i> Add SEO Entry
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($seoEntries->hasPages())
        <div class="card-footer bg-white border-top p-3">
            {{ $seoEntries->links() }}
        </div>
    @endif
</div>
@endsection
