<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->paragraph($nbSentences = 5, $variableNbSentences = true),
            'parent_id' => 1,
            'user_id' => $this->faker->numberBetween($min = 1, $max = 29),
            'post_id' => $this->faker->numberBetween($min = 1, $max = 29),
        ];
    }
}
