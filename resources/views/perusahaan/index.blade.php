@extends('layouts.app')

@section('title', 'Daftar Perusahaan')

@section('content')
    <div class="toolbar">
        <span class="label">Perusahaan // {{ $perusahaan->count() }} terdaftar</span>
        <a href="{{ route('perusahaan.create') }}" class="btn btn-primary">+ Tambah Perusahaan</a>
    </div>

    @if ($perusahaan->isEmpty())
        <div class="tablebox">
            <div class="tbl-head">Daftar PERUSAHAAN</div>
            <div class="empty">
                <span class="stamp">FILE KOSONG</span>
                <p>Tidak ada data perusahaan. Tekan tombol di atas untuk menambah.</p>
            </div>
        </div>
    @else
    <div class="tablebox">
        <div class="tbl-head">
            <span>Kartu Perusahaan</span>
            <span>{{ count($perusahaan) }} ENTRI</span>
        </div>
        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Pembimbing</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($perusahaan as $p)
                    <tr>
                        <td class="num">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</td>
                        <td>
                            <span class="nick">{{ $p->nama_perusahaan }}</span><br>
                            @if ($p->email)
                                <span class="sub">{{ $p->email }}</span>
                            @endif
                        </td>
                        <td>{{ $p->alamat }}</td>
                        <td>{{ $p->telepon ?? '-' }}</td>
                        <td>{{ $p->pembimbing ?? '-' }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('perusahaan.show', $p->id) }}" class="btn btn-sm">DETAIL</a>
                                <a href="{{ route('perusahaan.edit', $p->id) }}" class="btn btn-sm">EDIT</a>
                                <form action="{{ route('perusahaan.destroy', $p->id) }}" method="POST"
                                      onsubmit="return confirm('Hapus perusahaan {{ $p->nama_perusahaan }}?');">
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
