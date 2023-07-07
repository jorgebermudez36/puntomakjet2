<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\reference;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reference_id' => reference::all()->random()->id,
            'name' => $this->faker->word,
        ];
    }
}
