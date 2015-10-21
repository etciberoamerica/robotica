<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table='rb_groups';
    protected $fillable=['name','challenge_id','active'];

}
