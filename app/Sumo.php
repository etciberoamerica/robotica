<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sumo extends Model
{
    protected $table='rb_challenge_sumo';
    protected $fillable =[
        'id',
        'combat_id',
        'team_id_win',
        'team_id_one',
        'scort_team_one',
        'firm_team_one',
        'team_id_two',
        'scort_team_two',
        'firm_team_two'
    ];
}
