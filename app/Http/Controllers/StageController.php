<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
    public function index()
    {
        $cha = Challenge::listGroup();
        $pag = $this->pagination();
        return view('stages.index',compact('pag','cha'));
    }

    public function pagination(){
        $url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        $url_actual = explode('?',$url_actual);
        $pag = Stage::orderBy('id','desc')->paginate(env('PAG'));
        $pag->setPath($url_actual[0]);
        return $pag;
    }


    public function create(Request $request){
        $data= Tool::removeSpace($request->all());
        if($data['id']){
            $sta = Stage::find($data['id']);
            $sta->name     =   $data['Nombre'];
            $sta->active   =   $data['Estatus'];
            $sta->save();
        }else{
            Stage::create([
                'name'      => $data['Nombre'],
            ]);
        }
        $pag = $this->pagination();
        return view('stages.index',compact('pag'));

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
        $d=Stage::find($request->id);
        $d->delete();
        $pag = $this->pagination();
        return view('challenge.index',compact('pag'));
    }

    /*
     * edit
     * store
     * show
     * update
     * destroy
     * */
}
