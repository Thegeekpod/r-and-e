@extends('admin.layouts.master')

@section('title', 'Client Partners')
@section('page-title', 'Client Partners & Logos')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold m-0 text-dark">Client Partners</h4>
        <p class="text-muted small m-0">Manage logos and names displayed in the "Our Valuable Clients" section.</p>
    </div>
    <button type="button" class="btn btn-primary-admin" data-bs-toggle="modal" data-bs-target="#addClientModal">
        <i class="fa-solid fa-plus me-2"></i> Add Client Partner
    </button>
</div>

<div class="admin-card">
    <div class="admin-card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 80px;">Logo</th>
                        <th>Client / Company Name</th>
                        <th>Display Order</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                        <tr>
                            <td>
                                @if($client->logo)
                                    <img src="{{ $client->logo_url }}" alt="{{ $client->name }}" height="32" class="object-fit-contain">
                                @else
                                    <span class="badge bg-light text-dark border p-2">{{ $client->name }}</span>
                                @endif
                            </td>
                            <td class="fw-bold text-dark">{{ $client->name }}</td>
                            <td>{{ $client->order }}</td>
                            <td>
                                @if($client->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <button type="button" class="btn btn-sm btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#editModal{{ $client->id }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this client?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $client->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content rounded-4 border-0 shadow">
                                    <form action="{{ route('admin.clients.update', $client) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bold">Edit Client Partner</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Client Name <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control" value="{{ $client->name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Logo Image (Optional)</label>
                                                <input type="file" name="logo" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Display Order</label>
                                                <input type="number" name="order" class="form-control" value="{{ $client->order }}">
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="is_active" id="active{{ $client->id }}" {{ $client->is_active ? 'checked' : '' }}>
                                                <label class="form-check-label" for="active{{ $client->id }}">Active</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary-admin">Update Client</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                No client partners found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Client Modal -->
<div class="modal fade" id="addClientModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-4 border-0 shadow">
            <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add New Client Partner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Client Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. Deloitte / Microsoft" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Logo Image (Optional)</label>
                        <input type="file" name="logo" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Display Order</label>
                        <input type="number" name="order" class="form-control" value="0">
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active" id="activeNew" checked>
                        <label class="form-check-label" for="activeNew">Active</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary-admin">Save Client</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
