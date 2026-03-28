FROM php:8.2-fpm

COPY . .

ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

ENV COMPOSER_ALLOW_SUPERUSER 1

# Allow composer to run as root
RUN composer install --no-dev --optimize-autoloader

CMD ["/start.sh"]
