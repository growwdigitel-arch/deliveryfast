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

# Force git to use HTTPS instead of SSH (Crucial for private packages)
RUN git config --global url."https://github.com/".insteadOf git@github.com:

# Configure Spatie authentication DIRECTLY (Temporary fix to unblock build)
# WARNING: This exposes credentials in the Docker image history.
# TODO: Move to Render "Docker Build Args" once the service is stable.
RUN composer config -g http-basic.satis.spatie.be "eng.aldmohy@gmail.com" "8qaPwNpsQj6qelOoymD9tbeGGG4huNuXNnVzMle1AcVkoHNSHX3Ohib5GsIcN5zD"

# Copy auth.json from build context or Render secrets
COPY auth.json* /var/www/html/
RUN if [ -f /etc/secrets/auth.json ]; then cp /etc/secrets/auth.json /var/www/html/auth.json; fi

# Verify auth.json structure and presence
RUN if [ -f auth.json ]; then \
    echo "✅ auth.json found, applying credentials..."; \
    else \
    echo "⚠️ auth.json NOT found - build may fail for private packages"; \
    fi

# Copy composer files and install dependencies
COPY composer.json composer.lock /var/www/html/
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-scripts --prefer-dist

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
