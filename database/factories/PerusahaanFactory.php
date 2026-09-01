<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PerusahaanFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_perusahaan' => fake()->company(),
            'alamat' => fake()->address(),
            'telepon' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'pembimbing' => fake()->name(),
        ];
    }
}
