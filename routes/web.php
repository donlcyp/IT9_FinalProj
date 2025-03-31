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
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');
    
    // Group all authenticated routes

    Route::post('/admin/books', [BookController::class, 'store'])->name('admin.books.store');
    // Group all authenticated routes

    Route::get('/dashboard', [BookController::class, 'index'])->name('dashboard');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/favorites', [BookController::class, 'favorites'])->name('favorites');
    
    // Home route (if distinct from dashboard)
    Route::get('/home', function () {
        return redirect()->route('dashboard');
    })->name('home');
    
    Route::get('/catalogs/selection', [CatalogController::class, 'selection'])->name('catalog.selection'); // Catalog selection route
    Route::get('/catalogs/{genre}', [CatalogController::class, 'show'])->name('genre.show')->middleware('auth'); // General catalog show route
    Route::get('/catalogs', [CatalogController::class, 'index'])->name('catalogs')->middleware('auth');

    Route::get('/genre/{id}', [BookController::class, 'show'])->name('genre.show'); // New route for displaying a specific genre
    Route::get('/books/borrow/{id}', [CatalogController::class, 'borrow'])->name('books.borrow');
    
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
