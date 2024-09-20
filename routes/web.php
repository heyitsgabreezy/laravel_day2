<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::prefix('/auth')->name('auth.')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->name('dashboard');

Route::prefix('/pages')->name('pages.')->group(function() {
    Route::get('/one', function () {
        return view('pages.page1');
    })->name('one');

    Route::get('/two', function () {
        return view('pages.page2');
    })->name('two');

    Route::get('/three', function () {
        return view('pages.page3');
    })->name('three');

    Route::get('/four-helper', function () {
        return view('pages.page4-helper');
    })->name('four-helper');
});

Route::prefix('/movies')->name('movies.')->group(function () {
    Route::get('/', [MoviesController::class, 'index'])->name('index');
    Route::get('/create', [MoviesController::class, 'create'])->name('create');
    Route::post('/store', [MoviesController::class, 'store'])->name('store');
    Route::get('/show/{movie}', [MoviesController::class, 'show'])->name('show');
    Route::get('/edit/{movie}', [MoviesController::class, 'edit'])->name('edit');
    Route::put('/update/{movie}', [MoviesController::class, 'update'])->name('update');
    Route::delete('/destroy/{movie}', [MoviesController::class, 'destroy'])->name('destroy');
    Route::get('/print', [MoviesController::class, 'print'])->name('print');
    Route::get('/generate-pdf', [MoviesController::class, 'generatePdf'])->name('generate-pdf');
});

Route::prefix('/books')->name('books.')->group(function () {
    Route::get('/', [BooksController::class, 'index'])->name('index');
    Route::get('/create', [BooksController::class, 'create'])->name('create');
    Route::post('/store', [BooksController::class, 'store'])->name('store');
    Route::get('/show/{book}', [BooksController::class, 'show'])->name('show');
    Route::get('/edit/{book}', [BooksController::class, 'edit'])->name('edit');
    Route::put('/update/{book}', [BooksController::class, 'update'])->name('update');
    Route::delete('/destroy/{book}', [BooksController::class, 'destroy'])->name('destroy');
});

Route::prefix('/posts')->name('posts.')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/create', [PostController::class, 'create'])->name('create');
    Route::post('/store', [PostController::class, 'store'])->name('store');
    Route::get('/show/{post}', [PostController::class, 'show'])->name('show');
    Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit');
    Route::put('/update/{post}', [PostController::class, 'update'])->name('update');
    Route::delete('/destroy/{post}', [PostController::class, 'destroy'])->name('destroy');
});