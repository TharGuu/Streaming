FROM php:8.3-apache
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev zip unzip git \
 && docker-php-ext-install pdo_mysql
RUN a2enmod rewrite
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf /etc/apache2/apache2.conf /etc/apache2/sites-enabled/000-default.conf
WORKDIR /var/www/html
COPY . .
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --prefer-dist --optimize-autoloader \
 && chown -R www-data:www-data storage bootstrap/cache \
 && php artisan config:cache || true \
 && php artisan route:cache || true
EXPOSE 80
