<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;

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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', UserController::class);
Route::resource('/categories', CategoryController::class);
Route::resource('/posts', PostController::class);
Route::resource('/comments', CommentController::class);

// Route::get('scraper', [\App\Http\Controllers\GoutteController::class, 'scraper'])->name('scraper');
// Route::get('scraping', [\App\Http\Controllers\ScrapingController::class, 'scrape']);