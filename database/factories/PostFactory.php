<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'description' => $this->faker->realText(200),
            'location' => $this->faker->country(),
            'hide_likes_count' => $this->faker->boolean,
            'allow_commenting' => $this->faker->boolean,
            'type' => 'post',
        ];
    }
}
