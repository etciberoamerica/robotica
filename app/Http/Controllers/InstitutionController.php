<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tool;


use App\Institution;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        $url_actual = explode('?',$url_actual);
        $insti=Institution::orderBy('id','desc')->paginate(env('PAG'));
        $insti->setPath($url_actual[0]);
        return view('institutions.index',compact('insti'));
    }

    public function add(){

        return view('institutions.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {


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
        if($request->ajax()){
            return Institution::find($request->id);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */

    public function returnType($data){
        switch($data){
            case 'MAS':
                $a= 'mas';
                break;
            case 'FEM':
                $a= 'fem';
                break;
            case 'MIX':
                $a= 'mix';
                break;

        }
        return $a;
    }


    public function update(Request $request)
    {
        $data= Tool::removeSpace($request->all());
        //dd($data);

        if($data['id']){




        }else{
            $ins = new Institution;
            $ins->name = $data['nombre'];
            $ins->user_id=1;
            if(isset($data['Tipo'][0])){
                $r=$this->returnType($data['Tipo'][0]);
                $ins->$r= true;
            }
            if(isset($data['Tipo'][1])){
                $r=$this->returnType($data['Tipo'][1]);
                $ins->$r= true;
            }
            if(isset($data['Tipo'][2])){
                $r=$this->returnType($data['Tipo'][2]);
                $ins->$r= true;
            }
            $ins->save();
            $url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
            $url_actual = explode('?',$url_actual);
            $insti=Institution::orderBy('id','desc')->paginate(env('PAG'));
            $insti->setPath($url_actual[0]);
            return view('institutions.index',compact('insti'));
        }


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

    /*
     * Autor: Ricardo Lugo The Richi
     * obtiene todos los colegios que esten activos
     */

    public function autocomplete(){
        $data = Institution::where('active','1')->get();

        return $data->toJson();

    }
}
