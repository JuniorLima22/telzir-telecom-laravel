<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('city_codes')->insert([
            ['code' => '011'],
            ['code' => '016'],
            ['code' => '017'],
            ['code' => '018'],
        ]);

        DB::table('city_code_prices')->insert([
            ['origin' => '011', 'destiny' => '016', 'price' => 1.90],
            ['origin' => '016', 'destiny' => '011', 'price' => 2.90],
            ['origin' => '011', 'destiny' => '017', 'price' => 1.70],
            ['origin' => '017', 'destiny' => '011', 'price' => 2.70],
            ['origin' => '011', 'destiny' => '018', 'price' => 0.90],
            ['origin' => '018', 'destiny' => '011', 'price' => 1.90],
        ]);

        DB::table('plans')->insert([
            ['name' => ' FaleMais 30', 'minutes' => 30],
            ['name' => ' FaleMais 60', 'minutes' => 60],
            ['name' => ' FaleMais 120', 'minutes' => 120],
        ]);
    }
}
