<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BrandVideo;
use Illuminate\View\View;

class BrandProjectController extends Controller
{
    /**
     * Display the brand campaigns and social videos page.
     */
    public function index(): View
    {
        $videos = BrandVideo::orderBy('order')->get();
        return view('brand-projects', compact('videos'));
    }
}
