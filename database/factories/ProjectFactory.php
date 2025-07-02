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
        $technologies = [
            'HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'Vue.js', 'React', 'Tailwind CSS',
            'Bootstrap', 'MySQL', 'PostgreSQL', 'MongoDB', 'Git', 'Docker', 'AWS', 'Azure'
        ];
        // Randomly select 2 to 5 technologies from the list and separate them with commas
        $randomTechnologies = $this->faker->randomElements($technologies, rand(2, 5));
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'url' => $this->faker->optional()->url(),
            'client_name' => $this->faker->company(),
            'completion_date' => $this->faker->optional()->date(),
            'technologies' => implode(', ', $randomTechnologies), // Convert array to comma-separated string
            'thumbnail_image' => $this->faker->imageUrl(640, 480, 'business'),
            'status' => $this->faker->randomElement(['active', 'inactive', 'archived']),
            'featured' => $this->faker->boolean(20), // 20% chance of being featured
        ];
    }
}
