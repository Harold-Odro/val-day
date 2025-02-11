<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/roses', [RoseController::class, 'index']);
Route::post('/roses', [RoseController::class, 'store']);
