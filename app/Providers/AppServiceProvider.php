<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Validator;
use App\Team;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('alpha_space', function($attribute, $value, $parameters)
        {
            return preg_match('/^[\pL\s]+$/u', $value);
        });

        Validator::extend('name_team',function($attribute, $value, $parameters){

            $name=trim(strtolower($value));
            $match="/^[0-9a-z]+$/";
            $cadena ="";
            for($i=0;$i <= strlen($name) -1;$i++){
                $matches  = preg_match($match, $name[$i]);
                if($matches){
                    $cadena .=	$name[$i];
                }
            }
            //dd($cadena);
            $team = Team::where('name_altered',$cadena)->first();
            if($team == null){
                return true;
            }else{
                return false;
            }
        });


        Validator::extend('valid_team_mix',function($attribute, $value, $parameters){

            /* $value = Institución
             * posicion 0 'Género'
             * posicion 1 'Reto'
             * posicion 2 'Grado'
             */

                /*
                 *
            1 = Sumo robotizado NXT
            2 =  Sumo robotizado EV3
            3 = Futbol robotizado NXT
            4 = Futbol robotizado EV3
            5 = Blockrise
            6 = Reto sorpresa
            7 = Taekwo
                ndo robotizado
            8 = Carrera de obst
                         */
                    $teamMixto= Team::where('institution_id','=',$value)
                        ->where('challenge_id','=',$parameters[1])
                        ->where('gender','=','MIX')
                        ->first();
                    if(!is_null($teamMixto)){
                        return false;
                    }else{
                        return true;
                    }
                });

        Validator::extend('valid_team',function($attribute, $value, $parameters){
            /* $value = Institución
          * posicion 0 'Género'
          * posicion 1 'Reto'
          * posicion 2 'Grado'
          */

            /*
             *
        1 = Sumo robotizado NXT
        2 =  Sumo robotizado EV3
        3 = Futbol robotizado NXT
        4 = Futbol robotizado EV3
        5 = Blockrise
        6 = Reto sorpresa
        7 = Taekwondo robotizado
        8 = Carrera de obst
                     */


            $grados = [1,2,3,4,7,8];
            if(in_array($parameters[1],$grados)){
                $dataGender = Team::where('institution_id','=',$value)
                    ->where('challenge_id','=',$parameters[1])
                    ->select('gender')->first();
                if(is_null($dataGender)){
                    return true;
                }else{


                }


                foreach($dataGender as $d){
                   // print_r($d->gender);

                }


                Team::where('institution_id','=',$value)->where('challenge_id','=',$parameters[1])->where('gender','=',$parameters[1])->first();
            }else{

            }


        });

        Validator::extend('valid_time',function($attribute, $value, $parameters){
            $explode= explode(':',$value);
            if(count($explode) != 3){
                return false;
            }else{
                if(!is_numeric($explode[0])){
                    return false;
                }elseif(!is_numeric($explode[1])){
                    return false;
                }elseif(!is_numeric($explode[2])){
                    return false;
                }
                else{
                    return true;
                }
            }
        });

        Validator::extend('valid_minute',function($attribute, $value, $parameters){

            if(!is_numeric($value)){
                return false;
            }else{
                return true;
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
