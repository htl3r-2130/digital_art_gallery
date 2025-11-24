FROM php:8.2-fpm-alpine

# für Composer & Erweiterungen notwendige Libraries
RUN apk update && apk add --no-cache \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip

# Composer installieren (aus offiziellem Composer-Image kopiert)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html