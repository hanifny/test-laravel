<?php

use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

Route::get('provinsi', [ProvinsiController::class, 'index']);
Route::post('provinsi', [ProvinsiController::class, 'store']);
Route::patch('provinsi/{id}', [ProvinsiController::class, 'update']);
Route::delete('provinsi/{id}', [ProvinsiController::class, 'destroy']);

Route::get('kecamatan', [KecamatanController::class, 'index']);
Route::post('kecamatan', [KecamatanController::class, 'store']);
Route::patch('kecamatan/{id}', [KecamatanController::class, 'update']);
Route::delete('kecamatan/{id}', [KecamatanController::class, 'destroy']);

Route::get('kelurahan', [KelurahanController::class, 'index']);
Route::post('kelurahan', [KelurahanController::class, 'store']);
Route::patch('kelurahan/{id}', [KelurahanController::class, 'update']);
Route::delete('kelurahan/{id}', [KelurahanController::class, 'destroy']);

Route::get('pegawai', [PegawaiController::class, 'index']);
Route::post('pegawai', [PegawaiController::class, 'store']);
Route::patch('pegawai/{id}', [PegawaiController::class, 'update']);
Route::delete('pegawai/{id}', [PegawaiController::class, 'destroy']);