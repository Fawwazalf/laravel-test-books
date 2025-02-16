<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return view('authors.index', [
            'authors' => Author::paginate()
        ]);
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

        return back()->with('message', 'Author created successfully');
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Author $author, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:authors,email,' . $author->id
        ]);

        $author->update($data);

        return back()->with('message', 'Author updated.');
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return back()->with('message', 'Author deleted.');
    }
}
