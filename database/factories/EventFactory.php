<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kode' => $this->faker->languageCode(),
            'name' => $this->faker->sentence(mt_rand(2, 5)),

            'event_category_id' => mt_rand(1, 3),
            'date' => $this->faker->date("Y-m-d"),
            'time' => $this->faker->time("H:i:s"),
            'vanue' => $this->faker->company(),
            'htm' => 50.000,
            'description' => collect($this->faker->paragraphs(mt_rand(5, 10)))->map(fn ($p) => "<p>$p</p>")->implode(''),
        ];
    }
}
