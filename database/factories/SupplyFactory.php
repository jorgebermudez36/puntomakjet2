<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\product;
use App\Models\presentation;
use App\Models\input;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\supply>
 */
class SupplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reference_id' => product::all()->random()->id,
            'product_id' => product::all()->random()->id,
            'presentation_id' => presentation::all()->random()->id,
            'stock' => $this->faker->numberBetween(1, 100),
        ];
    }
}
