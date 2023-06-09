<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PenyakitController;
use App\Http\Controllers\Admin\PertanyaanController;
use App\Http\Controllers\Admin\GejalaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Pakar\GejalaController as PakarGejalaController;
use App\Http\Controllers\Pakar\PakarController;
use App\Http\Controllers\Pakar\PenyakitController as PakarPenyakitController;
use App\Http\Controllers\SelfCheckController;

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

Route::get('/', [HomeController::class, 'index'])->name('landing')->middleware('guest');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth:web');
Route::get('/edit/{user}', [HomeController::class, 'edit'])->name('profile.edit')->middleware('auth:web');
Route::post('/edit/{user}', [HomeController::class, 'update'])->name('profile.update')->middleware('auth:web');

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
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::prefix('kelola-pengguna')->name('kelola-pengguna.')->group(function () {
        Route::get('/', [AdminController::class, 'indexPengguna'])->name('index');
        Route::get('/tambah', [AdminController::class, 'createPengguna'])->name('tambah-user');
        Route::post('/tambah', [AdminController::class, 'storePengguna'])->name('tambah-user.post');
        Route::get('/edit/{id}', [AdminController::class, 'editPengguna'])->name('edit-user');
        Route::post('/edit/{id}', [AdminController::class, 'updatePengguna'])->name('update-user');
        Route::get('/delete/{id}', [AdminController::class, 'destroy'])->name('delete-user');
    });

    // Route::prefix('kelola-data')->name('kelola-data.')->group(function () {
    //     // Route::get('/', [AdminController::class, 'indexKelola'])->name('index');
    // });

    Route::prefix('gejala')->name('gejala.')->group(function () {
        Route::get('/', [GejalaController::class, 'index'])->name('index');
        Route::get('/tambah', [GejalaController::class, 'create'])->name('create');
        Route::post('/tambah', [GejalaController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [GejalaController::class, 'edit'])->name('edit');
        Route::post('/edit/update', [GejalaController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [GejalaController::class, 'destroy'])->name('delete');
    });

    Route::prefix('penyakit')->name('penyakit.')->group(function () {
        Route::get('/', [PenyakitController::class, 'index'])->name('index');
        Route::get('/tambah', [PenyakitController::class, 'create'])->name('create');
        Route::post('/tambah', [PenyakitController::class, 'storePenyakit'])->name('store');
        Route::get('/edit/{id}', [PenyakitController::class, 'edit'])->name('edit');
        Route::post('/edit/update/{id}', [PenyakitController::class, 'update'])->name('update');
        Route::delete('/delete/{penyakit}', [PenyakitController::class, 'destroy'])->name('delete');
    });

    Route::prefix('pertanyaan')->name('pertanyaan.')->group(function () {
        Route::get('/', [PertanyaanController::class, 'index'])->name('index');
        Route::get('/tambah', [PertanyaanController::class, 'create'])->name('create');
        Route::post('/tambah', [PertanyaanController::class, 'storePenyakit'])->name('store');
        Route::get('/edit/{id}', [PertanyaanController::class, 'edit'])->name('edit');
        Route::post('/edit/update/{id}', [PertanyaanController::class, 'update'])->name('update');
        Route::delete('/delete/{pertanyaan}', [PertanyaanController::class, 'destroy'])->name('delete');
    });

    // API Sementara
    Route::get('/api/rule', [AdminController::class, 'apiRule']);
});

Route::name('pakar.')->middleware('auth:pakar')->prefix('pakar')->group(function () {
    Route::get('/dashboard', [PakarController::class, 'index'])->name('dashboard');
    Route::get('/', [PakarController::class, 'indexSkalar'])->name('skalar');
    Route::get('/sorting/{kode}', [PakarController::class, 'sortingIndex'])->name('sorting');

    Route::prefix('gejala')->name('gejala.')->group(function () {
        Route::get('/', [PakarGejalaController::class, 'index'])->name('index');
        Route::get('/tambah', [PakarGejalaController::class, 'create'])->name('create');
        Route::post('/tambah', [PakarGejalaController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PakarGejalaController::class, 'edit'])->name('edit');
        Route::post('/edit/update', [PakarGejalaController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [PakarGejalaController::class, 'destroy'])->name('delete');
    });

    Route::prefix('penyakit')->name('penyakit.')->group(function () {
        Route::get('/', [PakarPenyakitController::class, 'index'])->name('index');
        Route::get('/tambah', [PakarPenyakitController::class, 'create'])->name('create');
        Route::post('/tambah', [PakarPenyakitController::class, 'storePenyakit'])->name('store');
        Route::get('/edit/{id}', [PakarPenyakitController::class, 'edit'])->name('edit');
        Route::post('/edit/update/{id}', [PakarPenyakitController::class, 'update'])->name('update');
        Route::delete('/delete/{penyakit}', [PakarPenyakitController::class, 'destroy'])->name('delete');
    });
});

// Route::name('get.')->prefix('get')->group(function () {
//     Route::get('/gejala', [GejalaController::class, 'gejala'])->name('gejala');
//     Route::get('/gejala/{id}', [GejalaController::class, 'gejalaById'])->name('gejala.id');
// });
