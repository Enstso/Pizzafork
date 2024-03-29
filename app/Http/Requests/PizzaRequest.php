<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PizzaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'text' => 'bail|required|regex:/^[\pL\s\-]+$/u|between:2,100',
            'picture' => 'required|image|dimensions:min_width=100,min_height=100',
            'prix'  => 'bail|required'
        ];
    }
}

