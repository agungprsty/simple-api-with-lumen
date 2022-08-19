#!/bin/sh

cd /var/www/html
composer install
php artisan key:generate
php artisan jwt:secret
php artisan migrate --seed
php -S 0.0.0.0:$APP_PORT -t public