<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Gallery;
use App\Models\Setting;
use Illuminate\View\View;

class AboutController extends Controller
{
    /**
     * Display the About page.
     */
    public function index(): View
    {
        $team = Author::all(); // Authors map directly to team members
        $gallery = Gallery::where('type', 'behind_the_scenes')->orderBy('order')->get();
        
        // Retrieve timeline from settings JSON
        $timeline = json_decode(Setting::get('about_timeline_json', '[]'), true);

        return view('about', compact('team', 'gallery', 'timeline'));
    }
}
