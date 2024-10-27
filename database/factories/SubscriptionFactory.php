<?php

namespace Database\Factories;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement
            (['разовый',
                    'месячный',
                    'полугодовой',
                    'годовой',
                    'месячный с тренером',
                    'полугодовой с тренером',
                    'разовый с тренером',
                    'годовой с тренером'
                ]),
            'price' => $this->faker->numberBetween(1000, 10000),
            'user_id' => User::get()->random()->id,
        ];
    }
}
