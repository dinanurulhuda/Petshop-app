<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HewanController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\JnsHwnController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\PenitipanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\LoginController;

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

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/', function () {
    return view('dashboard.index');
});

Route::resource('hewan',HewanController::class)->middleware('guest');
Route::resource('jns_hwn',JnsHwnController::class)->middleware('guest');
Route::resource('owner',OwnerController::class)->middleware('guest');
Route::resource('makanan',MakananController::class)->middleware('guest');
Route::resource('penitipan',PenitipanController::class)->middleware('guest');
Route::resource('karyawan',KaryawanController::class)->middleware('guest');
Route::resource('obat',ObatController::class)->middleware('guest');

// Route::post('/login',[LoginController::class,'authenticate']);
// Route::get('/login',[LoginController::class,'login'])->name('login')->middleware('guest');
// Route::post('/logout',[LoginController::class,'logout']);