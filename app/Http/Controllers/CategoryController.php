<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Repositories\Contracts\CategoryRepositoryInterface as CategoryRepository;

class CategoryController extends Controller
{
    private $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepository->all();
        return view('admin.category.list', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->categoryRepository->all();
        $listCate = $this->categoryRepository->recursive($data, 0, '--');
        return view('admin.category.add', ['listCate' => $listCate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            $input = $request->all();
            $this->categoryRepository->create($input);
        } catch (Exception $e) {
            return back()->with('status', trans('create_error'));
        }
        return redirect()->action('CategoryController@index')->with('status', $request->category_name . trans('created_success'));
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
        $category = $this->categoryRepository->find($id);
        $data = $this->categoryRepository->all();
        $listCate = $this->categoryRepository->recursive($data, 0, '--');
        return view('admin.category.edit', ['category' => $category, 'listCate' => $listCate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try {
             $category = $this->categoryRepository->find($id);
            $input = $request->all();
            $this->categoryRepository->update($input, $id);
        } catch (Exception $e) {
            return redirect()->action('CategoryController@index')->with('status', $request->name . trans('messages.updated_error'));
        }
        return redirect()->action('CategoryController@index')->with('status', $request->name . trans('messages.updated_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parent = Category::where('parent_id', $id)->count();
        if ($parent == 0) {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect()->action('CategoryController@index')->with(['status' => $category->name .trans('messages.deleted_success'), 'flag' => 'alert-success']);
        } else {
            return back()->with(['status' => trans('messages.delete_error'), 'flag' => 'alert-warning']);
        }
    }
}
