#!/bin/sh

# Fail on error
set -e

echo "🚀 Launching iSwitch Ecosystem..."

# Self-Healing: Convert postgresql:// to postgres:// if present in DB_URL
if [ ! -z "$DB_URL" ]; then
    # If the user accidentally pasted the APP_URL (https://) into the DB_URL field
    if echo "$DB_URL" | grep -q "^http"; then
        echo "⚠️  WARNING: DB_URL contains an http prefix. This is likely the App URL, not the Database URL. Ignoring it to prevent crash."
        unset DB_URL
    else
        export DB_URL=$(echo $DB_URL | sed 's/^postgresql:/postgres:/')
    fi
fi

if [ ! -z "$DATABASE_URL" ]; then
    if echo "$DATABASE_URL" | grep -q "^http"; then
        echo "⚠️  WARNING: DATABASE_URL contains an http prefix. Ignoring it to prevent crash."
        unset DATABASE_URL
    else
        export DATABASE_URL=$(echo $DATABASE_URL | sed 's/^postgresql:/postgres:/')
    fi
fi

# Create storage links
php artisan storage:link --force || true

# Run Migrations (Force in production)
echo "📂 Synchronizing Database..."
php artisan migrate --force

# Optimize Laravel for Production
echo "⚡ Optimizing Engine..."
php artisan config:cache
php artisan route:cache
php artisan view:clear
php artisan view:cache
php artisan filament:upgrade

# Start Services
echo "🌍 System Live. Handling connections."
# Start Nginx in background and PHP-FPM in foreground
service nginx start
php-fpm
