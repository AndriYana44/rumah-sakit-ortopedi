<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\PostinganController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Compro\HomeController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Compro\PostController;
use App\Http\Controllers\Middle\ComproApiController;

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
Route::get('/blog',[HomeController::class,'blog'])->name('blog');
Route::get('/blog-details',[HomeController::class,'blogDetails'])->name('blog.details');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/post/{id}', [PostController::class, 'index'])->name('post');

// API
Route::get('/get-dokter-api', [ComproApiController::class, 'getDokter'])->name('get.dokter.api');
Route::get('/get-dokter-jadwal-api', [ComproApiController::class, 'getJadwal'])->name('get.dokter.jadwal.api');

// Auth
Route::middleware(['guest'])->group(function() {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/signout', [AuthController::class, 'signout'])->name('signout');

    Route::middleware(['admin'])->group(function() {
        Route::group(['prefix' => 'dashboard'], function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        
        });
    
        Route::prefix('dokter')->group(function () {
            Route::get('/', [DokterController::class, 'index'])->name('dokter');
            Route::get('/jadwal', [DokterController::class, 'jadwal'])->name('dokter.jadwal');
            Route::get('/create', [DokterController::class, 'create'])->name('dokter.create');
            Route::get('/edit/{id}', [DokterController::class, 'edit'])->name('dokter.edit');
            Route::post('/store', [DokterController::class, 'store'])->name('dokter.store');
            Route::put('/update', [DokterController::class, 'update'])->name('dokter.update');
            Route::delete('/delete/{id}', [DokterController::class, 'destroy'])->name('dokter.delete');
            Route::prefix('jadwal')->group(function () {
                Route::get('/edit/{id}', [DokterController::class, 'editJadwal'])->name('dokter.jadwal.edit');
                Route::post('/update', [DokterController::class, 'updateJadwal'])->name('dokter.jadwal.update');
            });
        });
    
        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('user');
            Route::get('/create', [UserController::class, 'create'])->name('user.create');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
            Route::post('/store', [UserController::class, 'store'])->name('user.store');
            Route::put('/update', [UserController::class, 'update'])->name('user.update');
            Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
        });

        Route::prefix('postingan')->group(function() {
            Route::get('/', [PostinganController::class, 'index'])->name('postingan');
            Route::get('/create', [PostinganController::class, 'create'])->name('postingan.create');
            Route::get('/edit/{id}', [PostinganController::class, 'edit'])->name('postingan.edit');
            Route::post('/store', [PostinganController::class, 'store'])->name('postingan.store');
            Route::put('/update', [PostinganController::class, 'update'])->name('postingan.update');
            Route::delete('/delete/{id}', [PostinganController::class, 'destroy'])->name('postingan.delete');
        });
    });

    Route::prefix('api')->group(function() {
        Route::post('/dokter-jadwal', [DokterController::class, 'apiDokterJadwal'])->name('api.dokter.jadwal');
    });

    Route::post('/upload', [PostinganController::class, 'upload'])->name('ckeditor.upload');
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
// });

