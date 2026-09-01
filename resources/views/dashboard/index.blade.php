@extends('layouts.app')

@section('title', 'Papan Kontrol PKL')

@section('content')
<style>
    .dash { display: grid; gap: 40px; }

    /* ---- TICKER BANNER ---- */
    .ticker {
        background: var(--ink);
        color: var(--paper);
        border: var(--border);
        box-shadow: var(--shadow);
        overflow: hidden;
    }
    .ticker .scroll {
        display: flex;
        align-items: center;
        gap: 28px;
        padding: 14px 18px;
        white-space: nowrap;
        overflow-x: auto;
    }
    .ticker .t {
        font-family: "Space Mono", monospace;
        font-size: 13px;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-weight: 700;
    }
    .ticker .t b {
        background: var(--yellow);
        color: var(--ink);
        padding: 2px 8px;
        margin-left: 8px;
    }
    .ticker .sep { color: var(--red); font-weight: 700; }

    /* ---- KPI COUNTERS ---- */
    .counters {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 22px;
    }
    .counter {
        border: var(--border);
        background: var(--paper);
        box-shadow: var(--shadow);
        padding: 22px 20px 18px;
        position: relative;
    }
    .counter .ctag {
        font-size: 11px;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-weight: 700;
        opacity: .7;
    }
    .counter .cnum {
        font-family: "Archivo Black", "Arial Black", sans-serif;
        font-size: clamp(48px, 6vw, 72px);
        line-height: 1;
        margin-top: 10px;
        display: flex;
        align-items: baseline;
        gap: 6px;
    }
    .counter .cnum small { font-family: "Space Mono", monospace; font-size: 16px; opacity: .55; }
    .counter .cbar { height: 8px; background: #DAD4C6; margin-top: 16px; position: relative; overflow: hidden; }
    .counter .cbar i { position: absolute; inset: 0; transform-origin: left; }
    .counter.c-ink .cbar i { background: var(--ink); }
    .counter.c-green .cbar i { background: #3DDC84; }
    .counter.c-blue .cbar i { background: var(--blue); }
    .counter.c-red .cbar i { background: var(--red); }

    /* ---- PANEL GRID ---- */
    .panels { display: grid; grid-template-columns: 1.4fr 1fr; gap: 22px; align-items: start; }
    .panel { border: var(--border); background: var(--paper); box-shadow: var(--shadow); }
    .panel .phead {
        background: var(--ink); color: var(--paper);
        padding: 10px 14px; font-family: "Archivo Black", sans-serif;
        letter-spacing: 2px; font-size: 13px; text-transform: uppercase;
        display: flex; justify-content: space-between; align-items: center; gap: 10px;
    }
    .panel .phead .n { color: var(--yellow); font-size: 12px; }
    .panel ul { list-style: none; padding: 6px 0; }
    .panel li {
        display: flex; justify-content: space-between; align-items: center; gap: 14px;
        padding: 11px 16px; border-bottom: 2px solid var(--ink); font-size: 14px;
    }
    .panel li:last-child { border-bottom: none; }
    .panel li .tick-count {
        font-family: "Archivo Black", sans-serif; font-size: 15px;
        background: var(--yellow); border: 2px solid var(--ink); padding: 1px 9px; min-width: 40px; text-align: center;
    }
    .panel li .tick-sub { font-size: 11px; opacity: .6; text-transform: uppercase; letter-spacing: 1px; }

    /* jurusan bars */
    .bars { padding: 10px 16px 14px; }
    .bars .bar-row { margin-bottom: 14px; }
    .bars .bar-row:last-child { margin-bottom: 0; }
    .bars .bar-label { display: flex; justify-content: space-between; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; font-weight: 700; margin-bottom: 5px; }
    .bars .bar-label span b { background: var(--ink); color: var(--paper); padding: 0 6px; }
    .bars .bar { height: 14px; border: 2px solid var(--ink); background: #ECE7DB; overflow: hidden; }
    .bars .bar i { display: block; height: 100%; background: var(--blue); }

    /* ---- ACTIVE BOARD ---- */
    .acthead { display: flex; justify-content: space-between; align-items: baseline; gap: 14px; flex-wrap: wrap; margin-bottom: 16px; }
    .acthead .label { font-family: "Archivo Black", sans-serif; text-transform: uppercase; letter-spacing: 2px; font-size: 16px; }
    .acthead .note { font-size: 11px; text-transform: uppercase; letter-spacing: 1px; opacity: .6; }

    .stamp {
        font-family: "Archivo Black", sans-serif;
        text-transform: uppercase; letter-spacing: 2px;
        border: 3px solid var(--red); color: var(--red);
        display: inline-block; padding: 6px 14px; transform: rotate(-2deg);
    }

    @media (max-width: 900px) {
        .counters { grid-template-columns: repeat(2, 1fr); }
        .panels { grid-template-columns: 1fr; }
    }
    @media (max-width: 520px) {
        .counters { grid-template-columns: 1fr; }
    }
</style>

<div class="dash">
    {{-- TICKER --}}
    <div class="ticker">
        <div class="scroll">
            <span class="t">Periode <b>{{ now()->format('d/m/Y') }}</b></span>
            <span class="sep">//</span>
            <span class="t">Tekan tombol hijau untuk registrasi baru</span>
            <span class="sep">//</span>
            <span class="t">{{ $totalSiswa }} kartu di arsip</span>
        </div>
    </div>

    {{-- KPI COUNTERS --}}
    <div class="counters">
        <div class="counter c-ink">
            <span class="ctag">Total Kartu</span>
            <div class="cnum">{{ str_pad($totalSiswa, 2, '0', STR_PAD_LEFT) }}<small>siswa</small></div>
            <div class="cbar"><i style="width:100%"></i></div>
        </div>
        <div class="counter c-green">
            <span class="ctag">Sedang PKL</span>
            <div class="cnum">{{ str_pad($aktif, 2, '0', STR_PAD_LEFT) }}<small>aktif</small></div>
            <div class="cbar"><i style="width:{{ $totalSiswa ? ($aktif/$totalSiswa)*100 : 0 }}%"></i></div>
        </div>
        <div class="counter c-blue">
            <span class="ctag">Selesai</span>
            <div class="cnum">{{ str_pad($selesai, 2, '0', STR_PAD_LEFT) }}<small>tuntas</small></div>
            <div class="cbar"><i style="width:{{ $totalSiswa ? ($selesai/$totalSiswa)*100 : 0 }}%"></i></div>
        </div>
        <div class="counter c-red">
            <span class="ctag">Berhenti</span>
            <div class="cnum">{{ str_pad($berhenti, 2, '0', STR_PAD_LEFT) }}<small>putus</small></div>
            <div class="cbar"><i style="width:{{ $totalSiswa ? ($berhenti/$totalSiswa)*100 : 0 }}%"></i></div>
        </div>
    </div>

    {{-- PANELS: JURUSAN + TOP SITE --}}
    <div class="panels">
        <div class="panel">
            <div class="phead"><span>Sebaran Jurusan</span><span class="n">{{ $perJurusan->count() }} BIDANG</span></div>
            <div class="bars">
                @php $maxJur = $perJurusan->max('total') ?: 1; @endphp
                @forelse ($perJurusan as $j)
                    <div class="bar-row">
                        <div class="bar-label"><span>{{ $j->jurusan }}</span><span><b>{{ $j->total }}</b> org</span></div>
                        <div class="bar"><i style="width:{{ ($j->total / $maxJur) * 100 }}%"></i></div>
                    </div>
                @empty
                    <div class="empty"><span class="stamp">KOSONG</span></div>
                @endforelse
            </div>
        </div>

        <div class="panel">
            <div class="phead"><span>Perusahaan Terisi</span><span class="n">TOP 5</span></div>
            <ul>
                @forelse ($perPerusahaan as $p)
                    <li>
                        <span>{{ $p->nama_perusahaan }}</span>
                        <span class="tick-count">{{ $p->total }}</span>
                    </li>
                @empty
                    <li><span class="sub">Belum ada penempatan</span></li>
                @endforelse
            </ul>
        </div>
    </div>

    {{-- ACTIVE SISWA BOARD --}}
    <div>
        <div class="acthead">
            <span class="label">Kartu Aktif Berjalan</span>
            <span class="note">{{ $siswaAktif->count() }} siswa kini di lapangan &mdash; urut tanggal mulai</span>
        </div>

        @if ($siswaAktif->isEmpty())
            <div class="tablebox">
                <div class="tbl-head">REGISTER AKTIF</div>
                <div class="empty">
                    <span class="stamp">TIDAK ADA PKL BERJALAN</span>
                    <p>Belum ada siswa dengan status aktif untuk periode ini.</p>
                </div>
            </div>
        @else
        <div class="tablebox">
            <div class="tbl-head">
                <span>Papan Berjalan</span>
                <span>{{ $siswaAktif->count() }} ENTRI</span>
            </div>
            <div class="table-scroll">
                <table>
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Perusahaan</th>
                            <th>Bidang</th>
                            <th>Periode</th>
                            <th>Kompetensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswaAktif as $s)
                        <tr>
                            <td class="num">{{ $s->nis }}</td>
                            <td>
                                <span class="nick">{{ $s->nama }}</span><br>
                                <span class="sub">{{ $s->kelas }}</span>
                            </td>
                            <td>{{ $s->jurusan }}</td>
                            <td>{{ $s->nama_perusahaan }}</td>
                            <td>{{ $s->bidang_pkl }}</td>
                            <td class="num">{{ \Carbon\Carbon::parse($s->tanggal_mulai)->format('d/m') }} &ndash; {{ \Carbon\Carbon::parse($s->tanggal_selesai)->format('d/m') }}</td>
                            <td>
                                @forelse ($s->kompetensi as $kompetensi)
                                    <span class="badge badge-aktif mb-1">{{ $kompetensi->nama_kompetensi }}</span>
                                @empty
                                    <span class="sub">Belum ada</span>
                                @endforelse
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
