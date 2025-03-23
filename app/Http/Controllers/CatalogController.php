<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class CatalogController extends Controller
{
    public function index()
    {
        // Logic to show all books
        $books = Book::all(); // Fetch all books from the database
        return view('catalogs', compact('books')); // Return the view with the books data
    }


    public function showCrimeFiction()
    {
        $books = Book::all(); // Fetch all books from the database
        return view('catalogs.books', compact('books'));
    }

    public function borrow($id)
    {
        // Fetch the book details using the provided ID
        $book = Book::find($id);

        // Check if the book exists
        if (!$book) {
            return redirect()->route('catalogs')->with('error', 'Book not found.');
        }

        // Return the view for borrowing the book, passing the book details
        return view('catalogs.book-borrow', compact('book'));
    }
}
