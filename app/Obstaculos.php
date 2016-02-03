<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obstaculos extends Model
{
    protected  $table ='rb_challenge_obstaculos';
    protected $fillable =[
        'team_id_win',
        'team_id_1',
        'scort_team_1',
        'time_team_1',
        'firm_team_1',
        'team_id_2',
        'scort_team_2',
        'time_team_2',
        'firm_team_2',
        'combat_id','drop_team_1',
        'drop_team_2',
        'restart'
    ];
}
