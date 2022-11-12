<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'disc' => 'required',
            'img' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'sold' => 'required',
        ];
    }
}
