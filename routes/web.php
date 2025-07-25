<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', [PageController::class,'index'])->name('page.index');
Route::get('/detail/{slug}',[PageController::class,'detail'])->name('page.detail');
Route::get('/category/{slug}', [PageController::class, 'postByCategory'])->name('page.category');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/test', [HomeController::class, 'test'])->name('test');

Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::resource('/category', CategoryController::class);
    Route::resource('/post', PostController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/nation', NationController::class);
    Route::resource('/photo', PhotoController::class);
});

Route::get('/file-test', function () {
    return Storage::allFiles('public');
});

