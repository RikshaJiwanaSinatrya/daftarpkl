<?php

namespace Tests\Feature;

use App\Models\Siswa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SiswaShowTest extends TestCase
{
    use RefreshDatabase;

    public function test_siswa_show_loads(): void
    {
        $siswa = Siswa::factory()->create();
        $response = $this->get('/siswa/' . $siswa->id);
        $response->assertOk();
        $response->assertSee($siswa->nama);
        $response->assertSee($siswa->nis);
    }

    public function test_siswa_index_has_detail_link(): void
    {
        $siswa = Siswa::factory()->create();
        $response = $this->get('/siswa');
        $response->assertOk();
        $response->assertSee(route('siswa.show', $siswa->id), false);
    }
}
