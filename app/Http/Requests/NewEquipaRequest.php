<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewEquipaRequest extends FormRequest
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
                "pilotos" => "required",
                "img" => ["required", "image","mimes:jpeg,png,jpg,gif,jfif","max:2048"],
        ];
    }
}
