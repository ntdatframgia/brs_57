<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Comment;
use App\Models\Mark;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('category')->get();
        $mark = Mark::Where('user_id', Auth::user()->id)->get();
        return view('frontend.index', ['books' => $books, 'mark' => $mark]);
    }

    public function detailBook(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $comments = Comment::where('book_id', $id)->orderBy('created_at', 'desc')->paginate(4);
        if ($request->ajax()) {
            return response()->json([
                'current_page' => $comments->currentPage(),
                'count' => $comments->count(),
                'total' => $comments->total(),
                'last_page' => $comments->lastPage(),
                'nextPage' => $comments->nextPageUrl(),
                'html' => view('layouts.pagination', ['comments' => $comments])->render(),
            ]);
        }
        return view('frontend.detail', ['book' => $book, 'comments' => $comments]);
    }

}
