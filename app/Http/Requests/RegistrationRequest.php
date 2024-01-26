<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'phone' => 'required',
            'profile' => 'required',
        ];
    }

    public function messages(){
        return [
            'username.required' => 'Username must not be Blank.',
            'password.required' => 'Password must not be Blank.',
            'phone.required' => 'Please Add phone number',
            'profile.required' => 'Please Insert profile image',
        ];
    }
}
