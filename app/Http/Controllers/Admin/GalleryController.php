<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Gallery;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage gallery');
    }

    public function index(): View
    {
        $images = Gallery::orderBy('order')->get();
        return view('admin.gallery.index', compact('images'));
    }

    public function create(): View
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|max:5120',
            'type' => 'required|string',
        ]);

        $imagePath = ImageService::uploadAndOptimize($request->file('image'), 'gallery');

        $gallery = Gallery::create([
            'title' => $request->title,
            'image_path' => $imagePath,
            'type' => $request->type,
            'order' => Gallery::count(),
        ]);

        ActivityLog::log('Added Gallery Photo', 'Added photo to gallery: ' . ($gallery->title ?? 'Untitled'));

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery image added successfully.');
    }

    public function edit(Gallery $gallery): View
    {
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery): RedirectResponse
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:5120',
            'type' => 'required|string',
        ]);

        $imagePath = $gallery->image_path;
        if ($request->hasFile('image')) {
            $imagePath = ImageService::uploadAndOptimize($request->file('image'), 'gallery');
        }

        $gallery->update([
            'title' => $request->title,
            'image_path' => $imagePath,
            'type' => $request->type,
        ]);

        ActivityLog::log('Updated Gallery Photo', 'Updated photo in gallery: ' . ($gallery->title ?? 'Untitled'));

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery image updated successfully.');
    }

    public function destroy(Gallery $gallery): RedirectResponse
    {
        ActivityLog::log('Deleted Gallery Photo', 'Deleted photo from gallery: ' . ($gallery->title ?? 'Untitled'));
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery image deleted successfully.');
    }

    public function reorder(Request $request): RedirectResponse
    {
        $orders = $request->input('orders', []);
        foreach ($orders as $index => $id) {
            Gallery::where('id', $id)->update(['order' => $index]);
        }

        ActivityLog::log('Reordered Gallery Photos', 'Reordered gallery photos sequence.');

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery reordered successfully.');
    }
}
