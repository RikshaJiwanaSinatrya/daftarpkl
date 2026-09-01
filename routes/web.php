<?php

use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('siswa.index');
});

Route::resource('siswa', SiswaController::class)->except(['show']);

Route::resource('perusahaan', PerusahaanController::class);
