<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('products/{slug}', [PostController::class, 'show'])->name('posts.show');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    ;
});