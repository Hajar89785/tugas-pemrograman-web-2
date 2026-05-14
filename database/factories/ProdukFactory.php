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
            'name' => fake()->randomElement(['Komputer HP', 'Printer Canon Pixma', 'SSD Samsung', 'Monitor LG', 'Keyboard Logitech', 'Kertas HVS A4 80gr', 'Pulpen Pilot G2', 'Papan Tulis Whiteboard', 'Kursi Kerja Ergonomis', 'Meja Kantor Jati', 'Lemari Arsip Besi']),
            'brand' => fake()->randomElement(['HP', 'Canon', 'Samsung', 'LG', 'Logitech', 'Sinar Dunia', 'Pilot', 'Kenko', 'IKEA', 'Olympic']),
            'unit' => fake()->randomElement(['Unit', 'Pcs', 'Set', 'Pack']),
            'specification'=>fake()->sentence(10),
        ];
    }
}
