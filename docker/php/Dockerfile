FROM php:8.0-fpm-alpine

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN echo http://dl-2.alpinelinux.org/alpine/edge/community/ >> /etc/apk/repositories

RUN apk --no-cache add postgresql-dev shadow

RUN docker-php-ext-install bcmath pdo_pgsql

# Set correct owner and change id to match host id
RUN chown -R www-data:www-data .
RUN usermod -u 1000 www-data
USER 1000