<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function kompetensi(): BelongsToMany
    {
        return $this->belongsToMany(
            Kompetensi::class,
            'kompetensi_siswa',
            'siswa_id',
            'kompetensi_id'
        );
    }
}
