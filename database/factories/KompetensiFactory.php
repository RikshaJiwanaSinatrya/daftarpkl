<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KompetensiFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_kompetensi' => fake()->randomElement([
                'HTML',
                'CSS',
                'JavaScript',
                'PHP',
                'Laravel',
                'MySQL',
                'Git',
                'Vue.js',
                'Bootstrap',
                'Tailwind CSS',
            ]),
            'deskripsi' => fake()->sentence(),
        ];
    }
}
