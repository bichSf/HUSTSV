<?php

namespace App\Repositories\VerifiedRegister;

use App\Repositories\BaseRepository;
use App\Models\VerifiedRegister;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class VerifiedRegisterEloquentRepository extends BaseRepository implements VerifiedRegisterRepositoryInterface
{
    /**
     * @return string
     */
    public function model()
    {
        return VerifiedRegister::class;
    }

    /**
     * Add a record into VerifiedRegister table
     *
     * @param array $data
     * @return array|int
     */
    public function addRecordIntoVerifiedRegisterTable(array $data)
    {
        try {
            if ($user = resolve(UserRepositoryInterface::class)->findByEmail($data['email'])) {
                session()->put('step3_status', EMAIL_USER_VERIFIED);
            }
            $checkEmail = $this->findByAttribute('email', $data['email']);
            $checkEmail = $this->removeRecordExpiry($checkEmail);
            if ($checkEmail == null) {
                $verifiedToken = $this->createVerifiedToken();
                $this->sendMailVerified([
                    'email' => $data['email'],
                    'link_verified' => $this->createLinkVerifiedRegister($verifiedToken)
                ]);
                $this->create([
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'role' => $data['role'],
                    'verified_token' => $verifiedToken,
                    'expiry_time' => date('Y-m-d H:i:s', strtotime('+1 day', time()))
                ]);
                session()->put('step3_status', EMAIL_SEND_SUCCESS);
            } else {
                session()->put('step3_status', EMAIL_SENT);
            }
        } catch (\Exception $exception) {
            report($exception);
            session()->put('step3_status', EMAIL_SEND_FAIL);
        }
    }

    /**
     * Remove record expiry
     *
     * @param $record
     * @return |null
     * @throws \Exception
     */
    public function removeRecordExpiry($record)
    {
        if ($record && $record->expiry_time < date('Y-m-d H:i:s')) {
            $this->deleteById($record->id);
            return null;
        }
        return $record;
    }

    /**
     * Send mail verified
     *
     * @param array $infoSendMail
     */
    public function sendMailVerified(array $infoSendMail)
    {
        Mail::send('register/form_mail', ['link' => $infoSendMail['link_verified']], function ($message) use ($infoSendMail) {
            $message->from('tranbichbk@gmail.com', 'HUSTSV');
            $message->to($infoSendMail['email'], 'HUSTSV')->subject(trans('mail_attributes.mail_register.title'));
        });
    }

    /**
     * Check User exited
     *
     * @param array $email
     * @return bool
     */
    public function checkUserExited($email)
    {
        $user = resolve(UserRepositoryInterface::class)->findByEmail($email);
        if ($user) {
            return true;
        }
        return false;
    }

    /**
     * Verified User
     *
     * @param $verifiedToken
     * @return mixed
     */
    public function verifiedUser($verifiedToken)
    {
        $recordVerifiedRegister = $this->findByAttribute('verified_token', $verifiedToken);
        if (!$recordVerifiedRegister) {
            return session()->put('step4_status', ACTIVE_FAIL);
        } else {
            $recordVerifiedRegister = $recordVerifiedRegister->toArray();
        }

        if ($user = resolve(UserRepositoryInterface::class)->findByEmail($recordVerifiedRegister['email'])) {
            Auth::loginUsingId($user->id);
            return session()->put('step4_status', ACTIVE_ERROR_USER_ACHIEVED);
        }
        if ($this->checkExpiryTimeActive($recordVerifiedRegister['expiry_time'])) {
            return session()->put('step4_status', $this->registerUser($recordVerifiedRegister));
        }
        session()->put('email_expiry', $recordVerifiedRegister['email']);
        return session()->put('step4_status', ACTIVE_ERROR_EXPIRY_TIME);
    }

    /**
     * Check expiry time active
     *
     * @param array $expiryTime
     * @return bool
     */
    public function checkExpiryTimeActive($expiryTime)
    {
        if ($expiryTime > date('Y-m-d H:i:s')) {
            return true;
        }
        return false;
    }

    /**
     * Register User
     *
     * @param array $register
     * @return int
     */
    public function registerUser(array $register)
    {
        try {
            $userRepository = resolve(UserRepositoryInterface::class);
            $addUser = $userRepository->create([
                'email' => $register['email'],
                'password' => $register['password'],
                'role' => $register['role'],
                'status' => STATUS_ACTIVE,
            ]);
            if ($addUser) {
                Auth::loginUsingId($addUser->id);
                return ACTIVE_SUCCESS;
            }
            return ACTIVE_FAIL;
        } catch (\Exception $exception) {
            report($exception);
            return ACTIVE_FAIL;
        }
    }

    /**
     * create Link VerifiedRegister
     *
     * @param $verifiedToken
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function createLinkVerifiedRegister($verifiedToken)
    {
        return url('register/authentication/'.$verifiedToken);
    }

    /**
     * Create VerifiedToken
     *
     * @return false|string
     */
    public function createVerifiedToken()
    {
        do {
            $verifiedToken = substr(md5(rand()), 0, 25);
        } while ($this->findByAttribute('verified_token', $verifiedToken) != null);
        return $verifiedToken;
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
     * Delete record by email
     *
     * @param $email
     * @return void
     */
    public function deleteRecordByEmail($email)
    {
        $this->model->where('email', $email)->delete();
    }
}
