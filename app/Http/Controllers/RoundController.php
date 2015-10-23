<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DateTime;
use App\Team;
use App\Round;
use App\Challenge;
use App\Stage;

class RoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


    public function stage($data,$dataStage){
        if(!Round::where('team_id','=',$data['id'])->first()){
            Round::create([
                'team_id'       =>  $data['id'],
                'challenge_id'  =>  $data['challenge_id'],
                'schedule_start'=>  $data['hour_start'],
                'schedule_end'  =>  $data['hour_end'],
                'stage_id'      =>  $dataStage['id'],
                'day'           =>  $data['day']
            ]);
        }

    }

    public function index($id)
    {
        $team =Team::where('challenge_id','=',$id)->orderBy('name','ASC')->get()->toArray();
        $stage= Stage::where('challenge_id','=',$id)->get();
        $flag=false;
        $challenge= Challenge::find($id);
        $challenge_name=$challenge->name;

        if($id !== 6) {
            $flag=true;
            if (!Round::where('challenge_id', '=', $id)->first()) {
                $countStage = count($stage);
                $cha = Challenge::listGroup();
                $timeStart = env('TIME_START');
                $date = new DateTime(env('TIME_START'));
                $time = 0;
                $pag = false;
                $hora_start = $date->format('H:i:s');
                $i = 1;
                $i2 = 1;
                $in = 0;
                foreach ($team as $t) {
                    $arrFlag = [];
                    $stage = Stage::where('challenge_id', '=', $id)->get()->toArray();
                    $time = $time + env('TIME');
                    $hora_end = date('H:i:s', strtotime($date->format('H:i:s') . '+' . $time . ' minute'));
                    $date_end = new DateTime($hora_end);
                    $time_dos = env('TIME');
                    $hora_start = strtotime('-' . $time_dos . ' minute', strtotime($date_end->format('H:i:s')));
                    $hora_start = date('H:i:s', $hora_start);
                    $dia = date('Y-m-d ', strtotime($date->format('H:i:s') . '+' . $time . ' minute'));

                    $in++;


                    if ($i2 == $countStage+1) {
                        $i2=0;
                       /* echo $i2."<br>";
                        $i2 = 1;

                        $dataSche =[
                            'schedule_start' =>$hora_start,
                            'schedule_end'   =>$hora_end,
                            'flag'           => 'si',
                            'increment'      => $i2
                        ];

                        echo"entra al if<br>";*/
                        //$this->assignedSchedule($dataSche);

                    }else{

                        $arrFlag += ['hour_end' => $hora_end];
                        $arrFlag += ['hour_start' => $hora_start];
                        $arrFlag += ['day' => $dia];
                        $arrFlag += ['id' => $t['id']];
                        $arrFlag += ['institution_id' => $t['institution_id']];
                        $arrFlag += ['name' => $t['name']];
                        $arrFlag += ['name_altered' => $t['name_altered']];
                        $arrFlag += ['robot_name' => $t['robot_name']];
                        $arrFlag += ['gender' => $t['gender']];
                        $arrFlag += ['challenge_id' => $t['challenge_id']];
                        $arrFlag += ['degree_id' => $t['degree_id']];
                        $arrFlag += ['created_at' => $t['created_at']];
                        $arrFlag += ['updated_at' => $t['updated_at']];

                        $dataSche =[
                            'schedule_start' =>$hora_start,
                            'schedule_end'   =>$hora_end,
                            'flag'           => 'no',
                            'increment'      => $i2
                        ];
                        /*print_r($dataSche);
                        echo $i2." --- ".$countStage.'<br>';*/

                        $this->assignedSchedule($dataSche);

                    }

                    //$this->stage($arrFlag, $stage[$i2]);

                    $i2++;
                    $i++;
                }
                $flag = true;


            }
            $pag = $this->pagination($id);
            //$this->index($id);


        }
        dd();
        return view('round.index',compact('flag','pag','cha','challenge_name'));
    }

    public function assignedSchedule(array $data){
        if($data['flag'] == 'no'){

            $ex_start = explode(':',$data['schedule_start']);
            $ex_end   = explode(':',$data['schedule_end']);
            $date = new DateTime($data['schedule_start']);
            $date_end = new DateTime($data['schedule_end']);
            $hora_start = date('H:i:s', strtotime($date->format('H:i:s') . '-' . $ex_start[1] . ' minute'));
            $exEnd =$ex_end[1];
            $date_end = new DateTime($data['schedule_end']);
            $time=env('TIME');
            if($exEnd == $time){
                $exEnd = $time;
                $hora_end = date('H:i:s', strtotime($date->format('H:i:s') . '+' . $exEnd . ' minute'));
            }else{

                $hora_end1 = date('H:i:s', strtotime($date_end->format('H:i:s') . '-' . $exEnd . ' minute'));
                $date_end = new DateTime($hora_end1);
                $hora_end = date('H:i:s', strtotime($date_end->format('H:i:s') . '+' . $time . ' minute'));
            }

        }else{

            echo"else   ";
            $hora_start =$data['schedule_start'];
            $hora_end =$data['schedule_end'];

        }

        /*return $dataSche =[
            'schedule_start' =>$hora_start,
            'schedule_end'   =>$hora_end];*/


        echo"hora inicio ".$hora_start."  hora fin ".$hora_end." en escenario ".$data['increment']."<br>";


    }

    public function pagination($id){
        $url_actual = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        $url_actual = explode('?',$url_actual);
        $pag = Round::
        join('rb_team as te','te.id','=','rb_rounds.team_id')->
        join('rb_stages as st','st.id','=','rb_rounds.stage_id')->
        where('rb_rounds.challenge_id','=',$id)->
        select('te.name as teamName','te.robot_name','rb_rounds.*','st.name as stageName')->
        orderBy('rb_rounds.id','ASC')->
        paginate(env('PAG'));
        $pag->setPath($url_actual[0]);
        return $pag;
    }


    public function modification(Request $request){
        if($request->type == 1){
            $dataRound = Round::where('challenge_id','=',$request->challenge_id)->orderBy('id','DESC')->first();
            $date = new DateTime($dataRound->schedule_end);
            $hora_end = date('H:i:s', strtotime($date->format('H:i:s') . '+' . env('TIME') . ' minute'));
            $date_end = new DateTime($hora_end);
            $time_dos = env('TIME');
            $hora_start = strtotime('-' . $time_dos . ' minute', strtotime($date_end->format('H:i:s')));
            $hora_start = date('H:i:s', $hora_start);
            $dia = date('Y-m-d ', strtotime($date->format('H:i:s') . '+' . env('TIME') . ' minute'));

            Round::create([
                'team_id'       =>  $dataRound->id,
                'challenge_id'  =>  $dataRound->challenge_id,
                'schedule_start'=>  $hora_start,
                'schedule_end'  =>  $hora_end,
                'stage_id'      =>  $dataRound->stage_id,
                'day'           =>  $dia
            ]);




        }else{
            $Round = Round::find($request->round_id);
            $Round->active=0;
            $Round->save();
        }

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
}
