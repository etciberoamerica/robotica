<?php

namespace App\Http\Controllers;

use App\Groupsta;
use App\RelationTeUs;
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
use App\Tool;
use Validator;
use DB;
use App\RelationComTea;
use App\BlockRise;
use App\User;
use App\Sumo;
use App\Futbol;
use App\Obstaculos;
use App\Taekwondo;
use App\Team;
use App\Combatsorpresa;

class CombatRoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public static function index($id)
    {
        $data = Con::pagination($id);
        $challenge= Challenge::find($id);
        $challenge_name=$challenge->name;
        foreach($data as $d){
            $data = Groupsta::where('group_id','=',$d['id'])->select('round_id')->get()->toArray();
            $arrayBuild= CombatRoundController::buildArray($data);
            $valore= CombatRoundController::funPru($arrayBuild);
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
        $data=CombatRoundController::getRoundInfo($id);
        if(!ENV('DEVELOP')){
            return view('combatround.index',compact('data','challenge_name'));
        }
    }

    public static function buildArray($data){
        $aRray=[];
        $i=0;
        $texto ="";
        foreach($data as $r){
            $texto .= $r['round_id'].",";
        }
        return $data =explode(",",$myString = trim($texto, ','));
    }

    public static function funPru(Array $data){
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

    public static function getRoundInfo($id){
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
                ->join('rb_institution as r_i','r_i.id','=','r_t.institution_id')
                ->join('rb_institution as r_i2','r_i2.id','=','r_t2.institution_id')
                ->join('rb_groups as r_gr','r_gr.id','=','r_g.group_id')
                ->join('rb_groups as r_gr2','r_gr2.id','=','r_g2.group_id')
                ->select('rb_combat_round.id as combat_id','r_g.id as id_rg','r_g.group_id as group_id_rg',
                    'r_g2.id as id_rg2','r_g2.group_id as group_id_rg2',
                    'r_b.team_id as r_b_team_id','r_b2.team_id as r_b2_team_id',
                    'r_gr.name as r_gr_name','r_gr2.name as r_gr2_name',
                    'r_t.name as r_t_name','r_t2.name as r_t2_name','r_i.name as institu_i1',
                    'r_i2.name as institu_i2',
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

    public static function incremetTime(array $data){
        //dd($data);
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
            $dataTime = CombatRoundController::incremetTime(['time_start'=> $time_start,'time_durat'=>$time_duration]);
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
    /* Inicio de reto sorpresa*/

    public function getInfoSorpresa(){
        $team = Team::where('challenge_id','=','6')->where('active','=',1)->get()->toArray();
        $dataCha = Challenge::find(6);
        foreach($team as $te){
            $hora=$this->verificSor();
            $dataTime=CombatRoundController::incremetTime(['time_start'=>$hora,'time_durat'=>$dataCha->duration]);
            $teamId = Combatsorpresa::where('team_id','=',$te['id'])->first();
            if(!$teamId){
                Combatsorpresa::create([
                    'team_id'           =>$te['id'],
                    'schedule_start'    =>$dataTime['hora_star'],
                    'schedule_end'      =>$dataTime['hora_end']
                ]);
            }
        }
        $datCombat = Combatsorpresa::
        join('rb_team as team','team.id','=','rb_challenge_sorpresa.team_id')
            ->join('rb_institution as inst','inst.id','=','team.institution_id')
            ->select('rb_challenge_sorpresa.id as combat_id','inst.name as name_inst','team.name as name_team'
                ,'team.robot_name as name_robot','rb_challenge_sorpresa.*')
            ->get();
        //dd($datCombat);

        return view('combatround/sorpresa',compact('datCombat'));

        dd($datCombat);

        /*$horaInicio=CombatRoundController::verific($data,$val=true);
        $dataTime=CombatRoundController::incremetTime(['time_start'=>$horaInicio,'time_durat'=>$dataCha->duration]);*/


    }
    public function combatSorpresa($id){
        $datCombat = Combatsorpresa::
        join('rb_team as team','team.id','=','rb_challenge_sorpresa.team_id')
            ->join('rb_institution as inst','inst.id','=','team.institution_id')
            ->select('rb_challenge_sorpresa.id as combat_id','inst.name as name_inst','team.name as name_team'
                ,'team.robot_name as name_robot','rb_challenge_sorpresa.*','team.gender as genero')
            ->where('rb_challenge_sorpresa.id','=',$id)
            ->first();
        $d= Challenge::find(6);



        return view('challenge/sorpresa',compact('datCombat','d'));

    }

    public function verificSor(){
        $dataCha=CombatRoundController::getInfoChallenge(6);
        $dataC= Combatsorpresa::where('schedule_end','!=','00:00:00')
            ->where('schedule_start','!=','00:00:00')
            ->orderBy('schedule_end','DESC')->first();

        if(count($dataC) == 1){
            $horaInicio = $dataC->schedule_end;
        }else{
            /*if($val){
                $horaInicio = $dataCha->schedumal;
            }else{*/
                if(count($dataC) == 1) {
                    $horaInicio = $dataC->schedule_end;
                }else{
                    $horaInicio = $dataCha->schedumal;
                }
            /*}*/
        }
        return $horaInicio;


    }

    public function getFrim(Request $request){
        //dd($request->all());
        $returnData=$this->infoFrimResto($request->id,$request->firma);
        //dd($returnData);
        if(!$returnData){
            return [
                'success' => false,
                'errors' =>[0 => 'Verificar la firma no conincide .']
            ];

        }

        $d=Combatsorpresa::find($request->id);
        $d->score   =   $request->score;
        $d->time    =   $request->tiempo;
        $d->extra_1 =   $request->extra_uno;
        $d->extra_2 =   $request->extra_dos;
        $d->firm    =   $request->firma;
        $d->save();



        return [
            'success' => true,
            'errors' =>[0 => 'Dato registrado']
        ];


    }

    function infoFrimResto($id,$firma){
        $data=Combatsorpresa::find($id);
        $team_id = $data->team_id;
        $datRelationTeamUsu = RelationTeUs::where('team_id','=',$team_id)->first()->toArray();

        switch($firma){
            case $datRelationTeamUsu['user_cap_id']:
                return true;
                break;
            case $datRelationTeamUsu['user_int2_id']:
                return true;
                break;
            case $datRelationTeamUsu['user_int3_id']:
                return true;
                break;
            case $datRelationTeamUsu['user_int4_id']:
                return true;
                break;
            default:
                return $this->EvalFirmAdmin($firma);
                break;
        }


    }

/*verific(Array $data,$val=NULL){
$dataCha=$this->getInfoChallenge($data['challenge_id']);
$dataC=CombatRound::where('schedule_end','!=','00:00:00')
->where('schedule_start','!=','00:00:00')
->where('stage_id','=',$data['stage_id'])
->orderBy('schedule_end','DESC')->first();*/


    /*fin de reto sorpresa*/


    /* modificacion de  peticion */
    public static function getindex($id){
        $challenge= Challenge::find($id);
        $challenge_name=$challenge->name;
        $dataGrouptwo = Group::where('challenge_id','=',$id)->where('active','=',1)->get();
        $dataGroup =Group::where('challenge_id','=',$id)->where('active','=',1)->get()->toArray();
        for($i=0;$i <= count($dataGroup) - 1; $i++){
            CombatRoundController::functionTwo(['group_id'=>$dataGroup[$i]['id'],'stage_id'=>$dataGroup[$i]['stage_id'],'challenge_id'=>$id]);
        }
        if(!ENV('DEVELOP')){
            return view('combatround/round2',compact('dataGrouptwo','challenge_name'));
        }
    }

    public static function verific(Array $data,$val=NULL){
        $dataCha=CombatRoundController::getInfoChallenge($data['challenge_id']);
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

    public static function functionTwo(Array $data){
        $dataCha=CombatRoundController::getInfoChallenge($data['challenge_id']);
        $horaInicio=CombatRoundController::verific($data);
        $dataGroup=CombatRound::where('group_id','=',$data['group_id'])->orderBy('versus_one',DB::raw('RAND()'))->get();
        for($i=0;$i <= count($dataGroup) - 1; $i++){
            $horaInicio=CombatRoundController::verific($data,$val=true);
            $dataTime=CombatRoundController::incremetTime(['time_start'=>$horaInicio,'time_durat'=>$dataCha->duration]);
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

    public Static function getInfoChallenge($id){
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

        if($request->flag == 'true'){
            $datos_s= CombatRound::where('rb_combat_round.stage_id','=',$da->stage_id)
            ->groupBy('group_id')->get()->toArray();
            for($i=0; $i <= count($datos_s)- 1;$i++){

                if($da->group_id == $datos_s[$i]['group_id']){

                    if($i == count($datos_s) - 1){
                        return ['success' => false ,'datos' => 'Lo sentimos este es el ultimo grupo del escenario solo se puede retrasar tiempo.'];
                    }else{
                        $Stage_back = Stage::where('challenge_id','=',$request->challenge_id)->where('back','=',1)->first();
                        $Group_upda= $datos_s[$i + 1]['group_id'];
                        $combat_update = CombatRound::where('group_id','=',$Group_upda)->update(['stage_id' => $Stage_back->id]);
                        return ['success' => true ,'datos' => 'Escenario respaldo activo'];

                    }
                    break;
                }
            }

            Log::error($datos_s);

            dd();


        }else{

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

            return ['success'=> true , 'datos'=>$daTwo];

        }


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



    /* inicio de combates de sumo */

    public function sumo($id){
           $d= $this->getInformationCombat($id);
       return view('challenge.sumo',compact('d'));
    }

    public function evaluation(Request $request){
        $data =Tool::removeSpace($request->all());
        $validator = Validator::make($data,[
            "primero" => "required|numeric",
            "segundo" => "required|numeric"
        ]);
        $toArray=$validator->errors()->toArray();
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $toArray
            ]);
        }
        if($data['primero'] > $data['segundo']){
            $win='2';
        }else if($data['segundo'] > $data['primero']){
            $win='1';
        }
        return response()->json([
            'success' => true,
            'win' =>['wins' =>$win]
        ]);
    }

    public  function firm(Request $request){
        $data =Tool::removeSpace($request->all());
        $validator = Validator::make($data,[
            "firma_equipo_uno" => "required|integer",
            "firma_equipo_dos" => "required|integer"
        ]);
        $firmOne=$this->evalFirms($data['equipo_uno'],$data['firma_equipo_uno']);
        $firmTwo=$this->evalFirms($data['equipo_dos'],$data['firma_equipo_dos']);

        $toArray=$validator->errors()->toArray();

        if ($validator->fails()) {
            return response()->json([
                'type'  =>'uno',
                'success' => false,
                'errors' => $toArray
            ]);
        }elseif( !$firmOne ){
            return response()->json([
                'type'  =>'dos',
                'firmOne' =>['message'=>'Lo sentimos esta firma no coincide con integrantes del equipo'],
            ]);
        }elseif( !$firmTwo ){
            return response()->json([
                'type'  =>'tres',
                'firmTwo' =>['message'=>'Lo sentimos esta firma no coincide con integrantes del equipo']
            ]);
        }else{
            Sumo::create([
                'combat_id'     => $request->combat_id,
                'team_id_win'   => $request->win,
                'team_id_one'   => $request->equipo_uno,
                'scort_team_one'=> $request->puntaje_equipo_one,
                'team_id_two'   => $request->equipo_dos,
                'scort_team_two'=> $request->puntaje_equipo_dos,
                'firm_team_one' => $request->firma_equipo_uno,
                'firm_team_two' => $request->firma_equipo_dos,

            ]);
            $com = CombatRound::find($request->combat_id);
            $com->completed= 1;
            $com->save();

            return response()->json([
                'type'  =>'cuatro',
                'success' => true
            ]);
        }
    }

    public function evalFirms($id,$firm){
        $relation = RelationTeUs::find($id)->toArray();
        switch($firm){
            case $relation['user_cap_id']:
                    return true;
                break;
            case $relation['user_int2_id']:
                    return true;
                break;
            case $relation['user_int3_id']:
                    return true;
                break;
            case $relation['user_int4_id']:
                    return true;
                break;
            default:
                return $this->EvalFirmAdmin($firm);
                break;
        }
    }

    public function evalFirmsTeam($id,$firm){
        $relation = RelationTeUs::where('team_id','=',$id)->first()->toArray();
        switch($firm){
            case $relation['user_cap_id']:
                return true;
                break;
            case $relation['user_int2_id']:
                return true;
                break;
            case $relation['user_int3_id']:
                return true;
                break;
            case $relation['user_int4_id']:
                return true;
                break;
            default:
                return $this->EvalFirmAdmin($firm);
                break;
        }
    }

    public function EvalFirmAdmin($firm){

        $user = User::find($firm);
        if($user){
            return true;
        }else{
            return false;
        }
    }
    /* fin de combates de sumo */


    /* inicio reto futbol*/
    public function futbol($id){
        $d= $this->getInformationCombat($id);
        return view('challenge.futbol',compact('d'));
    }

    public function futbolFirm(Request $request){
        $data =Tool::removeSpace($request->all());
        $validator = Validator::make($data,[
            "firma_equipo_uno" => "required|integer",
            "firma_equipo_dos" => "required|integer"
        ]);
        $firmOne=$this->evalFirms($data['equipo_uno'],$data['firma_equipo_uno']);
        $firmTwo=$this->evalFirms($data['equipo_dos'],$data['firma_equipo_dos']);

        $toArray=$validator->errors()->toArray();

        if ($validator->fails()) {
            return response()->json([
                'type'  =>'uno',
                'success' => false,
                'errors' => $toArray
            ]);
        }elseif( !$firmOne ){
            return response()->json([
                'type'  =>'dos',
                'firmOne' =>['message'=>'Lo sentimos esta firma no coincide con integrantes del equipo'],
            ]);
        }elseif( !$firmTwo ){
            return response()->json([
                'type'  =>'tres',
                'firmTwo' =>['message'=>'Lo sentimos esta firma no coincide con integrantes del equipo']
            ]);
        }else{
            Futbol::create([
                'combat_id'     => $request->combat_id,
                'team_id_win'   => $request->win,
                'team_id_one'   => $request->equipo_uno,
                'scort_team_one'=> $request->puntaje_equipo_one,
                'team_id_two'   => $request->equipo_dos,
                'scort_team_two'=> $request->puntaje_equipo_dos,
                'firm_team_one' => $request->firma_equipo_uno,
                'firm_team_two' => $request->firma_equipo_dos,
                'penalties'     => $request->penaltis,
            ]);
            $com = CombatRound::find($request->combat_id);
            $com->completed= 1;
            $com->save();

            return response()->json([
                'type'  =>'cuatro',
                'success' => true
            ]);


        }
    }

    /*Fin reto futbol*/


    /*inicio de reto blockrise*/

    public function block($id){
        $d= $this->getInformationCombat($id);
        return view('challenge.blockrise',compact('d'));

    }

    public function blockFirm(Request $request){
        $data= $this->evalFirms($request->team_id,$request->firma_usuario);
        if($data){
            $dataFin = BlockRise::where('combat_id','=',$request->combat_id)->first();

            if($dataFin){
                if($request->type == 1){
                    $iden=2;
                    $idPar=2;
                    $idPar2=1;
                }else{
                    $iden=1;
                    $idPar=1;
                    $idPar2=2;
                }
                $d=false;
                $m=false;
                /*
                 * if($request->identificador == 1){
                    $id=1;
                    $idPar=2;
                }else{
                    $id=2;
                    $idPar=1;
                }*/
                $vI1='team_id_'.$iden;
                $vI2='time_team_'.$iden;
                $vI3='zon_pun_roj_'.$iden;
                $vI4='num_api_roj_'.$iden;
                $vI5='zon_pun_ver_'.$iden;
                $vI6='num_api_ver_'.$iden;
                $vI7='zon_pun_azu_'.$iden;
                $vI8='num_api_azu_'.$iden;
                $vI9='scort_team_'.$iden;
                $vI10='firm_team_'.$iden;
                $dataBlock= BlockRise::where('combat_id','=',$request->combat_id)
                    ->select(
                        $vI1.' as team',
                        $vI2.' as time',
                        $vI3.' as zona_rojo',
                        $vI4.' as apilado_rojo',
                        $vI5.' as zona_verde',
                        $vI6.' as apilado_verde',
                        $vI7.' as zona_azul',
                        $vI8.' as apilado_azul',
                        $vI9.' as score',
                        $vI10.' as firma')
                    ->first()->toArray();

                    $dataOneApil= $dataBlock['apilado_rojo'] +$dataBlock['apilado_verde'] +$dataBlock['apilado_azul'];
                    $dataTwoApi= $request->numero_apilados_roja + $request->numero_apilados_verde + $request->numero_apilados_azules;
                if($dataBlock['score'] > $request->scort_team){
                    //print_r('aca 1');
                    $id=$idPar;
                    $d=true;
                    $teamWin=$dataBlock['team'];
                }elseif($request->scort_team > $dataBlock['score']){
                    //print_r('aca 2');
                    $id=$id=$idPar2;
                    $d=true;
                    $teamWin=$request->team_id;
                }else if($request->scort_team == $dataBlock['score']){
                    //dd('aca 3');
                    //print_r(strtotime($dataBlock['time']).'    -----------   '.strtotime($request->time_final));
                    if(strtotime($request->time_final) < strtotime($dataBlock['time'])){
                        //print_r('aca 4');
                        $teamWin=$request->team_id;
                        $d=true;
                        $id=$idPar2;
                    }else if(strtotime($dataBlock['time']) < strtotime($request->time_final) ){
                        $teamWin=$dataBlock['team'];
                        //print_r('aca 5');
                        $d=true;
                        $id=$idPar;
                    }if(strtotime($request->time_final) == strtotime($dataBlock['time'])){
                        if($dataOneApil > $dataTwoApi){
                            //print_r('acas 1');
                            $teamWin=$dataBlock['team'];
                            $id=$idPar;
                            $d=true;
                        }else if($dataTwoApi > $dataOneApil){
                            //print_r('acas 2');
                            $teamWin=$request->team_id;
                            $id=$idPar;
                            $d=true;
                        }
                    }
                }
                /*dd('team wind   '.$teamWin.' el id '.$id);
                //dd('team wind   '.$teamWin.' el id ');
                dd($dataBlock);*/

                $v1="team_id_".$request->type;
                $v2="time_team_".$request->type ;
                $v3="zon_pun_roj_".$request->type;
                $v4="num_api_roj_".$request->type;
                $v5="zon_pun_ver_".$request->type;
                $v6="num_api_ver_".$request->type;
                $v7="zon_pun_azu_".$request->type ;
                $v8="num_api_azu_".$request->type;
                $v9="scort_team_".$request->type;
                $v10="firm_team_".$request->type;

                $dataFin->$v1   = $request->team_id;
                $dataFin->$v2   = $request->time_final;
                $dataFin->$v3   = $request->zona_puntaje_roja;
                $dataFin->$v4   = $request->numero_apilados_roja;
                $dataFin->$v5   = $request->zona_puntaje_verde;
                $dataFin->$v6   = $request->numero_apilados_verde;
                $dataFin->$v7   = $request->zona_puntaje_azules;
                $dataFin->$v8   = $request->numero_apilados_azules;
                $dataFin->$v9   = $request->scort_team;
                $dataFin->$v10  = $request->firma_usuario;
                $dataFin->team_id_win =$teamWin;

                $dataFin->save();
                return [
                    'flag'      =>  $d,
                    'flag_win'  =>  $id,
                    'muerte'  => $m,
                    'error' =>$data
                ];

            }else{
                BlockRise::create([
                    'team_id_'.$request->type       => $request->team_id,
                    'time_team_'.$request->type     => $request->time_final,
                    'zon_pun_roj_'.$request->type   => $request->zona_puntaje_roja,
                    'num_api_roj_'.$request->type   => $request->numero_apilados_roja,
                    'zon_pun_ver_'.$request->type   => $request->zona_puntaje_verde,
                    'num_api_ver_'.$request->type   => $request->numero_apilados_verde,
                    'zon_pun_azu_'.$request->type   => $request->zona_puntaje_azules,
                    'num_api_azu_'.$request->type   => $request->numero_apilados_azules,
                    'scort_team_'.$request->type    => $request->scort_team,
                    'firm_team_'.$request->type     => $request->firma_usuario,
                    'combat_id'                     => $request->combat_id
                ]);
            }

            /*$com = CombatRound::find($request->combat_id);
            $com->completed= 1;
            $com->save();*/


        }

        return ['error' =>$data];







    }

    public function getInfoBlock(Request $request){
        //dd($request->all());
        $data = BlockRise::where('combat_id','=',$request->combat_id)->first();;
        $array =[];
        $true =false;
        if($request->identificador == 2){
            $array += [
                'time' =>$data->time_team_2,
                'zona_1'=>$data->zon_pun_roj_2,
                'num_1'=>$data->num_api_roj_2,
                'zona_2'=>$data->zon_pun_ver_2,
                'num_2'=>$data->num_api_ver_2,
                'zona_3'=>$data->zon_pun_azu_2,
                'num_3'=>$data->num_api_azu_2,
                'score'=>$data->scort_team_2
            ];
            $true =true;
        }else{
            $array += [
                'time' =>$data->time_team_1,
                'zona_1'=>$data->zon_pun_roj_1,
                'num_1'=>$data->num_api_roj_1,
                'zona_2'=>$data->zon_pun_ver_1,
                'num_2'=>$data->num_api_ver_1,
                'zona_3'=>$data->zon_pun_azu_1,
                'num_3'=>$data->num_api_azu_1,
                'score'=>$data->scort_team_1
            ];
            $true =true;
        }
        return ['data'=>$array,
                'flag'=>$true];
        /*
         *  'team_id_1',
        'time_team_1',
        'zon_pun_roj_1',
        'num_api_roj_1',
        'zon_pun_ver_1',
        'num_api_ver_1',
        'zon_pun_azu_1',
        'num_api_azu_1',
        'scort_team_1',
        'team_id_2',
        'time_team_2',
        'zon_pun_roj_2',
        'num_api_roj_2',
        'zon_pun_ver_2',
        'num_api_ver_2',
        'zon_pun_azu_2',
        'num_api_azu_2',
        'scort_team_2',
        'firm_team_2',
        'firm_team_1']
        */


    }

    /*fin del reto block rise*/


    /* inicio de obstaculos*/

    public function obstaculos($id){
        $d= $this->getInformationCombat($id);
        return view('challenge.obstaculos',compact('d'));
    }

    public function getInfoCombatObsta(Request $request){
       /* dd($request->all());*/
        $v1='team_id_'.$request->identificador.' as team_id';
        $v2='scort_team_'.$request->identificador.' as score';
        $v3='time_team_'.$request->identificador.' as time';
        $v4='drop_team_'.$request->identificador.' as drop';
        $v5='firm_team_'.$request->identificador.' as firm';
        /*
         * $v2='scort_team_'.$request->identificador.' as  score';
        $v3='time_team_'.$request->identificador.' as time';
        $v4='drop_team_'.$request->identificador.' as drop';
        $v5='firm_team_'.$request->identificador.' as firm';
        */
        $data = Obstaculos::where('combat_id','=',$request->combat_id)
            ->where('restart','=',0)
            ->select($v1,$v2,$v3,$v4,$v5)
            ->first();
        if($data){
            $dataToArray=$data->toArray();
            $valor=true;
        }else{
            $dataToArray = [];
            $valor=false;
        }
      /*  dd($data);*/

        return [
            'identificador'=>$request->identificador,
            'data_array' => $dataToArray,
            'flag' => $valor
        ];



    }

    public function obstFirm(Request $request){
        //dd($request->all());
        $d=false;
        $data2 =Tool::removeSpace($request->all());
        $validator = Validator::make($data2,[
            "firma_usuario" => "required|integer"
        ]);
        $data= $this->evalFirms($request->team_id,$request->firma_usuario);
        $toArray=$validator->errors()->toArray();
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $toArray
            ]);

        }else if(!$data){
            return response()->json([
                'success' => false,
                'errors' => [0 => 'Verificar La firma no coincide']
            ]);
        }else{
            $obst = Obstaculos::where('combat_id','=',$request->combat)
                ->where('restart','=',0)
                ->first();
            if($obst){
                if($request->identificador == 1){
                    $id=1;
                    $idPar=2;
                }else{
                    $id=2;
                    $idPar=1;
                }

                $v1Part='team_id_'.$idPar;
                $v2Part='scort_team_'.$idPar;
                $v3Part='time_team_'.$idPar;
                $v4Part='drop_team_'.$idPar;
                $v5Part='firm_team_'.$idPar;

                $v1='team_id_'.$id;
                $v2='scort_team_'.$id;
                $v3='time_team_'.$id;
                $v4='drop_team_'.$id;
                $v5='firm_team_'.$id;
                $v6="combat_id";
                $v7="team_id_win";
                $v8="restart";

                $obstPart = Obstaculos::where('combat_id','=',$request->combat)->where('restart','=',0)
                                        ->select(
                                            $v1Part.' as team',
                                            $v2Part.' as score',
                                            $v3Part.' as time',
                                            $v4Part.' as drop',
                                            $v5Part.' as frim')
                                        ->first()
                                        ->toArray();

                if($obstPart['score'] == $data2['score']){ // si los dos ganan
                    if(strtotime($obstPart['time']) < strtotime($data2['time'])){
                        $win=$obstPart['team'];
                    }else if(strtotime($data2['time']) < strtotime($obstPart['time'])){
                        $win=$data2['team_id'];
                    }else {
                        $win=0;
                        $d=true;
                    }
                }else if($obstPart['drop'] == $data2['drop']){ // si los dos caen
                    //dd($data2['score'] .'  ----  '.  $obstPart['score']);
                    if($data2['score'] == $obstPart['score']){
                        $win=0;
                        $d=true;
                    }else if($data2['score'] >  $obstPart['score']) {
                        //dd($data2['score'].' < '. $obstPart['score'].' entra en el segundo id par = '.$idPar.' el id '.$id);
                        $win=$data2['team_id'];
                        $idPar=$id;
                        //dd('el ide par 1 '.$idPar);
                    }else if($data2['score'] < $obstPart['score'] ){
                        //dd($obstPart['score'].' > '.$data2['score'].' entra en el primero id par = '.$idPar.' el id '.$id);
                        $win=$obstPart['team'];
                        //$idPar=$id;
                        //dd('el ide par 2 '.$idPar);
                    }else {
                        dd('a ninguno');
                    }

                }else if($obstPart['drop'] == 0  && $data2['drop'] == 1){ // si el guardado no cae y el otro si
                    if($obstPart['score'] == 100 ){
                        $win=$obstPart['team'];
                    }else {
                        $win=0;
                        $d=true;
                    }
                }
                else if($obstPart['drop'] == 1  && $data2['drop'] == 0){  // si el guardado callo y el otro no
                    if($data2['score'] == 100){
                        $win=$data2['team_id'];
                        $idPar=$id;
                    }else{
                        $win=0;
                        $d=true;
                    }
                }
                    if(!$d){

                        $succes=true;
                        $ero=[0 => 'Datos Guardados'];
                    }else{
                        $succes=false;
                        $ero=[0 => 'Se reiniciara el reto'];

                    }
                        $obst->$v1 = $data2['team_id'];
                        $obst->$v2 = $data2['score'];
                        $obst->$v3 = $data2['time'];
                        $obst->$v4 = $data2['drop'];
                        $obst->$v5 = $data2['firma_usuario'];
                        $obst->$v6 = $data2['combat'];
                        $obst->$v7 = $win;
                        $obst->$v8 = $d;
                        $obst->save();

                            return [
                                'success' => $succes,
                                'errors' => $ero,
                                'win' => $idPar,
                                'rest' =>$d
                            ];

            }else{
                Obstaculos::create([
                    'team_id_'.$request->identificador           => $data2['team_id'],
                    'scort_team_'.$request->identificador        => $data2['score'],
                    'time_team_'.$request->identificador         => $data2['time'],
                    'drop_team_'.$request->identificador         => $data2['drop'],
                    'firm_team_'.$request->identificador         => $data2['firma_usuario'],
                    'combat_id'                                  => $data2['combat'],
                    'restart'                                    => $d
                ]);
                return response()->json([
                    'success' => true,
                    'errors' => [0 => 'Datos Guardados'],
                    'win' => 0,
                    'rest' => $d
                ]);
                /*
                 * "firma_usuario" => "22"
  "team_id" => "9"
  "identificador" => "2"
  "combat" => "4"
  "drop" => "1"
  "score" => "0"
  "time" => "00:00:02"
                 */



            }

        }



    }

    /* fin de obstaculos*/

    /* inicio de taekwondo*/

    public function taekwondo($id){
        $d= $this->getInformationCombat($id);
        //dd($d);
        return view('challenge.taekwondo',compact('d'));

    }

    public function taekFirm(Request $request){
        //dd($request->all());
        $data2 =Tool::removeSpace($request->all());
        $validator = Validator::make($data2,[
            "firma_equipo_uno"   => "required|integer",
            "firma_equipo_dos"   => "required|integer",
        ]);
        //dd($request->team_id_1.'   -----  '.$request->firma_equipo_uno);
        $data1 = $this->evalFirmsTeam($request->team_id_1,$request->firma_equipo_uno);
        $data2 = $this->evalFirmsTeam($request->team_id_2,$request->firma_equipo_dos);
        //dd($data1.'  ----------  '.$data2);

        $toArray=$validator->errors()->toArray();
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $toArray
            ]);

        }else if($data1 != true) {
            return response()->json([
                'success' => false,
                'errors' => [0 => 'El campo firma equipo uno no coincide']
            ]);
        }else if($data2 != true){

            return response()->json([
                'success' => false,
                'errors' => [0 => 'El campo firma equipo dos no coincide']
            ]);

        }else{

            Taekwondo::create([
                'team_id_win'   =>$request->win,
                'team_id_1'     =>$request->team_id_1,
                'score_team_1'  =>$request->score_equipo_1,
                'drop_team_1'   =>$request->caidas_equipo_1,
                'firm_team_1'   =>$request->firma_equipo_uno,
                'team_id_2'     =>$request->team_id_2,
                'score_team_2'  =>$request->score_equipo_2,
                'drop_team_2'   =>$request->caidas_equipo_2,
                'firm_team_2'   =>$request->firma_equipo_dos,
            ]);


        }
    }

    /* fin de taekwondo*/



    public function getInformationCombat($id){
       return  CombatRound::where('rb_combat_round.id','=',$id)
            ->join('rb_group_stage as r_g','r_g.round_id','=','rb_combat_round.versus_one')
            ->join('rb_group_stage as r_g2','r_g2.round_id','=','rb_combat_round.versus_two')
            ->join('rb_rounds as r_b','r_b.id','=','r_g.round_id')
            ->join('rb_rounds as r_b2','r_b2.id','=','r_g2.round_id')
            ->join('rb_team as r_t','r_t.id','=','r_b.team_id')
            ->join('rb_team as r_t2','r_t2.id','=','r_b2.team_id')
            ->join('rb_groups as r_gr','r_gr.id','=','r_g.group_id')
            ->join('rb_groups as r_gr2','r_gr2.id','=','r_g2.group_id')
            ->join('rb_institution as r_i','r_i.id','=','r_t.institution_id')
            ->join('rb_institution as r_i2','r_i2.id','=','r_t2.institution_id')
            ->join('rb_challenges as r_c','r_c.id','=','r_t.challenge_id')
            ->select(
            /*'r_g.id as id_rg',
            'r_g.group_id as group_id_rg',
            'r_g2.id as id_rg2',
            'r_g2.group_id as group_id_rg2',
            'r_b.team_id as r_b_team_id',
            'r_b2.team_id as r_b2_team_id',
            'r_gr.name as r_gr_name',
            'r_gr2.name as r_gr2_name',*/
                'r_b.team_id as r_b_team_id',
                'r_b2.team_id as r_b2_team_id',
                'r_t.name as r_t_name',
                'r_t2.name as r_t2_name',
                'r_t.gender as gender_1',
                'r_t2.gender as gender_2',
                'r_i.name as in_name_1',
                'r_i2.name as in_name_2',
                'r_c.name as nam_c',
                'r_c.duration as duration',
                'r_c.challenge_duration as challenge_duration',
                'rb_combat_round.completed as completed',
                'rb_combat_round.evaluation as evaluation'
            )->orderBy('rb_combat_round.schedule_start', 'asc')
            ->first();
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
