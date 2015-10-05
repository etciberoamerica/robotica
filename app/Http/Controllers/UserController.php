<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use App\Tool;
use App\User;
use App\Team;
use App\RelationTeUs;
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

    public function checkNameTeam(Request $request){
        $data =Tool::removeSpace($request->all());
        $validator = Validator::make($data,[
            "Nombre_del_equipo" => "required|name_team"
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

    public function checkOne(Request $request){
        $data =Tool::removeSpace($request->all());

        //var_dump($data);

        $dat_v= [
            'Género'    => $data['Género'],
            'Reto'      => $data['Reto'],
            'Grado'      => $data['Grado']
        ];
        /*
         * array(9) {
         * ["Institución"]=> string(1) "9"
         * ["Nombre_del_equipo"]=> string(13) "wwwwwwwwwwwww"
         * ["Nombre_del_robot"]=> string(20) "wwwwwwwwwwwwwwwwwwww"
         * ["País"]=> string(3) "858" ["Estado"]=> string(3) "858"
         * ["Ciudad"]=> string(1) "1"
         * ["Género"]=> string(3) "MAS" ["Reto"]=> string(1) "1" ["Grado"]=> string(1) "1" }
         */
        $validator = Validator::make($data,[
            "Institución" => "required|valid_team:".implode(",", $dat_v),
            "Nombre_del_equipo" => "required|name_team",
            "Nombre_del_robot" => "required|alpha_space",
            "País" => "required",
            "Estado" => "required",
            "Ciudad" => "required",
            "Género" => "required",
            "Reto" => "required",
            "Grado" => "required"
        ]);
        //dd($validator->errors()->toArray());
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
            "Nombre" => "required|alpha_space",
            "Apellido_Paterno" => "required|alpha",
            "Apellido_Materno" => "required|alpha",
            "Correo" => "required|email|unique:users,email",
            "Correo_confirmación" => "required|email|same:Correo",
            "Correo_alterno"=>"required|email",
            "Nombre_Coach_auxiliar" => "required|alpha_space",
            "Apellido_Paterno_Coach_auxiliar" => "required|alpha",
            "Apellido_Materno_Coach_auxiliar" => "required|alpha",
            "Nombre_coordinador" => "required|alpha_space",
            "Apellido_paterno_coordinador" => "required|alpha",
            "Apellido_materno_coordinador" => "required|alpha"
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
        $data=$request->all();
        $dataOne    =Tool::removeSpace($data['datosOne']);
        $dataTwo    =Tool::removeSpace($data['datosTwo']);
        $dataThree  =Tool::removeSpace($data['datosThree']);
        $validatorOne = Validator::make($dataOne,[
            "Institución" => "required",
            "Nombre_del_equipo" => "required|name_team",
            "Nombre_del_robot" => "required|alpha_space",
            "País" => "required",
            "Estado" => "required",
            "Ciudad" => "required",
            "Género" => "required",
            "Reto" => "required",
            "Grado" => "required"
        ]);
        $validatorTwo = Validator::make($dataTwo,[
            "Nombre" => "required|alpha_space",
            "Apellido_Paterno" => "required|alpha",
            "Apellido_Materno" => "required|alpha",
            "Correo" => "required|email|unique:users,email",
            "Correo_confirmación" => "required|email|same:Correo",
            "Correo_alterno"=>"required|email",
            "Nombre_Coach_auxiliar" => "required|alpha_space",
            "Apellido_Paterno_Coach_auxiliar" => "required|alpha",
            "Apellido_Materno_Coach_auxiliar" => "required|alpha",
            "Nombre_coordinador" => "required|alpha_space",
            "Apellido_paterno_coordinador" => "required|alpha",
            "Apellido_materno_coordinador" => "required|alpha"
        ]);
        $validatorThree =Validator::make($dataThree,
            [ "Nombre_capitan" => "required|alpha_space",
              "Apellido_paterno_capitan" => "required|alpha",
              "Apellido_materno_capitan" => "required|alpha",
              "Nombre_2_integrante" => "required|alpha_space",
              "Apellido_paterno_2_integrante" => "required|alpha",
              "Apellido_materno_2_integrante" => "required|alpha",
              "Nombre_3_integrante" => "required|alpha_space",
              "Apellido_paterno_3_integrante" => "required|alpha",
              "Apellido_materno_3_integrante" => "required|alpha",
              "Nombre_4_integrante" => "required|alpha_space",
              "Apellido_paterno_4_integrante" => "required|alpha",
              "Apellido_materno_4_integrante" => "required|alpha"
            ]);
        $toArrayOne     =$validatorOne->errors()->toArray();
        $toArrayTwo     =$validatorTwo->errors()->toArray();
        $toArrayThree   =$validatorThree->errors()->toArray();
        if ($validatorOne->fails() || $validatorTwo->fails() || $validatorThree->fails()) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'uno'   => $toArrayOne,
                    'dos'   => $toArrayTwo,
                    'tres'  => $toArrayThree
                ]
            ]);
        }
        $pas = Tool::generateKey(['MI'=>true,'NU'=>true,'CA'=>true,'MA'=>true,'LEN'=>10]);
        DB::beginTransaction();
        try{
            $team= Team::create([
                'institution_id'    =>$dataOne['Institución'],
                'name'              =>$dataOne['Nombre_del_equipo'],
                'name_altered'      =>Tool::getName($dataOne['Nombre_del_equipo']),
                'robot_name'        =>$dataOne['Nombre_del_robot'],
                'country_id'        =>$dataOne['País'],
                'state_id'          =>$dataOne['Estado'],
                'city_id'           =>$dataOne['Ciudad'],
                'gender'            =>$dataOne['Género'],
                'challenge_id'      =>$dataOne['Reto'],
                'degree_id'         =>$dataOne['Grado'],
            ]);
            $team_id = $team->id;
            $userOne= User::create([
                'name'          =>  $dataTwo['Nombre'],
                'last_name'     =>  $dataTwo['Apellido_Paterno'],
                'last_name_m'   =>  $dataTwo['Apellido_Materno'],
                'email'         =>  $dataTwo['Correo'],
                'email_alter'  =>  $dataTwo['Correo_alterno'],
                'password'      =>  bcrypt($pas),
                'password_two'  =>  bcrypt($pas),
                'role_id'       =>  2,
            ]);
            $coach_id = $userOne->id;
            $userTwo= User::create([
                'name'          =>  $dataTwo['Nombre_Coach_auxiliar'],
                'last_name'     =>  $dataTwo['Apellido_Paterno_Coach_auxiliar'],
                'last_name_m'   =>  $dataTwo['Apellido_Materno_Coach_auxiliar'],
                'role_id'       =>  3,
            ]);
            $coach_aux_id = $userTwo->id;
            if($dataTwo['Coordinado'] != 'S'){
                $userThree= User::create([
                    'name'          =>  $dataTwo['Nombre_coordinador'],
                    'last_name'     =>  $dataTwo['Apellido_paterno_coordinador'],
                    'last_name_m'   =>  $dataTwo['Apellido_materno_coordinador'],
                    'role_id'       =>  4,
                ]);
                $coordinador_id = $userThree->id;
            }else{
                $coordinador_id =$coach_aux_id;
            }
            $cap = User::create([
                'name'          =>  $dataThree['Nombre_capitan'],
                'last_name'     =>  $dataThree['Apellido_paterno_capitan'],
                'last_name_m'   =>  $dataThree['Apellido_materno_capitan'],
                'role_id'       =>  5,
            ]);
            $cap_id = $cap->id;
            $userdos = User::create([
                'name'          =>  $dataThree['Nombre_2_integrante'],
                'last_name'     =>  $dataThree['Apellido_paterno_2_integrante'],
                'last_name_m'   =>  $dataThree['Apellido_materno_2_integrante'],
                'role_id'       =>  6,
            ]);
            $userdos_id = $userdos->id;
            $userthre = User::create([
                'name'          =>  $dataThree['Nombre_3_integrante'],
                'last_name'     =>  $dataThree['Apellido_paterno_3_integrante'],
                'last_name_m'   =>  $dataThree['Apellido_materno_3_integrante'],
                'role_id'       =>  7,
            ]);
            $userthre_id =$userthre->id;
            $userfour = User::create([
                'name'          =>  $dataThree['Nombre_3_integrante'],
                'last_name'     =>  $dataThree['Apellido_paterno_3_integrante'],
                'last_name_m'   =>  $dataThree['Apellido_materno_3_integrante'],
                'role_id'       =>  8,
            ]);
            $userfour_id =$userfour->id;
            RelationTeUs::create([
                'team_id'               =>$team_id,
                'user_coach_id'         =>$coach_id,
                'user_coach_aux_id'     =>$coach_aux_id,
                'user_coordinador_id'   =>$coordinador_id,
                'user_cap_id'           =>$cap_id,
                'user_int2_id'          =>$userdos_id,
                'user_int3_id'          =>$userthre_id,
                'user_int4_id'          =>$userfour_id
            ]);

        }catch (\Exception $e){
            dd($e->getMessage());
            DB::rollback();
        }
        DB::commit();
        return response()->json([
            'success' => true,
        ]);
    }
}
