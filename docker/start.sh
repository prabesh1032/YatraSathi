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

# Seed only if users table is empty
USER_COUNT=$(php artisan tinker --execute="echo App\Models\User::count();" 2>/dev/null | tail -1)
if [ "$USER_COUNT" = "0" ]; then
    echo "🌱 Running seeders..."
    php artisan db:seed --force
    echo "✅ Seeding complete!"
else
    echo "⏭️ Skipping seeder — data already exists"
fi

# Create storage link
php artisan storage:link

# Cache config, routes, views
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "✅ Laravel ready!"

# Start supervisor (nginx + php-fpm)
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
