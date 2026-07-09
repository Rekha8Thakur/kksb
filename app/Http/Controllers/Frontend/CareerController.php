<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CareerApplication;
use App\Models\CareerJob;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CareerController extends Controller
{
    /**
     * Display career job postings lists.
     */
    public function index(): View
    {
        $jobs = CareerJob::where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('closes_at')
                  ->orWhere('closes_at', '>=', now());
            })->latest()->get();

        return view('careers', compact('jobs'));
    }

    /**
     * Store candidate job application.
     */
    public function apply(Request $request): RedirectResponse
    {
        $request->validate([
            'career_job_id' => 'required|exists:career_jobs,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:10240', // Max 10MB
            'cover_letter' => 'nullable|string',
        ]);

        $resumePath = null;
        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            // Store resume in public storage folder
            $path = $file->storeAs('public/resumes', $filename);
            $resumePath = 'storage/resumes/' . $filename;
        }

        CareerApplication::create([
            'career_job_id' => $request->career_job_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'resume_path' => $resumePath,
            'cover_letter' => $request->cover_letter,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Your application has been submitted successfully. We will review your profile shortly!');
    }
}
