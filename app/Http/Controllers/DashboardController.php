<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = Siswa::count();
        $aktif = Siswa::where('status', 'aktif')->count();
        $selesai = Siswa::where('status', 'selesai')->count();
        $berhenti = Siswa::where('status', 'berhenti')->count();

        $perJurusan = Siswa::select('jurusan', DB::raw('count(*) as total'))
            ->groupBy('jurusan')
            ->orderByDesc('total')
            ->get();

        $perKompetensi = DB::table('kompetensi_siswa')
            ->join('kompetensi', 'kompetensi.id', '=', 'kompetensi_siswa.kompetensi_id')
            ->select('kompetensi.nama_kompetensi', DB::raw('count(*) as total'))
            ->groupBy('kompetensi.id', 'kompetensi.nama_kompetensi')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $perPerusahaan = Siswa::select('nama_perusahaan', DB::raw('count(*) as total'))
            ->groupBy('nama_perusahaan')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $siswaAktif = Siswa::where('status', 'aktif')
            ->with('kompetensi')
            ->orderBy('tanggal_mulai', 'asc')
            ->get();

        return view('dashboard.index', compact(
            'totalSiswa',
            'aktif',
            'selesai',
            'berhenti',
            'perJurusan',
            'perKompetensi',
            'perPerusahaan',
            'siswaAktif'
        ));
    }
}
