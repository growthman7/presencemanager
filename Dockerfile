FROM php:8.4-fpm-alpine

# Installer dépendances Alpine (corrigées)
RUN apk update && apk add --no-cache \
    git unzip curl vim \
    nodejs npm \
    postgresql-dev libzip-dev zip \
    freetype-dev libjpeg-turbo-dev libpng-dev \
    oniguruma-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_pgsql mbstring zip bcmath pcntl \
    && pecl install redis \
    && docker-php-ext-enable redis

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copier uniquement les dépendances (optimisation Docker cache)
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copier le reste du projet
COPY . .

# Permissions Laravel
RUN mkdir -p storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Optimisation Laravel (optionnel mais recommandé)
RUN php artisan config:cache || true
RUN php artisan route:cache || true
RUN php artisan view:cache || true

# Démarrage (adapté pour Render)
CMD php artisan serve --host=0.0.0.0 --port=${PORT}
