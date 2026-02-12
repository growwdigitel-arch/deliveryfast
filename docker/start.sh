#!/bin/bash
set -e

echo "🚀 Starting DeliveryFast..."

# Default PORT to 10000 if not set (Render default)
export PORT=${PORT:-10000}
echo "📡 Listening on port: $PORT"

# Substitute PORT into nginx config
envsubst '${PORT}' < /etc/nginx/nginx.conf.template > /etc/nginx/sites-available/default

# Remove default nginx config that conflicts
rm -f /etc/nginx/sites-enabled/default
ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

# Run database migrations
echo "📦 Running migrations..."
php artisan migrate --force || echo "⚠️ Migration failed or skipped (database may not be ready)"

# Clear and cache for production
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Generate storage link
php artisan storage:link || true

echo "✅ Starting Nginx + PHP-FPM..."

# Start supervisor (manages nginx + php-fpm)
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
