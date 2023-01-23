<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Participant>
 */
class ParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstname'=> $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->stateAbbr(),
            'zip' => $this->faker->postcode(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'jumps' => $this->faker->numberBetween(100,500),
            'amount' => $this->faker->randomFloat(2,10,200),
            'event_id' => $this->faker->numberBetween(1, 20),
            'user_id' => 1,
            'jumper_id' => 'SZA2334'
        ];
    }
}
