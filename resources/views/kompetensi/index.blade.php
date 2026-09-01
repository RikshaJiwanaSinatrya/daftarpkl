@extends('layouts.app')

@section('title', 'Daftar Kompetensi')

@section('content')
    <div class="toolbar">
        <span class="label">Kompetensi // {{ $kompetensi->count() }} terdaftar</span>
        <a href="{{ route('kompetensi.create') }}" class="btn btn-primary">+ Tambah Kompetensi</a>
    </div>

    @if ($kompetensi->isEmpty())
        <div class="tablebox">
            <div class="tbl-head">Daftar KOMPETENSI</div>
            <div class="empty">
                <span class="stamp">FILE KOSONG</span>
                <p>Tidak ada data kompetensi. Tekan tombol di atas untuk menambah.</p>
            </div>
        </div>
    @else
    <div class="tablebox">
        <div class="tbl-head">
            <span>Kartu Kompetensi</span>
            <span>{{ count($kompetensi) }} ENTRI</span>
        </div>
        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kompetensi</th>
                        <th>Deskripsi</th>
                        <th>Jumlah Siswa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kompetensi as $k)
                    <tr>
                        <td class="num">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                        <td><span class="nick">{{ $k->nama_kompetensi }}</span></td>
                        <td>{{ $k->deskripsi ?? '-' }}</td>
                        <td><span class="badge badge-aktif">{{ $k->siswa_count }} siswa</span></td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('kompetensi.show', $k->id) }}" class="btn btn-sm">DETAIL</a>
                                <a href="{{ route('kompetensi.edit', $k->id) }}" class="btn btn-sm">EDIT</a>
                                <form action="{{ route('kompetensi.destroy', $k->id) }}" method="POST"
                                      onsubmit="return confirm('Hapus kompetensi {{ $k->nama_kompetensi }}?');">
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
