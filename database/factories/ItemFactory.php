<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'item_name' => fake()->name(),
             'item_code' => fake()->numerify('#######'),
             'category' => fake()->name(),
             'stock' => fake()->name(),
             'price' => fake()->name(),
        ];
    }
}
