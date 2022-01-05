<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Certificat;

class CertificatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     * 
     * @var string
     */
    protected $model = Certificat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'projectName' => $this->faker->name,
            'type' => $this->faker->word,
            'plateform' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'startDate' => $this->faker->date,
            'endDate' => $this->faker->date,
//            'file' => $this->faker->file(),
        ];
    }
}
