<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore(auth()->id())],
            'address' => ['required', 'string'],
            'job' => ['required', 'string'],
            'password'=> ['required', 'string', 'min:8','confirmed'],
            'gender' => ['required', 'string', Rule::in(['male', 'female'])],
            'dob' => ['required', 'date'],
            'experience' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'bio' => ['required', 'string'],
            'status' => ['required'],
            'cover_letter' => ['required'],
            'resume' => ['required'],
            'user_type'=>['required','in:seeker'],
            'avatar' => ['required'],
        ];
    }
}