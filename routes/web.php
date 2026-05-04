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
Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth')->name('post.create');
Route::post('/posts', [PostController::class, 'store'])->name('post.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('post.update');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.delete');

// News route
Route::group(['namespace' => 'App\Http\Controllers\News'], function () {
    Route::get('/news', 'IndexController')->name('news.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'IndexController')->name('admin.index');

    Route::group(['namespace' => '\App\Http\Controllers\Admin\News', 'prefix' => 'news'], function () {
        Route::get('/', 'IndexController')->name('admin.news.index');
    });

    Route::group(['namespace' => '\App\Http\Controllers\Admin\Section', 'prefix' => 'sections'], function () {
        Route::get('/{page?}', 'IndexController')->where('page', '.*')->name('admin.sections.index');
    });

    Route::group(['namespace' => '\App\Http\Controllers\Admin\Author', 'prefix' => 'authors'], function () {
        Route::get('/', 'IndexController')->name('admin.authors.index');
    });
});
