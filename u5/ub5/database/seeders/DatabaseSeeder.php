<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name' => 'Josh',
            'email' => 'josh@example.com',
            'password' => Hash::make('123'),
        ]);
        DB::table('users')->insert([
            'name' => 'Lin',
            'email' => 'lin@example.com',
            'password' => Hash::make('123'),
        ]);

        $faker = Faker::create('fr_FR'); 

        foreach(range(1, 50) as $_) {
            DB::table('clients')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'persId' => rand(3, 6) . rand(0, 9) . sprintf("%02d", rand(1, 12)) . sprintf("%02d", rand(1, 31)) . sprintf("%03d", rand(1, 999)) . rand(0, 9),
            ]);
        }

        foreach(range(1, 100) as $_) {
            DB::table('accounts')->insert([
                'account' => 'LT'.  rand(10,99) .  rand(10,99) . rand(100,999)  . rand(10000000000, 99999999999),
                'client_id' => rand(1, 50),
            ]);
        }

    }
}
