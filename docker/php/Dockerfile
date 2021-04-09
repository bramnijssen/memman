FROM php:8.0-fpm-alpine AS prod

WORKDIR /var/www/html

COPY ./src .
RUN chmod +x init.sh

RUN apk update \
    && apk upgrade \
    && apk --no-cache add bash npm postgresql-dev \
    && docker-php-ext-install bcmath pdo_pgsql

RUN curl -o wait-for-it.sh https://raw.githubusercontent.com/vishnubob/wait-for-it/master/wait-for-it.sh
RUN chmod +x wait-for-it.sh

COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

RUN npm install

RUN cp .env.example .env \
    && php artisan key:generate

RUN chown -R www-data:www-data .

# Development
FROM prod AS dev

RUN apk --no-cache add autoconf gcc make musl-dev \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY ./docker/php/php.ini $PHP_INI_DIR/conf.d/

RUN composer install --optimize-autoloader
