<?php
namespace App\Http\Controllers;

use App\Models\Genre; // Import the Genre model
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('dashboard', compact('books'));
    }

    public function show($id) // Method to display a specific genre and its books
    {
        $genre = Genre::findOrFail($id); // Fetch the genre by ID
        $books = $genre->books; // Fetch books associated with the genre
        return view('genre.show', compact('genre', 'books')); // Pass both variables to the view
    }

    public function create()
    {
        $genres = Genre::all(); // Fetch all genres
        return view('admin', compact('genres')); // Pass genres to the view
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;

        if ($request->hasFile('cover_image')) {
            $book->cover_image = $request->file('cover_image')->store('covers', 'public');
        }

        $book->save();

        return redirect()->route('dashboard')->with('success', 'Book added successfully.');
    }

    public function favorites()
    {
        $favorites = Book::where('is_favorite', true)->get();
        return view('favorites', compact('favorites'));
    }
}
