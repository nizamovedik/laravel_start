<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
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
            'title' => fake()->sentence,
            'description' => fake()->sentence,
            'content' => fake()->paragraph,
            'category_id' => rand(1, 5),
            'image' => 'https://avatarko.ru/img/kartinka/14/zhivotnye_kot_13379.jpg',
        ];
    }
}
