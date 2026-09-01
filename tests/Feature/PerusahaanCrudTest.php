<?php

namespace Tests\Feature;

use App\Models\Perusahaan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PerusahaanCrudTest extends TestCase
{
    public function test_index_loads(): void
    {
        Perusahaan::factory()->count(3)->create();
        $response = $this->get('/perusahaan');
        $response->assertOk();
        $response->assertSee('Perusahaan');
    }

    public function test_create_loads(): void
    {
        $response = $this->get('/perusahaan/create');
        $response->assertOk();
    }

    public function test_store_creates(): void
    {
        $response = $this->post('/perusahaan', [
            'nama_perusahaan' => 'PT Contoh',
            'alamat' => 'Jl. Merdeka 1',
        ]);
        $response->assertRedirect(route('perusahaan.index'));
        $this->assertDatabaseHas('perusahaan', ['nama_perusahaan' => 'PT Contoh']);
    }

    public function test_edit_loads(): void
    {
        $p = Perusahaan::factory()->create();
        $response = $this->get('/perusahaan/' . $p->id . '/edit');
        $response->assertOk();
    }

    public function test_update_works(): void
    {
        $p = Perusahaan::factory()->create();
        $response = $this->put('/perusahaan/' . $p->id, [
            'nama_perusahaan' => 'PT Diubah',
            'alamat' => 'Jl. Baru',
        ]);
        $response->assertRedirect(route('perusahaan.index'));
        $this->assertDatabaseHas('perusahaan', ['nama_perusahaan' => 'PT Diubah']);
    }

    public function test_show_loads(): void
    {
        $p = Perusahaan::factory()->create();
        $response = $this->get('/perusahaan/' . $p->id);
        $response->assertOk();
    }

    public function test_destroy_works(): void
    {
        $p = Perusahaan::factory()->create();
        $response = $this->delete('/perusahaan/' . $p->id);
        $response->assertRedirect(route('perusahaan.index'));
        $this->assertDatabaseMissing('perusahaan', ['id' => $p->id]);
    }
}
