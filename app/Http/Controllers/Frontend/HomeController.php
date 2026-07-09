<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Client;
use App\Models\Faq;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the agency landing homepage.
     */
    public function index(): View
    {
        $services = Service::where('is_active', true)->orderBy('order')->get();
        $projects = Project::with('category')->where('is_featured', true)->orderBy('order')->get();
        $testimonials = Testimonial::orderBy('order')->get();
        $faqs = Faq::where('category', 'home')->orderBy('order')->get();
        $clients = Client::orderBy('order')->get();
        $latestBlogs = Blog::with(['category', 'author'])->published()->latest()->take(3)->get();

        return view('home', compact('services', 'projects', 'testimonials', 'faqs', 'clients', 'latestBlogs'));
    }
}
