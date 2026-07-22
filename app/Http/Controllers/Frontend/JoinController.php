<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JoinApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JoinController extends Controller
{
    /**
     * Display Join Us Page.
     */
    public function index(): View
    {
        return view('join-us');
    }

    /**
     * Store join us form submission.
     */
    public function apply(Request $request): RedirectResponse
    {
        $request->validate([
            'type' => 'required|string|in:influencer,career',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'social_link' => 'nullable|required_if:type,influencer|string|max:255',
            'resume_link' => 'nullable|required_if:type,career|string|max:255',
            'position' => 'nullable|required_if:type,career|string|max:255',
            'message' => 'nullable|string|max:2000',
            'honeypot' => 'present|max:0', // Basic bot spam protection
        ]);

        JoinApplication::create([
            'type' => $request->type,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'social_link' => $request->social_link,
            'resume_link' => $request->resume_link,
            'position' => $request->position,
            'message' => $request->message,
            'status' => 'pending',
        ]);

        $messageText = $request->type === 'influencer' 
            ? 'Thank you! Your creator partner application has been submitted successfully.' 
            : 'Thank you! Your career application has been submitted successfully.';

        return redirect()->back()->with('success', $messageText);
    }
}
