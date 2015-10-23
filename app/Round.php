<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    protected $table='rb_rounds';
    protected $fillable =['team_id','schedule_start','schedule_end','day','challenge_id','active','stage_id'];
}
