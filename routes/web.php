<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/authors', [AuthorController::class, 'index'])
    ->name('authors.index');

Route::get('/authors/create', [AuthorController::class, 'create'])
    ->name('authors.create');

Route::post('/authors/create', [AuthorController::class, 'store'])
    ->name('authors.store');

Route::get('/authors/edit/{author}', [AuthorController::class, 'edit'])
    ->name('authors.edit');

Route::post('/authors/edit/{author}', [AuthorController::class, 'update'])
    ->name('authors.update');

Route::post('/authors/delete/{author}', [AuthorController::class, 'destroy'])
    ->name('authors.delete');

Route::get('/books', [BookController::class, 'index'])
    ->name('books.index');

Route::get('/books/create', [BookController::class, 'create'])
    ->name('books.create');

Route::post('/books/create', [BookController::class, 'store'])
    ->name('books.store');

Route::get('/books/edit/{book}', [BookController::class, 'edit'])
    ->name('books.edit');

Route::post('/books/edit/{book}', [BookController::class, 'update'])
    ->name('books.update');

Route::post('/books/delete/{book}', [BookController::class, 'destroy'])
    ->name('books.delete');
