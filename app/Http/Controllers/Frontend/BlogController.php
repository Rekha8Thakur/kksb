<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display blogs listing with search and category filters.
     */
    public function index(Request $request): View
    {
        $categories = Category::where('type', 'blog')->get();
        
        $query = Blog::with(['category', 'author'])->published();

        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('summary', 'like', "%{$search}%");
            });
        }

        // Category filter
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $blogs = $query->latest()->paginate(9);

        return view('blog.index', compact('blogs', 'categories'));
    }

    /**
     * Display a single blog article details page.
     */
    public function show(string $slug): View
    {
        $blog = Blog::with(['category', 'author'])->where('slug', $slug)->published()->firstOrFail();
        
        // Calculate reading time (approx 200 words per minute)
        $wordCount = str_word_count(strip_tags($blog->content));
        $readingTime = max(1, ceil($wordCount / 200));

        $relatedBlogs = Blog::published()
            ->where('id', '!=', $blog->id)
            ->where('category_id', $blog->category_id)
            ->take(3)
            ->get();

        return view('blog.show', compact('blog', 'readingTime', 'relatedBlogs'));
    }
}
