@extends('layouts.app')

@section('title', 'Edit Kompetensi')

@section('content')
    <div class="formbox">
        <div class="fb-head">Formulir // Kompetensi — Edit</div>
        <form action="{{ route('kompetensi.update', $kompetensi->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="fgroup">
                <label>Nama Kompetensi <b>*</b></label>
                <input type="text" name="nama_kompetensi" value="{{ old('nama_kompetensi', $kompetensi->nama_kompetensi) }}" class="{{ $errors->has('nama_kompetensi') ? 'error' : '' }}" required>
                @error('nama_kompetensi') <div class="err">{{ $message }}</div> @enderror
            </div>

            <div class="fgroup" style="margin-top:18px">
                <label>Deskripsi</label>
                <textarea name="deskripsi" rows="5" class="{{ $errors->has('deskripsi') ? 'error' : '' }}">{{ old('deskripsi', $kompetensi->deskripsi) }}</textarea>
                @error('deskripsi') <div class="err">{{ $message }}</div> @enderror
            </div>

            <div class="factions">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('kompetensi.index') }}" class="btn">Batal</a>
            </div>
            <div class="fnote">* wajib diisi &mdash; data disimpan ke arsip pusat</div>
        </form>
    </div>
@endsection
