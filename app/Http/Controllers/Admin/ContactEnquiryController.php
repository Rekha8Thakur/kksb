<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\ContactEnquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ContactEnquiryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage contact enquiries');
    }

    public function index(): View
    {
        $enquiries = ContactEnquiry::latest()->paginate(20);
        return view('admin.enquiries.index', compact('enquiries'));
    }

    public function show(ContactEnquiry $enquiry): View
    {
        if ($enquiry->status === 'unread') {
            $enquiry->update(['status' => 'replied']);
            ActivityLog::log('Read Contact Enquiry', 'Opened contact enquiry from ' . $enquiry->name);
        }

        return view('admin.enquiries.show', compact('enquiry'));
    }

    public function updateStatus(Request $request, ContactEnquiry $enquiry): RedirectResponse
    {
        $request->validate([
            'status' => 'required|in:unread,replied,archived',
        ]);

        $enquiry->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Enquiry status updated successfully.');
    }

    public function destroy(ContactEnquiry $enquiry): RedirectResponse
    {
        ActivityLog::log('Deleted Contact Enquiry', 'Deleted contact enquiry from ' . $enquiry->name);
        $enquiry->delete();

        return redirect()->route('admin.enquiries.index')->with('success', 'Enquiry deleted successfully.');
    }

    /**
     * Export all enquiries as a CSV file download.
     */
    public function exportCsv(): StreamedResponse
    {
        $enquiries = ContactEnquiry::latest()->get();
        $filename = 'contact_enquiries_' . now()->format('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];

        $callback = function () use ($enquiries) {
            $file = fopen('php://output', 'w');
            
            // CSV Header Row
            fputcsv($file, [
                'ID', 
                'Name', 
                'Email', 
                'Phone', 
                'Company', 
                'Service Interest', 
                'Budget', 
                'Message', 
                'Status', 
                'Date Submitted'
            ]);

            // CSV Data Rows
            foreach ($enquiries as $enquiry) {
                fputcsv($file, [
                    $enquiry->id,
                    $enquiry->name,
                    $enquiry->email,
                    $enquiry->phone,
                    $enquiry->company,
                    $enquiry->service_interest,
                    $enquiry->budget,
                    $enquiry->message,
                    $enquiry->status,
                    $enquiry->created_at->toDateTimeString()
                ]);
            }

            fclose($file);
        };

        ActivityLog::log('Exported Enquiries CSV', 'Downloaded CSV list of all contact form submissions.');

        return response()->stream($callback, 200, $headers);
    }
}
