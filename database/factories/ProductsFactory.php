<?php

namespace Database\Factories;

use App\Models\Products;
use App\Models\ProductsCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    // Specify the corresponding model for the factory
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 10, 500),
            'description' => $this->faker->sentence(),
            'category_id' => ProductsCategory::factory(),
            'created_by' => User::factory(),
            'updated_by' => User::factory(),
        ];
    }
}
