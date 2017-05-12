<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\BookRepositoryInterface as BookRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
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

    public function detail($id)
    {
        $book = $this->bookRepository->find($id);
        return view('frontend.detail', ['book' => $book]);
    }
}
