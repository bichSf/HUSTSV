<?php

namespace App\Repositories\ResetPassword;

use App\Mail\ResetPasswordMail;
use App\Repositories\BaseRepository;
use App\Models\ResetPassword;
use App\Rules\PasswordValidationRule;
use Illuminate\Support\Facades\Mail;

class ResetPasswordEloquentRepository extends BaseRepository implements ResetPasswordRepositoryInterface
{
    /**
     * Specify Model class name.
     *
     * @return mixed
     */
    public function model()
    {
        return ResetPassword::class;
    }

    /**
     * Get the password reset validation rules.
     *
     * @param $type
     * @param $data
     * @return array
     */
    public function rules($type, $data)
    {
        if ($type == 'email') {
            return [
                'email' => ['required', 'exists:users,email,deleted_at,NULL'],
            ];
        }
        return [
            'password' => ['required', 'min:8', 'max:20'],
            'password_confirm' => ['required', 'same:password'],
        ];
    }

    /**
     * Get the password reset validation error messages.
     *
     * @return array
     */
    public function validationErrorMessages()
    {
        return [
            'email.exists' => 'Email không tồn tại',
            'email.required' => trans('message_validations.required'),
            'password.required' => trans('message_validations.required'),
            'password.min' => trans('message_validations.register.pwd_length'),
            'password.max' => trans('message_validations.register.pwd_length'),
            'password_confirm.required' => trans('message_validations.required'),
            'password_confirm.same' => 'Không khớp',
        ];
    }

    /**
     * Add Record Into Password Reset Table
     *
     * @param array $data
     * @return bool
     */
    public function addRecordIntoPasswordResetTable(array $data)
    {
        try {
            $token = $this->createResetPasswordToken();
            resolve(ResetPasswordMail::class)->sendMailResetPassword([
                'email' => $data['email'],
                'link_reset_password' => $this->createLinkResetPassword($token)
            ]);
            $this->updateOrCreate(
                [
                    'email' => $data['email'],
                ],
                [
                    'token' => $token,
                    'used' => FLAG_ZERO,
                ]);
            return true;
        } catch (\Exception $exception) {
            report($exception);
            return false;
        }
    }

    /**
     * Create Reset Password Token
     *
     * @return false|string
     */
    public function createResetPasswordToken()
    {
        do {
            $token = substr(md5(rand()), 0, 25);
        } while ($this->findByAttribute('token', $token) != null);
        return $token;
    }

    /**
     * Find by a attribute
     *
     * @param string $attribute
     * @param string $value
     * @return |null
     */
    public function findByAttribute(string $attribute, string $value)
    {
        $record = $this->model->where($attribute, $value)->first();
        if ($record) {
            return $record;
        }
        return null;
    }

    /**
     * Create Link Reset Password
     *
     * @param string $token
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function createLinkResetPassword($token)
    {
        return url('pass-reminder/changepass/' . $token);
    }
}
