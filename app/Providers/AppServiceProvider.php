<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Bind the public path dynamically to point to public_html on Hostinger if it exists
        $siblingPublicHtml = dirname(base_path()) . '/public_html';
        if (file_exists($siblingPublicHtml)) {
            $this->app->usePublicPath($siblingPublicHtml);
        } else {
            $parentPublicHtml = base_path('../public_html');
            if (file_exists($parentPublicHtml)) {
                $this->app->usePublicPath($parentPublicHtml);
            }
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Implicitly grant "Super Admin" role all permissions
        \Illuminate\Support\Facades\Gate::before(function ($user, $ability) {
            return $user->hasRole('Super Admin') ? true : null;
        });

        // Force HTTPS in production or secure environments to prevent redirects changing POST/PATCH requests to GET requests
        if (config('app.env') === 'production' || env('APP_ENV') === 'production' || (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
    }
}
