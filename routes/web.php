<?php

use App\Http\Controllers\Admin\EskulController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, 'index']);

Route::get("/eskul", [EskulController::class, 'index']);

Route::get('/eskul/createForm', [EskulController::class, 'createForm']);
Route::post('/eskul/create', [EskulController::class, 'create']);

Route::get('/eskul/edit/{id}', [EskulController::class, 'edit']);
Route::put('/eskul/{id}', [EskulController::class, 'update']);

Route::delete('/eskul/{id}', [EskulController::class, 'delete']);