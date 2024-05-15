<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\Concerns\CanCreateImages;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
  //  use CanCreateImages;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->sentence(3),
            'description' =>  $this->faker->realText(),
            'price' => $this->faker->randomFloat(2, 80, 400),
            'image' => $this->faker->image(null, 360, 360, 'animals', true),
            'active' => $this->faker->boolean(),
        ];
    }
}
