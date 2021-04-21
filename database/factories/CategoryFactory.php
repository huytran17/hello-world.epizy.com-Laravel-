<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

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
            'description' => $this->faker->paragraph($nbSentences = 4, $variableNbSentences = true),
            'thumbnail_photo_path' => $this->faker->url,
            'parent_id' => 1,
            'user_id' => $this->faker->numberBetween($min = 1, $max = 29),
        ];
    }
}
