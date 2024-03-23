<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterCompanyRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cname' => 'required|unique:companies,cname|max:50',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => 'required|string',
            'phone' => 'required|string',
            'website' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'slogan' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ];
    }
}
