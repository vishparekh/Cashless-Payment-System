<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;

class StoreBuyer extends FormRequest
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
        'email'     =>  'required|unique:users,email,'.Input::get('id').'|email',
        'name'      =>  'required',
        'mobile'    =>  'required|numeric|digits:10',
        'rfid'      =>  'nullable|numeric',
            //
        ];
    }
}
