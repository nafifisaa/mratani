# Gunakan image PHP dengan Apache
FROM php:8.2-apache

# Install dependensi sistem
RUN apt-get update && apt-get install -y \
    git unzip libsqlite3-dev libpng-dev libonig-dev libxml2-dev zip curl

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Aktifkan mod_rewrite di Apache
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy semua file project
COPY . .

# Install dependency Laravel
RUN composer install --no-dev --optimize-autoloader

# Set permission untuk Laravel storage & bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80
EXPOSE 80

# Jalankan Apache
CMD ["apache2-foreground"]
