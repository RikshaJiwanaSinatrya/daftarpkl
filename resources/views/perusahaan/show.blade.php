@extends('layouts.app')

@section('title', 'Detail Perusahaan')

@section('content')
    <div class="tablebox">
        <div class="tbl-head">Detail PERUSAHAAN</div>
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
                        <td class="num" style="width:220px">Nama Perusahaan</td>
                        <td><span class="nick">{{ $perusahaan->nama_perusahaan }}</span></td>
                    </tr>
                    <tr>
                        <td class="num">Alamat</td>
                        <td>{{ $perusahaan->alamat }}</td>
                    </tr>
                    <tr>
                        <td class="num">Telepon</td>
                        <td>{{ $perusahaan->telepon ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="num">Email</td>
                        <td>{{ $perusahaan->email ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="num">Pembimbing</td>
                        <td>{{ $perusahaan->pembimbing ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="num">Dibuat</td>
                        <td>{{ $perusahaan->created_at ? $perusahaan->created_at->format('d M Y H:i') : '-' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="factions">
        <a href="{{ route('perusahaan.index') }}" class="btn">Kembali</a>
        <a href="{{ route('perusahaan.edit', $perusahaan->id) }}" class="btn">EDIT</a>
    </div>
@endsection
