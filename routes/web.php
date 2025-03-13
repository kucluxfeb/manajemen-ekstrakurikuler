<?php

use App\Http\Controllers\Admin\EskulController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, 'index']);

Route::get("/eskul", [EskulController::class, 'index']);