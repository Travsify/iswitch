#!/bin/sh

# Fail on error
set -e

echo "🚀 Launching iSwitch Ecosystem..."

# Create storage links
php artisan storage:link --force || true

# Run Migrations (Force in production)
echo "📂 Synchronizing Database..."
php artisan migrate --force

# Optimize Laravel for Production
echo "⚡ Optimizing Engine..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start Services
echo "🌍 System Live. Handling connections."
# Start Nginx in background and PHP-FPM in foreground
service nginx start
php-fpm
