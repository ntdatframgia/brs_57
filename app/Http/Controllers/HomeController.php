<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\BookRepositoryInterface as BookRepository;
use App\Repositories\Contracts\CommentRepositoryInterface as CommentRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $bookRepository;
    private $commetRepository;

    public function __construct(BookRepository $bookRepository, CommentRepository $commentRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->commentRepository = $commentRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->bookRepository->paginate(4);
        return view('frontend.index', ['books' => $books]);
    }

    public function detail(Request $request, $id)
    {
        $data['book'] = $this->bookRepository->find($id);
        $data['comments'] = $this->commentRepository->where('book_id', $id)->orderBy('id', 'desc')->paginate(4);
        $data['action'] = 'load';
        if ($request->ajax()) {
            return response()->json([
                'current_page' => $data['comments']->currentPage(),
                'count' => $data['comments']->count(),
                'total' => $data['comments']->total(),
                'last_page' => $data['comments']->lastPage(),
                'nextPage' => $data['comments']->nextPageUrl(),
                'html' => view('layouts.boxComment', $data)->render(),
            ]);
        }
        return view('frontend.detail', $data);
    }
}
