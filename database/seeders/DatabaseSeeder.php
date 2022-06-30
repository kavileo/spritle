<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'name' => 'User',
                'email' => 'demo@demo.com',
                'password' => bcrypt('12345678'),
            ],
            [

                'name' => 'brayden',
                'email' => 'brayden@demo.com',
                'password' => bcrypt('12345678'),
            ],
            [

                'name' => 'cina',
                'email' => 'cina@demo.com',
                'password' => bcrypt('12345678'),
            ]
            ]);
    }
}
