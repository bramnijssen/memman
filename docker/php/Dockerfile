FROM php:8.0-fpm-alpine AS prod

WORKDIR /var/www/html

COPY ./src .

RUN apk update \
    && apk upgrade \
    && apk --no-cache add postgresql-dev \
    && docker-php-ext-install bcmath pdo_pgsql

COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data .

# Development
FROM prod AS dev

RUN apk --no-cache add autoconf gcc make musl-dev \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY ./docker/php/php.ini $PHP_INI_DIR/conf.d/
