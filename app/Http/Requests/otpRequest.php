<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class otpRequest extends FormRequest
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
            "otp" => "required"
        ];
    }

    public function messages(){
        return [
            "otp.required" => "OTP field must not be Blank"
        ];
    }
}
