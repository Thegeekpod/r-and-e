<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientPartner;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = ClientPartner::orderBy('order')->latest()->get();
        return view('admin.clients.index', compact('clients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'order'     => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'logo'      => 'nullable|image|max:2048',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $request->input('order', 0);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_client_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/clients'), $filename);
            $validated['logo'] = 'uploads/clients/' . $filename;
        }

        ClientPartner::create($validated);

        return redirect()->route('admin.clients.index')->with('success', 'Client partner added successfully!');
    }

    public function update(Request $request, ClientPartner $client)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'order'     => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'logo'      => 'nullable|image|max:2048',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $request->input('order', 0);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_client_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/clients'), $filename);
            $validated['logo'] = 'uploads/clients/' . $filename;
        }

        $client->update($validated);

        return redirect()->route('admin.clients.index')->with('success', 'Client partner updated successfully!');
    }

    public function destroy(ClientPartner $client)
    {
        $client->delete();
        return redirect()->route('admin.clients.index')->with('success', 'Client partner deleted successfully!');
    }
}
