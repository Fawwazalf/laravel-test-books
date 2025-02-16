<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
{
    $books = Book::with('author')->paginate(10, ['*'], 'books_page');
    $authors = Author::with('books')->paginate(10, ['*'], 'authors_page');

    return view('welcome', compact('books', 'authors'));
}



    public function create()
    {
        $authors = Author::orderBy('name')->get();
        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'serial_number' => 'required|string|max:255|unique:books,serial_number',
            'published_at' => 'required|date',
            'author_id' => 'required|integer|exists:authors,id',
        ]);

        Book::create($data);

        return redirect('/')->with('message', 'Book created successfully.');
    }

    public function edit(Book $book)
    {
        $authors = Author::orderBy('name')->get();
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(Book $book, Request $request)
    {
        $bookId = $book->getKey();
        $data = $request->validate([
            'title' => 'required|max:255',
            'serial_number' => 'required|string|max:255|unique:books,serial_number,' . $bookId,
            'published_at' => 'required|date',
            'author_id' => 'required|integer|exists:authors,id',
        ]);

        $book->update($data);

        return redirect('/')->with('message', 'Book updated successfully.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect('/')->with('message', 'Book deleted successfully.');
    }
}
