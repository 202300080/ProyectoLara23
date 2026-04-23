#!/bin/bash
set -e

echo "Esperando a que PostgreSQL esté disponible..."
until pg_isready -h "$DB_HOST" -p "$DB_PORT" -U "$DB_USERNAME"; do
    sleep 1
done

echo "PostgreSQL está listo!"

if [ ! -f "/app/.env" ]; then
    echo "Creando .env..."
    cp /app/.env.example /app/.env
fi

if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "" ]; then
    php /app/artisan key:generate --force
fi

php /app/artisan config:cache
php /app/artisan route:cache
php /app/artisan migrate --force

chown -R www-data:www-data /app/storage /app/bootstrap/cache

echo "¡Listo para iniciar!"
