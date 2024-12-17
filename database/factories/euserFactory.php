<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\euser>
 */
class euserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username'=>fake()->name(),
            'phoneno'=>fake()->randomNumber(5, true),
            'address'=>fake()->address(),
            'account_detail'=>fake()->randomNumber(1, true)
        ];
    }
}
