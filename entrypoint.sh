#!/bin/bash
set -e

echo "Esperando a que PostgreSQL esté disponible..."
until pg_isready -h "$DB_HOST" -p "$DB_PORT" -U "$DB_USERNAME"; do
    sleep 1
done
echo "PostgreSQL está listo!"

if [ -z "$APP_KEY" ]; then
    php /app/artisan key:generate --force
fi

if [ "$APP_ENV" = "production" ]; then
    php /app/artisan config:cache
    php /app/artisan route:cache
fi

php /app/artisan migrate --force

chown -R www-data:www-data /app/storage /app/bootstrap/cache

echo "¡Listo para iniciar!"
exec "$@"
