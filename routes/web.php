<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');
Route::post('/forgot-password', [AuthController::class, 'resetPassword'])->name('reset.password');
Route::post('/register', [AuthController::class, 'createUser'])->name('create.user');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login.user');
Route::get('/verify/{token}', [AuthController::class, 'verify'])->name('verify');
Route::get('/reset-password/{token}', [AuthController::class, 'changePassword'])->name('view.change.password');

Route::post('/reset-password/{token}', [AuthController::class, 'changePasswordPost'])->name('post.password.change');


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'adminuser'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/users', UserController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/post', PostController::class);
});
