@extends('layouts.app')

@section('title', 'Register Siswa PKL')

@section('content')
    <div class="toolbar">
        <span class="label">Index // {{ $siswa->count() }} siswa terdaftar</span>
        <a href="{{ route('siswa.create') }}" class="btn btn-primary">+ Tambah Siswa</a>
    </div>

    @if ($siswa->isEmpty())
        <div class="tablebox">
            <div class="tbl-head">REGISTER PKL</div>
            <div class="empty">
                <span class="stamp">FILE KOSONG</span>
                <p>Tidak ada data siswa. Tekan tombol di atas untuk mengisi kartu pertama.</p>
            </div>
        </div>
    @else
    <div class="tablebox">
        <div class="tbl-head">
            <span>Kartu Register</span>
            <span>{{ count($siswa) }} ENTRI</span>
        </div>
        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Perusahaan</th>
                        <th>Bidang</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $s)
                    <tr>
                        <td class="num">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                        <td class="num">{{ $s->nis }}</td>
                        <td>
                            <span class="nick">{{ $s->nama }}</span><br>
                            <span class="sub">{{ $s->jurusan }}</span>
                        </td>
                        <td>{{ $s->kelas }}</td>
                        <td>{{ $s->nama_perusahaan }}</td>
                        <td>{{ $s->bidang_pkl }}</td>
                        <td><span class="badge badge-{{ $s->status }}">{{ $s->status }}</span></td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-sm">EDIT</a>
                                <form action="{{ route('siswa.destroy', $s->id) }}" method="POST"
                                      onsubmit="return confirm('Hapus data {{ $s->nama }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
@endsection
