<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\JoinApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JoinApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage contact enquiries');
    }

    public function index(): View
    {
        $applications = JoinApplication::latest()->paginate(20);
        return view('admin.join_applications.index', compact('applications'));
    }

    public function show(JoinApplication $application): View
    {
        if ($application->status === 'pending') {
            $application->update(['status' => 'reviewed']);
            ActivityLog::log('Reviewed Join Us Application', 'Opened Join Us application from ' . $application->name);
        }

        return view('admin.join_applications.show', compact('application'));
    }

    public function updateStatus(Request $request, JoinApplication $application): RedirectResponse
    {
        $request->validate([
            'status' => 'required|in:pending,reviewed,archived',
        ]);

        $application->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Application status updated successfully.');
    }

    public function destroy(JoinApplication $application): RedirectResponse
    {
        ActivityLog::log('Deleted Join Us Application', 'Deleted join application from ' . $application->name);
        $application->delete();

        return redirect()->route('admin.join-applications.index')->with('success', 'Application deleted successfully.');
    }
}
