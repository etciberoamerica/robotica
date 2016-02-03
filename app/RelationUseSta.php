<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelationUseSta extends Model
{
    protected $table="rb_relation_use_sta";
    protected  $fillable = ['user_id','challenge_id_1','stage_id_1','challenge_id_2','stage_id_2'];
}
