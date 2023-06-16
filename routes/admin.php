<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    /** Административная панель | Посты блога */
    Route::name('admin.posts.')->prefix('/admin/posts')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('edit');

        Route::delete('/{post}/destroy', [PostController::class, 'destroy'])->name('destroy');
        Route::post('/store', [PostController::class, 'store'])->name('store');
        Route::put('/{post}/update', [PostController::class, 'update'])->name('update');

        Route::delete('/drop', [PostController::class, 'drop'])->name('drop');
        Route::get('/trashcan', [PostController::class, 'trashcan'])->name('trashcan');
        Route::put('/{id}/restore', [PostController::class, 'restore'])->name('restore');
        Route::put('/restore', [PostController::class, 'restoreAll'])->name('restore-all');
    });

    /** Административная панель | Категории блога */
    Route::name('admin.categories.')->prefix('/admin/categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');

        Route::delete('/{category}/destroy', [CategoryController::class, 'destroy'])->name('destroy');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::put('/{category}/update', [CategoryController::class, 'update'])->name('update');
    });

    Route::prefix('/admin/mail')->name('admin.')->group(function () {
        Route::get('/', [MailController::class, 'mail'])->name('mail');
        Route::get('/send', [MailController::class, 'send'])->name('mail.send');
    });
});



