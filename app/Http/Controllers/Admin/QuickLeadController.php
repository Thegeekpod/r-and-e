<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuickLead;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class QuickLeadController extends Controller
{
    public function index(Request $request)
    {
        $query = QuickLead::query();

        if ($request->filled('page_filter')) {
            $query->where('source_page', $request->input('page_filter'));
        }

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('service', 'like', "%{$search}%")
                  ->orWhere('source_page', 'like', "%{$search}%");
            });
        }

        $leads = $query->orderBy('created_at', 'desc')->paginate(15)->withQueryString();
        $unreadCount = QuickLead::where('is_read', false)->count();

        // Distinct pages that generated leads for quick filtering
        $distinctPages = QuickLead::select('source_page')
            ->whereNotNull('source_page')
            ->distinct()
            ->pluck('source_page');

        // Global Popup Settings
        $popupSettings = [
            'popup_enabled'     => SiteSetting::get('quick_lead_popup_enabled', '1'),
            'popup_title'       => SiteSetting::get('quick_lead_popup_title', 'Get Free Expert Consultation'),
            'popup_subtitle'    => SiteSetting::get('quick_lead_popup_subtitle', 'Have questions about finance, taxation, admissions, or placements? Talk with our specialists.'),
            'popup_delay'       => SiteSetting::get('quick_lead_popup_delay', '5'),
            'popup_badge'       => SiteSetting::get('quick_lead_popup_badge', 'Instant Support'),
        ];

        return view('admin.quick_leads.index', compact('leads', 'unreadCount', 'distinctPages', 'popupSettings'));
    }

    public function show(QuickLead $quickLead)
    {
        $quickLead->update(['is_read' => true]);

        return view('admin.quick_leads.show', compact('quickLead'));
    }

    public function toggleRead(QuickLead $quickLead)
    {
        $quickLead->update(['is_read' => !$quickLead->is_read]);

        return redirect()->back()->with('success', 'Lead status updated.');
    }

    public function destroy(QuickLead $quickLead)
    {
        $quickLead->delete();

        return redirect()->route('admin.quick-leads.index')->with('success', 'Lead deleted successfully.');
    }

    public function updateSettings(Request $request)
    {
        $enabled = $request->has('quick_lead_popup_enabled') ? '1' : '0';
        SiteSetting::set('quick_lead_popup_enabled', $enabled, 'boolean', 'quick_leads');

        if ($request->has('quick_lead_popup_title')) {
            SiteSetting::set('quick_lead_popup_title', $request->input('quick_lead_popup_title'), 'text', 'quick_leads');
        }

        if ($request->has('quick_lead_popup_subtitle')) {
            SiteSetting::set('quick_lead_popup_subtitle', $request->input('quick_lead_popup_subtitle'), 'text', 'quick_leads');
        }

        if ($request->has('quick_lead_popup_delay')) {
            SiteSetting::set('quick_lead_popup_delay', $request->input('quick_lead_popup_delay', '5'), 'text', 'quick_leads');
        }

        if ($request->has('quick_lead_popup_badge')) {
            SiteSetting::set('quick_lead_popup_badge', $request->input('quick_lead_popup_badge', 'Instant Support'), 'text', 'quick_leads');
        }

        return redirect()->back()->with('success', 'Global Popup Lead settings updated successfully!');
    }
}
