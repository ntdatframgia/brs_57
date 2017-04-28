<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use File;


class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.book.list', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCate = Category::select('id', 'name', 'parent_id')->get();
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
        $validate =[
            'name' => 'required',
            'parent' => 'required',
            'author' => 'required',
            'description' => 'required',
            'public_date' => 'date|required|',
            'image' => 'required|image|max:2000',
            'number_of_page' => 'required',
        ];
        $publicDate = date('Y-m-d', strtotime($request->public_date));

        $this->validate($request, $validate);
        $book = new Book;
        $book->name = $request->name;
        $book->public_date = $publicDate;
        $book->author = $request->author;

        $book->description = $request->description;
        $book->number_of_page = $request->number_of_page;
        $book->category_id = $request->parent;
        $book->rate = config('custom.rate');
        $file = $request->file('image');
        $book->img = time() . '.' . $file->extension();
        $this->uploadImage($request);
        $book->save();
        return redirect('users')->with('status', $request->name . ' Added Successfully !!!');
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
        $book = Book::findOrFail($id);
        $listCate = Category::select('id', 'name', 'parent_id')->get();
        return view('admin.book.edit', ['book' => $book, 'listCate' => $listCate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $validate =[
            'name' => 'required',
            'parent' => 'required',
            'author' => 'required',
            'description' => 'required',
            'public_date' => 'date|required|',
            'image' => 'image|max:2000',
            'number_of_page' => 'required',
        ];
        $this->validate($request, $validate);

        $publicDate = date('Y-m-d', strtotime($request->public_date));

        $book->name = $request->name;
        $book->category_id = $request->parent;
        $book->public_date = $publicDate;
        $book->author = $request->author;
        $file = $request->file('image');
        if ($file != null) {
            File::delete('../storage/app/book/' . $book->img);
            $book->description = $request->description;
            $file = $request->file('image');
            $book->img = time() . '.' . $file->extension();
            $this->uploadImage($request);
        }
        $book->update();
        return redirect('book')->with('status', $request->name . ' Edited Successfully !!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadImage(Request $request)
    {
        $file = $request->file('image');
        $filename = time() . '.' . $file->extension();
        $file->storeAs('book/', $filename);
    }
}
