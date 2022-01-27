<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Certificat;
use App\Models\User;
use App\Models\Email;

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
        $users = User::all()->pluck('id')->toArray();
        $emails = Email::all()->pluck('id')->toArray();
        return [
            'projectName' => $this->faker->name,
            'type' => $this->faker->word,
            'plateform' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'startDate' => $this->faker->date,
            'endDate' => $this->faker->date,
            'createdBy' => $this->faker->randomElement($users),
            'email_id' => $this->faker->randomElement($emails),
        ];
    }
}
