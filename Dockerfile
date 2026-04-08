FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    libzip-dev \
    libpq-dev \
    zip \
    unzip \
    nginx

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure intl \
    && docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd intl zip

# Install Node.js and NPM (for Vite)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Install Composer dependencies
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Install NPM dependencies and Build Assets
RUN npm install \
    && npm run build

# Set permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
RUN chmod +x /var/www/scripts/launch.sh

# Copy nginx configuration
COPY docker/nginx.conf /etc/nginx/sites-available/default

# Expose port 80
EXPOSE 80

# Use launch script to start services
ENTRYPOINT ["/var/www/scripts/launch.sh"]
