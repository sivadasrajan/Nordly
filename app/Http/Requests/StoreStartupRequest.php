<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStartupRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'ceo' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id',
            'address' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:100',
            // 'products' => 'required|string|max:100',
        ];
    }
}
