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
             'item_name' => fake()->randomElement(['Kursi', 'Meja', 'Proyektor', 'Printer', 'Monitor', 'Pulpen', 'Penghapus', 'Spidol', 'Kertas A4', 'AC']),
             'item_code' => fake()->unique()->numerify('#######'),
             'category' => fake()->randomElement(['Elektronik', 'Alat Tulis', 'Buku' ]),
             'stock' => fake()->numberBetween(1, 100),
             'price' => fake()->numberBetween(10, 500)*1000,
        ];
    }
}
