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
        User::updateOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin User',
            'password' => Hash::make('password'),
            'phone_number' => '123-456-7890',
            'address' => '123 Admin Street, Admin City',
            'driver_license' => 'ADMIN12345',
            'is_admin' => true,
        ]);

        // Create regular user
        User::updateOrCreate([
            'email' => 'john@example.com',
        ], [
            'name' => 'John Doe',
            'password' => Hash::make('password'),
            'phone_number' => '987-654-3210',
            'address' => '456 User Street, User City',
            'driver_license' => 'USER12345',
        ]);

        // Add sample cars
        $cars = [
            [
                'name' => 'Maruti Suzuki Swift',
                'model' => '2023 ZXI+',
                'image' => null,
                'price_per_day' => 1999,
                'fuel_type' => 'petrol',
                'car_type' => 'hatchback',
                'seats' => 5,
                'air_conditioned' => true,
                'description' => 'The Maruti Suzuki Swift is a popular hatchback known for its sporty design, fuel efficiency, and peppy performance.',
                'available' => true,
            ],
            [
                'name' => 'Hyundai Creta',
                'model' => '2023 SX',
                'image' => null,
                'price_per_day' => 2999,
                'fuel_type' => 'petrol',
                'car_type' => 'suv',
                'seats' => 5,
                'air_conditioned' => true,
                'description' => 'The Hyundai Creta is a premium SUV offering spacious interiors, modern features, and a comfortable ride.',
                'available' => true,
            ],
            [
                'name' => 'Kia Seltos',
                'model' => '2023 HTX',
                'image' => null,
                'price_per_day' => 2799,
                'fuel_type' => 'petrol',
                'car_type' => 'suv',
                'seats' => 5,
                'air_conditioned' => true,
                'description' => 'The Kia Seltos is a feature-rich SUV with a bold design, premium interiors, and advanced technology.',
                'available' => true,
            ],
            [
                'name' => 'Mahindra Thar',
                'model' => '2023 LX',
                'image' => null,
                'price_per_day' => 3499,
                'fuel_type' => 'diesel',
                'car_type' => 'suv',
                'seats' => 4,
                'air_conditioned' => true,
                'description' => 'The Mahindra Thar is an iconic off-roader with rugged capabilities and modern features.',
                'available' => true,
            ],
            [
                'name' => 'Tata Nexon',
                'model' => '2023 XZ+',
                'image' => null,
                'price_per_day' => 2499,
                'fuel_type' => 'petrol',
                'car_type' => 'suv',
                'seats' => 5,
                'air_conditioned' => true,
                'description' => 'The Tata Nexon is a stylish compact SUV with a 5-star safety rating and feature-packed interiors.',
                'available' => true,
            ],
            [
                'name' => 'Maruti Suzuki Baleno',
                'model' => '2023 Alpha',
                'image' => null,
                'price_per_day' => 2199,
                'fuel_type' => 'petrol',
                'car_type' => 'hatchback',
                'seats' => 5,
                'air_conditioned' => true,
                'description' => 'The Maruti Suzuki Baleno is a premium hatchback offering spacious interiors and premium features.',
                'available' => true,
            ],
            [
                'name' => 'Hyundai i20',
                'model' => '2023 Asta',
                'image' => null,
                'price_per_day' => 2299,
                'fuel_type' => 'petrol',
                'car_type' => 'hatchback',
                'seats' => 5,
                'air_conditioned' => true,
                'description' => 'The Hyundai i20 is a premium hatchback with modern design, advanced features, and comfortable ride quality.',
                'available' => true,
            ],
            [
                'name' => 'Tata Altroz',
                'model' => '2023 XZ+',
                'image' => null,
                'price_per_day' => 2099,
                'fuel_type' => 'petrol',
                'car_type' => 'hatchback',
                'seats' => 5,
                'air_conditioned' => true,
                'description' => 'The Tata Altroz is a premium hatchback with a 5-star safety rating and premium features.',
                'available' => true,
            ],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}
