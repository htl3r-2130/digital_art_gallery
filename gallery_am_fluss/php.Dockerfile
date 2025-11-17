FROM php:8.2-fpm-alpine

# Composer installieren (aus offiziellem Composer-Image)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
#docker compose exec php sh
#cd /var/www/html
#composer require firebase/php-jwt
#oder composer init
