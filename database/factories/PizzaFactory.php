<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pizza>
 */
class PizzaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'text' => fake()->sentence(3, true),
            'picture' =>  fake()->imageUrl($width = 640, $height = 480),
            'prix'  => fake()->randomNumber(2)
        ];
    }
}
