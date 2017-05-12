<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
    public function rules()
    {
        if ($this->isMethod('PUT')) {
            return [
                'title' => 'required',
                'author' => 'required',
                'description' => 'required',
                'public_date' => 'date|required',
                'img' => 'image|max:2000',
                'number_of_page' => 'min:1|required|integer',
                'category_id' => 'required',
            ];
        } else {
            return [
                'title' => 'required',
                'category_id' => 'required',
                'author' => 'required',
                'description' => 'required',
                'public_date' => 'date|required',
                'img' => 'image|max:2000',
                'number_of_page' => 'min:1|required|integer',
            ];
        }
    }
}
