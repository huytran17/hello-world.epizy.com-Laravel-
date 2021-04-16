<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'slug' => $this->faker->slug,
            'thumbnail_photo_path' => $this->faker->url,
            'description' => $this->faker->paragraph($nbSentences = 10, $variableNbSentences = true),
            'content' => $this->faker->paragraph($nbSentences = 30, $variableNbSentences = true),
            'meta_data' => [
                'keywords' => $this->faker->word,
                'source' => $this->faker->name,
            ],
            'user_id' => $this->faker->numberBetween($min = 1, $max = 29),
            'category_id' => $this->faker->numberBetween($min = 1, $max = 29),
            'created_at' => $this->faker->date($format = 'Y-m-d', $max = 'now') . $this->faker->time($format = 'H:i:s', $max = 'now'),
            'updated_at' => $this->faker->date($format = 'Y-m-d', $max = 'now') . $this->faker->time($format = 'H:i:s', $max = 'now'),
        ];
    }
}
