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

Auth::routes();

Route::middleware(['auth'])->group( function() {
  Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

  // Personil
  Route::get('/personil', [App\Http\Controllers\PersonilController::class, 'index'])->name('personil');
  Route::get('/personil/pdf', [App\Http\Controllers\PersonilController::class, 'createPDF'])->name('personil.pdf');
  Route::get('/personil/create', [App\Http\Controllers\PersonilController::class, 'create'])->name('personil.create');
  Route::post('/personil/store', [App\Http\Controllers\PersonilController::class, 'store'])->name('personil.store');
  Route::get('/personil/edit/{id}', [App\Http\Controllers\PersonilController::class, 'edit'])->name('personil.edit');
  Route::put('/personil/update/{id}', [App\Http\Controllers\PersonilController::class, 'update'])->name('personil.update');
  Route::delete('/personil/destroy/{id}', [App\Http\Controllers\PersonilController::class, 'destroy'])->name('personil.destroy');
  // Bahan
  Route::get('/bahan', [App\Http\Controllers\BahanKonstruksiController::class, 'index'])->name('bahan');
  Route::get('/bahan/pdf', [App\Http\Controllers\BahanKonstruksiController::class, 'createPDF'])->name('bahan.pdf');
  Route::get('/bahan/create', [App\Http\Controllers\BahanKonstruksiController::class, 'create'])->name('bahan.create');
  Route::post('/bahan/store', [App\Http\Controllers\BahanKonstruksiController::class, 'store'])->name('bahan.store');
  Route::get('/bahan/edit/{id}', [App\Http\Controllers\BahanKonstruksiController::class, 'edit'])->name('bahan.edit');
  Route::put('/bahan/update/{id}', [App\Http\Controllers\BahanKonstruksiController::class, 'update'])->name('bahan.update');
  Route::delete('/bahan/destroy/{id}', [App\Http\Controllers\BahanKonstruksiController::class, 'destroy'])->name('bahan.destroy');
  // Peralatan
  Route::get('/peralatan', [App\Http\Controllers\PeralatanController::class, 'index'])->name('peralatan');
  Route::get('/peralatan/pdf', [App\Http\Controllers\PeralatanController::class, 'createPDF'])->name('peralatan.pdf');
  Route::get('/peralatan/create', [App\Http\Controllers\PeralatanController::class, 'create'])->name('peralatan.create');
  Route::post('/peralatan/store', [App\Http\Controllers\PeralatanController::class, 'store'])->name('peralatan.store');
  Route::get('/peralatan/edit/{id}', [App\Http\Controllers\PeralatanController::class, 'edit'])->name('peralatan.edit');
  Route::put('/peralatan/update/{id}', [App\Http\Controllers\PeralatanController::class, 'update'])->name('peralatan.update');
  Route::delete('/peralatan/destroy/{id}', [App\Http\Controllers\PeralatanController::class, 'destroy'])->name('peralatan.destroy');
  // Penghambat
  Route::get('/penghambat', [App\Http\Controllers\PenghambatController::class, 'index'])->name('penghambat');
  Route::get('/penghambat/pdf', [App\Http\Controllers\PenghambatController::class, 'createPDF'])->name('penghambat.pdf');
  Route::get('/penghambat/create', [App\Http\Controllers\PenghambatController::class, 'create'])->name('penghambat.create');
  Route::post('/penghambat/store', [App\Http\Controllers\PenghambatController::class, 'store'])->name('penghambat.store');
  Route::get('/penghambat/edit/{id}', [App\Http\Controllers\PenghambatController::class, 'edit'])->name('penghambat.edit');
  Route::put('/penghambat/update/{id}', [App\Http\Controllers\PenghambatController::class, 'update'])->name('penghambat.update');
  Route::delete('/penghambat/destroy/{id}', [App\Http\Controllers\PenghambatController::class, 'destroy'])->name('penghambat.destroy');
  // Anggaran Masuk
  Route::get('/anggaran-masuk', [App\Http\Controllers\AnggaranMasukController::class, 'index'])->name('anggaran-masuk');
  Route::get('/anggaran-masuk/pdf', [App\Http\Controllers\AnggaranMasukController::class, 'createPDF'])->name('anggaran-masuk.pdf');
  Route::get('/anggaran-masuk/create', [App\Http\Controllers\AnggaranMasukController::class, 'create'])->name('anggaran-masuk.create');
  Route::post('/anggaran-masuk/store', [App\Http\Controllers\AnggaranMasukController::class, 'store'])->name('anggaran-masuk.store');
  Route::get('/anggaran-masuk/edit/{id}', [App\Http\Controllers\AnggaranMasukController::class, 'edit'])->name('anggaran-masuk.edit');
  Route::put('/anggaran-masuk/update/{id}', [App\Http\Controllers\AnggaranMasukController::class, 'update'])->name('anggaran-masuk.update');
  Route::delete('/anggaran-masuk/destroy/{id}', [App\Http\Controllers\AnggaranMasukController::class, 'destroy'])->name('anggaran-masuk.destroy');
  // Anggaran Keluar
  Route::get('/anggaran-keluar', [App\Http\Controllers\AnggaranKeluarController::class, 'index'])->name('anggaran-keluar');
  Route::get('/anggaran-keluar/pdf', [App\Http\Controllers\AnggaranKeluarController::class, 'createPDF'])->name('anggaran-keluar.pdf');
  Route::get('/anggaran-keluar/create', [App\Http\Controllers\AnggaranKeluarController::class, 'create'])->name('anggaran-keluar.create');
  Route::post('/anggaran-keluar/store', [App\Http\Controllers\AnggaranKeluarController::class, 'store'])->name('anggaran-keluar.store');
  Route::get('/anggaran-keluar/edit/{id}', [App\Http\Controllers\AnggaranKeluarController::class, 'edit'])->name('anggaran-keluar.edit');
  Route::put('/anggaran-keluar/update/{id}', [App\Http\Controllers\AnggaranKeluarController::class, 'update'])->name('anggaran-keluar.update');
  Route::delete('/anggaran-keluar/destroy/{id}', [App\Http\Controllers\AnggaranKeluarController::class, 'destroy'])->name('anggaran-keluar.destroy');
  // Site Proyek
  Route::get('/site-proyek', [\App\Http\Controllers\SiteProyekController::class, 'index'])->name('site');
  Route::get('/site-proyek/pdf', [App\Http\Controllers\BahanKonstruksiController::class, 'createPDF'])->name('site.pdf');
  Route::get('/site-proyek/create', [\App\Http\Controllers\SiteProyekController::class, 'create'])->name('site.create');
  Route::post('/site-proyek/store', [\App\Http\Controllers\SiteProyekController::class, 'store'])->name('site.store');
  Route::get('/site-proyek/{id}', [\App\Http\Controllers\SiteProyekController::class, 'edit'])->name('site.edit');
  Route::put('/site-proyek/{id}', [\App\Http\Controllers\SiteProyekController::class, 'update'])->name('site.update');
  Route::delete('/site-proyek/{id}', [\App\Http\Controllers\SiteProyekController::class, 'destroy'])->name('site.destroy');
  // Jadwal Pengerjaan
  Route::get('/jadwal', [\App\Http\Controllers\JadwalPengerjaanController::class, 'index'])->name('jadwal');
  Route::get('/jadwal/pdf', [\App\Http\Controllers\JadwalPengerjaanController::class, 'createPDF'])->name('jadwal.pdf');
  Route::get('/jadwal/create', [\App\Http\Controllers\JadwalPengerjaanController::class, 'create'])->name('jadwal.create');
  Route::post('/jadwal/store', [\App\Http\Controllers\JadwalPengerjaanController::class, 'store'])->name('jadwal.store');
  Route::get('/jadwal/{id}', [\App\Http\Controllers\JadwalPengerjaanController::class, 'edit'])->name('jadwal.edit');
  Route::put('/jadwal/{id}', [\App\Http\Controllers\JadwalPengerjaanController::class, 'update'])->name('jadwal.update');
  Route::delete('/jadwal/{id}', [\App\Http\Controllers\JadwalPengerjaanController::class, 'destroy'])->name('jadwal.destroy');
  // Form Pekerjaan
  Route::get('/pekerjaan', [\App\Http\Controllers\PekerjaanController::class, 'index'])->name('pekerjaan');
  Route::get('/pekerjaan/pdf', [App\Http\Controllers\PekerjaanController::class, 'createPDF'])->name('pekerjaan.pdf');
  Route::get('/pekerjaan/create', [\App\Http\Controllers\PekerjaanController::class, 'create'])->name('pekerjaan.create');
  Route::post('/pekerjaan/store', [\App\Http\Controllers\PekerjaanController::class, 'store'])->name('pekerjaan.store');
  Route::get('/pekerjaan/{id}', [\App\Http\Controllers\PekerjaanController::class, 'edit'])->name('pekerjaan.edit');
  Route::put('/pekerjaan/{id}', [\App\Http\Controllers\PekerjaanController::class, 'update'])->name('pekerjaan.update');
  Route::delete('/pekerjaan/{id}', [\App\Http\Controllers\PekerjaanController::class, 'destroy'])->name('pekerjaan.destroy');
  // Sewa Alat
  Route::get('/sewa-alat', [\App\Http\Controllers\SewaAlatContoller::class, 'index'])->name('sewa-alat');
  Route::get('/sewa-alat/pdf', [\App\Http\Controllers\SewaAlatContoller::class, 'createPDF'])->name('sewa-alat.pdf');
  Route::get('/sewa-alat/create', [\App\Http\Controllers\SewaAlatContoller::class, 'create'])->name('sewa-alat.create');
  Route::post('/sewa-alat/store', [\App\Http\Controllers\SewaAlatContoller::class, 'store'])->name('sewa-alat.store');
  Route::get('/sewa-alat/{id}', [\App\Http\Controllers\SewaAlatContoller::class, 'edit'])->name('sewa-alat.edit');
  Route::put('/sewa-alat/{id}', [\App\Http\Controllers\SewaAlatContoller::class, 'update'])->name('sewa-alat.update');
  Route::delete('/sewa-alat/{id}', [\App\Http\Controllers\SewaAlatContoller::class, 'destroy'])->name('sewa-alat.destroy');
  // Progress
  Route::get('/progress', [\App\Http\Controllers\ProgressProyekController::class, 'index'])->name('progress');
  Route::get('/progress/pdf', [\App\Http\Controllers\ProgressProyekController::class, 'createPDF'])->name('progress.pdf');
  Route::get('/progress/create', [\App\Http\Controllers\ProgressProyekController::class, 'create'])->name('progress.create');
  Route::post('/progress/store', [\App\Http\Controllers\ProgressProyekController::class, 'store'])->name('progress.store');
  Route::get('/progress/{id}', [\App\Http\Controllers\ProgressProyekController::class, 'edit'])->name('progress.edit');
  Route::put('/progress/{id}', [\App\Http\Controllers\ProgressProyekController::class, 'update'])->name('progress.update');
  Route::delete('/progress/{id}', [\App\Http\Controllers\ProgressProyekController::class, 'destroy'])->name('progress.destroy');
});