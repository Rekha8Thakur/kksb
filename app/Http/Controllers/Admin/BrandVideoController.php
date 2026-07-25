<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\BrandVideo;
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
            'title' => 'nullable|string|max:255',
            'video_url' => 'required|url',
            'platform' => 'required|in:youtube,instagram',
        ]);

        $video = BrandVideo::create([
            'title' => $request->title,
            'video_url' => $request->video_url,
            'platform' => $request->platform,
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
            'title' => 'nullable|string|max:255',
            'video_url' => 'required|url',
            'platform' => 'required|in:youtube,instagram',
        ]);

        $brandVideo->update([
            'title' => $request->title,
            'video_url' => $request->video_url,
            'platform' => $request->platform,
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
