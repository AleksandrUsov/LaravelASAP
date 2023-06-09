<?php

use App\Http\Controllers\Api\Pages\IndexPageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.posts.')->prefix('/posts')->group(function () {
    Route::get('/', [\App\Http\Controllers\Api\PostController::class, 'index'])->name('index');
    Route::get('/{post}', [\App\Http\Controllers\Api\PostController::class, 'show'])->name('show');
});

Route::name('api.users.')->prefix('/users')->group(function () {
    Route::get('/', [\App\Http\Controllers\Api\UserController::class, 'index'])->name('index');
    Route::get('/{user}', [\App\Http\Controllers\Api\UserController::class, 'show'])->name('show');
});

Route::name('api.categories.')->prefix('/categories')->group(function () {
    Route::get('/', [\App\Http\Controllers\Api\CategoryController::class, 'index'])->name('index');
    Route::get('/{category}', [\App\Http\Controllers\Api\CategoryController::class, 'show'])->name('show');
});

Route::name('api.pages.')->prefix('/pages')->group(function () {
    Route::get('/', IndexPageController::class)->name('index');
});


