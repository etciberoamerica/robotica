<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table='rb_groups';
    protected $fillable=['id','name','challenge_id','stage_id','active'];

}
