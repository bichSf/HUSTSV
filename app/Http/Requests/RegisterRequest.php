<?php

namespace App\Http\Requests;

use App\Rules\EmailValidateRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', new EmailValidateRule(), 'unique:users,email'],
            'password' => ['required', 'min:8', 'max:20'],
        ];
    }

    /**
     * Get the messages rules that apply to the request.
     *
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'email.required' => trans('message_validations.required'),
            'email.unique' => trans('message_validations.register.existed'),
            'password.required' => trans('message_validations.required'),
            'password.min' =>  trans('message_validations.register.pwd_length'),
            'password.max' =>  trans('message_validations.register.pwd_length'),
        ];
    }
}
