<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rest_types')->insert(
            [
                'name' => 'Cafe',
            ],
        );
        DB::table('rest_types')->insert(
            [
                'name' => 'Fine Dining',
            ],
        );
        DB::table('rest_types')->insert(
            [
                'name' => 'Ethnic',
            ],
        );
        DB::table('rest_types')->insert(
            [
                'name' => 'Bakery',
            ],
        );
        DB::table('rest_types')->insert(
            [
                'name' => 'Fast Food',
            ],
        );
    }
}
