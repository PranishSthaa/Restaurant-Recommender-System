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
        );
        DB::table('cuisines')->insert(
            [
                'name' => 'Nepali'
            ],
        );
        DB::table('cuisines')->insert(
            [
                'name' => 'Tibetan'
            ],
        );
        DB::table('cuisines')->insert(
            [
                'name' => 'Indian'
            ],
        );
        DB::table('cuisines')->insert(
            [
                'name' => 'Continental'
            ],
        );
    }
}
