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

Route::prefix('/users')->group( function () {
    Route::get('/user/{id}', function ($id) {
        return new UserResource(User::query()->find($id));
    });

    Route::get('/all', function () {
        return UserResource::collection(User::all()->keyBy->id);
    });

    Route::get('/collection', function () {
        return new UserCollection(User::all());
    });
});

Route::prefix('/posts')->group(function () {
    Route::get('/post/{id}', function ($id) {
        return new PostResource(Post::query()->find($id));
    });

    Route::get('/all', function () {
        return PostResource::collection(Post::all());
    });

    Route::get('/collection', function () {
        return new PostCollection(Post::all());
    });
});

