<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('verify-email', function () {
    return view('verify_email');
})->name('verify_email');

Auth::routes(['logout' => false, 'verify' => true]);

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Route::group(
    ['prefix' => "/auth/", "middleware" => ["auth", 'checkMail']],
    function () {
        Route::get('', [HomeController::class, 'index'])->name('auth');
        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    }
);
