<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return hybridly('welcome');
});

Route::get('login', function () {
    return redirect()->route('auth.login');
})->name('login');

Route::group(['prefix' => 'auth', 'as' => 'auth.', 'middleware' => 'guest'], function () {
    Route::resource('register', RegisterController::class)->only(['index', 'store'])->names([
        'index' => 'register',
        'store' => 'register.store',
    ]);
    Route::resource('login', LoginController::class)->only(['index', 'store'])->names([
        'index' => 'login',
        'store' => 'login.store',
    ]);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::post('logout', [LogoutController::class, 'store'])->name('logout');
});
