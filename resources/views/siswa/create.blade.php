@extends('layouts.app')

@section('title', 'Tambah Siswa PKL')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Tambah Siswa PKL</h2>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf

        <div class="form-row">
            <div class="form-group">
                <label>NIS</label>
                <input type="text" name="nis" value="{{ old('nis') }}" required>
                @error('nis') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" value="{{ old('nama') }}" required>
                @error('nama') <div class="error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Kelas</label>
                <input type="text" name="kelas" value="{{ old('kelas') }}" required>
                @error('kelas') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Jurusan</label>
                <input type="text" name="jurusan" value="{{ old('jurusan') }}" required>
                @error('jurusan') <div class="error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Nama Perusahaan</label>
                <input type="text" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" required>
                @error('nama_perusahaan') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Bidang PKL</label>
                <input type="text" name="bidang_pkl" value="{{ old('bidang_pkl') }}" required>
                @error('bidang_pkl') <div class="error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
                @error('tanggal_mulai') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required>
                @error('tanggal_selesai') <div class="error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Pembimbing (opsional)</label>
                <input type="text" name="pembimbing" value="{{ old('pembimbing') }}">
                @error('pembimbing') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" required>
                    <option value="aktif" {{ old('status') === 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="selesai" {{ old('status') === 'selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="berhenti" {{ old('status') === 'berhenti' ? 'selected' : '' }}>Berhenti</option>
                </select>
                @error('status') <div class="error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
