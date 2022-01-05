<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersSeeder::class);
        //\App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'Esteban',
            'email' => 'esteban@example.org',
            'password' => Hash::make('12345')
        ]);

        DB::table('users')->insert([
            'name' => 'charles',
            'email' => 'charles@example.org',
            'password' => Hash::make('12345')
        ]);
    }
}