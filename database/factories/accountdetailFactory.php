<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\accountdetail>
 */
class accountdetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'account_no' => fake()->randomNumber(5, true),
            'ifsc_code' =>fake()->randomNumber(5, true),
            'bank_name' =>fake()->name(),
            'branch_name' =>fake()->city()
        ];
    }
}
