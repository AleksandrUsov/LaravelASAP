<?php

use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\Post;
use App\Models\User;
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
    Route::get('/post/{post}', [\App\Http\Controllers\Api\PostController::class, 'show'])->name('show');
});

Route::name('api.users.')->prefix('/users')->group(function () {
    Route::get('/', [\App\Http\Controllers\Api\UserController::class, 'index'])->name('index');
    Route::get('/users/{user}', [\App\Http\Controllers\Api\UserController::class, 'show'])->name('show');
});

Route::name('api.categories.')->prefix('/categories')->group(function () {
    Route::get('/', [\App\Http\Controllers\Api\CategoryController::class, 'index'])->name('index');
    Route::get('/category/{category}', [\App\Http\Controllers\Api\CategoryController::class, 'show'])->name('show');
});

