<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Kompetensi extends Model
{
    use HasFactory;

    protected $table = 'kompetensi';

    protected $fillable = [
        'nama_kompetensi',
        'deskripsi',
    ];

    public function siswa(): BelongsToMany
    {
        return $this->belongsToMany(
            Siswa::class,
            'kompetensi_siswa',
            'kompetensi_id',
            'siswa_id'
        );
    }
}
