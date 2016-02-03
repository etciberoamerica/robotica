<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Combatsorpresa extends Model
{
    protected $table='rb_challenge_sorpresa';
    protected $fillable =['id',
        'team_id',
        'score',
        'firm',
        'time',
        'extra_1',
        'extra_2',
        'schedule_start',
        'schedule_end'
    ];

}
