FROM php:8.4-apache

ARG WWW_USER=1000
WORKDIR /app

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libxml2-dev libpq-dev libzip-dev \
    libicu-dev libcurl4-openssl-dev \
    zip unzip default-mysql-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl pdo pdo_mysql mbstring exif pcntl bcmath gd zip curl \
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Apache config
COPY vhost.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# Install Composer
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

# Copy Laravel code
COPY . /app

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Create user
RUN groupadd --force -g $WWW_USER webapp \
    && useradd -ms /bin/bash --no-user-group -g $WWW_USER -u $WWW_USER webapp

USER ${WWW_USER}
