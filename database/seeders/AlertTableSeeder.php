<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
USE App\Models\Alert;

class AlertTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alert::factory(10)->create();
    }
}