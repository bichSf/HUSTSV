<?php

namespace App\Http\Requests;

use App\Rules\AvatarValidateRule;
use App\Rules\DateTimeValidateRule;
use App\Rules\EmailValidateRule;
use App\Rules\PhoneNumberValidateRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProfileRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $rule = [
            'avatar_leader' => [new AvatarValidateRule()],
            'name' => 'required',
            'mssv' => ['required', 'unique:profiles,mssv'],
            'faculties' => 'required',
            'class' => 'required',
        ];

        if ($request->role == LEADER) {
            $rule['email'] = ['required','unique:users,email,' . $request->user_id, new EmailValidateRule()];
            $rule['gender'] = 'required';
            $rule['start_tenure'] = 'required';
            $rule['end_tenure'] = 'required';
            return $rule;
        }
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Đây là trường bắt buộc',
            'mssv.unique' => 'MSSV đã tồn tại',
            'email.unique' => 'Email đã tồn tại'
        ];
    }
}
