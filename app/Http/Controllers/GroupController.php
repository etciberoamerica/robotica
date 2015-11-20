<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Group;
use App\Tool;
use App\Challenge;
use App\Team;
use App\Stage;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {
        $team = Team::where('challenge_id','=',$id)->get();
        $group = Group::where('challenge_id','=',$id)->get();
        $array =[];
        if(count($team) < 24){
            $array +=['message' => 'Solo Puedes crear 4 grupos tienes '. count($group)];
        }else if(count($team) >= 24){
            $array +=['message' => 'Solo Puedes crear 8 grupos tienes '. count($group)];
        }
        $datArray= $array;

        $stage = Stage::where('challenge_id','=',$id)->lists('name','id');


        $challenge= Challenge::find($id);
        $name_challenge = $challenge->name;
        $cha = $id;
        $pag=$this->pagination($id);
        return view('groups.index',compact('stage','pag','cha','name_challenge','datArray'));

    }

    public function buildGroup($id){

        $group = Group::where('challenge_id','=',$id)->get();
        $counGroupOne = count($group);
        $team = Team::where('challenge_id','=',$id)->get();
        $array =[];
        if(count($team) < 24){
            if($counGroupOne  >= 4){
               return true;
            }
        }else if(count($team) >= 24){
            if(8 <=  $counGroupOne){
                return true;
            }
        }
        return  $array;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request){
        $data= Tool::removeSpace($request->all());
        $validator = Validator::make($data,[
            "Nombre" => "required",
            "escenario" => "required",

        ]);
        $toArray=$validator->errors()->toArray();
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $toArray
            ]);
        }else{
            if($data['id']){
                $group = Group::find($data['id']);
                $group->name            =   $data['Nombre'];
                $group->challenge_id    =   $data['Reto'];
                $group->stage_id        =   $data['escenario'];
                $group->active          =   $data['Estatus'];
                $group->save();
                return response()->json([
                    'success' => true,
                ]);
            }else{
                $dataBuild= $this->buildGroup($data['Reto']);
                if($dataBuild){
                    return response()->json([
                        'success' => false,
                        'errors' => [0 => 'Ya no se pueden crear mas grupos para reto']
                    ]);
                }else{
                    Group::create([
                        'name'          =>  $data['Nombre'],
                        'challenge_id'  =>  $data['Reto'],
                        'stage_id'      =>  $data['escenario']
                    ]);
                    return response()->json([
                        'success' => true,
                    ]);
                }
            }
        }
    }


    public function pagination($id){
        $url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        $url_actual = explode('?',$url_actual);
        $pag = Group::where('rb_groups.challenge_id','=',$id)
            ->join('rb_challenges','rb_challenges.id','=','rb_groups.challenge_id')
            ->join('rb_stages','rb_stages.id','=','rb_groups.stage_id')
            ->select('rb_groups.*','rb_challenges.name as name_cha','rb_stages.name as name_sta')
            ->orderBy('id','asc')->paginate(env('PAG'));
        $pag->setPath($url_actual[0]);
        return $pag;
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
    public function edit(Request $request)
    {
        $data= Tool::removeSpace($request->all());
        return Group::find($data['id']);
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
    public function destroy(Request $request)
    {
        $d=Group::find($request->id);
        $d->delete();
        return response()->json([
            'success' => true,
        ]);
    }
}
