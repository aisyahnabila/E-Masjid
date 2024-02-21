<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\MasjidController;
use App\Http\Controllers\UserProfileController;
use App\Http\Middleware\EnsureDataMasjidCompleted;
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
Route::get('logout-user', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout-user');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware(EnsureDataMasjidCompleted::class)->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
    });
    Route::resource('userprofile', UserProfileController::class);
    Route::resource('kas', KasController::class);
    Route::resource('masjid', MasjidController::class);
});
