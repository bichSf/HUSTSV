<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\ResetPassword\ResetPasswordRepositoryInterface;
use App\Repositories\VerifiedRegister\VerifiedRegisterRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserEloquentRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * Specify Model class name.
     *
     * @return mixed
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Find record by email
     *
     * @param $email
     * @return mixed|null
     */
    public function findByEmail($email)
    {
        $record = $this->model->where('email', $email)->first();
        if ($record) {
            return $record;
        }
        return null;
    }

    /**
     * Find record by verifiedToken
     *
     * @param $verifiedToken
     * @return mixed|null
     */
    public function findByVerifiedToken($verifiedToken)
    {
        $verifiedRegister = resolve(VerifiedRegisterRepositoryInterface::class)
            ->findByAttribute('verified_token', $verifiedToken);
        if ($verifiedRegister) {
            return $this->findByEmail($verifiedRegister->email);
        }
        return null;
    }

    /**
     * get by user code
     *
     * @param int $id
     * @return mixed
     */
    public function getByUserCode($id)
    {
        return $this->model->select('user_code')
            ->where('id', $id)
            ->first();
    }

    /**
     * Get role of user and check
     *
     * @param int $id
     * @param null $role
     * @return mixed
     */
    public function getTypeOfUserById($id, int $role = null)
    {
        if ($role) {
            return $this->model->where(['id' => $id, 'role' => $role])
                ->has('profile')->with('profile')->first();
        }

        return $this->model->where(['id' => $id])
            ->has('profile')->with('profile')->first();
    }

    /**
     * Get role user by id
     *
     * @param int $id
     * @return mixed
     */
    public function getRoleUserById($id)
    {
        return $this->model->where('id', $id)
            ->select('role')
            ->first();
    }


    /**
     * Update password in users table and update uses in password_resets table
     *
     * @param array $data
     * @return bool
     */
    public function updatePassword(array $data)
    {
        try {
            $resetPassword = resolve(ResetPasswordRepositoryInterface::class)
                ->findByAttribute('token', $data['token']);
            if ($resetPassword->used == FLAG_ONE) {
                return false;
            }
            $resetPassword->update(['used' => FLAG_ONE]);
            $record = $this->findByEmail($resetPassword->email);
            if ($record) {
                $record->update(['password' => Hash::make($data['password'])]);
            }
            return true;
        } catch (\Exception $exception) {
            report($exception);
            return false;
        }
    }
}
