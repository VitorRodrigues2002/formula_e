<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPilotoRequest extends FormRequest
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
                "nome" => "required",
                "nacionalidade" => "required",
                "idade" => "required",
                "equipa" => "required",
                "img" => ["required", "image","mimes:jpeg,png,jpg,gif,jfif","max:2048"],
        ];
    }
}
