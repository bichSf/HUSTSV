<?php

namespace App\Repositories\Profile;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Repositories\AccuracyEmailChange\AccuracyEmailChangeRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileEloquentRepository extends BaseRepository implements ProfileRepositoryInterface
{
    /**
     * Specify Model class name.
     *
     * @return mixed
     */
    public function model()
    {
        return Profile::class;
    }

    /**
     * Save Profile
     *
     * @param ProfileRequest $request
     * @return array|string
     */
    public function saveProfile($data)
    {
        DB::beginTransaction();
        try {
            if($this->findByAttribute('user_id', $data['user_id'])) {
                return ['save' => false];//PROFILE_EXIST
            }
            $this->saveAvatarInFolder($data, false, null);
            $this->create($data);
            $dataReturn['save'] = true;
            DB::commit();
            return $dataReturn;
        } catch (\Exception $exception) {
            DB::rollBack();
            report($exception);
            return ['save' => false];
        }
    }

    /**
     * Update profile
     *
     * @param $profile
     * @param $data
     * @return array
     */
    public function updateProfile($profile, $data)
    {
        DB::beginTransaction();
        try {
            $dataReturn = [];
            $this->saveAvatarInFolder($data, true, $profile->id);
            if ($data['email'] != $profile->email) {
                $dataReturn['updateEmail'] = $this->sendMailAccuracyChange($profile->user_id, $data);
                if (!$dataReturn['updateEmail']) {
                    DB::rollBack();
                    return ['save' => false];
                }
                unset($data['email']);
            }
            $this->update($profile->id, $data);
            $dataReturn['save'] = true;
            DB::commit();
            return $dataReturn;
        } catch (\Exception $exception) {
            DB::rollBack();
            report($exception);
            return ['save' => false];
        }
    }

    /**
     * Update specialty qualifications
     *
     * @param $data
     */
    public function updateSpecialtyQualifications(&$data)
    {
        $profile = $this->find($data['profile_id']);
        $profile->specialties()->detach();
        $profile->qualifications()->detach();
        if (isset($data['specialty'])) {
            $profile->specialties()->attach($data['specialty']);
        }
        if (isset($data['qualification'])) {
            $profile->qualifications()->attach($data['qualification']);
        }
    }

    /**
     * Save avatar in folder
     *
     * @param $data
     * @param bool $isUpdate
     * @param null $profileId
     */
    public function saveAvatarInFolder(&$data, $isUpdate = false, $profileId = null)
    {
        if (isset($data['avatar'])) {
            $imageName = saveImageInFolder($data['avatar'], FOLDER_IMAGES_PROFILE);
            $data['avatar'] = $imageName['avatar'];
            $data['avatar_thumbnail'] = $imageName['avatar_thumbnail'];
            if ($isUpdate) {
                removeImagesInFolder('/public/' . FOLDER_IMAGES_PROFILE, $this->find($profileId)->avatar);
            }
        } else {
            unset($data['avatar']);
            unset($data['avatar_thumbnail']);
        }
    }

    /**
     * Find by Attribute
     *
     * @param $attribute
     * @param $value
     * @return |null
     */
    public function findByAttribute($attribute, $value)
    {
        $record = $this->model->where($attribute, $value)->first();
        if ($record) {
            return $record;
        }
        return null;
    }

    /**
     * Get specialties and qualifications
     *
     * @param $profile
     * @return mixed
     */
    public function getSpecialtiesQualifications($profile)
    {
        if (!$profile) {
            return [];
        }
        $profile->specialties = $profile->specialties()->get()->pluck('id')->toArray();
        $profile->qualifications = $profile->qualifications()->get()->pluck('id')->toArray();
        return $profile->toArray();
    }

    /**
     * Send mail authentication change
     *
     * @param $userId
     * @param $data
     * @return mixed
     */
    public function sendMailAccuracyChange($userId, &$data)
    {
        return resolve(AccuracyEmailChangeRepositoryInterface::class)->createRecordAndSendMail($userId, $data['email']);
    }

    /**
     * Delete profile by UserId
     *
     * @param $userId
     */
    public function deleteProfileByUserId($userId)
    {
        DB::beginTransaction();
        try {
            $profile = $this->findByAttribute('user_id', $userId);
            if ($profile) {
                $profile->profileQualification()->delete();
                $profile->profileSpecialty()->delete();
                $profile->delete();
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            report($exception);
        }
    }

    /**
     * Save Sub User Profile
     *
     * @param $data
     * @return array|mixed
     */
    public function saveProfileSubUser($data)
    {
        $user = resolve(UserRepositoryInterface::class)->findByEmail($data['email']);
        if ($this->findByAttribute('email', $data['email'])) {
            return ['save' => PROFILE_EXIST];
        }
        $data['user_id'] = $user['id'];
        $this->saveAvatarInFolder($data, false, null);
        return $this->create($data);
    }

    /**
     * handle condition
     *
     * @param array $params
     * @param string $key
     * @param array $condition
     * @return array
     */
    private function handleCondition($params, $key, $condition)
    {
        $conditions = [];
        if (isset($params[$key])) {
            array_push(
                $conditions, $condition
            );
            return $conditions;
        }
        return $conditions;
    }

    /**
     * get date conditions
     *
     * @param array $params
     * @return array
     */
    private function getDateConditions($params)
    {
        return array_merge(
            $this->handleCondition($params, 'date_from_last_login', ['users.last_login', '>=', date("Y-m-d", strtotime($params['date_from_last_login'])) . TIME_START])
            , $this->handleCondition($params, 'date_to_last_login', ['users.last_login', '<=', date("Y-m-d", strtotime($params['date_to_last_login'])) . TIME_END])
            , $this->handleCondition($params, 'date_from_registration', ['users.created_at', '>=', date("Y-m-d", strtotime($params['date_from_registration'])) . TIME_START])
            , $this->handleCondition($params, 'date_to_registration', ['users.created_at', '<=', date("Y-m-d", strtotime($params['date_to_registration'])) . TIME_END])
        );
    }

    /**
     * get sub user conditions
     *
     * @param $params
     * @return array
     */
    private function getSubUserConditions($params)
    {
        return array_merge(
            $this->handleCondition($params, 'min_sub_users', ['total_sub', '>', $params['min_sub_users'] + FLAG_ONE])
            , $this->handleCondition($params, 'max_sub_users', ['total_sub', '<', $params['max_sub_users'] + FLAG_ONE])
        );
    }

    /**
     * get role conditions
     *
     * @param  array $params
     * @return array
     */
    private function getRoleConditions($params)
    {
        return $this->handleCondition($params, 'role', ['users.role', '=', array_flip(ROLE)[$params['role']]]);
    }

    /**
     * get status user conditions
     *
     * @param  array $params
     * @return array
     */
    private function getStatusUserConditions($params)
    {
        $conditions = [];
        if ($params['status'] == DATA_ALL) {
            return $conditions;
        }

        array_push(
            $conditions,
            [
                'users.deleted_at', $params['status'] == BLOCK_USER ? '<>' : '=', null
            ]
        );
        return $conditions;
    }

    /**
     * get list user by sub user
     *
     * @param $conditions
     * @param $totalSubUser
     * @return mixed
     */
    public function getListUserBySubUser($totalSubUser, $conditions)
    {
        return DB::query()->fromSub(function ($query) use ($conditions) {
            $query->selectRaw('group_code, count(group_code) as total_sub')
                ->from('users')
                ->where($conditions)
                ->groupBy('group_code');
        }, 'table_report')
            ->selectRaw('group_code, total_sub')
            ->where($totalSubUser)
            ->get()->toArray();
    }

    /**
     * get list data by condition
     *
     * @param array $params
     * @return mixed
     */
    public function getListDataByCondition($params)
    {
        return $this->model->withTrashed()->selectRaw('users.group_code, users.parent_id, profiles.*')
                    ->leftJoin('users', 'users.id', 'profiles.user_id')
                    ->with('specialties', 'qualifications')
                    ->where(array_merge($this->getRoleConditions($params), $this->getDateConditions($params)
                        , $this->getStatusUserConditions($params)))
                    ->whereIn('users.group_code', array_column($this->getListUserBySubUser($this->getSubUserConditions($params)
                        , $this->getRoleConditions($params)), 'group_code'))
                    ->orderBy('group_code')
                    ->get()
                    ->toArray();
    }

    /**
     * get total money sub user
     *
     * @param $params
     * @return array|false
     */
    public function getTotalMoneySubUser($params)
    {
        $data = $this->getListUserBySubUser(
            $this->getSubUserConditions($params),
            array_merge($this->getRoleConditions($params), $this->getDateConditions($params))
        );

        return array_combine(array_column($data, 'group_code'), array_column($data, 'total_sub'));
    }

    /**
     * Update profile sub user
     *
     * @param $profile
     * @param $data
     * @return array|bool
     */
    public function updateProfileSubUser($profile, $isSubUser, $data)
    {
        DB::beginTransaction();
        try {
            $user = $profile->user;
            $this->saveAvatarInFolder($data, true, $profile->id);
            $this->update($profile->id, $data);
            if ($profile->email != $data['email']) {
                if ($user->update(['email' => $data['email']]) && $isSubUser) {
                    Auth::logout();
                }
            }
            DB::commit();
            return true;
        } catch (\Exception $exception) {
            DB::rollBack();
            report($exception);
            return ['save' => false];
        }
    }
}
