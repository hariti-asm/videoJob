<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
{
    return [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        'address' => ['required', 'string', 'max:255'],
        'gender' => ['required', 'string', Rule::in(['male', 'female', 'other'])], // Adjust options as needed
        'dob' => ['required', 'date'],
        'experience' => ['required', 'string'],
        'phone' => ['required', 'string', 'max:255'],
        'bio' => ['required', 'string'],
        'cover_letter' => ['required', 'file', 'mimes:pdf', 'max:1024'],
        'resume' => ['required', 'file', 'mimes:pdf', 'max:1024'],
        'avatar' => ['required', 'file', 'image', 'mimes:jpeg,jpg,png', 'max:1024'],
    ];
}

}
