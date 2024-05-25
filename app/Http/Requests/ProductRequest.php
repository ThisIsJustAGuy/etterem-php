<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
//    public function authorize(): bool
//    {
//        return false;
//    }

//    /**
//     * Get the validation rules that apply to the request.
//     *
//     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
//     */
    public function rules(): array
    {
        return [
            'name'        => ['required', 'max:255', Rule::unique('products', 'name')->ignore($this->route('product')?->id)],
            'description' => ['required', 'max:500'],
            'price'       => ['required', 'integer', 'min:0', 'max:100000'],
        ];
    }
}
