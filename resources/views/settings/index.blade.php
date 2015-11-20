@extends('layouts/default-admin')
@section('section')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br><br><br><br><br><br>

                <div class="well well-sm">
                    @if($errors->has())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif


                        {!! Form::open(['route' => 'dashboard/settings', 'autocomplete' =>'false','method'=>'POST','id' =>'form-se','autocomplete'=>'off','class'=>"form-horizontal"]) !!}
                        <fieldset>
                            <legend class="text-center">Configuración</legend>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Hora inicio de periodo de pruebas</label>
                                <div class="col-md-9">
                                    {!! Form::text('hora_prueba',$chedumalTrial->value, ['class' => 'form-control','placeholder' =>"HH:mm:ss" ]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Tiempo de periodo de pruebas</label>
                                <div class="col-md-9">
                                    {!! Form::text('duración_prueba',$durationTrial->value, ['class' => 'form-control','placeholder' =>"mm" ]) !!}
                                </div>
                            </div>
                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    {!! Form::close() !!}
                </div>


            </div>
        </div>
    </div>
@stop