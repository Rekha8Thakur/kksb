<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\CareerApplication;
use App\Models\CareerJob;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CareerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage career jobs');
    }

    public function index(): View
    {
        $jobs = CareerJob::withCount('applications')->latest()->get();
        return view('admin.careers.index', compact('jobs'));
    }

    public function create(): View
    {
        return view('admin.careers.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'required|in:full-time,part-time,remote,contract',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'closes_at' => 'nullable|date',
        ]);

        $job = CareerJob::create([
            'title' => $request->title,
            'location' => $request->location,
            'type' => $request->type,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'benefits' => $request->benefits,
            'is_active' => $request->has('is_active'),
            'closes_at' => $request->closes_at,
        ]);

        ActivityLog::log('Created Job Posting', 'Created job opening: ' . $job->title);

        return redirect()->route('admin.careers.index')->with('success', 'Job opening created successfully.');
    }

    public function edit(CareerJob $career): View
    {
        return view('admin.careers.edit', ['job' => $career]);
    }

    public function update(Request $request, CareerJob $career): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'required|in:full-time,part-time,remote,contract',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'closes_at' => 'nullable|date',
        ]);

        $career->update([
            'title' => $request->title,
            'location' => $request->location,
            'type' => $request->type,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'benefits' => $request->benefits,
            'is_active' => $request->has('is_active'),
            'closes_at' => $request->closes_at,
        ]);

        ActivityLog::log('Updated Job Posting', 'Updated job opening: ' . $career->title);

        return redirect()->route('admin.careers.index')->with('success', 'Job opening updated successfully.');
    }

    public function destroy(CareerJob $career): RedirectResponse
    {
        ActivityLog::log('Deleted Job Posting', 'Deleted job opening: ' . $career->title);
        $career->delete();

        return redirect()->route('admin.careers.index')->with('success', 'Job opening deleted successfully.');
    }

    /**
     * List applications for a specific job, or all applications.
     */
    public function applications(?CareerJob $job = null): View
    {
        $query = CareerApplication::with('job');
        
        if ($job) {
            $query->where('career_job_id', $job->id);
        }

        $applications = $query->latest()->get();

        return view('admin.careers.applications', compact('applications', 'job'));
    }

    /**
     * Update application status.
     */
    public function updateApplicationStatus(Request $request, CareerApplication $application): RedirectResponse
    {
        $request->validate([
            'status' => 'required|in:pending,reviewed,rejected,hired',
        ]);

        $application->update(['status' => $request->status]);

        ActivityLog::log('Updated Applicant Status', 'Set applicant ' . $application->name . ' status to ' . $request->status);

        return redirect()->back()->with('success', 'Application status updated successfully.');
    }

    /**
     * Delete application.
     */
    public function destroyApplication(CareerApplication $application): RedirectResponse
    {
        ActivityLog::log('Deleted Job Application', 'Deleted job application from: ' . $application->name);
        $application->delete();

        return redirect()->back()->with('success', 'Job application deleted successfully.');
    }
}
