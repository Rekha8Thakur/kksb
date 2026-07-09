<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Testimonial;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage testimonials');
    }

    public function index(): View
    {
        $testimonials = Testimonial::orderBy('order')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create(): View
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_company' => 'nullable|string|max:255',
            'feedback' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'client_avatar' => 'nullable|image|max:2048',
        ]);

        $avatarPath = null;
        if ($request->hasFile('client_avatar')) {
            $avatarPath = ImageService::uploadAndOptimize($request->file('client_avatar'), 'testimonials');
        }

        $testimonial = Testimonial::create([
            'client_name' => $request->client_name,
            'client_company' => $request->client_company,
            'feedback' => $request->feedback,
            'rating' => $request->rating,
            'client_avatar' => $avatarPath,
            'order' => Testimonial::count(),
        ]);

        ActivityLog::log('Created Testimonial', 'Created testimonial from: ' . $testimonial->client_name);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_company' => 'nullable|string|max:255',
            'feedback' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'client_avatar' => 'nullable|image|max:2048',
        ]);

        $avatarPath = $testimonial->client_avatar;
        if ($request->hasFile('client_avatar')) {
            $avatarPath = ImageService::uploadAndOptimize($request->file('client_avatar'), 'testimonials');
        }

        $testimonial->update([
            'client_name' => $request->client_name,
            'client_company' => $request->client_company,
            'feedback' => $request->feedback,
            'rating' => $request->rating,
            'client_avatar' => $avatarPath,
        ]);

        ActivityLog::log('Updated Testimonial', 'Updated testimonial from: ' . $testimonial->client_name);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        ActivityLog::log('Deleted Testimonial', 'Deleted testimonial from: ' . $testimonial->client_name);
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }

    public function reorder(Request $request): RedirectResponse
    {
        $orders = $request->input('orders', []);
        foreach ($orders as $index => $id) {
            Testimonial::where('id', $id)->update(['order' => $index]);
        }

        ActivityLog::log('Reordered Testimonials', 'Reordered testimonials sequence.');

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonials reordered successfully.');
    }
}
