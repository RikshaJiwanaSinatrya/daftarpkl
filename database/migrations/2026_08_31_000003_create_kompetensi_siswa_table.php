<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kompetensi_siswa', function (Blueprint $table) {
            $table->foreignId('siswa_id')
                ->constrained('siswas')
                ->cascadeOnDelete();

            $table->foreignId('kompetensi_id')
                ->constrained('kompetensi')
                ->cascadeOnDelete();

            $table->primary(['siswa_id', 'kompetensi_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kompetensi_siswa');
    }
};
