<?php
/**
 * Simple Deploy Script for Hostinger (Shared Hosting)
 * 
 * Access this file via browser: https://test.kksbstudios.com/deploy.php?token=kksb_deploy_2026
 */

// Define a secret security token
$secret_token = 'kksb_deploy_2026';

if (!isset($_GET['token']) || $_GET['token'] !== $secret_token) {
    header('HTTP/1.0 403 Forbidden');
    die('Unauthorized access.');
}

// Set time limit to 5 minutes
set_time_limit(300);

echo "<!DOCTYPE html>
<html>
<head>
    <title>Deployment Status</title>
    <style>
        body { background: #121214; color: #e1e1e6; font-family: monospace; padding: 20px; line-height: 1.5; }
        pre { background: #202024; padding: 15px; border-radius: 8px; border: 1px solid #323238; overflow-x: auto; }
        h2 { color: #04d361; }
    </style>
</head>
<body>
<h2>Laravel Deployment Runner</h2>
<hr>";

function run_command($cmd) {
    echo "<strong>Executing:</strong> $cmd\n";
    flush();
    ob_flush();
    
    // Run the command and capture output
    $output = [];
    $return_var = 0;
    exec($cmd . ' 2>&1', $output, $return_var);
    
    echo implode("\n", $output) . "\n";
    echo "<strong>Exit Code:</strong> $return_var\n\n";
    flush();
    ob_flush();
}

echo "<pre>";

// Step 1: Run composer install
run_command('composer install --no-dev --optimize-autoloader');

// Step 2: Run database migrations
run_command('php artisan migrate --force');

// Step 3: Clear and cache configuration
run_command('php artisan optimize:clear');
run_command('php artisan optimize');

echo "<h3>Deployment Complete!</h3>";
echo "</pre>
</body>
</html>";
