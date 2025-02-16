<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->paginate(10, ['*'], 'books_page');
        $authors = Author::with('books')->paginate(10, ['*'], 'authors_page');
    
        return view('welcome', compact('books', 'authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:authors,email'
        ]);

        Author::create($data);

        return redirect('/')->with('message', 'Author created successfully.');
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Author $author, Request $request)
    {
        $authorId = $author->getKey();
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:authors,email,' . $authorId
        ]);

        $author->update($data);

        return redirect('/')->with('message', 'Author updated successfully.');
    }

    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return redirect('/')->with('message', 'Author deleted successfully.');
    }
}
