<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'image',
        'name',
        'date_of_birth',
        'home_town',
        'email',
        'mssv',
        'id_faculties',
        'id_class',
        'gender',
        'start_tenure',
        'end_tenure',
    ];
}
