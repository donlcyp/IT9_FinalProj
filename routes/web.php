<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard route (main authenticated page)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Group all authenticated routes
    Route::get('/dashboard', [BookController::class, 'index'])->name('dashboard');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name(' books.store');
    Route::get('/favorites', [BookController::class, 'favorites'])->name('favorites');

    // Home route (redirects to dashboard)
    Route::get('/home', function () {
        return redirect()->route('dashboard');
    })->name('home');

    // Catalog routes
    Route::get('/catalogs/selection', [CatalogController::class, 'selection'])->name('catalog.selection');
    Route::get('/catalogs/{genre}', [CatalogController::class, 'show'])->name('genre.show');
    Route::get('/catalogs', [CatalogController::class, 'index'])->name('catalogs');
    Route::get('/books/borrow/{id}', [CatalogController::class, 'borrow'])->name('books.borrow');

    // Genre route
    Route::get('/genre/{id}', [BookController::class, 'show'])->name('genre.show');

    // Transaction route
    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction');

    // Favorites route
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__.'/auth.php';