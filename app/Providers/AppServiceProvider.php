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
            if($parameters[0] !='MIX'){

                Team::where('gender','=',$parameters[0])->where();

            }else{

            }


            echo"<pre>";
                print_r($attribute);
            echo"<br>";
                print_r($value);
            echo"<br>";

            print_r($parameters);
            echo"</pre>";
            dd();
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
