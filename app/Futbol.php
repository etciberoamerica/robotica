<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Futbol extends Model
{
    protected $table = 'rb_challenge_futbol';
    protected $fillable =[
        'combat_id',
        'team_id_win',
        'team_id_one',
        'scort_team_one',
        'firm_team_one',
        'team_id_two',
        'scort_team_two',
        'firm_team_two',
        'penalties'];
}
