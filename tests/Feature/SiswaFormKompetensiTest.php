<?php

namespace Tests\Feature;

use App\Models\Kompetensi;
use App\Models\Siswa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SiswaFormKompetensiTest extends TestCase
{
    use RefreshDatabase;

    public function test_siswa_create_loads_with_kompetensi(): void
    {
        Kompetensi::factory()->count(2)->create();
        $response = $this->get('/siswa/create');
        $response->assertOk();
    }

    public function test_siswa_edit_loads_with_kompetensi(): void
    {
        Kompetensi::factory()->count(2)->create();
        $siswa = Siswa::factory()->create();
        $response = $this->get('/siswa/' . $siswa->id . '/edit');
        $response->assertOk();
    }
}
