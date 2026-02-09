<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\SettingController;
use Rakibhstu\Banglanumber\NumberToBangla;

Route::get('/', [FrontendController::class, 'index']);
//Route::get('/ldtax-holdings/individual-rashid-print-offline/{token}', [FrontendController::class, 'print'])->name('dakhila');
//Route::get('/user/dakhila/{user_code}', [FrontendController::class, 'dakhila'])->name('user.dakhila');

// Dakhila print page (PUBLIC / PRINT)
Route::get('/ldtax-holdings/individual-rashid-print-offline/{user_code}', [FrontendController::class, 'dakhila'])->name('user.dakhila');
Route::get('user/dakhila/{user_code}', [FrontendController::class, 'qrDakhila'])->name('user.qr-dakhila');
Route::get('/iframe-design/{user_code}', function ($user_code) {
    $numto = new NumberToBangla();
    $user = User::with(['userLandInfo', 'userRevenueInfo'])
        ->where('user_code', $user_code)
        ->firstOrFail();
    $allSetting = getSettingsData(['form_number','cromik_number','appendix','paragraph','fiscal_year','form_title','bd_form_title','cromik_number_title','fiscal_year_title','footer_title','appendix_title']);
    return view('design',compact('user','allSetting','numto'));
})->name('user.iframe-dakhila');

Route::get('/login', [AuthController::class, 'showLoginForm'])->middleware('guest')->name('login');

Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login.submit');



Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('user')->name('user.')->group(function () {

            Route::get('/user-list', [AdminUserController::class, 'index'])->name('list');
            Route::get('/create-user', [AdminUserController::class, 'create'])->name('create');
            Route::post('/save-user', [AdminUserController::class, 'save'])->name('store');
            Route::post('/update-user/{id}', [AdminUserController::class, 'update'])->name('update');
            Route::post('/save-user-info/{id}', [AdminUserController::class, 'saveInfo'])->name('store-info');
            Route::get('/search-user', [AdminUserController::class, 'search'])->name('search');
            Route::get('/user-details/{id}', [AdminUserController::class,'edit'])->name('edit');
            Route::get('/user-info/{id}', [AdminUserController::class,'info'])->name('info');
            Route::get('/delete-user/{id}', [AdminUserController::class,'destroy'])->name('delete');
        });

    Route::get('/site-setting', [SettingController::class, 'index'])->name('site-setting');
    Route::post('/update-setting', [SettingController::class, 'update'])->name('update-site-setting');


});
