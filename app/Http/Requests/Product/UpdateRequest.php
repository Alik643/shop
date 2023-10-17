<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ARTICLE' => 'string|regex:/^[A-Za-z0-9]+$/|required',
            'NAME' => 'string|min:10|required',
            'STATUS' => 'boolean|required',
            'DATA' => 'json'
        ];
    }
}
