<?php

namespace Tests\Feature;

use App\Models\Kompetensi;
use App\Models\Siswa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KompetensiCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_loads(): void
    {
        Kompetensi::factory()->count(3)->create();
        $response = $this->get('/kompetensi');
        $response->assertOk();
    }

    public function test_create_loads(): void
    {
        $response = $this->get('/kompetensi/create');
        $response->assertOk();
    }

    public function test_store_creates(): void
    {
        $response = $this->post('/kompetensi', [
            'nama_kompetensi' => 'Python',
            'deskripsi' => 'Bahasa pemrograman.',
        ]);
        $response->assertRedirect(route('kompetensi.index'));
        $this->assertDatabaseHas('kompetensi', ['nama_kompetensi' => 'Python']);
    }

    public function test_edit_loads(): void
    {
        $k = Kompetensi::factory()->create();
        $response = $this->get('/kompetensi/' . $k->id . '/edit');
        $response->assertOk();
    }

    public function test_update_works(): void
    {
        $k = Kompetensi::factory()->create();
        $response = $this->put('/kompetensi/' . $k->id, [
            'nama_kompetensi' => 'Go',
            'deskripsi' => 'Bahasa baru.',
        ]);
        $response->assertRedirect(route('kompetensi.index'));
        $this->assertDatabaseHas('kompetensi', ['nama_kompetensi' => 'Go']);
    }

    public function test_show_lists_siswa(): void
    {
        $k = Kompetensi::factory()->create();
        $siswa = Siswa::factory()->create();
        $siswa->kompetensi()->attach($k->id);

        $response = $this->get('/kompetensi/' . $k->id);
        $response->assertOk();
        $response->assertSee($siswa->nama);
    }

    public function test_destroy_works(): void
    {
        $k = Kompetensi::factory()->create();
        $response = $this->delete('/kompetensi/' . $k->id);
        $response->assertRedirect(route('kompetensi.index'));
        $this->assertDatabaseMissing('kompetensi', ['id' => $k->id]);
    }

    public function test_many_to_many_relationship(): void
    {
        $k = Kompetensi::factory()->count(3)->create();
        $siswa = Siswa::factory()->create();
        $siswa->kompetensi()->attach($k->pluck('id'));

        $this->assertCount(3, $siswa->kompetensi);
        foreach ($k as $competency) {
            $this->assertTrue($competency->siswa->contains($siswa));
        }
    }
}
