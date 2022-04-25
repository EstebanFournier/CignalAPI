<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Email;

class randomEmailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $emails = Email::all()->pluck('id')->toArray();
        return [
            'email_id' => $this->faker->randomElement($emails),
        ];
    }
}
