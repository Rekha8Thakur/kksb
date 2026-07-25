<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\OriginalVideo;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OriginalVideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage portfolio');
    }

    public function index(): View
    {
        $videos = OriginalVideo::orderBy('order')->get();
        return view('admin.original_videos.index', compact('videos'));
    }

    public function create(): View
    {
        return view('admin.original_videos.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'video_url' => 'required|url',
            'platform' => 'required|in:youtube,instagram',
            'thumbnail' => 'nullable|image|max:5120',
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = ImageService::uploadAndOptimize($request->file('thumbnail'), 'original_videos');
        }

        $video = OriginalVideo::create([
            'title' => $request->title,
            'description' => $request->description,
            'video_url' => $request->video_url,
            'platform' => $request->platform,
            'thumbnail_path' => $thumbnailPath,
            'order' => OriginalVideo::count(),
        ]);

        ActivityLog::log('Created Original Video', 'Created Original Production Video: ' . ($video->title ?? $video->video_url));

        return redirect()->route('admin.original-videos.index')->with('success', 'Original video added successfully.');
    }

    public function edit(OriginalVideo $originalVideo): View
    {
        return view('admin.original_videos.edit', compact('originalVideo'));
    }

    public function update(Request $request, OriginalVideo $originalVideo): RedirectResponse
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'video_url' => 'required|url',
            'platform' => 'required|in:youtube,instagram',
            'thumbnail' => 'nullable|image|max:5120',
        ]);

        $thumbnailPath = $originalVideo->thumbnail_path;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = ImageService::uploadAndOptimize($request->file('thumbnail'), 'original_videos');
        }

        $originalVideo->update([
            'title' => $request->title,
            'description' => $request->description,
            'video_url' => $request->video_url,
            'platform' => $request->platform,
            'thumbnail_path' => $thumbnailPath,
        ]);

        ActivityLog::log('Updated Original Video', 'Updated Original Production Video: ' . ($originalVideo->title ?? $originalVideo->video_url));

        return redirect()->route('admin.original-videos.index')->with('success', 'Original video updated successfully.');
    }

    public function destroy(OriginalVideo $originalVideo): RedirectResponse
    {
        ActivityLog::log('Deleted Original Video', 'Deleted Original Production Video: ' . ($originalVideo->title ?? $originalVideo->video_url));
        $originalVideo->delete();

        return redirect()->route('admin.original-videos.index')->with('success', 'Original video deleted successfully.');
    }

    public function reorder(Request $request): RedirectResponse
    {
        $orders = $request->input('orders', []);
        foreach ($orders as $index => $id) {
            OriginalVideo::where('id', $id)->update(['order' => $index]);
        }

        ActivityLog::log('Reordered Original Videos', 'Reordered Original Videos list sequence.');

        return redirect()->route('admin.original-videos.index')->with('success', 'Original videos reordered successfully.');
    }
}
