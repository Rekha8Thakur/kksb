<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\BrandVideo;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BrandVideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage portfolio');
    }

    public function index(): View
    {
        $videos = BrandVideo::orderBy('order')->get();
        return view('admin.brand_videos.index', compact('videos'));
    }

    public function create(): View
    {
        return view('admin.brand_videos.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'video_url' => 'required|url',
            'platform' => 'required|in:youtube,instagram',
            'category' => 'nullable|string|max:100',
            'thumbnail' => 'nullable|image|max:5120',
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = ImageService::uploadAndOptimize($request->file('thumbnail'), 'brand_videos');
        }

        $video = BrandVideo::create([
            'title' => $request->title,
            'description' => $request->description,
            'video_url' => $request->video_url,
            'platform' => $request->platform,
            'category' => $request->category,
            'thumbnail_path' => $thumbnailPath,
            'order' => BrandVideo::count(),
        ]);

        ActivityLog::log('Created Brand Video', 'Created Brand Video: ' . ($video->title ?? $video->video_url));

        return redirect()->route('admin.brand-videos.index')->with('success', 'Brand video added successfully.');
    }

    public function edit(BrandVideo $brandVideo): View
    {
        return view('admin.brand_videos.edit', compact('brandVideo'));
    }

    public function update(Request $request, BrandVideo $brandVideo): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'video_url' => 'required|url',
            'platform' => 'required|in:youtube,instagram',
            'category' => 'nullable|string|max:100',
            'thumbnail' => 'nullable|image|max:5120',
        ]);

        $thumbnailPath = $brandVideo->thumbnail_path;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = ImageService::uploadAndOptimize($request->file('thumbnail'), 'brand_videos');
        }

        $brandVideo->update([
            'title' => $request->title,
            'description' => $request->description,
            'video_url' => $request->video_url,
            'platform' => $request->platform,
            'category' => $request->category,
            'thumbnail_path' => $thumbnailPath,
        ]);

        ActivityLog::log('Updated Brand Video', 'Updated Brand Video: ' . ($brandVideo->title ?? $brandVideo->video_url));

        return redirect()->route('admin.brand-videos.index')->with('success', 'Brand video updated successfully.');
    }

    public function destroy(BrandVideo $brandVideo): RedirectResponse
    {
        ActivityLog::log('Deleted Brand Video', 'Deleted Brand Video: ' . ($brandVideo->title ?? $brandVideo->video_url));
        $brandVideo->delete();

        return redirect()->route('admin.brand-videos.index')->with('success', 'Brand video deleted successfully.');
    }

    public function reorder(Request $request): RedirectResponse
    {
        $orders = $request->input('orders', []);
        foreach ($orders as $index => $id) {
            BrandVideo::where('id', $id)->update(['order' => $index]);
        }

        ActivityLog::log('Reordered Brand Videos', 'Reordered Brand Videos list sequence.');

        return redirect()->route('admin.brand-videos.index')->with('success', 'Brand videos reordered successfully.');
    }
}
