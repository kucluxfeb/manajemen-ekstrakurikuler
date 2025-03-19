<?php

use App\Http\Controllers\Admin\AbsensiController;
use App\Http\Controllers\Admin\EskulController;
use App\Http\Controllers\Admin\PendaftaranController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isSiswa;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'loginView']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(isAdmin::class)->group(function () {
    Route::get("/", [HomeController::class, 'index'])->name('home');

    Route::get("/eskul", [EskulController::class, 'index']);
    Route::get('/eskul/createForm', [EskulController::class, 'createForm']);
    Route::post('/eskul/create', [EskulController::class, 'create']);
    Route::get('/eskul/edit/{id}', [EskulController::class, 'edit']);
    Route::put('/eskul/{id}', [EskulController::class, 'update']);
    Route::delete('/eskul/{id}', [EskulController::class, 'delete']);

    Route::get('/admin/pendaftaran', [PendaftaranController::class, 'index'])->name('admin.pendaftaran');
    Route::get('/admin/pendaftaran/{id}/konfirmasi', [PendaftaranController::class, 'konfirmasi'])->name('admin.pendaftaran.konfirmasi');
    Route::put('/admin/pendaftaran/{id}', [PendaftaranController::class, 'update'])->name('admin.pendaftaran.update');

    Route::get('/admin/absensi', [AbsensiController::class, 'index'])->name('admin.absensi.index');
    Route::get('/admin/absensi/{id}/konfirmasi', [AbsensiController::class, 'showKonfrimasi'])->name('admin.absensi.konfirmasi');
    Route::put('/admin/absensi/{id}/update', [AbsensiController::class, 'update'])->name('admin.absensi.update');    
});

Route::middleware(isSiswa::class)->group(function () {
    Route::get('/pendaftaran', [PendaftaranController::class, 'create'])->name('pendaftaran');
    Route::post('/pendaftaran/store', [PendaftaranController::class, 'store']);
    Route::get('/pendaftaran/saya', [PendaftaranController::class, 'myPendaftaran'])->name('pendaftaran.saya');

    Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
    Route::post('/absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');
    Route::get('/absensi/saya', [AbsensiController::class, 'myAbsensi'])->name('absensi.saya');

});