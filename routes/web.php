<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

