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

    /**
     * Display Influencer Custom Registration Web Page.
     */
    public function influencerForm(): View
    {
        return view('join-influencer');
    }

    /**
     * Store Influencer Custom Registration fields.
     */
    public function storeInfluencer(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'instagram' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:120',
            'gender' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'comfortable_camera' => 'required|string|max:255',
            'past_experience' => 'required|string|max:255',
            'shoot_comfort' => 'required|array',
            'languages' => 'required|array',
            'travel_comfort' => 'required|string|max:255',
            'photos' => 'required|array|min:2|max:5',
            'photos.*' => 'image|max:10240', // max 10MB per photo
            'intro_video' => 'nullable|file|max:51200', // max 50MB
            'seeking' => 'required|string|max:1000',
            'trial_ok' => 'required|string|max:255',
            'availability' => 'required|string|max:255',
            'role_comfort' => 'required|string|max:255',
            'restrictions' => 'required|string|max:1000',
            'expected_amount' => 'required|string|max:255',
            'usage_permission' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
            'honeypot' => 'present|max:0',
        ]);

        // Upload Photos
        $uploadedPhotos = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/applications/photos'), $filename);
                $uploadedPhotos[] = '/uploads/applications/photos/' . $filename;
            }
        }

        // Upload Intro Video
        $uploadedVideo = null;
        if ($request->hasFile('intro_video')) {
            $file = $request->file('intro_video');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/applications/videos'), $filename);
            $uploadedVideo = '/uploads/applications/videos/' . $filename;
        }

        // Bundle custom fields into form_data
        $formData = [
            'age' => $request->age,
            'gender' => $request->gender,
            'city' => $request->city,
            'comfortable_camera' => $request->comfortable_camera,
            'past_experience' => $request->past_experience,
            'shoot_comfort' => $request->shoot_comfort,
            'languages' => $request->languages,
            'travel_comfort' => $request->travel_comfort,
            'photos' => $uploadedPhotos,
            'intro_video' => $uploadedVideo,
            'seeking' => $request->seeking,
            'trial_ok' => $request->trial_ok,
            'availability' => $request->availability,
            'role_comfort' => $request->role_comfort,
            'restrictions' => $request->restrictions,
            'expected_amount' => $request->expected_amount,
            'usage_permission' => $request->usage_permission,
        ];

        JoinApplication::create([
            'type' => 'influencer',
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'social_link' => $request->instagram,
            'message' => $request->message,
            'form_data' => $formData,
            'status' => 'pending',
        ]);

        return redirect()->route('join-us')->with('success', 'Your KKSB Creative Faces registration has been submitted successfully.');
    }

    /**
     * Display Career Custom Application Web Page.
     */
    public function careerForm(): View
    {
        return view('join-career');
    }

    /**
     * Store Career Custom Application fields.
     */
    public function storeCareer(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'city' => 'required|string|max:255',
            'applying_for' => 'required|array',
            'software_knowledge' => 'nullable|string|max:1000',
            'experience_level' => 'required|array',
            'own_camera' => 'nullable|string|max:255',
            'own_gimbal' => 'nullable|string|max:255',
            'own_vehicle' => 'nullable|string|max:255',
            'laptop_specs' => 'nullable|string|max:1000',
            'instagram' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'previous_work' => 'nullable|string|max:255',
            'relocate_solan' => 'nullable|string|max:255',
            'comfort_deadlines' => 'nullable|string|max:255',
            'salary_expected' => 'nullable|string|max:255',
            'join_availability' => 'nullable|string|max:255',
            'resumes' => 'nullable|array|max:5',
            'resumes.*' => 'file|mimes:pdf,doc,docx,zip|max:10240', // max 10MB per file
            'honeypot' => 'present|max:0',
        ]);

        // Upload Resumes
        $uploadedResumes = [];
        if ($request->hasFile('resumes')) {
            foreach ($request->file('resumes') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/applications/resumes'), $filename);
                $uploadedResumes[] = '/uploads/applications/resumes/' . $filename;
            }
        }

        // Bundle custom fields into form_data
        $formData = [
            'city' => $request->city,
            'applying_for' => $request->applying_for,
            'software_knowledge' => $request->software_knowledge,
            'experience_level' => $request->experience_level,
            'own_camera' => $request->own_camera,
            'own_gimbal' => $request->own_gimbal,
            'own_vehicle' => $request->own_vehicle,
            'laptop_specs' => $request->laptop_specs,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'previous_work' => $request->previous_work,
            'relocate_solan' => $request->relocate_solan,
            'comfort_deadlines' => $request->comfort_deadlines,
            'salary_expected' => $request->salary_expected,
            'join_availability' => $request->join_availability,
            'resumes' => $uploadedResumes,
        ];

        // Format position as a comma-separated string for applying_for roles
        $position = implode(', ', $request->applying_for);

        JoinApplication::create([
            'type' => 'career',
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'social_link' => $request->instagram,
            'resume_link' => count($uploadedResumes) > 0 ? $uploadedResumes[0] : null,
            'position' => $position,
            'message' => 'Applied for career positions: ' . $position,
            'form_data' => $formData,
            'status' => 'pending',
        ]);

        return redirect()->route('join-us')->with('success', 'Your KKSB Creative Team application has been submitted successfully.');
    }
}
