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






        /*
            select rdr.*,d.name,c.name
from relation_de_ro as rdr
inner join degrees as d on(d.id = rdr.degree_id)
inner join challenges as c on(c.id = rdr.challenge_id);
        */


        return view('challenge.index',compact('data'));
    }
}
