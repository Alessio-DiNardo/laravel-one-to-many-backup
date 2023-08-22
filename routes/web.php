<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\guest\HomeController as GuestHomeController;

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


Auth::routes();

Route:: prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/home', [ AdminDashboardController::class , 'home'])->name('home');
});

Route:: prefix('guest')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [ GuestHomeController::class , 'home'])->name('home');
});
