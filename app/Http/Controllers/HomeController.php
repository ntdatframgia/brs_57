<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('frontend.index', ['books' => $books]);
    }

    public function detailBook($id)
    {
        $book = Book::findOrFail($id);
        $comment = Comment::where('book_id', $id)->paginate(1);
        return view('frontend.detail', ['book' => $book, 'comments' => $comment]);
    }
}
