<?php

use App\Http\Controllers\dokterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\FaskesController;
use App\Http\Controllers\PemeriksaanController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/myapp', function () {
    return view('myapp');
});

Route::get('/myapp', function () {
    return view('page.dashboard');
});

route::resource('dokter',dokterController ::class);
Route::resource('karyawan', KaryawanController::class);
route::resource('pasien',PasienController ::class);
route::resource('obat',ObatController ::class);
route::resource('faskes',FaskesController ::class);
route::resource('pemeriksaan',PemeriksaanController ::class);
