#!/bin/sh
set -e

echo "Clearing stale sessions collection..."
php artisan tinker --execute="DB::connection('mongodb')->getCollection('sessions')->drop();" 2>/dev/null || true

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Caching views..."
php artisan view:cache

echo "Running migrations..."
php artisan migrate --force

echo "Starting Supervisor (NGINX + PHP-FPM)..."
exec /usr/bin/supervisord -c /etc/supervisord.conf
