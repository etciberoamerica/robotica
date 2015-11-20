<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;
use App\Stage;
use App\Tool;
use App\Challenge;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {

        $challenge= Challenge::find($id);
        $name_challenge = $challenge->name;
        $cha = Challenge::listGroup();
        $pag = $this->pagination($id);
        return view('stages.index',compact('pag','cha','id','name_challenge'));
    }

    public function pagination($id){
        $url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        $url_actual = explode('?',$url_actual);

        $pag = Stage::where('rb_stages.challenge_id','=',$id)
            ->join('rb_challenges','rb_challenges.id','=','rb_stages.challenge_id')
            ->select('rb_stages.*','rb_challenges.name as name_challenge')
            ->orderBy('rb_stages.challenge_id','asc')->paginate(env('PAG'));
        $pag->setPath($url_actual[0]);
        return $pag;
    }


    public function create(Request $request){

        $data= Tool::removeSpace($request->all());
        $check = (!empty($data['Respaldo']))? 1 : 0;

        $validator = Validator::make($data,[
            "Nombre" => "required",
        ]);
        $toArray=$validator->errors()->toArray();
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $toArray
            ]);
        }else{
            if($data['id']){
                $sta = Stage::find($data['id']);
                $sta->name     =   $data['Nombre'];
                $sta->active   =   $data['Estatus'];
                $sta->challenge_id = $data['Reto'];
                $sta->back = $check;
                $sta->save();
                return response()->json([
                    'success' => true,
                ]);
            }else{
                Stage::create([
                    'name'          => $data['Nombre'],
                    'challenge_id'  => $data['Reto'],
                    'back'          => $check,
                ]);
                return response()->json([
                    'success' => true,
                ]);
            }
        }
        //$pag = $this->pagination();
        //return view('stages.index',compact('pag'));

    }

    public function edit(Request $request){
        $data= Tool::removeSpace($request->all());
        return Stage::find($data['id']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */



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
        //dd($request->all());
        $d=Stage::find($request->id);
        $d->delete();
        return response()->json([
            'success' => true,
        ]);
    }

    /*
     * edit
     * store
     * show
     * update
     * destroy
     * */
}
