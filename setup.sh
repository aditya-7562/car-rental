#!/bin/bash

# Exit on error
set -e

echo "===== PJ Rentals Application Setup ====="
echo ""

# Check for PHP
echo "Checking for PHP..."
if ! command -v php &> /dev/null; then
    echo "PHP is not installed. Please install PHP 8.1 or higher and try again."
    exit 1
fi

php_version=$(php -r "echo PHP_VERSION;")
echo "Found PHP version: $php_version"

# Check for Composer
echo "Checking for Composer..."
if ! command -v composer &> /dev/null; then
    echo "Composer is not installed. Please install Composer and try again."
    exit 1
fi

# Install dependencies
echo "Installing PHP dependencies..."
composer install

# Environment setup
echo "Setting up environment..."
if [ ! -f .env ]; then
    cp .env.example .env
    php artisan key:generate
    echo "Created .env file and generated application key."
else
    echo ".env file already exists. Skipping."
fi

# Database configuration
echo ""
echo "Configure your database settings:"
echo "By default, we'll use the settings in .env.example, but you can modify them now."
read -p "Do you want to configure the database settings now? (y/n): " configure_db

if [ "$configure_db" = "y" ] || [ "$configure_db" = "Y" ]; then
    read -p "Database name (default: car_rental): " db_name
    db_name=${db_name:-car_rental}
    
    read -p "Database username (default: root): " db_user
    db_user=${db_user:-root}
    
    read -p "Database password: " db_password
    
    # Update .env file
    sed -i "s/DB_DATABASE=.*/DB_DATABASE=$db_name/" .env
    sed -i "s/DB_USERNAME=.*/DB_USERNAME=$db_user/" .env
    sed -i "s/DB_PASSWORD=.*/DB_PASSWORD=$db_password/" .env
    
    echo "Database configuration updated."
fi

# Run migrations and seeders
echo ""
echo "Setting up database tables and sample data..."
read -p "Run migrations and seeders now? (y/n): " run_migrations

if [ "$run_migrations" = "y" ] || [ "$run_migrations" = "Y" ]; then
    php artisan migrate
    php artisan db:seed
    echo "Database migrations and seeders complete."
fi

# Storage link
echo ""
echo "Creating storage link..."
php artisan storage:link

# Done
echo ""
echo "===== Setup Complete! ====="
echo ""
echo "You can now start the development server with: php artisan serve"
echo ""
echo "Default login credentials:"
echo "Admin: admin@example.com / password"
echo "User: john@example.com / password"
echo ""
echo "Thank you for installing RentMyRide!" 