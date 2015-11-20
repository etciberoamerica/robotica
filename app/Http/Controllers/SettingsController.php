<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

use App\Settings;
use App\Tool;
use DB;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $chedumalTrial=Settings::where('field','=','Schedumal_trial')->first();
        $durationTrial = Settings::where('field','=','Duration_trial')->first();

        return view('settings/index',compact('chedumalTrial','durationTrial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $data = Tool::removeSpace($request->all());

        $validator = Validator::make($data,[
            "hora_prueba" => "required|valid_time",
            "duración_prueba" => "required|valid_minute"
        ]);

        $toArray=$validator->errors()->toArray();

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }
        $chedumalTrial=Settings::where('field','=','Schedumal_trial')->first();
        $durationTrial = Settings::where('field','=','Duration_trial')->first();
        if($chedumalTrial->value != $data['hora_prueba']){

            DB::table('rb_settings')
                ->where('field', 'Schedumal_trial')
                ->update(['value' => $data['hora_prueba']]);

        }

        if($durationTrial->value != $data['duración_prueba']){
            DB::table('rb_settings')
                ->where('field', 'Duration_trial')
                ->update(['value' => $data['duración_prueba']]);
        }

        return $this->index();
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
