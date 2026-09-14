#!/usr/bin/env bash

echo "Instalando dependencias con composer..."
composer install --no-dev --working-dir=/var/www/html --optimize-autoloader

echo "Generando cache de configuracion..."
php artisan config:cache

echo "Generando cache de rutas..."
php artisan route:cache

echo "Ejecutando migraciones..."
php artisan migrate --force

echo "Creando enlace de storage..."
php artisan storage:link
