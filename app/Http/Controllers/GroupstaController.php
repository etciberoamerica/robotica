<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Groupsta;
use App\Group;
use App\Round;
use App\Challenge;

use Log;
use DB;
use Validator;

class GroupstaController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'Grupo' => 'required',
        ]);

        $toArray=$validator->errors()->toArray();

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $toArray

            ]);
        }
        $g=Groupsta::find($data['id']);
        $g->group_id = $data['Grupo'];
        $g->save();
        return response()->json([
            'success' => true,
        ]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public static function index($id,array $data=['y'=>0])
    {

        $challenge= Challenge::find($id);

        $challenge_name=$challenge->name;
        $group= Group::where('challenge_id','=',$id)->get()->toArray();
        $teamRound =Round::where('challenge_id','=',$id)->orderBy('team_id','DESC')->get()->toArray();
        $countTeamRound=count($teamRound);
        $countGroup = count($group)+$data['y'];
        $div = ($countTeamRound/$countGroup);
        $p=0;
        for($i=$data['y'];$i<=count($teamRound)-1;$i++){
            if(!Groupsta::where('round_id','=',$teamRound[$i]['id'])->first()){

                Groupsta::create([
                'round_id' =>        $teamRound[$i]['id'],
                'group_id'=>        $group[$p]['id'],
                'challenge_id' =>   $id
                ]);
            }
            if($i == $countGroup - 1){
                GroupstaController::index($id,$data=['y'=>$i+1]);
                break;
            }

        $p++;
        }
        if(!ENV('DEVELOP')){
            $data= GroupstaController::pagination($id);
            $dataG= [];
            $dataG +=[''=>'-- Seleciona Grupo --'];
            $datagro = Group::where('challenge_id','=',$id)->lists('name','id')->toArray();
            $dataG += $datagro;
            return view('groupsstage.index',compact('data','challenge_name','dataG'));
        }
    }

    public static function pagination($id){
        $data=Group::where('challenge_id','=',$id)
            ->get()->toArray();
        for($i=0;$i<= count($data)-1;$i++){
            $dr=Groupsta::where('group_id','=',$data[$i]['id'])
                ->join('rb_rounds','rb_rounds.id','=','rb_group_stage.round_id')
                ->join('rb_team','rb_team.id','=','rb_rounds.team_id')
                ->select('rb_rounds.*','rb_team.name as nombre_equipo',
                    'rb_team.name_altered as nombre_alterno'
                    ,'rb_team.gender as genero','rb_group_stage.id as id_g_s')
                ->get()->toArray();

            $data[$i]['data_team'] = [];
            $data[$i]['data_team'] +=$dr;
        }
        return $data;
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
