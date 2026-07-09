<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Setting;
use App\Services\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage settings');
    }

    public function index(): View
    {
        return view('admin.settings.index');
    }

    public function update(Request $request): RedirectResponse
    {
        // Simple mass setting update loop
        $inputs = $request->except(['_token', '_method', 'home_hero_bg_file', 'about_founder_image_file']);

        foreach ($inputs as $key => $value) {
            Setting::set($key, $value);
        }

        // Handle Home Hero Image Upload
        if ($request->hasFile('home_hero_bg_file')) {
            $path = ImageService::uploadAndOptimize($request->file('home_hero_bg_file'), 'settings');
            Setting::set('home_hero_bg', '/' . $path);
        }

        // Handle About Founder Image Upload
        if ($request->hasFile('about_founder_image_file')) {
            $path = ImageService::uploadAndOptimize($request->file('about_founder_image_file'), 'settings');
            Setting::set('about_founder_image', '/' . $path);
        }

        ActivityLog::log('Updated CMS Settings', 'Updated site configuration settings.');

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
