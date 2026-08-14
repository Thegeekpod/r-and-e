@extends('admin.layouts.master')

@section('title', 'Manage Testimonials')
@section('page-title', 'Client Testimonials')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold m-0 text-dark">Client Testimonials</h4>
        <p class="text-muted small m-0">Add, edit, or remove testimonials displayed on the home page.</p>
    </div>
    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary-admin">
        <i class="fa-solid fa-plus me-2"></i> Add New Testimonial
    </a>
</div>

<div class="admin-card">
    <div class="admin-card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 70px;">Avatar</th>
                        <th>Client Details</th>
                        <th>Review</th>
                        <th>Rating</th>
                        <th>Theme</th>
                        <th>Order</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $t)
                        <tr>
                            <td>
                                <img src="{{ $t->avatar_url }}" alt="{{ $t->name }}" class="rounded-circle shadow-sm" width="48" height="48" style="object-fit: cover;">
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{ $t->name }}</div>
                                <small class="text-muted">{{ $t->role ?? 'Client' }}</small>
                            </td>
                            <td style="max-width: 280px;">
                                <div class="text-truncate small">{{ $t->review }}</div>
                            </td>
                            <td>
                                <span class="text-warning">
                                    @for($i=0; $i<$t->rating; $i++) ★ @endfor
                                </span>
                            </td>
                            <td>
                                @if($t->theme == 'dark')
                                    <span class="badge bg-dark text-white">Dark Card</span>
                                @else
                                    <span class="badge bg-success text-white">Lime Card</span>
                                @endif
                            </td>
                            <td>{{ $t->order }}</td>
                            <td>
                                @if($t->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.testimonials.edit', $t) }}" class="btn btn-sm btn-outline-primary me-2">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.testimonials.destroy', $t) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <i class="fa-regular fa-comment-dots fs-1 d-block mb-3 text-secondary"></i>
                                No testimonials yet. Click "Add New Testimonial" to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
