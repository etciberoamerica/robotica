<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Group;
use App\Tool;
use App\Challenge;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cha = Challenge::listGroup();
        $pag=$this->pagination();
        return view('groups.index',compact('pag','cha'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request){
        $data= Tool::removeSpace($request->all());
        if($data['id']){
            $group = Group::find($data['id']);
            $group->name            =   $data['Nombre'];
            $group->challenge_id    =   $data['Reto'];
            $group->active          =   $data['Estatus'];
            $group->save();
        }else{
            Group::create([
                'name'          =>  $data['Nombre'],
                'challenge_id'  =>  $data['Reto'],
            ]);
        }
        return $this->index();
    }

    public function pagination(){
        $url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        $url_actual = explode('?',$url_actual);
        $pag = Group::join('rb_challenges','rb_challenges.id','=','rb_groups.challenge_id')->select('rb_groups.*','rb_challenges.name as name_cha')->orderBy('id','desc')->paginate(env('PAG'));
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
        return $this->index();
    }
}
