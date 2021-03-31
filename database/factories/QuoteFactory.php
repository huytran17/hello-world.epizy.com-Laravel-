<?php

namespace Database\Factories;

use App\Models\Quote;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Quote::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'author' => $this->faker->name,
            'user_id' => $this->faker->numberBetween($min = 1, $max = 29),
            'created_at' => $this->faker->date($format = 'Y-m-d', $max = 'now') . $this->faker->time($format = 'H:i:s', $max = 'now'),
            'updated_at' => $this->faker->date($format = 'Y-m-d', $max = 'now') . $this->faker->time($format = 'H:i:s', $max = 'now'),
        ];
    }
}
