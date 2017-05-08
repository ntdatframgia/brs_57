<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;
use File;
use Auth;
use Illuminate\Support\Facades\Validator;
use CustomUpload;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->paginate();

        return view('admin.user.list', ['users' => $users]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
            $input  = $request->all();
            $input['role'] = config('custom.role');
            $input['avatar'] = CustomUpload::upload($input['avatar'], 'avatar');
            $this->userRepository->create($input);
        } catch (Exception $e) {
            return back()->with('status', trans('messages.create_error'));
        }
        return redirect()->action('UserController@index')->with('status', $request->email . trans('messages.create_successs'));
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
        $user = $this->userRepository->find($id);
        return view('admin.user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        try {
            $user = $this->userRepository->find($id);
            $imageUrl = public_path($input['user_avatar']);
            $input = $request->all();
            if (File::exists($imageUrl)) {
                File::delete($imageUrl);
            }
            $input['avatar'] = CustomUpload::upload($input['avatar'], 'avatar');
            $user->update($input);
            return redirect()->action('UserController@index')->with('status', $user->email . trans('messages.updated_success'));
        } catch (Exception $e) {
            return back()->with('status', trans('messages.update_error'));
        }
    }

    public function destroy($id)
    {
        $user = $this->userRepository->find($id);
        $user->destroy($id);
        return redirect()->action('UserController@index')->with('status', $user->email . trans('messages.deleted_success'));
    }
}
