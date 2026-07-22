<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ServiceController as FrontendServiceController;
use App\Http\Controllers\Frontend\PortfolioController as FrontendPortfolioController;
use App\Http\Controllers\Frontend\BlogController as FrontendBlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\CareerController as FrontendCareerController;
use App\Http\Controllers\Frontend\JoinController;
use App\Http\Controllers\Frontend\SitemapController;
use App\Http\Controllers\ProfileController;

// Public Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/services', [FrontendServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [FrontendServiceController::class, 'show'])->name('services.show');

Route::get('/portfolio', [FrontendPortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{slug}', [FrontendPortfolioController::class, 'show'])->name('portfolio.show');

Route::get('/blog', [FrontendBlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [FrontendBlogController::class, 'show'])->name('blog.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/submit', [ContactController::class, 'submitEnquiry'])->name('contact.submit');
Route::post('/newsletter/subscribe', [ContactController::class, 'subscribeNewsletter'])->name('newsletter.subscribe');

Route::get('/careers', [FrontendCareerController::class, 'index'])->name('careers.index');
Route::post('/careers/apply', [FrontendCareerController::class, 'apply'])->name('careers.apply');

Route::get('/join-us', [JoinController::class, 'index'])->name('join-us');
Route::post('/join-us/apply', [JoinController::class, 'apply'])->name('join-us.apply');

Route::get('/sitemap.xml', [SitemapController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [SitemapController::class, 'robots'])->name('robots');

// Standard pages (CMS templates or simple views)
Route::view('/privacy-policy', 'pages.privacy')->name('privacy');
Route::view('/terms-conditions', 'pages.terms')->name('terms');
Route::view('/cookie-policy', 'pages.cookie')->name('cookie');

// One-Click Admin Account Setup Route (For Hostinger deployment)
Route::get('/init-admin', function () {
    try {
        \Artisan::call('migrate', ['--force' => true]);
        \Artisan::call('db:seed', ['--class' => 'RolesAndPermissionsSeeder', '--force' => true]);
        \Artisan::call('db:seed', ['--class' => 'AgencyCmsSeeder', '--force' => true]);
        \Artisan::call('view:clear');
        \Artisan::call('cache:clear');
        \Artisan::call('config:clear');
        \Artisan::call('route:clear');
        return response()->json([
            'status' => 'success',
            'message' => 'Hostinger Database Migrated, Seeded, and Application Cache Cleared Successfully!',
            'admin_login_url' => url('/login'),
            'credentials' => [
                'email' => 'admin@kksb.com',
                'password' => 'password'
            ]
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage()
        ], 500);
    }
});

// Auth Dashboard Redirect
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin CMS Panel Routes
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\ContactEnquiryController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\JoinApplicationController;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // CMS Services CRUD
    Route::post('services/reorder', [ServiceController::class, 'reorder'])->name('services.reorder');
    Route::resource('services', ServiceController::class)->except(['show']);

    // CMS Portfolio Projects CRUD
    Route::post('projects/reorder', [ProjectController::class, 'reorder'])->name('projects.reorder');
    Route::resource('projects', ProjectController::class)->except(['show']);

    // CMS Blogs & Authors CRUD
    Route::resource('blogs', BlogController::class)->except(['show']);
    Route::resource('authors', AuthorController::class)->except(['show']);

    // CMS Testimonials CRUD
    Route::post('testimonials/reorder', [TestimonialController::class, 'reorder'])->name('testimonials.reorder');
    Route::resource('testimonials', TestimonialController::class)->except(['show']);

    // CMS FAQs CRUD
    Route::post('faqs/reorder', [FaqController::class, 'reorder'])->name('faqs.reorder');
    Route::resource('faqs', FaqController::class)->except(['show']);

    // CMS Clients CRUD
    Route::post('clients/reorder', [ClientController::class, 'reorder'])->name('clients.reorder');
    Route::resource('clients', ClientController::class)->except(['show']);

    // CMS Gallery CRUD
    Route::post('gallery/reorder', [GalleryController::class, 'reorder'])->name('gallery.reorder');
    Route::resource('gallery', GalleryController::class)->except(['show']);

    // CMS Careers & Job Applications
    Route::get('careers/applications/{job?}', [CareerController::class, 'applications'])->name('careers.applications');
    Route::post('careers/applications/{application}/status', [CareerController::class, 'updateApplicationStatus'])->name('careers.applications.status');
    Route::delete('careers/applications/{application}', [CareerController::class, 'destroyApplication'])->name('careers.applications.destroy');
    Route::resource('careers', CareerController::class)->except(['show']);

    // Inbox & Newsletter Leads
    Route::get('enquiries/export', [ContactEnquiryController::class, 'exportCsv'])->name('enquiries.export');
    Route::post('enquiries/{enquiry}/status', [ContactEnquiryController::class, 'updateStatus'])->name('enquiries.status');
    Route::resource('enquiries', ContactEnquiryController::class)->only(['index', 'show', 'destroy']);

    // Join Us Applications CRUD
    Route::post('join-applications/{application}/status', [JoinApplicationController::class, 'updateStatus'])->name('join-applications.status');
    Route::resource('join-applications', JoinApplicationController::class)->only(['index', 'show', 'destroy'])->parameters(['join-applications' => 'application']);

    Route::get('newsletter/export', [NewsletterController::class, 'exportCsv'])->name('newsletter.export');
    Route::resource('newsletter', NewsletterController::class)->only(['index', 'destroy']);

    // Global Settings
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');

    // Users and roles assignment
    Route::resource('users', UserController::class)->except(['show', 'create', 'edit']);
});

require __DIR__.'/auth.php';
