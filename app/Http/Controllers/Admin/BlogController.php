<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Author;
use App\Models\Blog;
use App\Models\Category;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage blogs');
    }

    public function index(): View
    {
        $blogs = Blog::with(['category', 'author'])->latest()->paginate(15);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create(): View
    {
        $categories = Category::where('type', 'blog')->get();
        $authors = Author::all();
        return view('admin.blogs.create', compact('categories', 'authors'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'summary' => 'nullable|string',
            'featured_image' => 'nullable|image|max:5120',
            'category_id' => 'nullable|exists:categories,id',
            'author_id' => 'nullable|exists:authors,id',
            'status' => 'required|in:draft,published,scheduled',
            'published_at' => 'nullable|date',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'seo_keywords' => 'nullable|string|max:255',
        ]);

        $slug = Str::slug($request->title);
        $slugCount = Blog::where('slug', 'like', $slug . '%')->count();
        if ($slugCount > 0) {
            $slug .= '-' . ($slugCount + 1);
        }

        $imagePath = null;
        if ($request->hasFile('featured_image')) {
            $imagePath = ImageService::uploadAndOptimize($request->file('featured_image'), 'blog');
        }

        $publishedAt = $request->published_at ? now()->parse($request->published_at) : null;
        if ($request->status === 'published' && !$publishedAt) {
            $publishedAt = now();
        }

        $blog = Blog::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'summary' => $request->summary,
            'featured_image' => $imagePath,
            'category_id' => $request->category_id,
            'author_id' => $request->author_id,
            'status' => $request->status,
            'published_at' => $publishedAt,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywords' => $request->seo_keywords,
        ]);

        ActivityLog::log('Created Blog', 'Created blog post: ' . $blog->title);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post created successfully.');
    }

    public function edit(Blog $blog): View
    {
        $categories = Category::where('type', 'blog')->get();
        $authors = Author::all();
        return view('admin.blogs.edit', compact('blog', 'categories', 'authors'));
    }

    public function update(Request $request, Blog $blog): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'summary' => 'nullable|string',
            'featured_image' => 'nullable|image|max:5120',
            'category_id' => 'nullable|exists:categories,id',
            'author_id' => 'nullable|exists:authors,id',
            'status' => 'required|in:draft,published,scheduled',
            'published_at' => 'nullable|date',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'seo_keywords' => 'nullable|string|max:255',
        ]);

        $imagePath = $blog->featured_image;
        if ($request->hasFile('featured_image')) {
            $imagePath = ImageService::uploadAndOptimize($request->file('featured_image'), 'blog');
        }

        $publishedAt = $request->published_at ? now()->parse($request->published_at) : $blog->published_at;
        if ($request->status === 'published' && !$publishedAt) {
            $publishedAt = now();
        }

        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'summary' => $request->summary,
            'featured_image' => $imagePath,
            'category_id' => $request->category_id,
            'author_id' => $request->author_id,
            'status' => $request->status,
            'published_at' => $publishedAt,
            'seo_title' => $request->seo_title,
            'seo_description' => $request->seo_description,
            'seo_keywords' => $request->seo_keywords,
        ]);

        ActivityLog::log('Updated Blog', 'Updated blog post: ' . $blog->title);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy(Blog $blog): RedirectResponse
    {
        ActivityLog::log('Deleted Blog', 'Deleted blog post: ' . $blog->title);
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post deleted successfully.');
    }
}
