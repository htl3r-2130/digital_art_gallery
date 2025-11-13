FROM php:8.2-fpm-alpine

# Composer installieren (aus offiziellem Composer-Image)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer