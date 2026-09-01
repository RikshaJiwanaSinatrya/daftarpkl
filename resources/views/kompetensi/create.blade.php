@extends('layouts.app')

@section('title', 'Tambah Kompetensi')

@section('content')
    <div class="formbox">
        <div class="fb-head">Formulir // Kompetensi — Entri Baru</div>
        <form action="{{ route('kompetensi.store') }}" method="POST">
            @csrf

            <div class="fgroup">
                <label>Nama Kompetensi <b>*</b></label>
                <input type="text" name="nama_kompetensi" value="{{ old('nama_kompetensi') }}" placeholder="Contoh: Laravel" class="{{ $errors->has('nama_kompetensi') ? 'error' : '' }}" required>
                @error('nama_kompetensi') <div class="err">{{ $message }}</div> @enderror
            </div>

            <div class="fgroup" style="margin-top:18px">
                <label>Deskripsi</label>
                <textarea name="deskripsi" rows="5" placeholder="Jelaskan kompetensi tersebut...">{{ old('deskripsi') }}</textarea>
                @error('deskripsi') <div class="err">{{ $message }}</div> @enderror
            </div>

            <div class="factions">
                <button type="submit" class="btn btn-primary">Simpan Kompetensi</button>
                <a href="{{ route('kompetensi.index') }}" class="btn">Batal</a>
            </div>
            <div class="fnote">* wajib diisi &mdash; data disimpan ke arsip pusat</div>
        </form>
    </div>
@endsection
