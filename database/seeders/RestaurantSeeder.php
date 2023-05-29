<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 20; $i++) {
            Restaurant::create([
                'name' => $faker->unique()->company,
                'description' => $faker->paragraph,
                'address' => $faker->address,
                'contact' => $faker->phoneNumber,
                'online_order' => $faker->boolean,
                'avg_cost_min' => $faker->numberBetween(100, 500),
                'avg_cost_max' => $faker->numberBetween(500, 1000),
                'cuisine_id' => $faker->numberBetween(1, 5), // Assuming there are 5 cuisines in the cuisines table
                'rest_type_id' => $faker->numberBetween(1, 5), // Assuming there are 3 restaurant types in the rest_types table
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
