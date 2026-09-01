<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nis' => fake()->unique()->numerify('##########'),
            'nama' => fake()->name(),
            'kelas' => fake()->randomElement(['XI RPL 1', 'XI RPL 2', 'XI TKJ 1']),
            'jurusan' => fake()->randomElement(['RPL', 'TKJ', 'Multi Media']),
            'nama_perusahaan' => fake()->company(),
            'bidang_pkl' => fake()->randomElement(['Web Developer', 'UI/UX Designer', 'Jaringan & Infrastruktur', 'Admin Keuangan']),
            'tanggal_mulai' => '2026-07-01',
            'tanggal_selesai' => '2026-12-31',
            'pembimbing' => fake()->name(),
            'status' => fake()->randomElement(['aktif', 'selesai']),
        ];
    }
}
