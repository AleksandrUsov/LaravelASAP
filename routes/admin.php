<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');

    /** Административная панель | Посты блога */
    Route::name('admin.posts.')->prefix('/admin/posts')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit');

        Route::delete('/destroy/{post}', [PostController::class, 'destroy'])->name('destroy');
        Route::post('/store', [PostController::class, 'store'])->name('store');
        Route::put('/update/{post}', [PostController::class, 'update'])->name('update');
    });

    Route::name('admin.categories.')->prefix('/admin/categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('edit');

        Route::delete('/destroy/{category}', [CategoryController::class, 'destroy'])->name('destroy');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::put('/update/{category}', [CategoryController::class, 'update'])->name('update');
    });
});



