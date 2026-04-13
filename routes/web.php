<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('main.index');

Route::get('/about', [AboutController::class, 'index'])->name('about.index');

// Posts route
Route::get('/posts', [PostController::class, 'index'])->name('post.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts', [PostController::class, 'store'])->name('post.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('post.update');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.delete');
