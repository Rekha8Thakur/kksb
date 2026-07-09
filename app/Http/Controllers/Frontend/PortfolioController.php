<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    /**
     * Display portfolio listing with category filter capabilities.
     */
    public function index(Request $request): View
    {
        $categories = Category::where('type', 'portfolio')->get();
        
        $query = Project::with('category')->orderBy('order');

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $projects = $query->get();

        return view('portfolio.index', compact('projects', 'categories'));
    }

    /**
     * Display a single project case study page.
     */
    public function show(string $slug): View
    {
        $project = Project::with('category')->where('slug', $slug)->firstOrFail();
        $relatedProjects = Project::where('id', '!=', $project->id)
            ->where('category_id', $project->category_id)
            ->take(3)
            ->get();

        return view('portfolio.show', compact('project', 'relatedProjects'));
    }
}
