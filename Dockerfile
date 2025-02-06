# Use PHP 8.2 FPM as base image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update -y && apt-get install -y \
    git \
    unzip \
    curl \
    libpq-dev \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_pgsql zip

# Install Node.js and npm using n
RUN apt-get install -y build-essential && \
    curl -L https://raw.githubusercontent.com/tj/n/master/bin/n -o n && \
    bash n lts && \
    rm n && \
    npm install -g npm@latest

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy all the files
COPY . .

## Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

## Install Node.js dependencies and build assets
RUN npm install && npm run build

## Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
#
## Generate application key
RUN php artisan key:generate

## Expose port 9000 for PHP-FPM
EXPOSE 9000
#
## Start PHP-FPM
CMD ["php-fpm"]
