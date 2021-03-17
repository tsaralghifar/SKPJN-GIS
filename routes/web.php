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
