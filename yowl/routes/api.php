<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('user', function (Request $request) {
    return $request->user();
});


Route::get('/categories', [CategoryController::class, 'indexApi']);
Route::prefix('/category')->group(function () {
    Route::post('/store', [CategoryController::class, 'store']);
    Route::put('/{id}', [CategoryController::class, 'update']);
    Route::delete('/{id}', [CategoryController::class, 'destroy']);
});

Route::get('/posts', [PostController::class, 'indexApi']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::prefix('/post')->group(function () {
    Route::post('/store', [PostController::class, 'store']);
    Route::put('/{id}', [PostController::class, 'update']);
    Route::get('/{id}', [PostController::class, 'getById']);
    Route::delete('/{id}', [PostController::class, 'destroy']);
});

Route::get('/users', [UserController::class, 'indexApi']);
Route::prefix('/user')->group(function () {
    Route::post('/store', [UserController::class, 'store']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::get('/{id}', [UserController::class, 'get']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

Route::get('/comments', [CommentController::class, 'indexApi']);
Route::prefix('/comment')->group(function () {
    Route::post('/store', [CommentController::class, 'store']);
    Route::put('/{type}/{id}', [CommentController::class, 'update']);
    Route::get('/{id}', [CommentController::class, 'get']);
    Route::delete('/{id}', [CommentController::class, 'destroy']);
});