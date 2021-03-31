<?php

namespace Database\Factories;

use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebsiteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Website::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'keywords' => $this->faker->word,
            'author' => $this->faker->name,
            'logo_photo_path' => $this->faker->url,
            'shortcut_photo_path' => $this->faker->url,
            'favicon_photo_path' => $this->faker->url,
            'created_at' => $this->faker->date($format = 'Y-m-d', $max = 'now') . $this->faker->time($format = 'H:i:s', $max = 'now'),
            'updated_at' => $this->faker->date($format = 'Y-m-d', $max = 'now') . $this->faker->time($format = 'H:i:s', $max = 'now'),
        ];
    }
}
