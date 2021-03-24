<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Personil
Route::get('/personil', [App\Http\Controllers\PersonilController::class, 'index'])->name('personil');
Route::get('/personil/create', [App\Http\Controllers\PersonilController::class, 'create'])->name('personil.create');
Route::post('/personil/store', [App\Http\Controllers\PersonilController::class, 'store'])->name('personil.store');
Route::get('/personil/edit/{id}', [App\Http\Controllers\PersonilController::class, 'edit'])->name('personil.edit');
Route::put('/personil/update/{id}', [App\Http\Controllers\PersonilController::class, 'update'])->name('personil.update');
Route::delete('/personil/destroy/{id}', [App\Http\Controllers\PersonilController::class, 'destroy'])->name('personil.destroy');
// Bahan
Route::get('/bahan', [App\Http\Controllers\BahanKonstruksiController::class, 'index'])->name('bahan');
Route::get('/bahan/create', [App\Http\Controllers\BahanKonstruksiController::class, 'create'])->name('bahan.create');
Route::post('/bahan/store', [App\Http\Controllers\BahanKonstruksiController::class, 'store'])->name('bahan.store');
Route::get('/bahan/edit/{id}', [App\Http\Controllers\BahanKonstruksiController::class, 'edit'])->name('bahan.edit');
Route::put('/bahan/update/{id}', [App\Http\Controllers\BahanKonstruksiController::class, 'update'])->name('bahan.update');
Route::delete('/bahan/destroy/{id}', [App\Http\Controllers\BahanKonstruksiController::class, 'destroy'])->name('bahan.destroy');
// Peralatan
Route::get('/peralatan', [App\Http\Controllers\PeralatanController::class, 'index'])->name('peralatan');
Route::get('/peralatan/create', [App\Http\Controllers\PeralatanController::class, 'create'])->name('peralatan.create');
Route::post('/peralatan/store', [App\Http\Controllers\PeralatanController::class, 'store'])->name('peralatan.store');
Route::get('/peralatan/edit/{id}', [App\Http\Controllers\PeralatanController::class, 'edit'])->name('peralatan.edit');
Route::put('/peralatan/update/{id}', [App\Http\Controllers\PeralatanController::class, 'update'])->name('peralatan.update');
Route::delete('/peralatan/destroy/{id}', [App\Http\Controllers\PeralatanController::class, 'destroy'])->name('peralatan.destroy');
// Penghambat
Route::get('/penghambat', [App\Http\Controllers\PenghambatController::class, 'index'])->name('penghambat');
Route::get('/penghambat/create', [App\Http\Controllers\PenghambatController::class, 'create'])->name('penghambat.create');
Route::post('/penghambat/store', [App\Http\Controllers\PenghambatController::class, 'store'])->name('penghambat.store');
Route::get('/penghambat/edit/{id}', [App\Http\Controllers\PenghambatController::class, 'edit'])->name('penghambat.edit');
Route::put('/penghambat/update/{id}', [App\Http\Controllers\PenghambatController::class, 'update'])->name('penghambat.update');
Route::delete('/penghambat/destroy/{id}', [App\Http\Controllers\PenghambatController::class, 'destroy'])->name('penghambat.destroy');
// Anggaran Masuk
Route::get('/masuk', [App\Http\Controllers\AnggaranMasukController::class, 'index'])->name('masuk');
Route::get('/masuk/create', [App\Http\Controllers\AnggaranMasukController::class, 'create'])->name('masuk.create');
Route::post('/masuk/store', [App\Http\Controllers\AnggaranMasukController::class, 'store'])->name('masuk.store');
Route::get('/masuk/edit/{id}', [App\Http\Controllers\AnggaranMasukController::class, 'edit'])->name('masuk.edit');
Route::put('/masuk/update/{id}', [App\Http\Controllers\AnggaranMasukController::class, 'update'])->name('masuk.update');
Route::delete('/masuk/destroy/{id}', [App\Http\Controllers\AnggaranMasukController::class, 'destroy'])->name('masuk.destroy');
// Anggaran Keluar
Route::get('/keluar', [App\Http\Controllers\AnggaranKeluarController::class, 'index'])->name('keluar');
Route::get('/keluar/create', [App\Http\Controllers\AnggaranKeluarController::class, 'create'])->name('keluar.create');
Route::post('/keluar/store', [App\Http\Controllers\AnggaranKeluarController::class, 'store'])->name('keluar.store');
Route::get('/keluar/edit/{id}', [App\Http\Controllers\AnggaranKeluarController::class, 'edit'])->name('keluar.edit');
Route::put('/keluar/update/{id}', [App\Http\Controllers\AnggaranKeluarController::class, 'update'])->name('keluar.update');
Route::delete('/keluar/destroy/{id}', [App\Http\Controllers\AnggaranKeluarController::class, 'destroy'])->name('keluar.destroy');
