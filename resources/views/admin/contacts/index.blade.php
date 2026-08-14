@extends('admin.layouts.master')

@section('title', 'Contact Messages & Inquiries')
@section('page-title', 'Client Inquiries & Contact Messages')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-bold m-0 text-dark">Contact Inquiries</h4>
        <p class="text-muted small m-0">All messages submitted via the Contact Us form on your website.</p>
    </div>
    @if($unreadCount > 0)
        <span class="badge bg-danger fs-6 px-3 py-2 rounded-pill">
            <i class="fa-solid fa-envelope me-1"></i> {{ $unreadCount }} Unread {{ Str::plural('Inquiry', $unreadCount) }}
        </span>
    @endif
</div>

<div class="admin-card">
    <div class="admin-card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;">Status</th>
                        <th>Sender Details</th>
                        <th>Service Required</th>
                        <th>Subject / Preview</th>
                        <th>Received Date</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $msg)
                        <tr class="{{ !$msg->is_read ? 'table-warning bg-opacity-10 fw-bold' : '' }}">
                            <td class="text-center">
                                @if(!$msg->is_read)
                                    <span class="badge bg-danger" title="Unread Message">New</span>
                                @else
                                    <span class="badge bg-secondary" title="Read">Read</span>
                                @endif
                            </td>
                            <td>
                                <div class="text-dark">{{ $msg->name }}</div>
                                <small class="text-muted d-block"><i class="fa-solid fa-envelope me-1"></i> {{ $msg->email }}</small>
                                @if($msg->phone)
                                    <small class="text-muted d-block"><i class="fa-solid fa-phone me-1"></i> {{ $msg->phone }}</small>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-dark text-white px-2 py-1">{{ $msg->service ?? 'General' }}</span>
                            </td>
                            <td style="max-width: 320px;">
                                @if($msg->subject)
                                    <div class="text-dark mb-1">{{ $msg->subject }}</div>
                                @endif
                                <div class="text-truncate small text-muted">{{ $msg->message }}</div>
                            </td>
                            <td>
                                <small class="text-muted">{{ $msg->created_at->format('M d, Y h:i A') }}</small>
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.contacts.show', $msg) }}" class="btn btn-sm btn-outline-primary me-1" title="View Details">
                                    <i class="fa-solid fa-eye"></i> View
                                </a>

                                <form action="{{ route('admin.contacts.toggleRead', $msg) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-secondary me-1" title="{{ $msg->is_read ? 'Mark as Unread' : 'Mark as Read' }}">
                                        <i class="fa-solid {{ $msg->is_read ? 'fa-envelope' : 'fa-envelope-open' }}"></i>
                                    </button>
                                </form>

                                <form action="{{ route('admin.contacts.destroy', $msg) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete Message">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="fa-regular fa-folder-open fs-1 d-block mb-3 text-secondary"></i>
                                No inquiries or contact messages received yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($messages->hasPages())
            <div class="p-3 border-top">
                {{ $messages->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
