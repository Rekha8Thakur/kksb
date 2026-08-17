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
Route::get('/brand-projects', [\App\Http\Controllers\Frontend\BrandProjectController::class, 'index'])->name('brand-projects.index');
Route::get('/original-productions', [\App\Http\Controllers\Frontend\OriginalProjectController::class, 'index'])->name('original-productions.index');

Route::get('/blog', [FrontendBlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [FrontendBlogController::class, 'show'])->name('blog.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/submit', [ContactController::class, 'submitEnquiry'])->name('contact.submit');
Route::post('/newsletter/subscribe', [ContactController::class, 'subscribeNewsletter'])->name('newsletter.subscribe');

Route::get('/careers', [FrontendCareerController::class, 'index'])->name('careers.index');
Route::post('/careers/apply', [FrontendCareerController::class, 'apply'])->name('careers.apply');

Route::get('/join-us', [JoinController::class, 'index'])->name('join-us');
Route::post('/join-us/apply', [JoinController::class, 'apply'])->name('join-us.apply');
Route::get('/join-influencer', [JoinController::class, 'influencerForm'])->name('join-influencer');
Route::post('/join-influencer', [JoinController::class, 'storeInfluencer'])->name('join-influencer.store');
Route::get('/join-career', [JoinController::class, 'careerForm'])->name('join-career');
Route::post('/join-career', [JoinController::class, 'storeCareer'])->name('join-career.store');

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
        \Artisan::call('db:seed', ['--class' => 'BrandVideoSeeder', '--force' => true]);
        \Artisan::call('db:seed', ['--class' => 'OriginalVideoSeeder', '--force' => true]);
        try {
            \Artisan::call('storage:link');
        } catch (\Throwable $linkException) {
            // Ignore if link fails (e.g. exec() disabled in Laravel filesystems)
        }
        \Artisan::call('view:clear');
        \Artisan::call('cache:clear');
        \Artisan::call('config:clear');
        \Artisan::call('route:clear');
        return response()->json([
            'status' => 'success',
            'message' => 'Hostinger Database Migrated, Seeded, and Application Cache Cleared Successfully!',
            'admin_login_url' => url('/login'),
            'credentials' => [
                'email' => 'superadmin@kksb.com',
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

// Secure One-Click Deployment Helper Route (For pulling latest GitHub updates on Hostinger)
Route::get('/deploy', function () {
    try {
        $gitOutput = [];
        // Execute git pull on the Hostinger server only if exec is allowed
        if (function_exists('exec')) {
            exec('git pull origin main 2>&1', $gitOutput);
        } else {
            $gitOutput = [
                'Warning: exec() is disabled on this server by PHP configuration (disable_functions).',
                'Git pull could not be executed programmatically.',
                'Please pull updates using the Hostinger panel Git manager or SSH, then refresh.'
            ];
        }
        
        $storageLinkOutput = 'Storage symlink already exists.';
        try {
            $storageLinkPath = public_path('storage');
            if (is_link($storageLinkPath) || file_exists($storageLinkPath)) {
                if (is_link($storageLinkPath)) {
                    unlink($storageLinkPath);
                } elseif (is_dir($storageLinkPath)) {
                    rmdir($storageLinkPath);
                }
            }
            \Artisan::call('storage:link');
            $storageLinkOutput = 'Storage symlink successfully recreated!';
        } catch (\Throwable $linkException) {
            $storageLinkOutput = 'Storage link setup failed: ' . $linkException->getMessage();
        }

        // Run database migrations if any are pending
        $migrationOutput = 'No migrations run.';
        try {
            \Artisan::call('migrate', ['--force' => true]);
            $migrationOutput = 'Database migrated successfully!';
        } catch (\Throwable $migrationException) {
            $migrationOutput = 'Migration failed or skipped: ' . $migrationException->getMessage();
        }

        // Optional: Run ServiceSeeder if requested
        $seederOutput = null;
        if (request()->query('seed') === 'services') {
            try {
                \Artisan::call('db:seed', [
                    '--class' => 'ServiceSeeder',
                    '--force' => true
                ]);
                $seederOutput = 'ServiceSeeder completed successfully!';
            } catch (\Throwable $seederException) {
                $seederOutput = 'Seeding failed: ' . $seederException->getMessage();
            }
        }

        // Clear caches
        \Artisan::call('view:clear');
        \Artisan::call('cache:clear');
        \Artisan::call('config:clear');
        \Artisan::call('route:clear');
        
        return response()->json([
            'status' => 'success',
            'git_output' => $gitOutput,
            'storage_link' => $storageLinkOutput,
            'migration_output' => $migrationOutput,
            'seeder_output' => $seederOutput,
            'cache_clear' => 'Laravel View, Config, Cache, and Route Cleared Successfully!'
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
use App\Http\Controllers\Admin\BrandVideoController;
use App\Http\Controllers\Admin\OriginalVideoController;

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

    // CMS Brand Videos CRUD
    Route::post('brand-videos/reorder', [BrandVideoController::class, 'reorder'])->name('brand-videos.reorder');
    Route::resource('brand-videos', BrandVideoController::class)->except(['show'])->parameters(['brand-videos' => 'brandVideo']);

    // CMS Original Videos CRUD
    Route::post('original-videos/reorder', [OriginalVideoController::class, 'reorder'])->name('original-videos.reorder');
    Route::resource('original-videos', OriginalVideoController::class)->except(['show'])->parameters(['original-videos' => 'originalVideo']);

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
    Route::get('join-applications/{application}/print', [JoinApplicationController::class, 'print'])->name('join-applications.print');
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

// Fail-safe fallback route to serve storage assets if symlink is missing or blocked on Hostinger
Route::get('storage/{path}', function ($path) {
    $fullPath = storage_path('app/public/' . $path);
    if (!file_exists($fullPath) || is_dir($fullPath)) {
        abort(404);
    }
    
    try {
        $mimeType = mime_content_type($fullPath);
    } catch (\Exception $e) {
        $mimeType = 'application/octet-stream';
    }

    return response()->file($fullPath, [
        'Content-Type' => $mimeType,
        'Cache-Control' => 'public, max-age=31536000',
    ]);
})->where('path', '.*');

// Temporary Diagnostic Route to test native PHP symlink function on Hostinger
Route::get('/test-symlink', function () {
    try {
        $target = storage_path('app/public');
        $link = public_path('storage');
        
        $output = [];
        $output[] = "Target path: " . $target . " (exists: " . (file_exists($target) ? 'yes' : 'no') . ")";
        $output[] = "Link path: " . $link . " (exists: " . (file_exists($link) ? 'yes' : 'no') . ", is_link: " . (is_link($link) ? 'yes' : 'no') . ")";
        
        if (is_link($link) || file_exists($link)) {
            if (is_link($link)) {
                unlink($link);
                $output[] = "Deleted existing symlink.";
            } elseif (is_dir($link)) {
                rmdir($link);
                $output[] = "Deleted existing directory.";
            }
        }
        
        if (!function_exists('symlink')) {
            $output[] = "Error: PHP function symlink() is disabled/not available on this server.";
        } else {
            if (symlink($target, $link)) {
                $output[] = "Success: symlink() created link successfully!";
            } else {
                $output[] = "Error: symlink() returned false.";
            }
        }
        
        return response()->json($output);
    } catch (\Throwable $e) {
        return response()->json(['error' => $e->getMessage()]);
    }
});

Route::get('/diagnose-uploads', function () {
    $results = [];
    
    $paths = [
        'public_path' => public_path(),
        'public_path_uploads' => public_path('uploads'),
        'public_path_portfolio' => public_path('uploads/portfolio'),
        'base_path_public_uploads' => base_path('public/uploads'),
        'storage_path_uploads' => storage_path('app/public/uploads'),
        'parent_uploads' => dirname(public_path()) . '/uploads',
    ];

    foreach ($paths as $key => $path) {
        $results[$key] = [
            'path' => $path,
            'exists' => file_exists($path) ? 'yes' : 'no',
            'is_dir' => is_dir($path) ? 'yes' : 'no',
            'is_writable' => is_writable($path) ? 'yes' : 'no',
            'files' => []
        ];
        
        if (file_exists($path) && is_dir($path)) {
            $files = scandir($path);
            // Filter out . and ..
            $results[$key]['files'] = array_values(array_filter($files, function($f) {
                return $f !== '.' && $f !== '..';
            }));
        }
    }
    
    return response()->json($results);
});

