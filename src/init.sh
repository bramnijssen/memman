#!/bin/ash

./wait-for-it.sh postgresql:5432

php artisan migrate --force

php-fpm
