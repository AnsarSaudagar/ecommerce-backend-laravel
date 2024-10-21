<?php

namespace Database\Factories;

use App\Models\ProductsCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = ProductsCategory::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'image' => $this->faker->imageUrl(),
        ];
    }
}
