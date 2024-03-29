<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;


class RegistrationRequest extends FormRequest
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
            'username' => 'required',
            'password' => 'required|min:6',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')
            ],
            'bio' => 'nullable',
        ];
    }

    public function messages(){
        return [
            'username.required' => 'Username must not be Blank.',
            'password.required' => 'Password must not be Blank.',
            'email.required' => 'Please Add Email',
        ];
    }
}
