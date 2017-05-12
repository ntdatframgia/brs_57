<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\BookRepositoryInterface as BookRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface as CategoryRepository;
use CustomUpload;
use File;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    private $bookRepository;
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository, BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->bookRepository->paginate();
        return view('admin.book.list', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCate = $this->categoryRepository->all();
        $listCate = $this->categoryRepository->recursive($allCate, 0, '--');
        return view('admin.book.add', ['listCate' => $listCate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $input['rate'] = config('custom.rate');
            $input['img'] = CustomUpload::upload($input['img'], 'book');
            $this->bookRepository->create($input);
        } catch (Exception $e) {
            return redirect()->action('BookController@index')->with('stauts', trans('messages.create_error'));
        }
        return redirect()->action('BookController@index')->with('stauts', trans('messages.created_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = $this->bookRepository->find($id);
        $allCate = $this->categoryRepository->all();
        $listCate = $this->categoryRepository->recursive($allCate, 0, '--');
        return view('admin.book.edit', ['book' => $book, 'listCate' => $listCate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        try {
            $book = $this->bookRepository->find($id);
            $imageUrl = public_path(config('custom.pathBook') . $book->getOriginal('img'));
            $input = $request->all();
            if ($request->img) {
                $input['img'] = CustomUpload::upload($input['img'], 'book');
            }
            $this->bookRepository->update($input, $id);
            return redirect()->action('BookController@index')->with('status', $book->email . trans('messages.updated_success'));
        } catch (Exception $e) {
            return back()->with('status', trans('messages.update_error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = $this->bookRepository->find($id);
        $imageUrl = public_path(config('custom.pathBook') . $book->getOriginal('img'));
        $this->bookRepository->delete($id);
        return redirect()->action('BookController@index')->with('status', trans('messages.deleted_success'));
    }
}
