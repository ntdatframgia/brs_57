<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as requestBook;

class RequestBookController extends Controller
{
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
        return view('frontend.request');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $publicDate = date('Y-m-d', strtotime($request->public_date));
        $userRequest = new requestBook;
        $userRequest->user_id = Auth()->user()->id;
        $userRequest->book_name = $request->name;
        $userRequest->author = $request->author;
        $userRequest->public_date = $publicDate;
        $userRequest->save();
        return redirect()->route('request.show', Auth()->user()->id)->with('status', 'Request Send Successfully!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listRequest = requestBook::where('user_id', $id)->get();
        return view('frontend.listrequest', ['requests' => $listRequest]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteRequest = requestBook::find($id);
        $deleteRequest->delete();
        return back()->with('status', 'Deleted Successfully!!!!!');
    }
}
