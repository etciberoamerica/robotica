<?php

namespace App\Http\Controllers;

use App\Groupsta;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CombatRound;
use App\Group;
use App\Http\Controllers\GroupstaController as Con;
use Log;
use App\Round;
use App\Challenge;
use App\Stage;
use DateTime;
use DB;

class CombatRoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {
        $data = Con::pagination($id);
        $challenge= Challenge::find($id);
        $challenge_name=$challenge->name;
        foreach($data as $d){
            $data = Groupsta::where('group_id','=',$d['id'])->select('round_id')->get()->toArray();
            $arrayBuild= $this->buildArray($data);
            $valore= $this->funPru($arrayBuild);
            $dataGroup= Group::find($d['id']);
            foreach($valore as $val){
                $dat = CombatRound::where('group_id','=',$d['id'])
                    ->where('versus_one','=', $val['0'])
                    ->where('versus_two','=', $val['1'])
                    ->where('challenge_id','=',$id)->get();
                if(count($dat) <= 0){
                    CombatRound::create([
                        'group_id'      => $d['id'],
                        'stage_id'      => $dataGroup->stage_id,
                        'versus_one'    => $val['0'],
                        'versus_two'    => $val['1'],
                        'challenge_id'  => $d['challenge_id'],
                    ]);
                }
            }


        }
        $data=$this->getRoundInfo($id);
        return view('combatround.index',compact('data','challenge_name'));
    }

    public function buildArray($data){
        $aRray=[];
        $i=0;
        $texto ="";
        foreach($data as $r){
            $texto .= $r['round_id'].",";
        }
        return $data =explode(",",$myString = trim($texto, ','));
    }

    public function funPru(Array $data){
        $data = $data;
        $matchs = [];
        foreach($data as $k){
            foreach($data as $j){
                if($k == $j){
                    continue;
                }
                $z = [$k,$j];
                sort($z);
                if(!in_array($z,$matchs)){
                    $matchs[] = $z;
                }
            }
        }
        return $matchs;
    }

    public function getRoundInfo($id){
        $data=Group::where('challenge_id','=',$id)
            ->get()->toArray();
        for($i=0;$i<= count($data)-1;$i++){
            $d=CombatRound::where('rb_combat_round.group_id','=',$data[$i]['id'])
                ->join('rb_group_stage as r_g','r_g.round_id','=','rb_combat_round.versus_one')
                ->join('rb_group_stage as r_g2','r_g2.round_id','=','rb_combat_round.versus_two')
                ->join('rb_rounds as r_b','r_b.id','=','r_g.round_id')
                ->join('rb_rounds as r_b2','r_b2.id','=','r_g2.round_id')
                ->join('rb_team as r_t','r_t.id','=','r_b.team_id')
                ->join('rb_team as r_t2','r_t2.id','=','r_b2.team_id')
                ->join('rb_groups as r_gr','r_gr.id','=','r_g.group_id')
                ->join('rb_groups as r_gr2','r_gr2.id','=','r_g2.group_id')
                ->select('r_g.id as id_rg','r_g.group_id as group_id_rg',
                    'r_g2.id as id_rg2','r_g2.group_id as group_id_rg2',
                    'r_b.team_id as r_b_team_id','r_b2.team_id as r_b2_team_id',
                    'r_gr.name as r_gr_name','r_gr2.name as r_gr2_name',
                    'r_t.name as r_t_name','r_t2.name as r_t2_name',
                    'rb_combat_round.*')->orderBy('rb_combat_round.versus_one', 'asc')
                ->get()->toArray();
            $data[$i]['data_team'] = [];
            $data[$i]['data_team'] +=$d;
        }
        return $data;
    }

    public function detectedGroup($id=1){
        $dataGroup =Group::where('challenge_id','=',$id)->get()->toArray();
        $val=0;
        for($i=0; $i <= count($dataGroup) - 1  ;$i++){
            $data= CombatRound::where('challenge_id','=',$id)->where('group_id','=',$dataGroup[$i]['id'])->get()->toArray();
            $valorCount = count($data);
            if($valorCount > $val ){
                $val= $valorCount;
            }
        }
        return $val;
    }


    public function getInfo($id,$group_id,array $datAr= ['gr'=>0,'pr'=>0,'group_al'=>0,'hora_start'=>'00:00:00','hora_end'=>'00:00:00']){
        $data= CombatRound::where('challenge_id','=',$id)->where('group_id','=',$group_id)->get()->toArray();
        if($datAr['gr'] == $datAr['group_al'] ){
            return true;
        }
        else{
            if(!empty($data[$datAr['gr']]['id'])){
                $dataCombat= CombatRound::find($data[$datAr['gr']]['id']);
                $dataCombat->schedule_start = $datAr['hora_start'];
                $dataCombat->schedule_end = $datAr['hora_end'];
            }
        }
    }

    public function incremetTime(array $data){
            $date = new DateTime($data['time_start']);
            $time = $data['time_durat'];
            $hora_start = $date->format('H:i:s');
            $hora_end = date('H:i:s', strtotime($date->format('H:i:s') . '+' . $time . ' minute'));
            $data= ['hora_star'=> $hora_start,'hora_end'=>$hora_end];
            return $data;
        }

    public function buildRoundTime($id,array $datC=['con' =>0,'flag'=> 0,'time'=> '00:00:00']){

            $infoCha = Challenge::find($id);
            if($datC['time'] !='00:00:00'){
                $time_start=$datC['time'];
            }else{
                $time_start=$infoCha->schedumal;
            }
            $time_duration = $infoCha->duration;
            $dataTime = $this->incremetTime(['time_start'=> $time_start,'time_durat'=>$time_duration]);
            $numeroAl=$this->detectedGroup($id);
            $dataCombat= CombatRound::where('challenge_id','=',$id)->get()->toArray();
            $dataGroup =Group::where('challenge_id','=',$id)->get()->toArray();
            $t=$datC['con'];
            $y=$datC['flag'];
        for($i=0; $i <= count($dataGroup)  ;$i++){
            echo"<pre>";
            echo "este es el id ".$dataGroup[$i]['id']."<br>";
            $y++;
            $valRe = $this->getInfo($id,$dataGroup[$i]['id'],['gr'=>$t,'pr'=>$i,'group_al' => $numeroAl,'hora_start'=>$dataTime['hora_star'],'hora_end'=>$dataTime['hora_end']]);
            if($valRe){
                break;
            }

            if($i == count($dataGroup) - 1){
                 $t++;
                $this->buildRoundTime($id,
                        ['con' => $t,
                        'flag'=> $y,
                            'time'=>$dataTime['hora_end']]);
            }

            echo"</pre>";
        }
        dd();
    }
    /* modificacion de  peticion */


    public function getindex($id){
        $challenge= Challenge::find($id);
        $challenge_name=$challenge->name;
        $dataGrouptwo = Group::where('challenge_id','=',$id)->where('active','=',1)->get();
        $dataGroup =Group::where('challenge_id','=',$id)->where('active','=',1)->get()->toArray();
        for($i=0;$i <= count($dataGroup) - 1; $i++){
            $this->functionTwo(['group_id'=>$dataGroup[$i]['id'],'stage_id'=>$dataGroup[$i]['stage_id'],'challenge_id'=>$id]);
        }
       return view('combatround/round2',compact('dataGrouptwo','challenge_name'));
    }


    public function verific(Array $data,$val=NULL){
        $dataCha=$this->getInfoChallenge($data['challenge_id']);
        $dataC=CombatRound::where('schedule_end','!=','00:00:00')
            ->where('schedule_start','!=','00:00:00')
            ->where('stage_id','=',$data['stage_id'])
            ->orderBy('schedule_end','DESC')->first();

        if(count($dataC) == 1){
            $horaInicio = $dataC->schedule_end;

        }else{
            if($val){
                $horaInicio = $dataCha->schedumal;
            }else{
                if(count($dataC) == 1) {
                    $horaInicio = $dataC->schedule_end;
                }else{
                    $horaInicio = $dataCha->schedumal;
                }


            }


        }
        return $horaInicio;
    }

    public function functionTwo(Array $data){
        $dataCha=$this->getInfoChallenge($data['challenge_id']);
        $horaInicio=$this->verific($data);
        $dataGroup=CombatRound::where('group_id','=',$data['group_id'])->orderBy('versus_one',DB::raw('RAND()'))->get();
        for($i=0;$i <= count($dataGroup) - 1; $i++){
            $horaInicio=$this->verific($data,$val=true);
            $dataTime=$this->incremetTime(['time_start'=>$horaInicio,'time_durat'=>$dataCha->duration]);
            $horaInicio=$dataTime['hora_end'];
            $verifi= CombatRound::where('id','=',$dataGroup[$i]['id'])
                ->where('schedule_end','!=','00:00:00')
                ->where('schedule_start','!=','00:00:00')
                ->get();
            if(count($verifi) == 0){
                $daCo = CombatRound::find($dataGroup[$i]['id']);
                $daCo->schedule_start = $dataTime['hora_star'];
                $daCo->schedule_end = $dataTime['hora_end'];
                $daCo->save();
            }
        }
    }

    public function getInfoChallenge($id){
        $data=Challenge::find($id);
        return $data;
    }
    public function getInfoCombat(Request $request){

        $da=$d=CombatRound::where('rb_combat_round.group_id','=',$request->group_id)
            ->join('rb_group_stage as r_g','r_g.round_id','=','rb_combat_round.versus_one')
            ->join('rb_group_stage as r_g2','r_g2.round_id','=','rb_combat_round.versus_two')
            ->join('rb_rounds as r_b','r_b.id','=','r_g.round_id')
            ->join('rb_rounds as r_b2','r_b2.id','=','r_g2.round_id')
            ->join('rb_team as r_t','r_t.id','=','r_b.team_id')
            ->join('rb_team as r_t2','r_t2.id','=','r_b2.team_id')
            ->join('rb_groups as r_gr','r_gr.id','=','r_g.group_id')
            ->join('rb_groups as r_gr2','r_gr2.id','=','r_g2.group_id')
            ->select('r_g.id as id_rg','r_g.group_id as group_id_rg',
                'r_g2.id as id_rg2','r_g2.group_id as group_id_rg2',
                'r_b.team_id as r_b_team_id','r_b2.team_id as r_b2_team_id',
                'r_gr.name as r_gr_name','r_gr2.name as r_gr2_name',
                'r_t.name as r_t_name','r_t2.name as r_t2_name',
                'rb_combat_round.*')->orderBy('rb_combat_round.schedule_start', 'asc')
            ->get()->toArray();
        $stage= Stage::find($da[0]['stage_id']);
        return['data_info' => $da,
               'name' =>$stage->name];
    }



    public function getMove(Request $request){
        $da=$d=CombatRound::where('rb_combat_round.id','=',$request->combat_id)->first();
        $daTwo=$d=CombatRound::where('rb_combat_round.stage_id','=',$da->stage_id)
            ->where('rb_combat_round.schedule_start','>=',$da->schedule_start)
            ->join('rb_group_stage as r_g','r_g.round_id','=','rb_combat_round.versus_one')
            ->join('rb_group_stage as r_g2','r_g2.round_id','=','rb_combat_round.versus_two')
            ->join('rb_rounds as r_b','r_b.id','=','r_g.round_id')
            ->join('rb_rounds as r_b2','r_b2.id','=','r_g2.round_id')
            ->join('rb_team as r_t','r_t.id','=','r_b.team_id')
            ->join('rb_team as r_t2','r_t2.id','=','r_b2.team_id')
            ->join('rb_groups as r_gr','r_gr.id','=','r_g.group_id')
            ->join('rb_groups as r_gr2','r_gr2.id','=','r_g2.group_id')
            ->select('r_g.id as id_rg',
                'r_g.group_id as group_id_rg',
                'r_g2.id as id_rg2',
                'r_g2.group_id as group_id_rg2',
                'r_b.team_id as r_b_team_id',
                'r_b2.team_id as r_b2_team_id',
                'r_gr.name as r_gr_name',
                'r_gr2.name as r_gr2_name',
                'r_t.name as r_t_name',
                'r_t2.name as r_t2_name',
                'rb_combat_round.*')
            ->orderBy('schedule_start','ASC')->get()->toArray();


        return [
            'data_one' =>$daTwo,
        ];
    }

    public function getTime(Request $request){
        $da=$d=CombatRound::where('rb_combat_round.id','=',$request->combat_id)->first();
        $data_challenge= Challenge::find($da->challenge_id);
        $daTwo=$d=CombatRound::where('rb_combat_round.stage_id','=',$da->stage_id)
            ->where('rb_combat_round.schedule_start','>=',$da->schedule_start)
            ->join('rb_group_stage as r_g','r_g.round_id','=','rb_combat_round.versus_one')
            ->join('rb_group_stage as r_g2','r_g2.round_id','=','rb_combat_round.versus_two')
            ->join('rb_rounds as r_b','r_b.id','=','r_g.round_id')
            ->join('rb_rounds as r_b2','r_b2.id','=','r_g2.round_id')
            ->join('rb_team as r_t','r_t.id','=','r_b.team_id')
            ->join('rb_team as r_t2','r_t2.id','=','r_b2.team_id')
            ->join('rb_groups as r_gr','r_gr.id','=','r_g.group_id')
            ->join('rb_groups as r_gr2','r_gr2.id','=','r_g2.group_id')
            ->select('r_g.id as id_rg',
                'r_g.group_id as group_id_rg',
                'r_g2.id as id_rg2',
                'r_g2.group_id as group_id_rg2',
                'r_b.team_id as r_b_team_id',
                'r_b2.team_id as r_b2_team_id',
                'r_gr.name as r_gr_name',
                'r_gr2.name as r_gr2_name',
                'r_t.name as r_t_name',
                'r_t2.name as r_t2_name',
                'rb_combat_round.*')
            ->orderBy('schedule_start','ASC')->get()->toArray();
        $horaInicio='00:00:00';
        for($i=0; $i <= count($daTwo)- 1;$i++){
            //Log::error($daTwo[$i]);
            if($i==0){
                $duration=$request->time;
                $horaInicio =$da->schedule_start;
                $flag=true;
            }else{
                $duration=$data_challenge->duration;
                $flag= false;
            }
            $dataTime=$this->incrementTimeTwo([
                'time_start'=>$horaInicio,
                'time_durat'=>$duration,
                'challenge_id'=>$da->challenge_id,
                'flag' => $flag
            ]);
            $horaInicio=$dataTime['hora_end'];

            $daTwo[$i]['schedule_start'] = $dataTime['hora_star'];
            $daTwo[$i]['schedule_end']   =$dataTime['hora_end'];

        }

        return $daTwo;

    }

    public function incrementTimeTwo(array $data){
        if($data['flag']){
            $data_challenge= Challenge::find($data['challenge_id']);
            $date = new DateTime($data['time_start']);
            $time = $data['time_durat'];
            $hora_start = $date->format('H:i:s');
            $hora_end = date('H:i:s', strtotime($date->format('H:i:s') . '+' . $time . ' minute'));
            $time_two =$data_challenge->duration;
            $hora_end_two = date('H:i:s', strtotime($hora_end . '+' . $time_two . ' minute'));
            $data= ['hora_star'=> $hora_end,'hora_end'=>$hora_end_two];
        }else{
            $date = new DateTime($data['time_start']);
            $time = $data['time_durat'];
            $hora_start = $date->format('H:i:s');
            $hora_end = date('H:i:s', strtotime($date->format('H:i:s') . '+' . $time . ' minute'));
            $data= ['hora_star'=> $hora_start,'hora_end'=>$hora_end];
        }
        return $data;
    }

    public function getSeri(Request $request){

        foreach($request->prueba as $pru){
            $dat = CombatRound::find($pru['id']);
            $dat->schedule_start = $pru['schedule_start'];
            $dat->schedule_end =  $pru['schedule_end'];
            $dat->save();
        }
        return ['success' => true];

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
