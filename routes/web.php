<?php

use App\Http\Controllers\SanksiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::resource('sanksi', SanksiController::class);
Route::get('/sanksi/{id}', [SanksiController::class, 'show'])->name('sanksi.show');

// autocomplete
Route::get('/user/search', [UserController::class, 'search'])->name('user.search');
Route::get('/autocomplete-siswa', [SanksiController::class, 'autocomplete']);
Route::get("/search",[UserController::class,'search']);
