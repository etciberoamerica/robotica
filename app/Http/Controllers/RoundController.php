<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DateTime;
use App\Team;
use App\Round;
use App\Challenge;
use App\Stage;

class RoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


    public function stage($data,$dataStage){
      /*  echo"<pre>";
        print_r($data);
        print_r($dataStage);
        echo"    --------------    ";
        echo"</pre>";*/

            Round::create([
                'team_id'       =>  $data['id'],
                'challenge_id'  =>  $data['challenge_id'],
                'schedule_start'=>  $data['hour_start'],
                'schedule_end'  =>  $data['hour_end'],
                'stage_id'      =>  $dataStage['id'],
                'day'           =>  $data['day']
            ]);

    }

    public function index($id)
    {
        $team =Team::where('challenge_id','=',$id)->orderBy('name','ASC')->get()->toArray();
        $stage= Stage::where('challenge_id','=',$id)->get();
        $countStage= count($stage);
        $cha = Challenge::listGroup();
        $timeStart= env('TIME_START');
        $date = new DateTime(env('TIME_START'));
        $time=0;
        $flag=false;
        $pag = false;
        $hora_start=$date->format('H:i:s');
        $i=1;
        $i2=1;
        $in=0;

        foreach($team as $t) {

            $arrFlag= [];


            $stage =Stage::where('challenge_id','=',$id)->get()->toArray();
            $time = $time + env('TIME');
            $hora_end=date('H:i:s', strtotime($date->format('H:i:s').'+'.$time.' minute'));
            $date_end = new DateTime($hora_end);
            $time_dos= env('TIME');
            $hora_start = strtotime ('-'.$time_dos.' minute' , strtotime ( $date_end->format('H:i:s'))) ;
            $hora_start = date( 'H:i:s' , $hora_start );
            echo 'hola inicio '. $hora_start.'  ------- hora fin '.$hora_end.'<br>';
            $dia=date('Y-m-d ', strtotime($date->format('H:i:s').'+'.$time.' minute'));
            $arrFlag += ['hour_end' => $hora_end];
            $arrFlag += ['hour_start'=> $hora_start];
            $arrFlag += ['day'=>$dia];
            $arrFlag += ['id'=>$t['id']];
            $arrFlag += ['institution_id'=>$t['institution_id']];
            $arrFlag += ['name'=>$t['name']];
            $arrFlag += ['name_altered'=>$t['name_altered']];
            $arrFlag += ['robot_name'=>$t['robot_name']];
            $arrFlag += ['gender'=>$t['gender']];
            $arrFlag += ['challenge_id'=>$t['challenge_id']];
            $arrFlag += ['degree_id'=>$t['degree_id']];
            $arrFlag += ['created_at'=>$t['created_at']];
            $arrFlag += ['updated_at'=>$t['updated_at']];

            echo"<pre>";
            print_r($t);
            print_r($arrFlag);
            echo"</pre>";


            $in++;
            if($i2 == $countStage){
                $i2= 1;
            }
            //$this->stage($arrFlag,$stage[$i2]);

            $i2++;
         $i++;
        }




        /*$stage= Stage::where('challenge_id','=',$id)->get();
        $countStage= count($stage);
        $i=1;

        foreach($stage as $s) {

            $team =Team::where('challenge_id','=',$id)->orderBy('name','ASC')->get();

            $i2=1;
            foreach($team as $t){
                echo "el esenario ".$i." el equipo ".$i2."<br>";
                if($i2 == $countStage){
                    break;

                }
            $i2++;
            }
            $i2=$i2;
            $i++;
        }
        $i=0;*/

        /*$data =Team::where('challenge_id','=',$id)->orderBy('name','ASC')->get();

        $i = 1;
        foreach($data as $d) {

            $stage= Stage::where('challenge_id','=',$d->challenge_id)->get();
            $i2=1;
            foreach($stage as $s) {

                echo "el equipo ".$i." en esenario".$i2."<br>";

                $i2++;
            }
            $i2=0;

            //$data =Team::where('challenge_id','=',$id)->orderBy('name','ASC')->get();




            $i++;


            /*$i = 1;
            foreach ($stage as $s) {
                print_r($i);
                echo "<br>";
                $i++;
            }
            $i = 1;
        }
        $i = 1;*/

        /**-------------------------------------------------------------------/

//        $cha = Challenge::listGroup();
//        $timeStart= env('TIME_START');
//        $date = new DateTime(env('TIME_START'));
//        $time=0;
//        $data =Team::where('challenge_id','=',$id)->orderBy('name','ASC')->get();
//        echo count($data)."<br>";
//        $time=0;
//        $flag=false;
//        $pag = false;
//        $hora_start=$date->format('H:i:s');
//        foreach($data as $d){
//            $stage= Stage::where('challenge_id','=',$d->challenge_id)->get();
//
//            $i=1;
//            foreach($stage as $s){
//                print_r($i);
//                echo"<br>";
//            $i++;
//            }
//            $i=1;

            /*if(!Round::where('team_id',$d->id)->first()){

                $time = $time + env('TIME');
                $hora=date('H:i:s', strtotime($date->format('H:i:s').'+'.$time.' minute'));
                $dia=date('Y-m-d ', strtotime($date->format('H:i:s').'+'.$time.' minute'));
                echo $d->name." toca start ".$hora_start." hora fin".$hora.' el dia '.$dia.'<br>';
                $roun = Round::create([
                    'team_id'       =>  $d->id,
                    'challenge_id'  =>  $id,
                    'schedule_start'=> $hora_start,
                    'schedule_final'=>  $hora,
                    'day'           =>  $dia
                ]);
                $hora_start= $hora;

            }else{
                $flag=true;
                $pag = $this->pagination($id);
            }
        }*/

        dd();
        return view('round.index',compact('flag','pag','cha'));
    }

    public function pagination($id){
        $url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        $url_actual = explode('?',$url_actual);
        $pag = Round::
            join('rb_team as te','te.id','=','rb_round.team_id')->
        where('rb_round.challenge_id','=',$id)->
        where('rb_round.active','=',1)->
                select('te.name','te.robot_name','rb_round.*')->orderBy('rb_round.id','ASC')->paginate(env('PAG'));
        $pag->setPath($url_actual[0]);
        return $pag;
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
