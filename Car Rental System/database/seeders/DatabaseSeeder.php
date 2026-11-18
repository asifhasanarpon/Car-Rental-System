<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'phone' => '+880 1700-000000',
                'password' => Hash::make('password123'),
            ]
        );

        $cars = [
            ['brand' => 'Tesla', 'model_name' => 'Tesla Model S', 'image_url' => 'https://t3.ftcdn.net/jpg/04/91/22/94/360_F_491229401_k7y8Cbbw1zzsOBL2PURD2fM1R84fGoh8.jpg', 'price_per_day' => 180, 'capacity' => 4, 'transmission' => 'Autopilot', 'mileage' => '400km', 'fuel_type' => 'Electric', 'reviews_count' => 550],
            ['brand' => 'Tesla', 'model_name' => 'Tesla Model E', 'image_url' => 'https://file.aiquickdraw.com/imgcompressed/img/compressed_2ae437302256f66bec1c5ff1a12d46aa.webp', 'price_per_day' => 150, 'capacity' => 4, 'transmission' => 'Autopilot', 'mileage' => '400km', 'fuel_type' => 'Electric', 'reviews_count' => 450],
            ['brand' => 'Tesla', 'model_name' => 'Tesla Model Y', 'image_url' => 'https://www.largus.fr/images/images/tesla-model-s-plaid-2021.jpg', 'price_per_day' => 200, 'capacity' => 4, 'transmission' => 'Autopilot', 'mileage' => '400km', 'fuel_type' => 'Electric', 'reviews_count' => 550],
            ['brand' => 'Mitsubishi', 'model_name' => 'Mirage', 'image_url' => 'https://tse1.mm.bing.net/th/id/OIP.ZAdDA18es_CCgE51chzRdwHaHa?rs=1&pid=ImgDetMain&o=7&rm=3', 'price_per_day' => 120, 'capacity' => 4, 'transmission' => 'Manual', 'mileage' => '18km/l', 'fuel_type' => 'Diesel', 'reviews_count' => 350],
            ['brand' => 'Mitsubishi', 'model_name' => 'Xpander', 'image_url' => 'https://img.freepik.com/premium-photo/modern-white-sports-car-white-background_899449-393687.jpg?w=996', 'price_per_day' => 150, 'capacity' => 4, 'transmission' => 'Manual', 'mileage' => '18km/l', 'fuel_type' => 'Diesel', 'reviews_count' => 350],
            ['brand' => 'Mitsubishi', 'model_name' => 'Pajero Sports', 'image_url' => 'https://tse3.mm.bing.net/th/id/OIP.cPdgw_PxbhwyaMFhpvVNnQHaFj?rs=1&pid=ImgDetMain&o=7&rm=30', 'price_per_day' => 180, 'capacity' => 4, 'transmission' => 'Manual', 'mileage' => '18km/l', 'fuel_type' => 'Diesel', 'reviews_count' => 400],
            ['brand' => 'Mazda', 'model_name' => 'Mazda CX5', 'image_url' => 'https://img.freepik.com/premium-photo/white-sports-car-white-background_81048-308.jpg?w=900', 'price_per_day' => 130, 'capacity' => 4, 'transmission' => 'Manual', 'mileage' => '18km/l', 'fuel_type' => 'Diesel', 'reviews_count' => 200],
            ['brand' => 'Mazda', 'model_name' => 'Mazda CX-30', 'image_url' => 'https://s1.cdn.autoevolution.com/images/news/mazda-goes-bad-with-release-of-rx-vision-gt3-for-gran-turismo-sport-144150_1.jpg', 'price_per_day' => 200, 'capacity' => 4, 'transmission' => 'Manual', 'mileage' => '18km/l', 'fuel_type' => 'Diesel', 'reviews_count' => 100],
            ['brand' => 'Mazda', 'model_name' => 'Mazda CX-9', 'image_url' => 'https://img.freepik.com/premium-photo/car-isolated-white-background-mazda-mx5-miata-convertible-white-car-blank-clean-white-backgro_655090-606625.jpg', 'price_per_day' => 180, 'capacity' => 4, 'transmission' => 'Manual', 'mileage' => '18km/l', 'fuel_type' => 'Diesel', 'reviews_count' => 180],
            ['brand' => 'Toyota', 'model_name' => 'Corolla', 'image_url' => 'https://tse2.mm.bing.net/th/id/OIP.Z2pLH6SMq5oOSJuSuLeRGwHaFu?rs=1&pid=ImgDetMain&o=7&rm=3', 'price_per_day' => 180, 'capacity' => 4, 'transmission' => 'Manual', 'mileage' => '18km/l', 'fuel_type' => 'Diesel', 'reviews_count' => 250],
            ['brand' => 'Toyota', 'model_name' => 'Innova', 'image_url' => 'https://tse2.mm.bing.net/th/id/OIF.NOLCe0rjZhg3WeVHRLK0bA?rs=1&pid=ImgDetMain&o=7&rm=3', 'price_per_day' => 150, 'capacity' => 4, 'transmission' => 'Manual', 'mileage' => '18km/l', 'fuel_type' => 'Diesel', 'reviews_count' => 550],
            ['brand' => 'Toyota', 'model_name' => 'Fortuner', 'image_url' => 'https://tse3.mm.bing.net/th/id/OIF.GupVcTt0Jdhn2E1BUw37RQ?rs=1&pid=ImgDetMain&o=7&rm=3', 'price_per_day' => 190, 'capacity' => 4, 'transmission' => 'Manual', 'mileage' => '18km/l', 'fuel_type' => 'Diesel', 'reviews_count' => 180],
            ['brand' => 'Honda', 'model_name' => 'Amaze', 'image_url' => 'https://tse4.mm.bing.net/th/id/OIP.icVBL2XHxw9F3LU_nBCq8gHaEK?rs=1&pid=ImgDetMain&o=7&rm=3', 'price_per_day' => 100, 'capacity' => 4, 'transmission' => 'Manual', 'mileage' => '18km/l', 'fuel_type' => 'Diesel', 'reviews_count' => 200],
            ['brand' => 'Honda', 'model_name' => 'Elevate', 'image_url' => 'https://tse4.mm.bing.net/th/id/OIP.nPde0FZ4nwY2NDQB3oyhKgHaHa?rs=1&pid=ImgDetMain&o=7&rm=3', 'price_per_day' => 120, 'capacity' => 4, 'transmission' => 'Manual', 'mileage' => '18km/l', 'fuel_type' => 'Diesel', 'reviews_count' => 350],
            ['brand' => 'Honda', 'model_name' => 'City', 'image_url' => 'https://tse4.mm.bing.net/th/id/OIP.T32RlFkD_6wEh_TZtfqYpQHaDG?rs=1&pid=ImgDetMain&o=7&rm=3', 'price_per_day' => 150, 'capacity' => 4, 'transmission' => 'Manual', 'mileage' => '18km/l', 'fuel_type' => 'Diesel', 'reviews_count' => 300],
        ];

        foreach ($cars as $car) {
            Car::updateOrCreate(
                ['model_name' => $car['model_name']],
                $car
            );
        }
    }
}
