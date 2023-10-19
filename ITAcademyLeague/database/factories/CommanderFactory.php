<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commander>
 */
class CommanderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [

            'commander_name' => $this->faker->name,
            'description' => $this->faker->text,
            'mana' => $this->faker->numberBetween(0, 1000),
            'email' => $this->faker->unique()->safeEmail,
            'duels_won' => $this->faker->numberBetween(0, 1000),
            'duels_lost' => $this->faker->numberBetween(0, 1000)

        ];
    }
}
