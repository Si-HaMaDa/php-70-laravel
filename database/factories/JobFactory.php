<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->jobTitle,
            'description' => $this->faker->paragraph,
            'salary' => $this->faker->numerify,
            'statu' =>  $this->faker->randomElement(['pending', 'open', 'closed']),
            'views' => $this->faker->numerify,
            'category_id' => \App\Models\Category::all()->random()->id,
            'user_id' => \App\Models\User::all()->random()->id,
        ];
    }
}
