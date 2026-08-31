<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'nama',
        'kelas',
        'jurusan',
        'nama_perusahaan',
        'bidang_pkl',
        'tanggal_mulai',
        'tanggal_selesai',
        'pembimbing',
        'status',
    ];
}
