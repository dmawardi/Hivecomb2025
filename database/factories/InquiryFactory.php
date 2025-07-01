<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inquiry>
 */
class InquiryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->optional()->phoneNumber(),
            'company_name' => $this->faker->optional()->company(),
            'website' => $this->faker->optional()->url(),
            'type' => $this->faker->randomElement(['general', 'quote', 'support', 'partnership']),
            'message' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['unread', 'read', 'archived', 'in progress', 'resolved', 'closed']),
        ];
    }
}
