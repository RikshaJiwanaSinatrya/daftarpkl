@extends('layouts.app')

@section('title', 'Detail Siswa')

@section('content')
    <div class="tablebox">
        <div class="tbl-head">Detail SISWA</div>
        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th>Field</th>
                        <th>Isi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="num" style="width:220px">NIS</td>
                        <td class="num">{{ $siswa->nis }}</td>
                    </tr>
                    <tr>
                        <td class="num">Nama</td>
                        <td><span class="nick">{{ $siswa->nama }}</span></td>
                    </tr>
                    <tr>
                        <td class="num">Kelas</td>
                        <td>{{ $siswa->kelas }}</td>
                    </tr>
                    <tr>
                        <td class="num">Jurusan</td>
                        <td>{{ $siswa->jurusan }}</td>
                    </tr>
                    <tr>
                        <td class="num">Perusahaan</td>
                        <td>{{ $siswa->nama_perusahaan }}</td>
                    </tr>
                    <tr>
                        <td class="num">Bidang PKL</td>
                        <td>{{ $siswa->bidang_pkl }}</td>
                    </tr>
                    <tr>
                        <td class="num">Pembimbing</td>
                        <td>{{ $siswa->pembimbing ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="num">Tanggal Mulai</td>
                        <td>{{ $siswa->tanggal_mulai }}</td>
                    </tr>
                    <tr>
                        <td class="num">Tanggal Selesai</td>
                        <td>{{ $siswa->tanggal_selesai }}</td>
                    </tr>
                    <tr>
                        <td class="num">Status</td>
                        <td><span class="badge badge-{{ $siswa->status }}">{{ $siswa->status }}</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="factions">
        <a href="{{ route('siswa.index') }}" class="btn">Kembali</a>
        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn">EDIT</a>
        <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST"
              onsubmit="return confirm('Hapus data {{ $siswa->nama }}?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">HAPUS</button>
        </form>
    </div>
@endsection
