<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->trustProxies(at: '*');
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);
        $middleware->validateCsrfTokens(except: [
            'join-us/apply',
            'contact/submit',
            'join-influencer',
            'join-career',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (\Illuminate\Session\TokenMismatchException $e, $request) {
            $contentLength = $request->header('Content-Length');
            $postMaxSize = ini_get('post_max_size');
            
            // Convert post_max_size (e.g. "8M", "256M") to bytes
            $metric = strtolower(substr($postMaxSize, -1));
            $postMaxBytes = (int)$postMaxSize;
            if (in_array($metric, ['g', 'm', 'k'])) {
                switch ($metric) {
                    case 'g': $postMaxBytes *= 1024;
                    case 'm': $postMaxBytes *= 1024;
                    case 'k': $postMaxBytes *= 1024;
                }
            }

            if ($contentLength && $contentLength > $postMaxBytes) {
                return redirect()->back()
                    ->withInput($request->except(['main_image', 'gallery', 'logo']))
                    ->withErrors([
                        'error' => 'The files you are trying to upload are too large! The server\'s PHP post limit is currently ' . $postMaxSize . '. Please upload smaller files, upload fewer files at a time, or increase "post_max_size" and "upload_max_filesize" in your Hostinger hPanel.'
                    ]);
            }

            return redirect()->back()
                ->withErrors(['error' => 'Session expired or security token invalid. Please refresh the page and try again.']);
        });
    })->create();
