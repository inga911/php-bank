<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Briedis',
            'email' => 'briedis@gmail.com',
            'password' => Hash::make('123'),
        ],
        [
            'name' => 'Zuikis',
            'email' => 'zuikis@example.com',
            'password' => Hash::make('123'),
    ]);
        // $faker = Faker::create('lt_LT');
        $faker = Faker::create('fr_FR'); 

        foreach(range(1, 50) as $_) {
            DB::table('clients')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'accNumb' => 'LT 60 10100 ' . rand(00000000000, 99999999999),
                'personId' => rand(3,6) . rand(0, 99) . rand(01,12) . rand(1, 31) . rand(01, 31) . rand(0, 999) . rand(0,9),
                'balance' => '0'
            ]);
        }
    }
}
