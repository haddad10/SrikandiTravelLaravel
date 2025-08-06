FROM php:8.2-fpm

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
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libwebp-dev \
    libxpm-dev \
    libicu-dev \
    libmcrypt-dev \
    libssl-dev \
    nodejs \
    npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Configure and install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp --with-xpm
RUN docker-php-ext-configure intl
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip \
    opcache \
    intl \
    calendar \
    sysvmsg \
    sysvsem \
    sysvshm

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy entire application first
COPY . .

# Set proper permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage \
    && chmod -R 755 /var/www/bootstrap/cache

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev --no-interaction --prefer-dist

# Install Node.js dependencies and build assets
RUN npm install && npm run build

# Create .env file if not exists
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# Generate application key
RUN php artisan key:generate --force

# Cache configuration for production
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan optimize

# Create storage link
RUN php artisan storage:link

# Change current user to www-data
USER www-data

# Expose port 8000
EXPOSE 8000

# Start server
CMD php artisan serve --host=0.0.0.0 --port=8000 