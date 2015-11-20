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
use App\Settings;
use Excel;

class RoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function excel($id){
        $products = Round::
        join('rb_team as te','te.id','=','rb_rounds.team_id')->
        join('rb_stages as st','st.id','=','rb_rounds.stage_id')->
        where('rb_rounds.challenge_id','=',$id)->
        select('te.name as Nombre_equipo',
            'te.robot_name as Nombre_robot',
            'rb_rounds.schedule_start as Hora_inicio',
            'rb_rounds.schedule_end as Hora_fin',
            'st.name as Escenario')->
        orderBy('rb_rounds.id','ASC')->get();

        Excel::create('Laravel Excel', function($excel) use ($products){
            $excel->sheet('Productos', function($sheet) use($products) {
                $sheet->fromArray($products);
            });
        })->export('xlsx');
    }






    public function index($id,array $data=['y'=>0,'time_start'=>0,'time_end'=>0]){
        $challenge= Challenge::find($id);
        $challenge_name=$challenge->name;
        $cha = Challenge::listGroup();
        $flag = true;
//        if(!Round::where('challenge_id','=',$id)->first()){
            $stage= Stage::where('challenge_id','=',$id)->where('back','=',0)->where('active','=',1)->get()->toArray();
            $team =Team::where('challenge_id','=',$id)->where('active','=',1)->orderBy('id','RAND()')->get()->toArray();
            $numStage=count($stage)+ $data['y'];
            if($data['time_start'] == 0 && $data['time_end'] == 0){
                $date = new DateTime(Settings::ScheTrial());
                $time = 0;
                $pag = false;
                $hora_start = $date->format('H:i:s');
                $hora_end = date('H:i:s', strtotime($date->format('H:i:s') . '+' . $time . ' minute'));
                $date_end = new DateTime($hora_end);
                $time_dos = Settings::durationTrial();
                $hora_start = strtotime('+' . $time_dos . ' minute', strtotime($date_end->format('H:i:s')));
                $hora_start = date('H:i:s', $hora_start);
            }else{
                $date = new DateTime($data['time_start']);
                $time = 0;
                $pag = false;
                $hora_start = $date->format('H:i:s');
                $hora_end = date('H:i:s', strtotime($date->format('H:i:s') . '+' . $time . ' minute'));
                $date_end = new DateTime($hora_end);
                $time_dos = Settings::durationTrial();
                $hora_start = strtotime('+' . $time_dos . ' minute', strtotime($date_end->format('H:i:s')));
                $hora_start = date('H:i:s', $hora_start);
            }
            $p=0;
            for($i=$data['y'];$i<=count($team)-1;$i++){

                if(!Round::where('team_id','=',$team[$i]['id'])->first()){
                    Round::create([
                        'team_id'       =>  $team[$i]['id'],
                        'challenge_id'  =>  $team[$i]['challenge_id'],
                        'schedule_start'=>  $hora_end,
                        'schedule_end'  =>  $hora_start,
                        'stage_id'      =>  $stage[$p]['id'],
                    ]);
                }
                if($i == $numStage - 1){
                    $this->index($id,$data=['y'=>$i+1,'time_start'=>$hora_start,'time_end'=>$hora_end]);
                    break;
                }
                $p++;
            }
//        }
        $pag = $this->pagination($id);
        $flag = true;
        return view('round.index',compact('flag','pag','cha','challenge_name','id'));
    }






    public function pagination($id){
        $url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        $url_actual = explode('?',$url_actual);
        $pag = Round::
        join('rb_team as te','te.id','=','rb_rounds.team_id')->
        join('rb_stages as st','st.id','=','rb_rounds.stage_id')->
        where('rb_rounds.challenge_id','=',$id)->
        select('te.name as teamName','te.robot_name','rb_rounds.*','st.name as stageName')->
        orderBy('rb_rounds.id','ASC')->
        paginate(env('PAG'));
        $pag->setPath($url_actual[0]);
        return $pag;
    }


    public function modification(Request $request){

        if($request->type == 1){
            $dataRoundGet= Round::find($request->round_id);
            $dataRoundGet->active=0;
            $dataRoundGet->save();
            $dataRound = Round::where('challenge_id','=',$request->challenge_id)->where('stage_id','=',$dataRoundGet->stage_id)->orderBy('id','DESC')->first();
            $date = new DateTime($dataRound->schedule_end);
            $hora_end = date('H:i:s', strtotime($date->format('H:i:s') . '+' . Settings::durationTrial() . ' minute'));
            $date_end = new DateTime($hora_end);
            $time_dos = Settings::durationTrial();
            $hora_start = strtotime('-' . $time_dos . ' minute', strtotime($date_end->format('H:i:s')));
            $hora_start = date('H:i:s', $hora_start);
            $dia = date('Y-m-d ', strtotime($date->format('H:i:s') . '+' . env('TIME') . ' minute'));
            Round::create([
                'team_id'       =>  $dataRoundGet->team_id,
                'challenge_id'  =>  $dataRoundGet->challenge_id,
                'schedule_start'=>  $hora_start,
                'schedule_end'  =>  $hora_end,
                'stage_id'      =>  $dataRoundGet->stage_id,
            ]);
        }else{
            $Round = Round::find($request->round_id);
            if($request->typeText == 'active'){
                $Round->active=1;
            }else{
                $Round->active=0;
            }
            $Round->save();
        }
        return $this->index($request->challenge_id);
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
