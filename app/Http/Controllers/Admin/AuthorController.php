<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Author;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage blogs');
    }

    public function index(): View
    {
        $authors = Author::latest()->get();
        return view('admin.authors.index', compact('authors'));
    }

    public function create(): View
    {
        return view('admin.authors.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'avatar' => 'nullable|image|max:2048',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'twitter' => 'nullable|url',
        ]);

        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = ImageService::uploadAndOptimize($request->file('avatar'), 'authors');
        }

        $socialLinks = [
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter,
        ];

        $author = Author::create([
            'name' => $request->name,
            'bio' => $request->bio,
            'avatar' => $avatarPath,
            'social_links' => $socialLinks,
        ]);

        ActivityLog::log('Created Author', 'Created author profile: ' . $author->name);

        return redirect()->route('admin.authors.index')->with('success', 'Author profile created successfully.');
    }

    public function edit(Author $author): View
    {
        return view('admin.authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'avatar' => 'nullable|image|max:2048',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'twitter' => 'nullable|url',
        ]);

        $avatarPath = $author->avatar;
        if ($request->hasFile('avatar')) {
            $avatarPath = ImageService::uploadAndOptimize($request->file('avatar'), 'authors');
        }

        $socialLinks = [
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter,
        ];

        $author->update([
            'name' => $request->name,
            'bio' => $request->bio,
            'avatar' => $avatarPath,
            'social_links' => $socialLinks,
        ]);

        ActivityLog::log('Updated Author', 'Updated author profile: ' . $author->name);

        return redirect()->route('admin.authors.index')->with('success', 'Author profile updated successfully.');
    }

    public function destroy(Author $author): RedirectResponse
    {
        ActivityLog::log('Deleted Author', 'Deleted author profile: ' . $author->name);
        $author->delete();

        return redirect()->route('admin.authors.index')->with('success', 'Author profile deleted successfully.');
    }
}
