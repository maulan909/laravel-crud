<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nis' => $this->faker->unique()->randomNumber(8, true),
            'nama' => $this->faker->name(),
            'jurusan' => 'Multimedia'
        ];
    }
}
