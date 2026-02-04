<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminUserController;

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

    Route::get('/user-list', [AdminUserController::class, 'index'])->name('user-list');
    Route::get('/search-user', [AdminUserController::class, 'search'])->name('search-user');
    Route::get('/user-details/{id}', [AdminUserController::class,'view'])->name('user-details');
    Route::get('/delete-user/{id}', [AdminUserController::class,'destroy'])->name('delete-user');



});
