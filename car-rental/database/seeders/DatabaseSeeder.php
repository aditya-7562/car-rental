<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'phone_number' => '123-456-7890',
            'address' => '123 Admin Street, Admin City',
            'driver_license' => 'ADMIN12345',
            'is_admin' => true,
        ]);

        // Create regular user
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'phone_number' => '987-654-3210',
            'address' => '456 User Street, User City',
            'driver_license' => 'USER12345',
        ]);

        // Add sample cars
        $cars = [
            [
                'name' => 'Toyota Camry',
                'model' => '2023 SE',
                'image' => null,
                'price_per_day' => 59.99,
                'fuel_type' => 'petrol',
                'car_type' => 'sedan',
                'seats' => 5,
                'air_conditioned' => true,
                'description' => 'The Toyota Camry is a comfortable, reliable sedan perfect for family trips or business travel.',
                'available' => true,
            ],
            [
                'name' => 'Honda CR-V',
                'model' => '2023 Touring',
                'image' => null,
                'price_per_day' => 69.99,
                'fuel_type' => 'petrol',
                'car_type' => 'suv',
                'seats' => 5,
                'air_conditioned' => true,
                'description' => 'The Honda CR-V offers spacious interiors with ample cargo space for your adventures.',
                'available' => true,
            ],
            [
                'name' => 'BMW 5 Series',
                'model' => '2023 530i',
                'image' => null,
                'price_per_day' => 129.99,
                'fuel_type' => 'petrol',
                'car_type' => 'luxury',
                'seats' => 5,
                'air_conditioned' => true,
                'description' => 'Experience luxury and performance with the BMW 5 Series, featuring premium interiors and advanced technology.',
                'available' => true,
            ],
            [
                'name' => 'Tesla Model 3',
                'model' => '2023 Long Range',
                'image' => null,
                'price_per_day' => 99.99,
                'fuel_type' => 'electric',
                'car_type' => 'sedan',
                'seats' => 5,
                'air_conditioned' => true,
                'description' => 'The Tesla Model 3 offers a sustainable, high-tech driving experience with impressive range and acceleration.',
                'available' => true,
            ],
            [
                'name' => 'Ford Mustang',
                'model' => '2023 GT',
                'image' => null,
                'price_per_day' => 119.99,
                'fuel_type' => 'petrol',
                'car_type' => 'sport',
                'seats' => 4,
                'air_conditioned' => true,
                'description' => 'Feel the thrill of driving with the iconic Ford Mustang, combining power and style.',
                'available' => true,
            ],
            [
                'name' => 'Toyota RAV4',
                'model' => '2023 Hybrid',
                'image' => null,
                'price_per_day' => 79.99,
                'fuel_type' => 'hybrid',
                'car_type' => 'suv',
                'seats' => 5,
                'air_conditioned' => true,
                'description' => 'The Toyota RAV4 Hybrid combines efficiency with versatility, perfect for eco-conscious travelers.',
                'available' => true,
            ],
            [
                'name' => 'Mercedes-Benz E-Class',
                'model' => '2023 E350',
                'image' => null,
                'price_per_day' => 149.99,
                'fuel_type' => 'petrol',
                'car_type' => 'luxury',
                'seats' => 5,
                'air_conditioned' => true,
                'description' => 'The Mercedes-Benz E-Class offers sophisticated design, premium comfort, and cutting-edge technology.',
                'available' => true,
            ],
            [
                'name' => 'Honda Civic',
                'model' => '2023 Touring',
                'image' => null,
                'price_per_day' => 49.99,
                'fuel_type' => 'petrol',
                'car_type' => 'sedan',
                'seats' => 5,
                'air_conditioned' => true,
                'description' => 'The reliable Honda Civic provides excellent fuel economy and a comfortable ride for everyday driving.',
                'available' => true,
            ],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}
