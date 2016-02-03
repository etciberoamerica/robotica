<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CombatRound;
use App\Group;
use App\Challenge;
use App\Groupsta;

use App\Http\Controllers\GroupstaController as Con;
use App\Http\Controllers\CombatRoundController;

class EndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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


   /* public static function FindCombat($id){
        $dataStage=Group::where('challenge_id','=',$id)->get();
        $data = CombatRound::where('challenge_id','=',$id)->get();
       // dd(count($dataStage));
        foreach($dataStage as $ds){
            print_r($ds['name']);

        }


    }*/


    public static function FindCombat($id)
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

        dd($data);
        if(!ENV('DEVELOP')){
            return view('combatround.index',compact('data','challenge_name'));
        }
    }


}
