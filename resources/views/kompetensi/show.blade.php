@extends('layouts.app')

@section('title', 'Detail Kompetensi')

@section('content')
    <div class="tablebox">
        <div class="tbl-head">Detail KOMPETENSI</div>
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
                        <td class="num" style="width:220px">Nama Kompetensi</td>
                        <td><span class="nick">{{ $kompetensi->nama_kompetensi }}</span></td>
                    </tr>
                    <tr>
                        <td class="num">Deskripsi</td>
                        <td>{{ $kompetensi->deskripsi ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="num">Jumlah Siswa</td>
                        <td><span class="badge badge-aktif">{{ $kompetensi->siswa->count() }} siswa</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="tablebox" style="margin-top:28px">
        <div class="tbl-head">SISWA YANG MENGUASAI KOMPETENSI INI</div>
        @if ($kompetensi->siswa->isEmpty())
            <div class="empty">
                <span class="stamp">KOSONG</span>
                <p>Belum ada siswa yang menguasai kompetensi ini.</p>
            </div>
        @else
        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Perusahaan PKL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kompetensi->siswa as $s)
                    <tr>
                        <td class="num">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                        <td class="num">{{ $s->nis }}</td>
                        <td><span class="nick">{{ $s->nama }}</span></td>
                        <td>{{ $s->kelas }}</td>
                        <td>{{ $s->nama_perusahaan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>

    <div class="factions">
        <a href="{{ route('kompetensi.index') }}" class="btn">Kembali</a>
        <a href="{{ route('kompetensi.edit', $kompetensi->id) }}" class="btn">EDIT</a>
    </div>
@endsection
