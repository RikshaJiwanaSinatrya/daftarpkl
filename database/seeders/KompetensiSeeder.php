<?php

namespace Database\Seeders;

use App\Models\Kompetensi;
use Illuminate\Database\Seeder;

class KompetensiSeeder extends Seeder
{
    public function run(): void
    {
        $kompetensi = [
            ['nama_kompetensi' => 'HTML', 'deskripsi' => 'Mampu membuat struktur halaman web menggunakan HTML.'],
            ['nama_kompetensi' => 'CSS', 'deskripsi' => 'Mampu membuat tampilan dan layout halaman web menggunakan CSS.'],
            ['nama_kompetensi' => 'JavaScript', 'deskripsi' => 'Mampu membuat interaksi dan logika pada halaman web menggunakan JavaScript.'],
            ['nama_kompetensi' => 'PHP', 'deskripsi' => 'Mampu membuat aplikasi web menggunakan PHP.'],
            ['nama_kompetensi' => 'Laravel', 'deskripsi' => 'Mampu mengembangkan aplikasi web menggunakan framework Laravel.'],
            ['nama_kompetensi' => 'MySQL', 'deskripsi' => 'Mampu mengelola dan menggunakan database MySQL.'],
            ['nama_kompetensi' => 'Git', 'deskripsi' => 'Mampu menggunakan Git untuk version control.'],
            ['nama_kompetensi' => 'Vue.js', 'deskripsi' => 'Mampu membuat antarmuka web menggunakan Vue.js.'],
            ['nama_kompetensi' => 'Bootstrap', 'deskripsi' => 'Mampu menggunakan Bootstrap untuk membangun antarmuka web responsif.'],
            ['nama_kompetensi' => 'Tailwind CSS', 'deskripsi' => 'Mampu menggunakan utility class Tailwind CSS untuk membuat antarmuka web.'],
        ];

        foreach ($kompetensi as $item) {
            Kompetensi::create($item);
        }
    }
}
