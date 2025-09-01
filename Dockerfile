FROM php:8.2-cli

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    nodejs \
    npm \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . /app

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Install NPM dependencies and build assets
RUN npm install && npm run build

# Set permissions for Laravel
# RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

RUN php /app/artisan storage:link
RUN php /app/artisan migrate --force
RUN php /app/artisan key:generate

EXPOSE 8000

CMD php artisan serve  --host=0.0.0.0 --port=8000
