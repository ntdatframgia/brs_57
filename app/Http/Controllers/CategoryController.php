<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminRole');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.list', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::select('id', 'name', 'parent_id')->get();

        return view('admin.category.add', ['listcate' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = [
            'name' => 'required|unique:categories',
        ];
        $this->validate($request, $validate);
        $category = new Category;
        $category->name = $request->name;
        $category->parent_id = $request->parent;
        $category->save();
        return redirect('/category')->with('status', $request->category_name . ' Added Successfully !!!');
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
        $category = Category::findOrFail($id);
        $listcate = Category::select('id', 'name', 'parent_id')->get();
        return view('admin.category.edit', ['category' => $category, 'listcate' => $listcate]);
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
        $category = Category::findOrFail($id);
        $validate = [
            'name' => 'required|unique:categories,name,' . $category->id,
        ];
        $this->validate($request, $validate);
        $category->name = $request->name;
        if ($request->parent != 0) {
            $parent = Category::findOrFail($request->parent);
            if ($parent->parent_id == $category->id) {
                $parent->parent_id = $category->parent_id;
                $parent->update();
            } else {
                if ($request->parent == $category->id) {
                    return back();
                }
            }
            $category->parent_id = $request->parent;
            $category->update();
            return redirect('/category')->with('status', $request->name . ' Updated Successfully !!!');
        } else {
            $category->parent_id = $request->parent;
            $category->update();
            return redirect('/category')->with('status', $request->name . ' Updated Successfully !!!');
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
        $parent = Category::where('parent_id', $id)->count();
        if ($parent == 0) {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect('/category')->with(['status' => $category->name .' Deleted Successfully', 'flag' => 'alert-success']);
        } else {
            return back()->with(['status' => 'Cannot delete this category', 'flag' => 'alert-warning']);
        }
    }

    public function getdDeleted()
    {
        $softDelete = Category::withTrashed()->get();
        //$deleteted = Category::where('deleted_at', '<>', null)->get();
        return view('admin.category.deleted', ['items' => $softDelete]);
    }

    public function restore($id)
    {
        $category = Category::withTrashed()->where('id',$id)->get()->first();
        $category->restore();
        return redirect('/category/deleted')->with([
            'status' => $category->name . ' Restored Successfully !!!',
            'flag' => ' alert-success',
            ]);
    }
}
