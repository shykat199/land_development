<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;

Route::get('/', [FrontendController::class, 'index']);


Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('guest')
    ->name('login.submit');



Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/user-list', [DashboardController::class, 'index'])->name('dashboard');
});
