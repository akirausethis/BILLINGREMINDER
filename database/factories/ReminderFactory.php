<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Type;
use App\Models\Frequency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reminder>
 */
class ReminderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), 
            'reminder_name' => $this->faker->sentence(3), 
            'reminder_desc' => $this->faker->paragraph(), 
            'type_id' => Type::factory(), 
            'reminder_amount' => $this->faker->randomFloat(2, 1000, 100000000000), 
            'start_date' => $this->faker->dateTimeBetween('now', '+1 year'), 
            'frequency_id' => Frequency::factory()
        ];
    }
}