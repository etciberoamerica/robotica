<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Groupsta extends Model
{
    protected $table='rb_group_stage';
    protected $fillable=['id','round_id','group_id','challenge_id'];
}
