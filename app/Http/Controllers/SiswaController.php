<?php

namespace App\Http\Controllers;

use App\Models\Kompetensi;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kompetensi')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        $kompetensi = Kompetensi::orderBy('nama_kompetensi')->get();
        return view('siswa.create', compact('kompetensi'));
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
            'kompetensi' => ['required', 'array', 'min:1'],
            'kompetensi.*' => ['exists:kompetensi,id'],
        ]);

        $siswa = Siswa::create($validated);

        $siswa->kompetensi()->attach($validated['kompetensi']);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function show(Siswa $siswa)
    {
        $siswa->load('kompetensi');
        return view('siswa.show', compact('siswa'));
    }

    public function edit(Siswa $siswa)
    {
        $kompetensi = Kompetensi::orderBy('nama_kompetensi')->get();
        $siswa->load('kompetensi');
        return view('siswa.edit', compact('siswa', 'kompetensi'));
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
            'kompetensi' => ['required', 'array', 'min:1'],
            'kompetensi.*' => ['exists:kompetensi,id'],
        ]);

        $siswa->update($validated);

        $siswa->kompetensi()->sync($validated['kompetensi']);

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
