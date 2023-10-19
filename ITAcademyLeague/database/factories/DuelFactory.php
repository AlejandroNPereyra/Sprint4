<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Commander;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Duel>
 */

class DuelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [

            'date' => $this->faker->dateTimeBetween('2020-01-01', 'now'),
            'celebrated_at' => $this->faker->sentence,

            'winner_ID' => function () {

                 return Commander::inRandomOrder()->first()->commander_ID;
            },

            'loser_ID' => function (array $attributes) {

                // Ensure that loser_ID is not the same as winner_ID
                return Commander::where('commander_ID', '!=', $attributes['winner_ID'])->inRandomOrder()->first()->commander_ID;

            },

            'winner_mana_used' => $this->faker->numberBetween(0, 1000),
            'loser_mana_used' => $this->faker->numberBetween(0, 1000)

        ];
    }
}