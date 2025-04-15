@echo off
echo ===== PJ Rentals Application Setup =====
echo.

REM Check for PHP
echo Checking for PHP...
where php >nul 2>nul
if %ERRORLEVEL% neq 0 (
    echo PHP is not installed. Please install PHP 8.1 or higher and try again.
    exit /b 1
)

php -r "echo 'Found PHP version: ' . PHP_VERSION;"
echo.

REM Check for Composer
echo Checking for Composer...
where composer >nul 2>nul
if %ERRORLEVEL% neq 0 (
    echo Composer is not installed. Please install Composer and try again.
    exit /b 1
)

REM Install dependencies
echo Installing PHP dependencies...
call composer install

REM Environment setup
echo Setting up environment...
if not exist .env (
    copy .env.example .env
    call php artisan key:generate
    echo Created .env file and generated application key.
) else (
    echo .env file already exists. Skipping.
)

REM Database configuration
echo.
echo Configure your database settings:
echo By default, we'll use the settings in .env.example, but you can modify them now.
set /p configure_db=Do you want to configure the database settings now? (y/n): 

if /i "%configure_db%"=="y" (
    set /p db_name=Database name (default: car_rental): 
    if "%db_name%"=="" set db_name=car_rental
    
    set /p db_user=Database username (default: root): 
    if "%db_user%"=="" set db_user=root
    
    set /p db_password=Database password: 
    
    REM Update .env file
    call php -r "$env = file_get_contents('.env'); $env = preg_replace('/DB_DATABASE=.*/', 'DB_DATABASE=%db_name%', $env); $env = preg_replace('/DB_USERNAME=.*/', 'DB_USERNAME=%db_user%', $env); $env = preg_replace('/DB_PASSWORD=.*/', 'DB_PASSWORD=%db_password%', $env); file_put_contents('.env', $env);"
    
    echo Database configuration updated.
)

REM Run migrations and seeders
echo.
echo Setting up database tables and sample data...
set /p run_migrations=Run migrations and seeders now? (y/n): 

if /i "%run_migrations%"=="y" (
    call php artisan migrate
    call php artisan db:seed
    echo Database migrations and seeders complete.
)

REM Storage link
echo.
echo Creating storage link...
call php artisan storage:link

REM Done
echo.
echo ===== Setup Complete! =====
echo.
echo You can now start the development server with: php artisan serve
echo.
echo Default login credentials:
echo Admin: admin@example.com / password
echo User: john@example.com / password
echo.
echo Thank you for installing RentMyRide!

pause 