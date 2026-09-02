@extends('admin.layouts.master')

@section('title', 'Job Categories Management | Admin Panel')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1"><i class="fa-solid fa-layer-group text-primary me-2"></i> Job Categories CRUD</h3>
            <p class="text-muted mb-0">Create, edit, and manage job categories for placement portal search &amp; filtering.</p>
        </div>
        <button class="btn btn-primary-admin" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
            <i class="fa-solid fa-plus me-2"></i> Add New Category
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm mb-4" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="admin-card">
        <div class="admin-card-header d-flex justify-content-between align-items-center">
            <h5 class="m-0"><i class="fa-solid fa-list me-2"></i> All Categories ({{ $categories->total() }})</h5>
        </div>
        <div class="admin-card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle custom-admin-table mb-0">
                    <thead>
                        <tr>
                            <th style="width: 60px;">Icon</th>
                            <th>Category Name</th>
                            <th>Slug</th>
                            <th>Active Jobs</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th class="text-end" style="width: 140px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                        <tr>
                            <td>
                                <div class="bg-light text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="fa-solid {{ $category->icon ?? 'fa-folder' }} fs-5"></i>
                                </div>
                            </td>
                            <td>
                                <strong class="text-dark fs-6">{{ $category->name }}</strong>
                            </td>
                            <td><code class="text-muted">{{ $category->slug }}</code></td>
                            <td>
                                <span class="badge bg-primary rounded-pill px-3 py-2 fs-7">
                                    <i class="fa-solid fa-briefcase me-1"></i> {{ $category->jobs_count }} Jobs
                                </span>
                            </td>
                            <td>
                                @if($category->status === 'active')
                                    <span class="badge bg-success-soft text-success px-3 py-2"><i class="fa-solid fa-circle-check me-1"></i> Active</span>
                                @else
                                    <span class="badge bg-secondary-soft text-secondary px-3 py-2"><i class="fa-solid fa-circle-minus me-1"></i> Inactive</span>
                                @endif
                            </td>
                            <td>
                                <small class="text-muted">{{ Str::limit($category->description, 60) ?? 'N/A' }}</small>
                            </td>
                            <td class="text-end">
                                <button class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#editCategoryModal{{ $category->id }}" title="Edit Category">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <form action="{{ route('admin.job-categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Category">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Category Modal -->
                        <div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('admin.job-categories.update', $category->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bold"><i class="fa-solid fa-pen-to-square me-2 text-primary"></i> Edit Category: {{ $category->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Category Name <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">FontAwesome Icon Class</label>
                                                <input type="text" name="icon" class="form-control" placeholder="e.g. fa-user-nurse" value="{{ old('icon', $category->icon) }}">
                                                <small class="text-muted">Use FontAwesome 6 icon class (e.g. <code>fa-hospital</code>, <code>fa-user-nurse</code>)</small>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Status <span class="text-danger">*</span></label>
                                                <select name="status" class="form-select" required>
                                                    <option value="active" {{ $category->status === 'active' ? 'selected' : '' }}>Active</option>
                                                    <option value="inactive" {{ $category->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Description</label>
                                                <textarea name="description" rows="3" class="form-control" placeholder="Short summary of this category...">{{ old('description', $category->description) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary-admin"><i class="fa-solid fa-floppy-disk me-1"></i> Update Category</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="fa-solid fa-layer-group fa-3x mb-3 d-block"></i>
                                <h5>No Categories Found</h5>
                                <p class="mb-0">Click "Add New Category" to create your first job category.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if($categories->hasPages())
        <div class="admin-card-footer">
            {{ $categories->links() }}
        </div>
        @endif
    </div>
</div>

<!-- Create Category Modal -->
<div class="modal fade" id="createCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.job-categories.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold"><i class="fa-solid fa-plus-circle me-2 text-primary"></i> Create New Job Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. Healthcare / Nursing" value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">FontAwesome Icon Class</label>
                        <input type="text" name="icon" class="form-control" placeholder="e.g. fa-user-nurse" value="{{ old('icon') }}">
                        <small class="text-muted">Use FontAwesome 6 icon class (e.g. <code>fa-hospital</code>, <code>fa-user-nurse</code>)</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-select" required>
                            <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <textarea name="description" rows="3" class="form-control" placeholder="Short summary of this category...">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-admin"><i class="fa-solid fa-plus me-1"></i> Save Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
