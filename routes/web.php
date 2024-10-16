<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/demo', function () {
    return view('demo');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
    Route::post('posts/{post}', [CommentController::class, 'store'])->name('comments.store');


    //komentar
    Route::resource('comments', CommentController::class)->only(['edit', 'update', 'destroy']);


    // Route::put('comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    // Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
