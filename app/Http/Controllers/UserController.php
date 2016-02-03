<?php

namespace App\Http\Controllers;

use App\Challenge;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Log;
use App\Tool;
use App\User;
use App\Team;
use App\RelationTeUs;
use App\Role;
use App\Stage;
use App\RelationUseSta;
use App\CombatRound;
use Auth;
use Mail;
use Redirect;
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

        $dat_v= [
            'Tipo'    => $data['Tipo'],
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
//            "Institución" => "required|valid_team:".implode(",", $dat_v),
            "Nombre_del_equipo" => "required|name_team",
            "Nombre_del_robot" => "required|alpha_space",
            "Tipo" => "required",
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
            "Correo" => "required|email|unique:rb_users,email",
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
            "Tipo" => "required",
            "Reto" => "required",
            "Grado" => "required"
        ]);
        $validatorTwo = Validator::make($dataTwo,[
            "Nombre" => "required|alpha_space",
            "Apellido_Paterno" => "required|alpha",
            "Apellido_Materno" => "required|alpha",
            "Correo" => "required|email|unique:rb_users,email",
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

            Mail::send('mails.mail',['user'=>'Ricardio'],function($msj){
                $msj->to('ricardo.lugo@etciberoamerica.com')->subject('Este es un correo de prueba de la liga de robotica');

            });
            $team= Team::create([
                'institution_id'    =>$dataOne['Institución'],
                'name'              =>$dataOne['Nombre_del_equipo'],
                'name_altered'      =>Tool::getName($dataOne['Nombre_del_equipo']),
                'robot_name'        =>$dataOne['Nombre_del_robot'],
                'gender'            =>$dataOne['Tipo'],
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
                'password_two'  =>  base64_encode($pas),
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

            DB::rollback();
        }
        DB::commit();
        return response()->json([
            'success' => true,
        ]);
    }


    public function dash(){
        return view('users.index');
    }

    public function getUser(){
        $role=[' '=>'Seleciona el rol'];
        $role  += Role::lists('name','id')->toArray();
        $challenge =[' ' => '-- Seleccionar Reto --'];
        $challenge += Challenge::where('active','=','1')->lists('name','id')->toArray();


        $url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        $url_actual = explode('?',$url_actual);
        $user = User::
        join('rb_role','rb_role.id','=','rb_users.role_id')
            ->select('rb_users.*','rb_role.name as nombre_rol')->orderBy('id','DESC')->paginate(env('PAG'));
        $user->setPath($url_actual[0]);
        //dd($user);

       return view('users.list_user',compact('user','role','challenge'));

    }

    public function createUser(Request $request){
        $data    =Tool::removeSpace($request->all());

        if($request->id){
            $validator= Validator::make($data,[
                "Rol" =>"required",
                "Nombre" => "required|alpha_space",
                "Apellido_paterno" => "required|alpha",
                "Apellido_materno" => "required|alpha",
                "Password" => "required",
            ]);
            $validatorTwo= Validator::make($data['varia'],[
                "Escenario 1" => "required",
                "Reto 1"      => "required",
                "Escenario 2" => "required",
                "Reto 2"      => "required"
            ]);
        }else{
            $validator= Validator::make($data,[
                "Rol" =>"required",
                "Nombre" => "required|alpha_space",
                "Apellido_paterno" => "required|alpha",
                "Apellido_materno" => "required|alpha",
                "Usuario" => "required|unique:rb_users,username",
                "Password" => "required",
            ]);
            $validatorTwo= Validator::make($data['varia'],[
                "Escenario 1" => "required",
                "Reto 1"      => "required",
                "Escenario 2" => "required",
                "Reto 2"      => "required"
            ]);
        }

        $error = $validator->errors()->toArray();
        $error += $validatorTwo->errors()->toArray();
        if($validator->fails() || $validatorTwo->fails()){
            return response()->json([
                'success' => false,
                'errors' => $error
            ]);
        }else{
            DB::beginTransaction();
            try{
                    if($request->id){
                        $user = User::find($request->id);
                        $user->name =$data['Nombre'];
                        $user->last_name = $data['Apellido_paterno'];
                        $user->last_name_m = $data['Apellido_materno'];
                        $user->password =bcrypt($data['Password']);
                        $user->password_two =base64_encode($data['Password']);
                        $user->save();


                        $stage = RelationUseSta::where('user_id','=',$request->id)->first();
                        $stage->challenge_id_1=$data['varia']['Reto 1'];
                        $stage->challenge_id_2=$data['varia']['Reto 2'];
                        $stage->stage_id_1 =$data['varia']['Escenario 1'];
                        $stage->stage_id_2 =$data['varia']['Escenario 2'];
                        $stage->save();


                    }else{
                        $user = User::create([
                            'role_id'=>$data['Rol'],
                            'name'=>$data['Nombre'],
                            'last_name'=>$data['Apellido_paterno'],
                            'last_name_m'=>$data['Apellido_materno'],
                            'username'=>$data['Usuario'],
                            'password'=>bcrypt($data['Password']),
                            'password_two'=>base64_encode($data['Password']),
                        ]);
                        RelationUseSta::create([
                            'user_id'    =>$user->id,
                            'challenge_id_1'=>$data['varia']['Reto 1'],
                            'challenge_id_2'=>$data['varia']['Reto 2'],
                            'stage_id_1' =>$data['varia']['Escenario 1'],
                            'stage_id_2' =>$data['varia']['Escenario 2'],
                        ]);


                    }


                }catch (\Exception $e){
                    DB::rollback();
                }
                DB::commit();
            return response()->json([
                'success' => true,
                'errors' => $error
            ]);
        }
    }
    public function getStage(Request $request){
        $stage = Stage::where('challenge_id','=',$request->challenge_id)->where('active','=','1')->where('active','=',1)->where('back','=',0)->lists('name','id')->toArray();
        return $stage;
    }


    public function referee(){

        $datos = RelationUseSta::where('user_id','=',Auth::user()->id)
            ->join('rb_challenges as c1','c1.id','=','rb_relation_use_sta.challenge_id_1')
            ->join('rb_challenges as c2','c2.id','=','rb_relation_use_sta.challenge_id_2')
            ->join('rb_stages as s1','s1.id','=','rb_relation_use_sta.stage_id_1')
            ->join('rb_stages as s2','s2.id','=','rb_relation_use_sta.stage_id_2')
           ->select('rb_relation_use_sta.*','c2.name as name_challenge_2',
               'c1.name as name_challenge_1','s1.name as name_stage_1','s2.name as name_stage_2')
            ->first();

        return view('users.index',compact('datos'));
    }

    public function getReferee(){
        $role=[' '=>'Seleciona el rol'];
        $role  += Role::lists('name','id')->toArray();
        $challenge =[' ' => '-- Seleccionar Reto --'];
        $challenge += Challenge::where('active','=','1')->lists('name','id')->toArray();
        $url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        $url_actual = explode('?',$url_actual);
        $user = User::where('rb_users.role_id','=',9)
            ->join('rb_role','rb_role.id','=','rb_users.role_id')
            ->select('rb_users.*','rb_role.name as nombre_rol')->orderBy('id','DESC')->paginate(env('PAG'));
        $user->setPath($url_actual[0]);
        return view('users.referee',compact('user','role','challenge'));


    }
    public function getRefStage(Request $request){
        return $combat= CombatRound::where('rb_combat_round.stage_id','=',$request->id)
            ->join('rb_group_stage as r_g','r_g.round_id','=','rb_combat_round.versus_one')
            ->join('rb_group_stage as r_g2','r_g2.round_id','=','rb_combat_round.versus_two')
            ->join('rb_rounds as r_b','r_b.id','=','r_g.round_id')
            ->join('rb_rounds as r_b2','r_b2.id','=','r_g2.round_id')
            ->join('rb_team as r_t','r_t.id','=','r_b.team_id')
            ->join('rb_team as r_t2','r_t2.id','=','r_b2.team_id')
            ->join('rb_groups as r_gr','r_gr.id','=','r_g.group_id')
            ->join('rb_groups as r_gr2','r_gr2.id','=','r_g2.group_id')
            ->select('r_g.id as id_rg',
                'r_g.group_id as group_id_rg',
                'r_g2.id as id_rg2',
                'r_g2.group_id as group_id_rg2',
                'r_b.team_id as r_b_team_id',
                'r_b2.team_id as r_b2_team_id',
                'r_gr.name as r_gr_name',
                'r_gr2.name as r_gr2_name',
                'r_t.name as r_t_name',
                'r_t2.name as r_t2_name',
                'rb_combat_round.*')
            ->orderBy('schedule_start','ASC')->get()->toArray();


    }

    public function getRefereeData(Request $request){
        $user = User::find($request->id)->toArray();
        $userReto = RelationUseSta::where('user_id','=',$request->id)->first();
        return ['user' =>$user,'reto'=>$userReto];
    }


    public function mail(){
        //print_r(\Config::get('mail'));

        Mail::send('mails.mail',['user'=>'Ricardio'],function($msj){
            $msj->to('ricardo.lugo.recillas@gmail.com')->subject('envio de correo electronico');

        });

        return Redirect::to('contacto');
    }


    public function preview($id){
        $datUser=User::find($id);

        $pdf = new \Elibyy\TCPDF\TCPdf("Landscape", "mm", 'A4', true, 'UTF-8', false);

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // set margins
        $pdf->SetMargins(10, 10, 10);

        $pdf->setPageOrientation("Landscape", "", "");

        // add a page
        $pdf->AddPage();

        $pdf->Image("img/REC_SN.jpg");

        $html = '<table border="0" width="100%">
                    <tr>
                        <td align="center"><br><br><br><br><br><br><h2>'.  $datUser->full_name .'</h2></td>
                    </tr>
                </table>';

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Output('reconocimiento.pdf', 'I');
    }


    public function previewGaf($id){
        $datUser=User::find($id);

        $pdf = new \Elibyy\TCPDF\TCPdf("P", "mm", 'A4', true, 'UTF-8', false);

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // set margins
        $pdf->SetMargins(10, 10, 10);

        $pdf->setPageOrientation("P", "", "");

        // add a page
        $pdf->AddPage();

        $pdf->Image("img/gafete8aV1.jpg");

        $html = '<table border="0" width="100%">
                    <tr>
                        <td align="left"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><h2>'.$datUser->id.'</h2><br><br><br><h2>'.  $datUser->full_name .'</h2><br><br><h2>Colegio Demo ETC</h2></td>
                    </tr>
                </table>';

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Output('reconocimiento.pdf', 'I');

    }



}
