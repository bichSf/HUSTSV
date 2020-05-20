<?php

namespace App\Http\Requests;

use App\Rules\AvatarValidateRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class TeamRequest extends FormRequest
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
        return [
            'avatar_team' => [new AvatarValidateRule()],
            'name' => 'required',
            'id_faculties' => 'required',
            'history' => 'required',
        ];
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
        ];
    }
}
