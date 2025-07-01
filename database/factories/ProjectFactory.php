<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'url' => $this->faker->optional()->url(),
            'client_name' => $this->faker->company(),
            'completion_date' => $this->faker->optional()->date(),
            'technologies' => $this->faker->words(3, true),
            'thumbnail_image' => $this->faker->imageUrl(640, 480, 'business'),
            'status' => $this->faker->randomElement(['active', 'inactive', 'archived']),
            'featured' => $this->faker->boolean(20), // 20% chance of being featured
        ];
    }
}
