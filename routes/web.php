<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PakarController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\SelfCheckController;
use App\Models\Admin;
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
    Route::post('/diagnosa', [SelfCheckController::class, 'indexDiagnosa'])->name('hasil');
});

Route::name('admin.')->middleware('auth:admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/kelola-data', [AdminController::class, 'indexKelola'])->name('kelola-data');
    Route::get('/Kelola-data/penyakit/tambah', [PenyakitController::class, 'create'])->name('kelola-data.tambah-penyakit');
    Route::get('/kelola-pengguna', [AdminController::class, 'indexPengguna'])->name('kelola-pengguna');
    Route::get('/kelola-pengguna/user/tambah', [AdminController::class, 'createPengguna'])->name('kelola-pengguna.tambah-user');
    Route::post('/kelola-pengguna/user/tambah', [AdminController::class, 'storePengguna'])->name('kelola-pengguna.tambah-user.post');
    Route::get('/kelola-pengguna/user/edit/{id}', [AdminController::class, 'editPengguna'])->name('kelola-pengguna.edit-user');
    Route::post('/kelola-pengguna/user/edit/{id}', [AdminController::class, 'updatePengguna'])->name('kelola-pengguna.update-user');
    Route::get('/kelola-pengguna/dokter/tambah', [DokterController::class, 'create'])->name('kelola-pengguna.tambah-dokter');
    Route::post('/kelola-pengguna/dokter/tambah', [DokterController::class, 'store'])->name('kelola-pengguna.tambah-dokter.post');
    Route::get('/kelola-pengguna/dokter/edit/{id}', [DokterController::class, 'edit'])->name('kelola-pengguna.edit-dokter');
    Route::post('/kelola-pengguna/dokter/edit/{id}', [DokterController::class, 'update'])->name('kelola-pengguna.update-dokter');
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
