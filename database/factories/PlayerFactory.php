<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    protected $model = Player::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'age' => rand(18, 55),
            'address' => fake()->randomElement(['seoul', 'fucuoka', 'tokyo', 'Delhi', 'Rajasthan', 'Ambala', 'Chandigarh'])
        ];
    }
}
