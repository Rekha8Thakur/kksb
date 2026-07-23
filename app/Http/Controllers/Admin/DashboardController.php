<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Blog;
use App\Models\CareerApplication;
use App\Models\CareerJob;
use App\Models\ContactEnquiry;
use App\Models\Newsletter;
use App\Models\Project;
use App\Models\Service;
use App\Models\Author;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Client;
use App\Models\Gallery;
use App\Models\JoinApplication;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the admin panel dashboard main page.
     */
    public function index(): View
    {
        $stats = [
            'enquiries_total' => ContactEnquiry::count(),
            'enquiries_unread' => ContactEnquiry::where('status', 'unread')->count(),
            'applications_total' => CareerApplication::count(),
            'applications_pending' => CareerApplication::where('status', 'pending')->count(),
            'active_jobs' => CareerJob::where('is_active', true)->count(),
            'services_count' => Service::count(),
            'projects_count' => Project::count(),
            'blogs_count' => Blog::count(),
            'subscribers_count' => Newsletter::where('status', 'active')->count(),
            'authors_count' => Author::count(),
            'testimonials_count' => Testimonial::count(),
            'faqs_count' => Faq::count(),
            'clients_count' => Client::count(),
            'gallery_count' => Gallery::count(),
            'join_applications_total' => JoinApplication::count(),
            'join_applications_pending' => JoinApplication::where('status', 'pending')->count(),
            'users_total' => User::count(),
        ];

        $recentEnquiries = ContactEnquiry::latest()->take(5)->get();
        $recentApplications = CareerApplication::with('job')->latest()->take(5)->get();
        $recentLogs = ActivityLog::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentEnquiries', 'recentApplications', 'recentLogs'));
    }
}
