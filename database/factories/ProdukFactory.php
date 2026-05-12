<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id'=>Category::inRandomOrder()->first()->id,
            'name'=>fake()->randomElement(['Komputer HP', 'Printer Canon Pixma', 'SSD Samsung Evo 500GB', 'Keyboard Samsung 24 Inch', 'Mouse Logitech Wireless']),
            'code'=>fake()->unique()->bothify('PRD-####'),
            'stock'=>fake()->numberBetween(1, 100),
            'price'=>fake()->numberBetween(10000, 500000),
        ];
    }
}
