<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->unique()->name();

        return [
            'title'      => $title,
            'slug'       => Str::slug($title),
            'excerpt'    => $this->faker->paragraph(3),
            'body'       => $this->faker->paragraph(10),
            // 'status'     => $this->faker->randomElement(['DRAFT', 'PUBLISHED']),
            'status'     => $this->faker->randomElement(['PUBLISHED', 'PUBLISHED']),
            'created_by' => $this->faker->randomElement([User::factory()->create(), User::inRandomOrder()->first()]),
        ];
    }
}
