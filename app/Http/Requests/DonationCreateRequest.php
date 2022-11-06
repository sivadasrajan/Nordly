<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationCreateRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'mobile' => 'required|digits:10',
            'startup_id' => 'required|exists:startups,id',
            'amount' => 'required|numeric'
        ];
    }
}
