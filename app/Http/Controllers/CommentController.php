<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\CommentRepositoryInterface as CommentRepository;

class CommentController extends Controller
{
    private $commentRepository;

    public function __construct(Commentrepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $comment = $this->commentRepository->create($input);
            $action = 'store';
            return view('layouts.boxComment', ['comment' => $comment, 'action' => $action]);
        }
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
        //
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
        if ($request->ajax()) {
            $input['comment'] = $request->data;
            $comment = $this->commentRepository->update($input, $request->id);
             return response()->json([
                    'data' => $request->data,
                    'updated_at' => $comment->updated_at->diffForHumans(),
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $comment = $this->commentRepository->destroy($id);
            return 'succsess';
        } else {
            $comment = $this->commentRepository->destroy($id);
            return back()->with('status', trans('deleted_success'));
        }
    }
}
