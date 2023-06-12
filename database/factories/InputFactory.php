<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\product;
use App\Models\presentation;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\input>
 */
class InputFactory extends Factory
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
            'quantity' => $this->faker->numberBetween(1, 100),
            'created_by' => User::all()->random()->id,
            'updated_by' => User::all()->random()->id,
            'deleted_at' => null,
            'deleted_by' => null,
        ];
    }
}
