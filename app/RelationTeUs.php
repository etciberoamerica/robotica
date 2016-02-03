<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelationTeUs extends Model
{
    protected  $table='rb_relation_te_us';

    protected $fillable = [
            'team_id',
            'user_coach_id',
            'user_coach_aux_id',
            'user_coordinador_id',
            'user_cap_id',
            'user_int2_id',
            'user_int3_id',
            'user_int4_id'];
}
