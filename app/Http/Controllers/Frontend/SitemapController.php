<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate sitemap.xml.
     */
    public function sitemap(): Response
    {
        $services = Service::where('is_active', true)->get();
        $projects = Project::whereNotIn('slug', [
            'the-himalayan-resort',
            'the-cafe-project',
            'bhalla-dental-clinic',
            'peter-england-solan',
        ])->get();
        $blogs = Blog::published()->get();

        $content = view('sitemap', compact('services', 'projects', 'blogs'))->render();

        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }

    /**
     * Generate robots.txt.
     */
    public function robots(): Response
    {
        $robotsText = "User-agent: *\n";
        $robotsText .= "Disallow: /admin/\n";
        $robotsText .= "Disallow: /admin\n";
        $robotsText .= "Disallow: /login\n";
        $robotsText .= "Disallow: /register\n";
        $robotsText .= "Disallow: /deploy\n";
        $robotsText .= "Disallow: /init-admin\n";
        $robotsText .= "Disallow: /deploy.php\n\n";
        $robotsText .= "Allow: /\n\n";
        $robotsText .= "Sitemap: " . url('/sitemap.xml') . "\n";

        return response($robotsText, 200)
            ->header('Content-Type', 'text/plain');
    }
}
