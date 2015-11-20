<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table="rb_settings";
    protected $fillable =['field','value'];
    public $timestamps= false;

    public static function ScheTrial(){
    $data =Settings::where('field','=','Schedumal_trial')->first();
        return $data->value;
    }

    public static function durationTrial(){
        $data =Settings::where('field','=','Duration_trial')->first();
        return $data->value;
    }
}
