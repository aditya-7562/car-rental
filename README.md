# PJ Rentals - Laravel Project

A comprehensive car rental website built with Laravel, featuring user authentication, car listings, filtering, booking system, and more.

## Features

- **User Authentication:** Register, login, and manage user profiles
- **Car Listings:** Browse cars with filtering options (car type, fuel type, price range)
- **Booking System:** Book cars for specific dates, manage bookings
- **Responsive Design:** Works on mobile, tablet, and desktop devices
- **Admin Management:** Admin users can manage cars and bookings
- **API Integration:** RESTful API for mobile app integration

## Requirements

- PHP >= 8.1
- Composer
- MySQL or any other database supported by Laravel
- Node.js & NPM (for asset compilation)

## Installation

1. Clone the repository:
```
git clone https://github.com/yourusername/car-rental.git
cd car-rental
```

2. Install PHP dependencies:
```
composer install
```

3. Create and setup the environment file:
```
cp .env.example .env
php artisan key:generate
```

4. Update the `.env` file with your database credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=car_rental
DB_USERNAME=root
DB_PASSWORD=
```

5. Run migrations and seed the database:
```
php artisan migrate
php artisan db:seed
```

6. Create symbolic link for storage:
```
php artisan storage:link
```

7. Start the development server:
```
php artisan serve
```

## Default Users

The database seeder creates two default users:

1. **Admin User**
   - Email: admin@example.com
   - Password: password
   - Has admin privileges

2. **Regular User**
   - Email: john@example.com
   - Password: password
   - Standard user account

## API Documentation

The system provides RESTful API endpoints for integration with mobile applications:

- **POST /api/login** - Authenticate user and get JWT token
- **GET /api/cars** - Get list of cars (with filter options)
- **GET /api/cars/{id}** - Get details of a specific car
- **POST /api/cars/{id}/book** - Book a car
- **GET /api/bookings** - Get user's bookings
- **PATCH /api/bookings/{id}/cancel** - Cancel a booking

## Screenshots

(Add screenshots of your application here)

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
