<?php

use App\Http\Controllers\Admin\EskulController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isLogin;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'loginView']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(isAdmin::class)->group(function () {
    Route::get("/", [HomeController::class, 'index']);

    Route::get("/eskul", [EskulController::class, 'index']);
    Route::get('/eskul/createForm', [EskulController::class, 'createForm']);
    Route::post('/eskul/create', [EskulController::class, 'create']);
    Route::get('/eskul/edit/{id}', [EskulController::class, 'edit']);
    Route::put('/eskul/{id}', [EskulController::class, 'update']);
    Route::delete('/eskul/{id}', [EskulController::class, 'delete']);
});