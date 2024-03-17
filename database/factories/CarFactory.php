<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->domainName(),
            'model' => fake()->unique()->company(),
            'make' => fake()->unique()->domainWord(),
            'vin' => fake()->tld(),
            'user_id' => User::all()->random()->id,
        ];
    }
}
