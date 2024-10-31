<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::post('/mahasiswa',[MahasiswaController::class, 'store']);
Route::patch('/mahasiswa/{mahasiswa}',[MahasiswaController::class, 'update']);
Route::delete('/mahasiswa/{mahasiswa}',[MahasiswaController::class, 'destroy']);
Route::get('/mahasiswa/{mahasiswa}',[MahasiswaController::class, 'show']);
