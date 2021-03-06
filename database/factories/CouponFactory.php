<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coupon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'type' => \Illuminate\Support\Arr::random(['flat', 'percentage']),
            'code' => strtoupper($this->faker->word . mt_rand(1, 30)),
            'description' => $this->faker->sentences(3, true),
            'minimum_amount' => mt_rand(10.00, 100.00),
            'percent_or_amount' => mt_rand(10.00, 100.00),
            'starts_at' => today()->addDays(mt_rand(1, 10)),
            'ends_at' => today()->addDays(mt_rand(11, 100)),
        ];
    }
}
