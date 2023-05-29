<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('phpinfo', function () {
    phpinfo();
});

// Auth
Auth::routes();
Route::get('/auth/{driver}/redirect', [SocialiteController::class, 'redirectToProvider'])->name('google.login');
Route::get('/auth/{driver}/callback', [SocialiteController::class, 'handleProviderCallback']);

// Home
// Route::get('/', function () {return redirect()->route('home');});
// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::view('/', 'home')->name('home');

// Files Controller
Route::get('/files/{filenName}/{group?}', [FilesController::class, 'getFile'])->name('getFile');

Route::prefix('admin')->middleware('auth')->group(function () {

    // Users

    Route::get('users/get-index-table', [UserController::class, 'getIndexTable'])->name('users.getIndexTable');
    Route::resource('users', UserController::class);

    // Roles
    Route::get('roles/get-index-table', [RoleController::class, 'getIndexTable'])->name('roles.getIndexTable');
    Route::resource('roles', RoleController::class);

});

Route::fallback(function () {

    return redirect()->route('home')->with('toast_errors', 'Algo salio mal!.');

});
