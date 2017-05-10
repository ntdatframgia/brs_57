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
        if ($this->isMethod('PUT')) {
            $arr = [
                'fullname' => 'required|min:6',
                'email' => 'required|email|max:255|unique:users,email,' . $request->id,
                'avatar' => 'image|max:2000',
                'password' => 'confirmed|min:6|max:32',
            ];
            if (strpos($request->password, ' ') !== false) {
                $arr['password'] = 'required|confirmed|min:6|max:32';
            }
            return $arr;
        }
        return [
        'fullname' => 'required|min:6',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|confirmed|min:6|max:32',
        'avatar' => 'required|image|max:2000',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'The password mus not have spaces',
        ];
    }
}
