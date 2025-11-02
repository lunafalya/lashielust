#!/bin/sh
set -e

cd /var/www/html

# Ensure dirs
mkdir -p storage/framework/cache/data \
         storage/framework/sessions \
         storage/framework/testing \
         storage/framework/views \
         bootstrap/cache

# Install PHP deps
composer install --no-interaction --prefer-dist --no-progress

# Drop any cached config/views
rm -f bootstrap/cache/*.php || true

# Wait for MySQL before any artisan command that may hit DB
if [ "${DB_CONNECTION:-mysql}" = "mysql" ] && [ -n "${DB_HOST:-}" ]; then
  echo "Waiting for database at ${DB_HOST:-db}:${DB_PORT:-3306}..."
  until php -r "new PDO('mysql:host=${DB_HOST:-db};port=${DB_PORT:-3306};dbname=${DB_DATABASE:-}', '${DB_USERNAME:-root}', '${DB_PASSWORD:-root}');" >/dev/null 2>&1; do
    sleep 2
  done
fi

# Prepare DB-backed drivers if selected (supports CACHE_STORE or CACHE_DRIVER)
if [ "${CACHE_STORE:-${CACHE_DRIVER:-file}}" = "database" ]; then
  php artisan cache:table || true
fi
if [ "${QUEUE_CONNECTION:-}" = "database" ]; then
  php artisan queue:table || true
fi
if [ "${SESSION_DRIVER:-file}" = "database" ]; then
  php artisan session:table || true
fi

# Migrate
php artisan migrate --force || true
php artisan db:seed --force || true
# Clear caches
php artisan config:clear || true
php artisan cache:clear || true
php artisan route:clear || true
php artisan view:clear || true

# Start app
exec php artisan serve --host=0.0.0.0 --port=8000