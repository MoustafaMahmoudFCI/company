<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortoflioRequest extends FormRequest
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
            'title' => 'required|array|min:2' ,
            'title.*' => 'required|min:3' ,
            'desc' => 'required|array|min:2' ,
            'desc.*' => 'required|min:3' ,
            'cat_id' => 'required' ,
            'image' => 'required|image|mimes:png,jpg,jpeg' ,
        ];
    }
}
