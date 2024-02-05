<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Todo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Todo::class;

    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "description" => fake()->sentence(10),
            "done" => fake()->numberBetween(0, 1),
        ];
    }
}
