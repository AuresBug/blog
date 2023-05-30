<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('phpinfo', function () {
    phpinfo();
});

// Auth
Auth::routes(['verify' => true]);
Route::get('/auth/{driver}/redirect', [SocialiteController::class, 'redirectToProvider'])->name('google.login');
Route::get('/auth/{driver}/callback', [SocialiteController::class, 'handleProviderCallback']);

// HomeController
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

// Route::get('/home', function () {return redirect()->route('welcome');});
Route::get('/dashboard', function () {return redirect()->route('dashboard');});

// Files Controller
Route::get('/files/{filenName}/{group?}', [FilesController::class, 'getFile'])->name('getFile');

Route::prefix('admin')->middleware('auth', 'verified')->group(function () {

    // Home

    Route::get('/', function () {return redirect()->route('dashboard');})->name('home');
    // Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    // Route::get('/', function () {return redirect()->route('home');});

    // Users

    Route::get('users/get-index-table', [UserController::class, 'getIndexTable'])->name('users.getIndexTable');
    Route::resource('users', UserController::class);

    // Roles
    Route::get('roles/get-index-table', [RoleController::class, 'getIndexTable'])->name('roles.getIndexTable');
    Route::resource('roles', RoleController::class);

    // Posts
    Route::get('posts/get-index-table', [PostController::class, 'getIndexTable'])->name('posts.getIndexTable');
    Route::resource('posts', PostController::class);

});

Route::fallback(function () {

    return redirect()->route('welcome')->with('toast_errors', 'Algo salio mal!.');

});
