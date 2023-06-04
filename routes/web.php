<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PakarController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\SelfCheckController;
use App\Models\Admin;
use App\Models\Gejala;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

// group
Route::name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware(['guest:admin,web,pakar']);
    Route::post('/login', [AuthController::class, 'login'])->name('login.post')->middleware('guest');
    Route::get('/regsiter', [AuthController::class, 'create'])->name('register')->middleware('guest');
    Route::post('/register', [AuthController::class, 'store'])->name('register.post')->middleware(['guest', 'guest:admin']);
    Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');
});


Route::name('konsul.')->middleware('auth')->prefix('konsul')->group(function () {
    Route::get('/quiz', [SelfCheckController::class, 'indexQuiz'])->name('quiz');
    Route::get('/quiz2', [SelfCheckController::class, 'indexQuiz2'])->name('quiz2');
    Route::post('/diagnosa', [SelfCheckController::class, 'indexDiagnosa'])->name('hasil');
    Route::get('/riwayat', [SelfCheckController::class, 'indexRiwayat'])->name('riwayat');
});

Route::name('admin.')->middleware('auth:admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/kelola-data', [AdminController::class, 'indexKelola'])->name('kelola-data');
    Route::get('/kelola-pengguna', [AdminController::class, 'indexPengguna'])->name('kelola-pengguna');
    Route::get('/kelola-pengguna/tambah', [AdminController::class, 'createPengguna'])->name('kelola-pengguna.tambah-user');
    Route::post('/kelola-pengguna/tambah', [AdminController::class, 'storePengguna'])->name('kelola-pengguna.tambah-user.post');
    Route::get('/kelola-pengguna/edit/{id}', [AdminController::class, 'editPengguna'])->name('kelola-pengguna.edit-user');
    Route::post('/kelola-pengguna/edit/{id}', [AdminController::class, 'updatePengguna'])->name('kelola-pengguna.update-user');
    Route::get('/kelola-pengguna/delete/{id}', [AdminController::class, 'destroy'])->name('kelola-pengguna.delete-user');

    // Route::get('/kelola-pengguna/dokter/tambah', [DokterController::class, 'create'])->name('kelola-pengguna.tambah-dokter');
    // Route::post('/kelola-pengguna/dokter/tambah', [DokterController::class, 'store'])->name('kelola-pengguna.tambah-dokter.post');
    // Route::get('/kelola-pengguna/dokter/edit/{id}', [DokterController::class, 'edit'])->name('kelola-pengguna.edit-dokter');
    // Route::post('/kelola-pengguna/dokter/edit/{id}', [DokterController::class, 'update'])->name('kelola-pengguna.update-dokter');


    // API Sementara
    Route::get('/api/rule', [AdminController::class, 'apiRule']);
});

Route::name('admin.')->middleware(['auth:pakar,admin'])->group(function () {
    Route::get('/gejala', [GejalaController::class, 'index'])->name('kelola-data.gejala');
    Route::get('/gejala/tambah', [GejalaController::class, 'create'])->name('kelola-data.tambah-gejala');
    Route::post('/gejala/tambah', [GejalaController::class, 'store'])->name('kelola-data.tambah-gejala.create');
    Route::get('/gejala/edit/{id}', [GejalaController::class, 'edit'])->name('kelola-data.edit-gejala');
    Route::post('/gejala/edit/update', [GejalaController::class, 'update'])->name('kelola-data.edit-gejala.update');
    Route::delete('/gejala/delete/{id}', [GejalaController::class, 'destroy'])->name('kelola-data.delete-gejala');
});

Route::name('admin.')->middleware(['auth:pakar,admin'])->group(function () {
    Route::get('/penyakit', [PenyakitController::class, 'index'])->name('kelola-data.penyakit');
    Route::get('/penyakit/tambah', [PenyakitController::class, 'create'])->name('kelola-data.tambah-penyakit');
    Route::post('/penyakit/tambah', [PenyakitController::class, 'storePenyakit'])->name('kelola-data.tambah-penyakit.create');
    Route::get('/penyakit/edit/{id}', [PenyakitController::class, 'edit'])->name('kelola-data.edit-penyakit');
    Route::post('/penyakit/edit/update/{id}', [PenyakitController::class, 'update'])->name('kelola-data.edit-penyakit.update');
    Route::delete('/penyakit/delete/{penyakit}', [PenyakitController::class, 'destroy'])->name('kelola-data.delete-penyakit');
});

Route::name('admin.')->middleware(['auth:pakar,admin'])->group(function () {
    Route::get('/pertanyaan', [PertanyaanController::class, 'index'])->name('kelola-data.pertanyaan');
    Route::get('/pertanyaan/tambah', [PertanyaanController::class, 'create'])->name('kelola-data.tambah-pertanyaan');
    Route::post('/pertanyaan/tambah', [PertanyaanController::class, 'storePenyakit'])->name('kelola-data.tambah-pertanyaan.create');
    Route::get('/pertanyaan/edit/{id}', [PertanyaanController::class, 'edit'])->name('kelola-data.edit-pertanyaan');
    Route::post('/pertanyaan/edit/update/{id}', [PertanyaanController::class, 'update'])->name('kelola-data.edit-pertanyaan.update');
    Route::delete('/pertanyaan/delete/{penyakit}', [PertanyaanController::class, 'destroy'])->name('kelola-data.delete-pertanyaan');
});

Route::name('pakar.')->middleware('auth:pakar')->prefix('pakar')->group(function () {
    Route::get('/dashboard', [PakarController::class, 'index'])->name('dashboard');
    Route::get('/penyakit', [PakarController::class, 'indexPenyakit'])->name('penyakit');
    Route::get('/penyakit/tambah', [PakarController::class, 'createPenyakit'])->name('penyakit.tambah');
    Route::post('/penyakit/tambah', [PakarController::class, 'storePenyakit'])->name('penyakit.tambah.post');
    Route::get('/penyakit/edit/{id}', [PakarController::class, 'editPenyakit'])->name('penyakit.edit');
    Route::post('/penyakit/edit/{id}', [PakarController::class, 'updatePenyakit'])->name('penyakit.update');
    Route::get('/penyakit/hapus/{id}', [PakarController::class, 'destroyPenyakit'])->name('penyakit.hapus');
    Route::get('/gejala', [PakarController::class, 'indexGejala'])->name('gejala');
    Route::get('/gejala/tambah', [PakarController::class, 'createGejala'])->name('gejala.tambah');
    Route::post('/gejala/tambah', [PakarController::class, 'storeGejala'])->name('gejala.tambah.post');
    Route::get('/gejala/edit/{id}', [PakarController::class, 'editGejala'])->name('gejala.edit');
});


Route::name('pakar.')->middleware('auth:pakar')->prefix('skalar')->group(function () {
    Route::get('/', [PakarController::class, 'indexSkalar'])->name('skalar');
    Route::get('/sorting/{kode}', [PakarController::class, 'sortingIndex'])->name('sorting');
});

// Route::name('get.')->prefix('get')->group(function () {
//     Route::get('/gejala', [GejalaController::class, 'gejala'])->name('gejala');
//     Route::get('/gejala/{id}', [GejalaController::class, 'gejalaById'])->name('gejala.id');
// });
