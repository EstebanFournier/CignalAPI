<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Alert;

class AlertFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     * 
     * @var string
     */
    protected $model = Alert::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dateAlert' => $this->faker->date,
            'nameAlert' => $this->faker->name,
            'description' => $this->faker->paragraph,
        ];
    }
}
