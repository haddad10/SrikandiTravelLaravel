#!/bin/bash

# Railway Laravel Startup Script
echo "🚀 Starting Srikandi Travel Laravel Application..."

# Set proper permissions
chmod -R 755 storage
chmod -R 755 bootstrap/cache

# Create .env file if not exists
if [ ! -f .env ]; then
    echo "📝 Creating .env file from .env.example..."
    cp .env.example .env
fi

# Generate application key if not exists
if [ -z "$(grep 'APP_KEY=' .env | cut -d'=' -f2)" ] || [ "$(grep 'APP_KEY=' .env | cut -d'=' -f2)" = "" ]; then
    echo "🔑 Generating application key..."
    php artisan key:generate --force
fi

# Clear and cache configuration
echo "⚙️  Optimizing Laravel for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# Create storage link
echo "🔗 Creating storage link..."
php artisan storage:link

# Run migrations if database is available
echo "🗄️  Running database migrations..."
php artisan migrate --force

# Start the application
echo "🌐 Starting Laravel server on port 8000..."
exec php artisan serve --host=0.0.0.0 --port=8000 