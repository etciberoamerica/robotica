<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
Use App\Challenge;

use App\Tool;
class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       $pag = $this->pagination();
        return view('challenge.index',compact('pag'));
    }

    public function pagination(){
        $url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        $url_actual = explode('?',$url_actual);
        $pag = Challenge::orderBy('id','desc')->paginate(env('PAG'));
        $pag->setPath($url_actual[0]);
        return $pag;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $data= Tool::removeSpace($request->all());
        if($data['id']){
            $chan = Challenge::find($data['id']);
            $chan->name     =   $data['Nombre'];
            $chan->active   =   $data['Estatus'];
            $chan->duration  =   $data['Duración_reto'];
            $chan->schedumal =   $data['Hora_inicio'];
            $chan->free_time =   $data['tiempo_libre'];
            $chan->save();
        }else{
            Challenge::create([
                'name'      => $data['Nombre'],
                'duration'  => $data['Duración_reto'],
                'schedumal' => $data['Hora_inicio'],
                'free_time' => $data['tiempo_libre']

            ]);
        }
        $pag = $this->pagination();
        return view('challenge.index',compact('pag'));
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
        return Challenge::find($data['id']);
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
        $d=Challenge::find($request->id);
        $d->delete();
        $pag = $this->pagination();
        return view('challenge.index',compact('pag'));
    }

    public static function getlist(){
        $data =[];
        $data +=['' => '-- Selecciona categoria --'];
        $data += Challenge::lists('name','id')->toArray();
        return $data;

    }
}
