# Installation Guide for RentMyRide Car Rental System

This document provides detailed instructions for setting up the RentMyRide car rental application on your local machine.

## Prerequisites

Before beginning the installation, ensure you have the following software installed:

- **PHP** (version 8.1 or higher)
- **Composer** (latest version)
- **MySQL** (or any other database supported by Laravel)
- **Git** (for cloning the repository)
- **Node.js & NPM** (for asset compilation, if needed)

## Installation Methods

### Method 1: Using Setup Scripts (Recommended)

We've provided convenient setup scripts that automate the installation process.

#### For Linux/Mac users:

1. Navigate to the project directory:
   ```
   cd car-rental
   ```

2. Make the setup script executable:
   ```
   chmod +x setup.sh
   ```

3. Run the setup script:
   ```
   ./setup.sh
   ```

4. Follow the prompts to configure your database and complete the installation.

#### For Windows users:

1. Navigate to the project directory:
   ```
   cd car-rental
   ```

2. Run the setup batch file:
   ```
   setup.bat
   ```

3. Follow the prompts to configure your database and complete the installation.

### Method 2: Manual Installation

If you prefer to set up the application manually, follow these steps:

1. Clone the repository (if you haven't already):
   ```
   git clone https://github.com/yourusername/car-rental.git
   cd car-rental
   ```

2. Install PHP dependencies:
   ```
   composer install
   ```

3. Create and configure the environment file:
   ```
   cp .env.example .env
   php artisan key:generate
   ```

4. Open the `.env` file in a text editor and update the database connection settings:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=car_rental
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. Create a database with the name you specified in the `.env` file.

6. Run the database migrations and seeders:
   ```
   php artisan migrate
   php artisan db:seed
   ```

7. Create a symbolic link for storage:
   ```
   php artisan storage:link
   ```

8. Start the development server:
   ```
   php artisan serve
   ```

## Post-Installation

After completing the installation, you can access the application at `http://localhost:8000` (or the URL displayed in your terminal if different).

You can log in using the following default credentials:

1. **Admin User**
   - Email: admin@example.com
   - Password: password

2. **Regular User**
   - Email: john@example.com
   - Password: password

## Troubleshooting

If you encounter any issues during installation, check the following:

1. **Database Connection Issues**:
   - Verify that your database server is running.
   - Check that your database credentials in the `.env` file are correct.
   - Ensure that the database you specified exists.

2. **Permission Issues**:
   - Make sure the `storage` and `bootstrap/cache` directories are writable by your web server.
   - On Linux/Mac, you may need to run:
     ```
     chmod -R 775 storage bootstrap/cache
     ```

3. **Composer Errors**:
   - If you encounter errors during `composer install`, try running:
     ```
     composer update
     ```
   - Or for a clean install:
     ```
     composer install --no-cache
     ```

## Next Steps

After installation, you may want to:

1. Customize the site settings in the admin panel
2. Update car images and information
3. Modify the default terms and conditions
4. Set up email configurations for notifications

## Support

If you need assistance, please open an issue on the GitHub repository or contact us at support@example.com. 