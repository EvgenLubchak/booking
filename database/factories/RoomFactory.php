<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    private const ROOMS_DEFAULT_NAMES = [
        '1 bedroom',
        '2 bedroom',
        'VIP',
        'Superior',
        'VIP 777',
        'no bedroom',
        'gold bedroom',
        'GOLD VIP',
        'PLATINUM VIP',
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->randomElement(self::ROOMS_DEFAULT_NAMES),
            'price' => fake()->numerify('#####'),
        ];
    }
}
