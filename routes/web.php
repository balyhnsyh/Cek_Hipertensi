<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PakarController;
use App\Http\Controllers\RulesController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\SolusiController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\DiagnoseController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\KesimpulanController;
use App\Http\Controllers\ProfileHomeController;
use App\Http\Controllers\UserProfileController;

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Auth\CustomPasswordResetController;



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

// Rute untuk homepage
Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/profile', [HomeController::class, 'profile_home'])->name('profile.home');
Route::middleware(['auth'])->group(function () {
    Route::post('/profile/update', [ProfileHomeController::class, 'update'])->name('profile.update');
    Route::post('/profile/upload{id}', [UserProfileController::class, 'uploadProfile'])->name('profile.upload');
});


Route::get('/team', function () {
    return view('team', [
        'title' => 'About Us',
    ]);
});


Route::get('/forgot-password', [CustomPasswordResetController::class, 'showForgotPasswordForm'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [CustomPasswordResetController::class, 'sendResetLinkEmail'])
    ->middleware('guest')
    ->name('password.email');

Route::get('/reset-password/{token}', [CustomPasswordResetController::class, 'showResetForm'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [CustomPasswordResetController::class, 'reset'])
    ->middleware('guest')
    ->name('password.update');



Route::post('/diagnose/store', [DiagnosisController::class, 'store'])->name('diagnose.store');
Route::get('/diagnosis/result/{id_pasien}', [DiagnosisController::class, 'result'])->name('diagnosis.result');
Route::get('/diagnosis/form', [DiagnosisController::class, 'form'])->name('diagnosis.form');


Route::middleware('auth')->group(function () {
    Route::get('/konsultasi', [PasienController::class, 'index'])->name('konsultasi')->middleware('auth');;
    Route::get('/konsultasi/create', [PasienController::class, 'create'])->name('pasien/create');
    Route::post('/konsultasi', [PasienController::class, 'store'])->name('pasien.store');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('auth/google', [GoogleController::class, 'redirectGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleCallback'])->name('google.callback');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


// Rute dengan middleware untuk admin atau pakar
Route::group(['middleware' => ['auth', 'is_admin_or_pakar']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    
    
    Route::get('/pakar', [PakarController::class, 'index'])->name('pakar');
    Route::get('/pakar/id', [PakarController::class, 'index']);
    Route::get('/pakar/create', [PakarController::class, 'create'])->name('pakar/create');
    Route::post('/pakar', [PakarController::class, 'store'])->name('pakar.store');
    Route::get('/pakar/edit/{id}', [PakarController::class, 'edit'])->name('pakar.edit');
    Route::post('/pakar/update/{id}', [PakarController::class, 'update'])->name('pakar.update');
    Route::post('/pakar/delete/{id}', [PakarController::class, 'destroy'])->name('pakar.destroy');

    
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
    Route::get('/pengguna/id', [PenggunaController::class, 'index']);
    Route::get('/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna/create');
    Route::post('/pengguna', [PenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/pengguna/edit/{id}', [PenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::post('/pengguna/update/{id}', [PenggunaController::class, 'update'])->name('pengguna.update');
    Route::post('/pengguna/delete/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');

    Route::post('/profile/upload/{id}', [AdminProfileController::class, 'uploadProfile'])->name('admin.profile.upload');

    Route::get('/penyakit', [PenyakitController::class, 'index'])->name('penyakit');
    Route::get('/penyakit/id', [PenyakitController::class, 'index']);
    Route::get('/penyakit/create', [PenyakitController::class, 'create'])->name('penyakit/create');
    Route::post('/penyakit', [PenyakitController::class, 'store'])->name('penyakit.store');
    Route::get('/penyakit/edit/{id}', [PenyakitController::class, 'edit'])->name('penyakit.edit');
    Route::post('/penyakit/update/{id}', [PenyakitController::class, 'update'])->name('penyakit.update');
    Route::post('/penyakit/delete/{id}', [PenyakitController::class, 'destroy'])->name('penyakit.destroy');

    Route::get('/gejala', [GejalaController::class, 'index'])->name('gejala');
    Route::get('/gejala/id', [GejalaController::class, 'index']);
    Route::get('/gejala/create', [GejalaController::class, 'create'])->name('gejala/create');
    Route::post('/gejala', [GejalaController::class, 'store'])->name('gejala.store');
    Route::get('/gejala/edit/{id}', [GejalaController::class, 'edit'])->name('gejala.edit');
    Route::post('/gejala/update/{id}', [GejalaController::class, 'update'])->name('gejala.update');
    Route::post('/gejala/delete/{id}', [GejalaController::class, 'destroy'])->name('gejala.destroy');
    
    Route::get('/solusi', [SolusiController::class, 'index'])->name('solusi');
    Route::get('/solusi/id', [SolusiController::class, 'index']);
    Route::get('/solusi/create', [SolusiController::class, 'create'])->name('solusi/create');
    Route::post('/solusi', [SolusiController::class, 'store'])->name('solusi.store');
    Route::get('/solusi/edit/{id}', [SolusiController::class, 'edit'])->name('solusi.edit');
    Route::post('/solusi/update/{id}', [SolusiController::class, 'update'])->name('solusi.update');
    Route::post('/solusi/delete/{id}', [SolusiController::class, 'destroy'])->name('solusi.destroy');

    Route::get('/rules', [RulesController::class, 'index'])->name('rules');
    Route::get('/rules/id', [RulesController::class, 'index']);
    Route::get('/rules/create', [RulesController::class, 'create'])->name('rules/create');
    Route::post('/rules', [RulesController::class, 'store'])->name('rules.store');
    Route::get('/rules/edit/{id}', [RulesController::class, 'edit'])->name('rules.edit');
    Route::post('/rules/update/{id}', [RulesController::class, 'update'])->name('rules.update');
    Route::post('/rules/delete/{id}', [RulesController::class, 'destroy'])->name('rules.destroy');
    
    Route::get('/riwayat', [KesimpulanController::class, 'index'])->name('riwayat');
});
