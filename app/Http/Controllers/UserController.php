<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tool;
use App\User;
use Validator;
class UserController extends Controller
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

    public function checkOne(Request $request){
        $data =Tool::removeSpace($request->all());
        $validator = Validator::make($data,[
            "Institución" => "required",
            "Nombre_del_equipo" => "required",
            "Nombre_del_robot" => "required",
            "País" => "required",
            "Estado" => "required",
            "Ciudad" => "required",
            "Género" => "required",
            "Reto" => "required",
            "Grado" => "required"
        ]);
       // dd($validator->errors()->toArray());
        $toArray=$validator->errors()->toArray();
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $toArray

            ]);
        }

        return response()->json([
            'success' => true,
        ]);

    }


    public function checkTwo(Request $request){

        $data =Tool::removeSpace($request->all());

        $validator = Validator::make($data,[
            "Nombre" => "required",
            "Apellido_Paterno" => "required",
            "Apellido_Materno" => "required",
            "Correo" => "required|email",
            "Correo_confirmación" => "required|email",
            "Correo_alterno"=>"required|email",
            "Nombre_Coach_auxiliar" => "required",
            "Apellido_Paterno_Coach_auxiliar" => "required",
            "Apellido_Materno_Coach_auxiliar" => "required",
            "Nombre_coordinador" => "required",
            "Apellido_paterno_coordinador" => "required",
            "Apellido_materno_coordinador" => "required"
        ]);

        $toArray=$validator->errors()->toArray();
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $toArray

            ]);
        }

        return response()->json([
            'success' => true,
        ]);

    }

    public function checkThree(Request $request){
        $data =Tool::removeSpace($request->all());
        $validator =Validator::make($data,
            [ "Nombre_capitan" => "required",
              "Apellido_paterno_capitan" => "required",
              "Apellido_materno_capitan" => "required",
              "Nombre_2_integrante" => "required",
              "Apellido_paterno_2_integrante" => "required",
              "Apellido_materno_2_integrante" => "required",
              "Nombre_3_integrante" => "required",
              "Apellido_paterno_3_integrante" => "required",
              "Apellido_materno_3_integrante" => "required",
              "Nombre_4_integrante" => "required",
              "Apellido_paterno_4_integrante" => "required",
              "Apellido_materno_4_integrante" => "required"
            ]);
        $toArray=$validator->errors()->toArray();
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $toArray

            ]);
        }

        return response()->json([
            'success' => true,
        ]);

    }

}
