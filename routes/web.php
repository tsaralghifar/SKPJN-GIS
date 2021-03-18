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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
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
