<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PlatController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PlatController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/plats', [PlatController::class, 'index'])->name('plats.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/plats/create', [PlatController::class, 'create'])->name('plats.create');
    Route::post('/plats', [PlatController::class, 'store'])->name('plats.store');
    Route::get('/plats/{plat}/edit', [PlatController::class, 'edit'])->name('plats.edit');
    Route::put('/plats/{plat}', [PlatController::class, 'update'])->name('plats.update');
    Route::delete('/plats/{plat}', [PlatController::class, 'destroy'])->name('plats.destroy');
    Route::post('/plats/{plat}/favorite', [PlatController::class, 'toggleFavorite'])->name('plats.favorite');
});

Route::get('/plats/{plat}', [PlatController::class, 'show'])->name('plats.show');
