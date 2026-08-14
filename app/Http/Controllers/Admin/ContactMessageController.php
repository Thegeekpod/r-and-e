<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(15);
        $unreadCount = ContactMessage::where('is_read', false)->count();

        return view('admin.contacts.index', compact('messages', 'unreadCount'));
    }

    public function show(ContactMessage $contact)
    {
        $contact->update(['is_read' => true]);

        return view('admin.contacts.show', compact('contact'));
    }

    public function toggleRead(ContactMessage $contact)
    {
        $contact->update(['is_read' => !$contact->is_read]);

        return redirect()->back()->with('success', 'Message status updated.');
    }

    public function destroy(ContactMessage $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('success', 'Message deleted successfully.');
    }
}
