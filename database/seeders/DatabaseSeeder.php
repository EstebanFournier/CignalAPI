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
        $this->call(CertificatTableSeeder::class);

        /** 
        $faker = Faker::create();

        foreach(range(0, 10) as $_){
            $certificat = new Certificat();
            $certificat->projectName = $faker->name();
            $certificat->type = $faker->word();
            /** 
            
            $certificat->plateform = $faker->word();
            $certificat->description = $faker->paragraph();
            $certificat->startDate = $faker->date();
            $certificat->endDate = $faker->date();
            $certificat->save();
            */
        }
    }
