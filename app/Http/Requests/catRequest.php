<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class catRequest extends FormRequest
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
        return [
             'nom' => 'required|min:3|max:300',
             'status' => 'required',
             'image' => 'required|mimes:jpeg,jpg,png,gif'
        ];
    }
}
