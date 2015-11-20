<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CombatRound extends Model
{
    protected  $table='rb_combat_round';

    protected $fillable = ['group_id','stage_id','versus_one','versus_two','challenge_id','schedule_start','schedule_end'];
}
