<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Compro\HomeController;
use App\Http\Controllers\LocalizationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Localization
Route::get('/lang/{language}', [LocalizationController::class, '__invoke'])->name('lang');

Route::get('/',[HomeController::class,'index']);

// Auth
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/signout', [AuthController::class, 'signout'])->name('signout');

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    });

    Route::prefix('dokter')->group(function () {
        Route::get('/', [DokterController::class, 'index'])->name('dokter');
        Route::get('/jadwal', [DokterController::class, 'jadwal'])->name('dokter.jadwal');
        Route::get('/create', [DokterController::class, 'create'])->name('dokter.create');
        Route::get('/jadwal/create', [DokterController::class, 'createJadwal'])->name('dokter.jadwal.create');
    });
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
// });

