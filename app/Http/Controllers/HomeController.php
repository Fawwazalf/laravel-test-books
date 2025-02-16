<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;


class HomeController extends Controller
{
    public function home()
    {
        $books = Book::with('author')->paginate(10, ['*'], 'books_page');
        $authors = Author::with('books')->paginate(10, ['*'], 'authors_page');
    
        return view('welcome', compact('books', 'authors'));
    }
}
