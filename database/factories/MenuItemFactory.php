<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MenuItem>
 */
class MenuItemFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'id' => fake()->unique()->numberBetween(1, 100),
      'category_id' => fake()->numberBetween(1, 4),
      'name' => fake()->text(10), // 10文字以内のテキストを生成
      'description' => fake()->text(100),
      'price' => fake()->numberBetween(100, 1000),
      'image_path' => fake()->imageUrl(),
      'is_available' => fake()->boolean(),
      'created_at' => now(),
      'updated_at' => now(),
    ];
  }
}
