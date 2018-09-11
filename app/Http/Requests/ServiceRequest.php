<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'icon' => 'required|string|min:5' ,
            'name' => 'required|array|min:2' ,
            'name.*' => 'required|min:5' ,
            'desc' => 'required|array|min:2',
            'desc.*' => 'required|min:6'
        ];
    }
}
