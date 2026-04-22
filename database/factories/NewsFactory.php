<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\News;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<News>
 */
class NewsFactory extends Factory
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
            'author_id' => Author::get()->random()->id,
            'image' => 'https://avatarko.ru/img/kartinka/14/zhivotnye_kot_13379.jpg',
        ];
    }
}
