<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use File;
use Hash;
use Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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
        $users = User::all();

        return view('admin.user.list', ['users' => $users]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('admin.user.add', ['user' => $user]);
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
            'fullname' => 'required|min:6',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|',
            'avatar' => 'required|image|max:2000',
        ];
        $this->validate($request, $validate);
        $newuser = new User;
        $newuser->fullname = $request->fullname;
        $newuser->email = $request->email;
        $newuser->password = $request->password;
        $file = $request->file('avatar');
        $newuser->avatar = time() . '.' . $file->extension();
        $newuser->role = config('custom.role');
        $this->uploadavatar($request);
        $newuser->save();
        return redirect('users')->with('status', $request->email . ' Created Successfully !!!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          //dd('fasdfasd');
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
        $user = User::findOrFail($id);
        return view('admin.user.edit', ['user' => $user]);
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
        $user = User::findOrFail($id);
        $validate =[
            'fullname' => 'required|min:6',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'password' => 'confirmed|',
            'avatar' => 'image|max:2000',
        ];
        $this->validate($request, $validate);
        $user->email = $request->email;
        $user->fullname = $request->fullname;
        $file = $request->file('avatar');
        if ($request->password != null) {
            if (Hash::check($request->password, $user->password) == false) {
                $user->password = $request->password;
            }
        }

        if ($file != null) {
            File::delete($this->getPathAvatar());
            $this->uploadavatar($request);
            $user->avatar = time() . '.' . $file->extension();
        }
        $user->update();
        return redirect('/users')->with('status', $user->email . ' profile updated');
    }


    public function uploadavatar(Request $request)
    {
        $file = $request->file('avatar');
        $filename = time() . '.' . $file->extension();
        $file->storeAs('avatar/', $filename);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('users/')->with('status', $user->email . 'Deleted Successfully!!!');
    }
}
