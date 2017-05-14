<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\MarkRepositoryInterface as MarkRepository;
use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;

class MarkController extends Controller
{
    private $markRepository;

    public function __construct(MarkRepository $markRepository, UserRepository $userRepository)
    {
        $this->markRepository = $markRepository;
        $this->userRepository = $userRepository;
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
            if (empty($request->id)) {
                $mark = $this->markRepository->create($input);
                return $mark;
            } else {
                return $this->update($input, $request->id);
            }
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
    public function update($input, $id)
    {
        $user = $this->userRepository->find($input['user_id']);
        return $user->marks()->toggle([$id => ['favorite' => 0, 'read_status' => 0, 'book_id' => $input['book_id']]]);
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
}
