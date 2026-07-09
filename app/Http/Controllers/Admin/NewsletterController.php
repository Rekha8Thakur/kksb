<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Newsletter;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage newsletter');
    }

    public function index(): View
    {
        $subscribers = Newsletter::latest()->paginate(25);
        return view('admin.newsletter.index', compact('subscribers'));
    }

    public function destroy(Newsletter $newsletter): RedirectResponse
    {
        ActivityLog::log('Removed Newsletter Subscriber', 'Removed subscription for ' . $newsletter->email);
        $newsletter->delete();

        return redirect()->route('admin.newsletter.index')->with('success', 'Subscriber removed successfully.');
    }

    /**
     * Export all newsletter subscribers as a CSV file.
     */
    public function exportCsv(): StreamedResponse
    {
        $subscribers = Newsletter::latest()->get();
        $filename = 'newsletter_subscribers_' . now()->format('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];

        $callback = function () use ($subscribers) {
            $file = fopen('php://output', 'w');
            
            fputcsv($file, ['ID', 'Email Address', 'Status', 'Subscribed At']);

            foreach ($subscribers as $subscriber) {
                fputcsv($file, [
                    $subscriber->id,
                    $subscriber->email,
                    $subscriber->status,
                    $subscriber->created_at->toDateTimeString()
                ]);
            }

            fclose($file);
        };

        ActivityLog::log('Exported Newsletter CSV', 'Downloaded CSV list of all newsletter subscribers.');

        return response()->stream($callback, 200, $headers);
    }
}
