<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Comment;
use App\Models\Mark;
use Auth;
use App\Models\User;
use App\Models\Activity;
use DB;
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
        $books = Book::paginate(2);
        $mark = Mark::Where('user_id', Auth::user()->id)->get();
        return view('frontend.index', ['books' => $books, 'mark' => $mark]);
    }

    public function detailBook(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $comments = Comment::where('book_id', $id)->orderBy('created_at', 'desc')->paginate(10);
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
    public function profile($id)
    {
        $data['activities'] =[];
        $data['user'] = User::where('id', $id)
            ->with('marks')
            ->with('followings')
            ->with('followers')
            ->get()->first();
        if (empty($data['user'])) {
            return redirect()->route('home.index');
        }

        $data['marks'] = $data['user']->marks;
        $data['followings'] = $data['user']->followings;
        $data['followers'] = $data['user']->followers;
        foreach ($data['followings'] as $key => $following) {
            foreach ($following->activities()->get() as $activity) {
                array_unshift($data['activities'], $activity);
            }
        }
        return view('frontend.profile', $data);
    }
    public function readding($id)
    {
        $marks = Mark::where([
            ['user_id', $id],
            ['read_status', 2],
            ])->get();
        return view('frontend.readding', ['marks' => $marks]);
    }

    public function pageNotFound()
    {
        return view('layouts.error');
    }

    public function search(Request $request)
    {
        $keyWork = '%'.$request->keywork.'%';
        $rate = $request->keywork;
        $result = Book::join('categories', 'books.category_id', '=', 'categories.id')
                 ->select('books.id', 'books.name', 'books.category_id', 'books.number_of_page', 'books.author', 'books.created_at', 'books.updated_at', 'books.public_date', 'books.description', 'books.img', 'books.rate', 'categories.name as category_name')
                 ->orwhere('books.name', 'LIKE', $keyWork)
                 ->orwhere('books.rate', '>=', $rate)
                 ->orwhere('categories.name', 'LIKE', $keyWork)
                 ->paginate(2);
        $mark = Mark::Where('user_id', Auth::user()->id)->get();
        return view('frontend.search', ['books' => $result, 'mark' => $mark]);
    }
}

