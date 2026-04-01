<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->name(),
            'email'=>$this->faker->unique()->safeEmail,
            'age'=>$this->faker->numberBetween(1,10),
            'date_of_birth'=>$this->faker->date('Y-m-d'),
            'gender'=>$this->faker->randomElement(['m','f']),
            'user_id'       => \App\Models\User::factory(),
        ];
    }
}
