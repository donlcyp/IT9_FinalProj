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

// Group all authenticated routes
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [BookController::class, 'index'])->name('dashboard');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/favorites', [BookController::class, 'favorites'])->name('favorites');
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Home route (if distinct from dashboard)
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    // Catalog route
    Route::get('/catalogs', [CatalogController::class, 'index'])->name('catalogs');
    
    // Transaction route
    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction');
    
    // Favorites route
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites');
    
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';