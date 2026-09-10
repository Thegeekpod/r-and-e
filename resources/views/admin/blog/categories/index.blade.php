@extends('admin.layouts.master')

@section('title', 'Blog Categories')
@section('page-title', 'Blog Categories')

@section('content')
<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div>
        <h4 class="fw-bold m-0 text-dark">Blog Categories</h4>
        <p class="text-muted small m-0">Organize and structure blog articles into specialized topic categories.</p>
    </div>
    <button type="button" class="btn btn-primary-admin px-4" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
        <i class="fa-solid fa-plus me-2"></i> Add Category
    </button>
</div>

<div class="admin-card">
    <div class="admin-card-header d-flex justify-content-between align-items-center">
        <h5><i class="fa-solid fa-tags me-2" style="color: var(--primary-accent);"></i> Categories List ({{ $categories->count() }})</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 25%;">Category Name</th>
                    <th style="width: 20%;">Slug</th>
                    <th style="width: 30%;">Description</th>
                    <th style="width: 10%;" class="text-center">Articles</th>
                    <th style="width: 15%;" class="text-end pe-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>
                            <div class="fw-bold text-dark">{{ $category->name }}</div>
                            @if($category->status === 'active')
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1 small">Active</span>
                            @else
                                <span class="badge bg-secondary-subtle text-secondary border px-2 py-1 small">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border font-monospace">{{ $category->slug }}</span>
                        </td>
                        <td>
                            <span class="text-muted small">{{ $category->description ? Str::limit($category->description, 80) : '—' }}</span>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-dark-subtle text-dark border px-2 py-1">
                                <i class="fa-solid fa-newspaper me-1"></i> {{ $category->posts_count }}
                            </span>
                        </td>
                        <td class="text-end pe-4">
                            <div class="d-inline-flex gap-2">
                                <button type="button" class="btn btn-sm btn-outline-primary edit-category-btn" 
                                    data-id="{{ $category->id }}"
                                    data-name="{{ $category->name }}"
                                    data-slug="{{ $category->slug }}"
                                    data-description="{{ $category->description }}"
                                    data-status="{{ $category->status }}"
                                    data-order="{{ $category->order }}"
                                    title="Edit Category">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <form action="{{ route('admin.blog-categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete \'{{ $category->name }}\'? Posts in this category will be unassigned.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Category">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="fa-solid fa-tags fs-2 mb-3 text-secondary d-block"></i>
                            <h6 class="fw-bold">No blog categories found</h6>
                            <p class="small text-muted mb-3">Add your first category to start organizing articles.</p>
                            <button type="button" class="btn btn-sm btn-primary-admin" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                                <i class="fa-solid fa-plus me-1"></i> Add Category
                            </button>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Add Category Modal --}}
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form action="{{ route('admin.blog-categories.store') }}" method="POST">
                @csrf
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-bold text-dark" id="addCategoryModalLabel">
                        <i class="fa-solid fa-circle-plus me-2" style="color: var(--primary-accent);"></i> Add New Category
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. Finance & Taxation" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Slug <small class="text-muted fw-normal">(Optional, auto-generated)</small></label>
                        <input type="text" name="slug" class="form-control" placeholder="e.g. finance-taxation">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <textarea name="description" rows="3" class="form-control" placeholder="Brief summary of what this category covers..."></textarea>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-select" required>
                                <option value="active">Active (Visible)</option>
                                <option value="inactive">Inactive (Hidden)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Display Order</label>
                            <input type="number" name="order" class="form-control" value="0">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-admin">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Save Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Edit Category Modal --}}
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form id="editCategoryForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-bold text-dark" id="editCategoryModalLabel">
                        <i class="fa-solid fa-pen-to-square me-2" style="color: var(--primary-accent);"></i> Edit Category
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Category Name <span class="text-danger">*</span></label>
                        <input type="text" id="edit_name" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Slug <span class="text-danger">*</span></label>
                        <input type="text" id="edit_slug" name="slug" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <textarea id="edit_description" name="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Status <span class="text-danger">*</span></label>
                            <select id="edit_status" name="status" class="form-select" required>
                                <option value="active">Active (Visible)</option>
                                <option value="inactive">Inactive (Hidden)</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Display Order</label>
                            <input type="number" id="edit_order" name="order" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-admin">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Update Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('.edit-category-btn');
        const editModal = new bootstrap.Modal(document.getElementById('editCategoryModal'));
        const editForm = document.getElementById('editCategoryForm');

        editButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.dataset.id;
                document.getElementById('edit_name').value = this.dataset.name;
                document.getElementById('edit_slug').value = this.dataset.slug;
                document.getElementById('edit_description').value = this.dataset.description || '';
                document.getElementById('edit_status').value = this.dataset.status;
                document.getElementById('edit_order').value = this.dataset.order || '0';

                editForm.action = `/admin/blog-categories/${id}`;
                editModal.show();
            });
        });
    });
</script>
@endpush
@endsection
