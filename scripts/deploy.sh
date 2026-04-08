#!/bin/sh

# Run database migrations
php artisan migrate --force

# Clear and cache configurations
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Post-deployment tasks completed!"
