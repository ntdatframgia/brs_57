<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        if ($request->_method = 'PUT') {
            $arr = [
            'fullname' => 'required|min:6',
            'email' => 'required|email|max:255|unique:users,email,' . $request->id,
            'avatar' => 'image|max:2000',
            ];
            if ($request->has('password')) {
                $arr['password'] = 'confirmed|required|min:6|max:32';
            }
            return $arr;
        } else {
            return [
            'fullname' => 'required|min:6',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6|max:32',
            'avatar' => 'required|image|max:2000',
            ];
        }
    }
}
