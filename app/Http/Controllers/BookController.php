<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BookController extends Controller
{
    
    public function book()
    {
        $books = Book::all();
        
        return view('books', compact('books'));
    }

    public function index()
    {
        $books = Book::paginate(4);
        
        return view('index', compact('books'));
    }
}

