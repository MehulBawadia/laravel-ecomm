<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $words = $this->faker->words(2, true),
            'code' => strtoupper($this->faker->word),
            'sku' => strtoupper($this->faker->word),
            'slug' => \Illuminate\Support\Str::slug($words),
            'description' => $this->faker->sentences(3, true),
            'rate' => mt_rand(10.00, 999.00),
            'stock' => mt_rand(0, 99),
            'sort_number' => mt_rand(0, 99),
            'tax_percent' => mt_rand(1.0, 9.0),
            'meta_title' => $this->faker->sentence(8),
            'meta_description' => $this->faker->sentence(15),
            'meta_keywords' => implode(', ', $this->faker->words(5)),
        ];
    }
}
