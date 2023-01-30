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
           'start_date' => $this->faker->dateTimeThisYear(),
            'end_date' => $this->faker->dateTimeThisYear(),
            'title' => $this->faker->sentence(4),
            'detail' => $this->faker->paragraph(1, false),
            'start_time' => '08:00',
            'cost' => $this->faker->randomFloat(2,10,200),
            'cost_detail' => 'Per Day',
            'max' => $this->faker->randomDigitNotNull(),
            'current' => $this->faker->numberBetween(1,10),
            'display'=> 1,
            'contact_name' => $this->faker->name(),
            'contact_email' => $this->faker->email(),
            'contact_phone' => $this->faker->phoneNumber,
            'has_registration' => $this->faker->numberBetween(0,1),
            'user_id'=> 1
        ];
    }
}
