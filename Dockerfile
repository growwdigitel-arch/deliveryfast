FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    nginx \
    supervisor \
    gettext-base \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Force git to use HTTPS instead of SSH
RUN git config --global url."https://github.com/".insteadOf git@github.com:

# Set Composer allow superuser
ENV COMPOSER_ALLOW_SUPERUSER=1

# Create auth.json in both global and local directories
RUN mkdir -p /root/.composer && \
    echo '{"http-basic":{"satis.spatie.be":{"username":"eng.aldmohy@gmail.com","password":"8qaPwNpsQj6qelOoymD9tbeGGG4huNuXNnVzMle1AcVkoHNSHX3Ohib5GsIcN5zD"}}}' > /root/.composer/auth.json && \
    cp /root/.composer/auth.json /var/www/html/auth.json

# Debug: Test credentials directly via curl (check if auth is even valid)
RUN curl -s -I -u "eng.aldmohy@gmail.com:8qaPwNpsQj6qelOoymD9tbeGGG4huNuXNnVzMle1AcVkoHNSHX3Ohib5GsIcN5zD" \
    "https://satis.spatie.be/dist/spatie/laravel-medialibrary-pro/spatie-laravel-medialibrary-pro-2b4ac9c62f7398573bf59dee6ace3634acece674-zip-9926c6.zip" | grep "HTTP/" || echo "DEBUG: curl check failed"

# Copy composer files and install dependencies
COPY composer.json composer.lock /var/www/html/
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts --prefer-dist -vvv

# Copy composer files and install dependencies
COPY composer.json composer.lock /var/www/html/
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts --prefer-dist -vvv

# Copy project files
COPY . /var/www/html

# Run post-install scripts after full code is available
RUN composer dump-autoload --optimize

# Copy nginx config template
COPY docker/nginx.conf /etc/nginx/nginx.conf.template

# Copy supervisor config
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copy start script
COPY docker/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Create required storage directories
RUN mkdir -p storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache

# Cache config and routes for production
RUN php artisan view:clear || true
RUN php artisan config:clear || true

EXPOSE 10000

CMD ["/usr/local/bin/start.sh"]
