<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Commander;
use App\Providers\FantasyPlaceProvider;

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
        $this->faker->addProvider(new FantasyPlaceProvider($this->faker));

        return [

            'date' => $this->faker->dateTimeBetween('2023-01-01', 'now'),
            'celebrated_at' => $this->faker->fantasyPlace(),

            'winner_ID' => function () {

                 return Commander::inRandomOrder()->first()->commander_ID;
            },
            'loser_ID' => function (array $attributes) {

                // Ensure that loser_ID is not the same as winner_ID
                return Commander::where('commander_ID', '!=', $attributes['winner_ID'])->inRandomOrder()->first()->commander_ID;

            },

            'winner_mana_used' => function (array $attributes) {
                $winner = Commander::find($attributes['winner_ID']);
                return $this->faker->numberBetween(10, min(100, $winner->mana));
            },
            'loser_mana_used' => function (array $attributes) {
                $loser = Commander::find($attributes['loser_ID']);
                return $this->faker->numberBetween($attributes['winner_mana_used'] + 1, min(100, $loser->mana));
            },
            
        ];

    }

}