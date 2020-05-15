<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculties extends Model
{
    protected $table = 'faculties';

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
        'name',
    ];
}
