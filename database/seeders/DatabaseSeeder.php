<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ReviewSeeder;
use Database\Seeders\CuisineSeeder;
use Database\Seeders\RestTypeSeeder;
use Database\Seeders\RestaurantSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RestTypeSeeder::class,
            CuisineSeeder::class,
            UserSeeder::class,
        ]);
        User::factory(10)->create();
        $this->call([
            RestaurantSeeder::class,
            ReviewSeeder::class,
        ]);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
