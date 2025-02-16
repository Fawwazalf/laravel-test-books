<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('books.index', [
            'books' => Book::paginate(10)
        ]);
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

        return back()->with('message', 'Book created.');
    }

    public function edit(Book $book)
    {
        $authors = Author::orderBy('name')->get();
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(Book $book, Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'serial_number' => 'required|string|max:255|unique:books,serial_number,' . $book->id,
            'published_at' => 'required|date',
            'author_id' => 'required|integer|exists:authors,id',
        ]);

        $book->update($data);

        return back()->with('message', 'Book updated.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return back()->with('message', 'Book deleted.');
    }
}
