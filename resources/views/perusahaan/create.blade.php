@extends('layouts.app')

@section('title', 'Tambah Perusahaan')

@section('content')
    <div class="formbox">
        <div class="fb-head">Formulir // Perusahaan — Entri Baru</div>
        <form action="{{ route('perusahaan.store') }}" method="POST">
            @csrf

            <div class="frow">
                <div class="fgroup">
                    <label>Nama Perusahaan <b>*</b></label>
                    <input type="text" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" class="{{ $errors->has('nama_perusahaan') ? 'error' : '' }}" required>
                    @error('nama_perusahaan') <div class="err">{{ $message }}</div> @enderror
                </div>
                <div class="fgroup">
                    <label>Pembimbing</label>
                    <input type="text" name="pembimbing" value="{{ old('pembimbing') }}">
                    @error('pembimbing') <div class="err">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="frow" style="margin-top:18px">
                <div class="fgroup">
                    <label>Telepon</label>
                    <input type="text" name="telepon" value="{{ old('telepon') }}">
                    @error('telepon') <div class="err">{{ $message }}</div> @enderror
                </div>
                <div class="fgroup">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}">
                    @error('email') <div class="err">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="fgroup" style="margin-top:18px">
                <label>Alamat <b>*</b></label>
                <input type="text" name="alamat" value="{{ old('alamat') }}" class="{{ $errors->has('alamat') ? 'error' : '' }}" required>
                @error('alamat') <div class="err">{{ $message }}</div> @enderror
            </div>

            <div class="factions">
                <button type="submit" class="btn btn-primary">Simpan Perusahaan</button>
                <a href="{{ route('perusahaan.index') }}" class="btn">Batal</a>
            </div>
            <div class="fnote">* wajib diisi &mdash; data disimpan ke arsip pusat</div>
        </form>
    </div>
@endsection
