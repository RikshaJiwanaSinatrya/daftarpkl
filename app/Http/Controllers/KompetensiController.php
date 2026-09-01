<?php

namespace App\Http\Controllers;

use App\Models\Kompetensi;
use Illuminate\Http\Request;

class KompetensiController extends Controller
{
    public function index()
    {
        $kompetensi = Kompetensi::withCount('siswa')->latest()->get();
        return view('kompetensi.index', compact('kompetensi'));
    }

    public function create()
    {
        return view('kompetensi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kompetensi' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        Kompetensi::create($validated);

        return redirect()->route('kompetensi.index')
            ->with('success', 'Kompetensi berhasil ditambahkan.');
    }

    public function show(Kompetensi $kompetensi)
    {
        $kompetensi->load('siswa');
        return view('kompetensi.show', compact('kompetensi'));
    }

    public function edit(Kompetensi $kompetensi)
    {
        return view('kompetensi.edit', compact('kompetensi'));
    }

    public function update(Request $request, Kompetensi $kompetensi)
    {
        $validated = $request->validate([
            'nama_kompetensi' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        $kompetensi->update($validated);

        return redirect()->route('kompetensi.index')
            ->with('success', 'Kompetensi berhasil diperbarui.');
    }

    public function destroy(Kompetensi $kompetensi)
    {
        $kompetensi->delete();

        return redirect()->route('kompetensi.index')
            ->with('success', 'Kompetensi berhasil dihapus.');
    }
}
