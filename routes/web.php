<?php

use App\Http\Controllers\ApartemenController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PenghuniController;
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
    // Route::resource('posts', PostController::class);
    // Route::post('posts/{post}', [CommentController::class, 'store'])->name('comments.store');

    // //komentar
    // Route::resource('comments', CommentController::class)->only(['edit', 'update', 'destroy']);


    // Menampilkan daftar apartemen
    Route::get('apartemen', [ApartemenController::class, 'index'])->name('apartemen.index');

    // Menampilkan form untuk menambahkan apartemen
    Route::get('apartemen/create', [ApartemenController::class, 'create'])->name('apartemen.create');

    // Menyimpan data apartemen baru
    Route::post('apartemen', [ApartemenController::class, 'store'])->name('apartemen.store');

    // Menampilkan detail apartemen berdasarkan ID
    Route::get('apartemen/{apartemen}', [ApartemenController::class, 'show'])->name('apartemen.show');

    // Menampilkan form untuk mengedit apartemen
    Route::get('apartemen/{apartemen}/edit', [ApartemenController::class, 'edit'])->name('apartemen.edit');

    // Mengupdate data apartemen berdasarkan ID
    Route::put('apartemen/{apartemen}', [ApartemenController::class, 'update'])->name('apartemen.update');

    // Menghapus data apartemen berdasarkan ID
    Route::delete('apartemen/{apartemen}', [ApartemenController::class, 'destroy'])->name('apartemen.destroy');



    // Menampilkan daftar penghuni
    Route::get('penghuni', [PenghuniController::class, 'index'])->name('penghuni.index');
    // Menampilkan form untuk menambahkan penghuni
    Route::get('penghuni/create', [PenghuniController::class, 'create'])->name('penghuni.create');
    // Menyimpan data penghuni baru
    Route::post('penghuni', [PenghuniController::class, 'store'])->name('penghuni.store');
    // Menampilkan detail penghuni berdasarkan ID
    Route::get('penghuni/{penghuni}', [PenghuniController::class, 'show'])->name('penghuni.show');
    // Menampilkan form untuk mengedit penghuni
    Route::get('penghuni/{id}/edit', [PenghuniController::class, 'edit'])->name('penghuni.edit');
    // Mengupdate data penghuni berdasarkan ID
    Route::put('penghuni/{id}', [PenghuniController::class, 'update'])->name('penghuni.update');
    // Menghapus data penghuni berdasarkan ID
    Route::delete('penghuni/{penghuni}', [PenghuniController::class, 'destroy'])->name('penghuni.destroy');



    // Menampilkan daftar apartemen beserta penghuninya
    Route::get('/apartemen-penghuni', [ApartemenController::class, 'daftarApartemenPenghuni'])->name('apartemen.penghuni');

    // Route::put('comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    // Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
