<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Challenge extends Model
{
    protected  $table='rb_challenges';
    protected $fillable = [
        'name',
        'active'
    ];

    public static function listGroup(){
        $data =[];
        $data += ['' =>'-- Selecciona Reto --'];
        $datas =Challenge::where('active',1)->lists('name','id');
        $data += $datas->toArray();
        return $data;
    }
}
