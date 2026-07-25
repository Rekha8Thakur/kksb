<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OriginalVideo;
use Illuminate\View\View;

class OriginalProjectController extends Controller
{
    /**
     * Display the original productions and documentaries page.
     */
    public function index(): View
    {
        $videos = OriginalVideo::orderBy('order')->get();
        return view('original-productions', compact('videos'));
    }
}
