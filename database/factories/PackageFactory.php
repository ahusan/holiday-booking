<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'destination' => $this->faker->city,
            'price' => $this->faker->numberBetween(500, 5000),
            'duration' => $this->faker->numberBetween(1, 14),
            'start_date' => $this->faker->date,
            'inclusions' => $this->faker->words(3, true),
            'exclusions' => $this->faker->words(2, true),
            'itinerary' => $this->faker->paragraphs(3, true),
            'max_participants' => $this->faker->numberBetween(5, 50),
            'image_url' => $this->faker->imageUrl(),
            'is_featured' => $this->faker->boolean,
        ];
    }
}
