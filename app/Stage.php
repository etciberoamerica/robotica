<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $table='rb_stages';
    protected $fillable = ['name','active','challenge_id'];

}
