<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::orderBy('created_at', 'desc')->get();
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => ['required', 'string', 'max:20', 'unique:siswas,nis'],
            'nama' => ['required', 'string', 'max:255'],
            'kelas' => ['required', 'string', 'max:20'],
            'jurusan' => ['required', 'string', 'max:100'],
            'nama_perusahaan' => ['required', 'string', 'max:255'],
            'bidang_pkl' => ['required', 'string', 'max:255'],
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_selesai' => ['required', 'date', 'after_or_equal:tanggal_mulai'],
            'pembimbing' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:aktif,selesai,berhenti'],
        ]);

        Siswa::create($validated);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'nis' => ['required', 'string', 'max:20', 'unique:siswas,nis,' . $siswa->id],
            'nama' => ['required', 'string', 'max:255'],
            'kelas' => ['required', 'string', 'max:20'],
            'jurusan' => ['required', 'string', 'max:100'],
            'nama_perusahaan' => ['required', 'string', 'max:255'],
            'bidang_pkl' => ['required', 'string', 'max:255'],
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_selesai' => ['required', 'date', 'after_or_equal:tanggal_mulai'],
            'pembimbing' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:aktif,selesai,berhenti'],
        ]);

        $siswa->update($validated);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
