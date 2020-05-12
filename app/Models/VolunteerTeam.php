<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VolunteerTeam extends Model
{
    protected $table = 'volunteer_teams';

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
        'name',
        'faculties',
        'history',
        'image_1',
        'image_2',
        'image_3',
        'introduction',
    ];
}
