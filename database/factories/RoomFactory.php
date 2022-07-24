<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    private const ROOMS_DEFAULT_NAMES = [
        'No bedroom',
        '2 bedroom',
        'Gold bedroom',
        'No closet',
        '1 closet',
        'VIP',
        '777 VIP',
        'GOLD VIP',
        'BRONZE VIP',
        'PLATINUM VIP',
        'Good room',
        'Bad room',
        'Not so bad room',
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
