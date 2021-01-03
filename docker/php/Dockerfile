FROM php:8.0-fpm-alpine

RUN apk --no-cache add postgresql-dev

RUN docker-php-ext-install bcmath pdo_pgsql