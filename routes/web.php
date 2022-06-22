<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SocialController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/user-login/{number}', [HomeController::class, 'login'])->name('user-login');
Route::get('/login-otp', [HomeController::class, 'loginWithOtp'])->name('login-otp');
Route::post('/add-user', [HomeController::class, 'register'])->name('add-user');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/add-job', [HomeController::class, 'addJob'])->name('add-job');
    Route::get('/edit-job/{id}', [HomeController::class, 'editJob'])->name('edit-job');
    Route::post('/submit-job', [HomeController::class, 'submitJob'])->name('submit-job');
    Route::get('/dashboard', [HomeController::class, 'viewUser'])->name('dashboard');

});


