# Étape 1 : Builder PHP avec Composer
FROM php:8.2-fpm AS build

# Installer dépendances système et extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    supervisor \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copier le projet
WORKDIR /var/www
COPY . .

# Installer les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# Nettoyer cache si besoin
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Étape 2 : Image finale avec Nginx + PHP-FPM
FROM nginx:stable-alpine

# Copier les fichiers Laravel depuis le builder
COPY --from=build /var/www /var/www

# Copier la config Nginx
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Permissions
RUN chown -R nginx:nginx /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Exposer le port
EXPOSE 80

# Lancer PHP-FPM et Nginx en arrière-plan
CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]
