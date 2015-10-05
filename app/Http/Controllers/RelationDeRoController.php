<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\RelationDeRo;
class RelationDeRoController extends Controller
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

    public function relation(){
       $data= RelationDeRo::
            join('degrees as d','d.id','=','relation_de_ro.degree_id')
            ->join('challenges as c','c.id','=','relation_de_ro.challenge_id')
            ->join('robots as r','r.id','=','relation_de_ro.robot_id')
            ->select('relation_de_ro.*','d.name as grupo','c.name as reto','r.name as robot')
           ->get();
        return view('challenge.index',compact('data'));
    }

    public function relationChalle(Request $request){
        $degree = $request->degree_id;
        $data = RelationDeRo::
        join('challenges','challenges.id','=','relation_de_ro.challenge_id')
        ->select('relation_de_ro.*','challenges.*')
        ->where('relation_de_ro.degree_id',$degree)
            ->lists('challenges.name','challenges.id');
        return $data;

    }
}
