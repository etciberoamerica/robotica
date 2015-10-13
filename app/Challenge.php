<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected  $table='challenges';
    protected $fillable = [
        'name',
        'active'
    ];
}
