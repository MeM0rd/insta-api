<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1,2),
            'sender_id' => $this->faker->numberBetween(3, 5),
            'text' => $this->faker->text(30),
            'created_at' => $this->faker->date,
            'updated_at' => $this->faker->date
        ];
    }
}
