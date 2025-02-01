<?php
// Note: This is a test Factory file
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
			'age' => $this->faker->randomNumber(),
			'gender' => $this->faker->firstName(),
        ];
    }
}
