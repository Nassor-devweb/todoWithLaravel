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
        $id_user = fake()->numberBetween(1, 3);
        $affectedTo = fake()->numberBetween(1, 3);
        while ($id_user == $affectedTo) {
            $affectedTo = fake()->numberBetween(1, 3);
        }
        return [
            "name" => fake()->name(),
            "description" => fake()->sentence(10),
            "done" => fake()->numberBetween(0, 1),
            "user_id" => $id_user,
            "affectedTo" => $affectedTo,
            "affectedBy" => $id_user
        ];
    }
}
