<?php

namespace Database\Seeders;

use App\Models\Kompetensi;
use App\Models\Siswa;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nis' => '210101', 'nama' => 'Budi Santoso', 'kelas' => 'XI RPL 1', 'jurusan' => 'RPL',
                'nama_perusahaan' => 'PT Nusantara Digital', 'bidang_pkl' => 'Web Developer',
                'tanggal_mulai' => '2026-08-01', 'tanggal_selesai' => '2026-12-31',
                'pembimbing' => 'Andi Wijaya', 'status' => 'aktif',
            ],
            [
                'nis' => '210102', 'nama' => 'Siti Rahmawati', 'kelas' => 'XI RPL 2', 'jurusan' => 'RPL',
                'nama_perusahaan' => 'CV Tekno Solusi', 'bidang_pkl' => 'UI/UX Designer',
                'tanggal_mulai' => '2026-08-01', 'tanggal_selesai' => '2026-11-30',
                'pembimbing' => 'Ratna Sari', 'status' => 'aktif',
            ],
            [
                'nis' => '210103', 'nama' => 'Dimas Prasetyo', 'kelas' => 'XI TKJ 1', 'jurusan' => 'TKJ',
                'nama_perusahaan' => 'PT Jaringan Nusantara', 'bidang_pkl' => 'Jaringan & Infrastruktur',
                'tanggal_mulai' => '2026-07-15', 'tanggal_selesai' => '2026-12-15',
                'pembimbing' => 'Hendra Gunawan', 'status' => 'aktif',
            ],
            [
                'nis' => '210104', 'nama' => 'Aisyah Putri', 'kelas' => 'XI MM 1', 'jurusan' => 'Multi Media',
                'nama_perusahaan' => 'Studio Kreatif Bersama', 'bidang_pkl' => 'Motion Graphic',
                'tanggal_mulai' => '2026-08-10', 'tanggal_selesai' => '2026-12-20',
                'pembimbing' => 'Rina Marlina', 'status' => 'aktif',
            ],
            [
                'nis' => '210105', 'nama' => 'Rizky Ramadhan', 'kelas' => 'XI RPL 2', 'jurusan' => 'RPL',
                'nama_perusahaan' => 'PT Fintech Maju', 'bidang_pkl' => 'Mobile Developer',
                'tanggal_mulai' => '2026-02-01', 'tanggal_selesai' => '2026-06-30',
                'pembimbing' => 'Bambang Permana', 'status' => 'selesai',
            ],
            [
                'nis' => '210106', 'nama' => 'Putri Maharani', 'kelas' => 'XI AKL 1', 'jurusan' => 'Akuntansi',
                'nama_perusahaan' => 'PT Mitra Keuangan', 'bidang_pkl' => 'Admin Keuangan',
                'tanggal_mulai' => '2026-03-01', 'tanggal_selesai' => '2026-08-31',
                'pembimbing' => 'Siska Amelia', 'status' => 'aktif',
            ],
            [
                'nis' => '210107', 'nama' => 'Fajar Nugroho', 'kelas' => 'XI TKJ 2', 'jurusan' => 'TKJ',
                'nama_perusahaan' => 'PT Telekom Seluler', 'bidang_pkl' => 'Teknisi Jaringan',
                'tanggal_mulai' => '2025-08-01', 'tanggal_selesai' => '2025-12-31',
                'pembimbing' => 'Yudi Hartono', 'status' => 'selesai',
            ],
            [
                'nis' => '210108', 'nama' => 'Nadia Wulandari', 'kelas' => 'XI MM 2', 'jurusan' => 'Multi Media',
                'nama_perusahaan' => 'CV Media Visual', 'bidang_pkl' => 'Fotografer',
                'tanggal_mulai' => '2026-08-20', 'tanggal_selesai' => '2026-12-31',
                'pembimbing' => 'Dewi Anggraini', 'status' => 'aktif',
            ],
            [
                'nis' => '210109', 'nama' => 'Aditya Saputra', 'kelas' => 'XI RPL 1', 'jurusan' => 'RPL',
                'nama_perusahaan' => 'PT Game Prime', 'bidang_pkl' => 'Game Developer',
                'tanggal_mulai' => '2026-01-15', 'tanggal_selesai' => '2026-05-30',
                'pembimbing' => 'Irfan Maulana', 'status' => 'selesai',
            ],
            [
                'nis' => '210110', 'nama' => 'Lestari Widyawati', 'kelas' => 'XI OTKP 1', 'jurusan' => 'OTKP',
                'nama_perusahaan' => 'PT Perkantoran Sentral', 'bidang_pkl' => 'Administrasi Perkantoran',
                'tanggal_mulai' => '2026-08-15', 'tanggal_selesai' => '2026-12-31',
                'pembimbing' => 'Maya Kusuma', 'status' => 'aktif',
            ],
            [
                'nis' => '210111', 'nama' => 'Gilang Permadi', 'kelas' => 'XI TKJ 1', 'jurusan' => 'TKJ',
                'nama_perusahaan' => 'PT Data Center Indo', 'bidang_pkl' => 'Administrator Server',
                'tanggal_mulai' => '2026-09-01', 'tanggal_selesai' => '2026-12-31',
                'pembimbing' => 'Rudi Setiawan', 'status' => 'aktif',
            ],
            [
                'nis' => '210112', 'nama' => 'Salsabila Zahra', 'kelas' => 'XI RPL 2', 'jurusan' => 'RPL',
                'nama_perusahaan' => 'PT Ecomerce Nusantara', 'bidang_pkl' => 'QA Engineer',
                'tanggal_mulai' => '2026-04-01', 'tanggal_selesai' => '2026-07-31',
                'pembimbing' => 'Toni Kurnia', 'status' => 'berhenti',
            ],
        ];

        foreach ($data as $item) {
            $siswa = Siswa::create($item);

            $kompetensi = Kompetensi::inRandomOrder()
                ->limit(rand(2, 5))
                ->pluck('id');

            $siswa->kompetensi()->attach($kompetensi);
        }
    }
}
