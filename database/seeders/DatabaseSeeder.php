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
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AlertTableSeeder::class);
        $this->call(EmailTableSeeder::class);
        $this->call(CertificatTableSeeder::class);
        
        /* $emails = Email::all()->pluck('id')->toArray();
        var_dump($emails);
        $faker = Faker::create();
        if (DB::table('certificat')->insert(['email_id' => $faker->randomElement($emails),])) {
            var_dump('ok', DB::table('certificat')->insert(['email_id' => $faker->randomElement($emails),]));
        } else {
            var_dump('error');
        } */
    }
}
