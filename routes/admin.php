<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::name('admin.post.')->prefix('/admin/post')->group(function () {

    Route::get('/index', [PostController::class, 'index'])->name('index');
    Route::get('/create', [PostController::class, 'create'])->name('create');
    Route::get('/edit', [PostController::class, 'create'])->name('edit');

});




