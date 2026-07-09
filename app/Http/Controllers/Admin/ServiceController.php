<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Service;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage services');
    }

    public function index(): View
    {
        $services = Service::orderBy('order')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create(): View
    {
        return view('admin.services.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:100',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'benefits_raw' => 'nullable|string',
            'features_raw' => 'nullable|string',
            'image' => 'nullable|image|max:5120',
        ]);

        $slug = Str::slug($request->title);
        // Ensure slug is unique
        $slugCount = Service::where('slug', 'like', $slug . '%')->count();
        if ($slugCount > 0) {
            $slug .= '-' . ($slugCount + 1);
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = ImageService::uploadAndOptimize($request->file('image'), 'services');
        }

        // Convert textarea lines into arrays
        $benefits = $request->benefits_raw 
            ? array_filter(array_map('trim', explode("\n", $request->benefits_raw)))
            : [];
        $features = $request->features_raw
            ? array_filter(array_map('trim', explode("\n", $request->features_raw)))
            : [];

        $service = Service::create([
            'title' => $request->title,
            'slug' => $slug,
            'icon' => $request->icon,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'benefits' => $benefits,
            'features' => $features,
            'image_path' => $imagePath,
            'is_active' => $request->has('is_active'),
            'order' => Service::count(), // Add to the end by default
        ]);

        ActivityLog::log('Created Service', 'Created service: ' . $service->title);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service): View
    {
        // Join arrays by newlines to edit in textarea
        $benefits_raw = $service->benefits ? implode("\n", $service->benefits) : '';
        $features_raw = $service->features ? implode("\n", $service->features) : '';

        return view('admin.services.edit', compact('service', 'benefits_raw', 'features_raw'));
    }

    public function update(Request $request, Service $service): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:100',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
            'benefits_raw' => 'nullable|string',
            'features_raw' => 'nullable|string',
            'image' => 'nullable|image|max:5120',
        ]);

        $imagePath = $service->image_path;
        if ($request->hasFile('image')) {
            $imagePath = ImageService::uploadAndOptimize($request->file('image'), 'services');
        }

        $benefits = $request->benefits_raw 
            ? array_filter(array_map('trim', explode("\n", $request->benefits_raw)))
            : [];
        $features = $request->features_raw
            ? array_filter(array_map('trim', explode("\n", $request->features_raw)))
            : [];

        $service->update([
            'title' => $request->title,
            'icon' => $request->icon,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'benefits' => $benefits,
            'features' => $features,
            'image_path' => $imagePath,
            'is_active' => $request->has('is_active'),
        ]);

        ActivityLog::log('Updated Service', 'Updated service: ' . $service->title);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service): RedirectResponse
    {
        ActivityLog::log('Deleted Service', 'Deleted service: ' . $service->title);
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }

    /**
     * Handle ordering of services.
     */
    public function reorder(Request $request): RedirectResponse
    {
        $orders = $request->input('orders', []);
        foreach ($orders as $index => $id) {
            Service::where('id', $id)->update(['order' => $index]);
        }

        ActivityLog::log('Reordered Services', 'Reordered agency services sequence.');

        return redirect()->route('admin.services.index')->with('success', 'Services reordered successfully.');
    }
}
