<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Certificat;

class CertificatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Certificat::factory(10)->create();
    }
}