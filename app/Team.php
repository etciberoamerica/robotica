<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'rb_team';
    protected  $fillable=[
        'institution_id',
        'name',
        'name_altered',
        'robot_name',
        'country_id',
        'state_id',
        'city_id',
        'gender',
        'challenge_id',
        'degree_id',
        'active'
    ];
}
