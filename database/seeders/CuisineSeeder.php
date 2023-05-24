<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CuisineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cuisines')->insert(
            [
                'name' => 'Newari'
            ],
            [
                'name' => 'Nepali'
            ],
            [
                'name' => 'Tibetan'
            ],
            [
                'name' => 'Indian'
            ],
            [
                'name' => 'Continental'
            ],
        );
    }
}
