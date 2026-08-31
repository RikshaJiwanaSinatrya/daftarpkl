@extends('layouts.app')

@section('title', 'Daftar Siswa PKL')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Daftar Siswa PKL</h2>
        <a href="{{ route('siswa.create') }}" class="btn btn-primary">+ Tambah Siswa</a>
    </div>

    @if ($siswa->isEmpty())
        <div class="empty">Belum ada data siswa. Silakan tambahkan data terlebih dahulu.</div>
    @else
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Perusahaan</th>
                    <th>Bidang</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $s)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $s->nis }}</td>
                    <td>{{ $s->nama }}</td>
                    <td>{{ $s->kelas }}</td>
                    <td>{{ $s->jurusan }}</td>
                    <td>{{ $s->nama_perusahaan }}</td>
                    <td>{{ $s->bidang_pkl }}</td>
                    <td>
                        <span class="badge badge-{{ $s->status }}">{{ ucfirst($s->status) }}</span>
                    </td>
                    <td>
                        <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-success btn-sm">Edit</a>
                        <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" style="display:inline"
                              onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
