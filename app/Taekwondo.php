<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taekwondo extends Model
{
    protected $table='rb_challenge_taekwondo';
    protected $fillable =[
        'id',
        'team_id_win',
        'team_id_1',
        'score_team_1',
        'firm_team_1',
        'drop_team_1',
        'team_id_2',
        'score_team_2',
        'drop_team_2',
        'firm_team_2'
    ];
}
