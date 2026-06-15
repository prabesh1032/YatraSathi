#!/bin/bash
set -e
echo "🚀 Starting Laravel..."

# Create .env if it doesn't exist
if [ ! -f .env ]; then
    cp .env.example .env
fi

# Generate app key if not set
php artisan key:generate --force
# Run migrations
php artisan migrate --force
# Create storage link
php artisan storage:link
# Cache config, routes, views
php artisan config:cache
php artisan route:cache
php artisan view:cache
echo "✅ Laravel ready!"
# Start supervisor (nginx + php-fpm)
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
