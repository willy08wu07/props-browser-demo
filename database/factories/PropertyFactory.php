<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $originalPrice = $this->faker->numberBetween(3, 20) * 100;
        $specialPrice = $originalPrice - $this->faker->numberBetween(0, 1) * 101;
        return [
            'display_name' => $this->faker->jobTitle(),
            'original_price' => $originalPrice,
            'special_price' => $specialPrice,
            'img_url' => '/img/property/default.png',
        ];
    }
}
