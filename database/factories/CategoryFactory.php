<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $words = $this->faker->words(2, true),
            'slug' => \Illuminate\Support\Str::slug($words),
            'status' => \Illuminate\Support\Arr::random([
                Category::DRAFT, Category::PUBLISHED,
            ]),
            'description' => $this->faker->sentences(5, true),
            'meta_title' => $this->faker->sentence(8),
            'meta_description' => $this->faker->sentence(15),
            'meta_keywords' => implode(', ', $this->faker->words(5)),
        ];
    }
}
