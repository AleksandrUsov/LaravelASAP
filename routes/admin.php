<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/** Административная панель | Посты блога */
Route::name('admin.post.')->prefix('/admin/post')->group(function () {

    Route::get('/index', [PostController::class, 'index'])->name('index');
    Route::get('/create', [PostController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit');

    Route::delete('/destroy/{id}', [PostController::class, 'destroy'])->name('destroy');
    Route::post('/store', [PostController::class, 'store'])->name('store');
    Route::put('/update/{id}', [PostController::class, 'update'])->name('update');

});


