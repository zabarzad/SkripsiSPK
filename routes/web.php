<?php

use App\Http\Controllers\DisiplinController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndikatorKerjaController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KemampuanController;
use App\Http\Controllers\ObjektivitasController;
use App\Http\Controllers\PosisiController;
use App\Http\Controllers\SmartController;
use App\Http\Controllers\TopsisController;
use App\Http\Controllers\WpController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('wp', [WpController::class, 'index'])->name('wp.index');
    Route::get('wp/proses', [WpController::class, 'proses'])->name('wp.proses');
    Route::apiResource('karyawan', KaryawanController::class);
    Route::apiResource('posisi', PosisiController::class);
    Route::apiResource('disiplin', DisiplinController::class);
    Route::apiResource('kemampuan', KemampuanController::class);
    Route::apiResource('objektivitas', ObjektivitasController::class);
    Route::apiResource('indikator', IndikatorKerjaController::class);
    Route::apiResource('smart', SmartController::class);
    Route::apiResource('topsis', TopsisController::class);
});
