<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;

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

Route::get('/', function () {
    return view('welcome');
});

//Login
Route::get('/login', [AuthController::class, 'login'])->name('signin');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

//Register
Route::get('/register', [AuthController::class, 'registration'])->name('signup');
Route::post('/register', [AuthController::class, 'createAcc'])->name('createAccount');

//Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Landing page
Route::get('/landing', [AuthController::class, 'landing'])->name('landing');

//Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Profile
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

//Admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

//Dashboard
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');