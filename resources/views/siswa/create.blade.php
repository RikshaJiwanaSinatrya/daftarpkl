@extends('layouts.app')

@section('title', 'Tambah / Entri Siswa')

@section('content')
    <div class="formbox">
        <div class="fb-head">Formulir // 001 &mdash; Entri Baru</div>
        <form action="{{ route('siswa.store') }}" method="POST">
            @csrf

            <div class="frow">
                <div class="fgroup">
                    <label>NIS <b>*</b></label>
                    <input type="text" name="nis" value="{{ old('nis') }}" class="{{ $errors->has('nis') ? 'error' : '' }}" required>
                    @error('nis') <div class="err">{{ $message }}</div> @enderror
                </div>
                <div class="fgroup">
                    <label>Nama Lengkap <b>*</b></label>
                    <input type="text" name="nama" value="{{ old('nama') }}" class="{{ $errors->has('nama') ? 'error' : '' }}" required>
                    @error('nama') <div class="err">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="frow" style="margin-top:18px">
                <div class="fgroup">
                    <label>Kelas <b>*</b></label>
                    <input type="text" name="kelas" value="{{ old('kelas') }}" class="{{ $errors->has('kelas') ? 'error' : '' }}" required>
                    @error('kelas') <div class="err">{{ $message }}</div> @enderror
                </div>
                <div class="fgroup">
                    <label>Jurusan <b>*</b></label>
                    <input type="text" name="jurusan" value="{{ old('jurusan') }}" class="{{ $errors->has('jurusan') ? 'error' : '' }}" required>
                    @error('jurusan') <div class="err">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="frow" style="margin-top:18px">
                <div class="fgroup">
                    <label>Nama Perusahaan <b>*</b></label>
                    <input type="text" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" class="{{ $errors->has('nama_perusahaan') ? 'error' : '' }}" required>
                    @error('nama_perusahaan') <div class="err">{{ $message }}</div> @enderror
                </div>
                <div class="fgroup">
                    <label>Bidang PKL <b>*</b></label>
                    <input type="text" name="bidang_pkl" value="{{ old('bidang_pkl') }}" class="{{ $errors->has('bidang_pkl') ? 'error' : '' }}" required>
                    @error('bidang_pkl') <div class="err">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="frow" style="margin-top:18px">
                <div class="fgroup">
                    <label>Tanggal Mulai <b>*</b></label>
                    <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
                    @error('tanggal_mulai') <div class="err">{{ $message }}</div> @enderror
                </div>
                <div class="fgroup">
                    <label>Tanggal Selesai <b>*</b></label>
                    <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required>
                    @error('tanggal_selesai') <div class="err">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="frow" style="margin-top:18px">
                <div class="fgroup">
                    <label>Pembimbing</label>
                    <input type="text" name="pembimbing" value="{{ old('pembimbing') }}">
                    @error('pembimbing') <div class="err">{{ $message }}</div> @enderror
                </div>
                <div class="fgroup">
                    <label>Status <b>*</b></label>
                    <select name="status" required>
                        <option value="aktif" {{ old('status') === 'aktif' ? 'selected' : '' }}>AKTIF</option>
                        <option value="selesai" {{ old('status') === 'selesai' ? 'selected' : '' }}>SELESAI</option>
                        <option value="berhenti" {{ old('status') === 'berhenti' ? 'selected' : '' }}>BERHENTI</option>
                    </select>
                    @error('status') <div class="err">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="factions">
                <button type="submit" class="btn btn-primary">Simpan Kartu</button>
                <a href="{{ route('siswa.index') }}" class="btn">Batal</a>
            </div>
            <div class="fnote">* wajib diisi &mdash; data disimpan ke arsip pusat</div>
        </form>
    </div>
@endsection
