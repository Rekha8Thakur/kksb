#!/bin/bash

# Run migrations
echo "Running migrations..."
php artisan migrate --force

# Cache config, routes, and views for production performance
echo "Caching config and routes..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
