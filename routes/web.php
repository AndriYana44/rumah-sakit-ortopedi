<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Compro\HomeController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\Admin\UserController;

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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/doctors',[HomeController::class,'doctors'])->name('doctors');

// Auth
Route::middleware(['guest'])->group(function() {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/signout', [AuthController::class, 'signout'])->name('signout');

    Route::middleware(['admin'])->group(function() {
        Route::group(['prefix' => 'dashboard'], function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        
        });
    
        Route::prefix('dokter')->group(function () {
            Route::get('/', [DokterController::class, 'index'])->name('dokter');
            Route::get('/jadwal', [DokterController::class, 'jadwal'])->name('dokter.jadwal');
            Route::get('/create', [DokterController::class, 'create'])->name('dokter.create');
            Route::get('/jadwal/create', [DokterController::class, 'createJadwal'])->name('dokter.jadwal.create');
        });
    
        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('user');
            Route::get('/create', [UserController::class, 'create'])->name('user.create');
        });
    });
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
// });

