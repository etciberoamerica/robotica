@extends('layouts/default')
@section('section')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                {!! Form::open(['route' => 'institutions', 'class' => 'form','id'=>'form-group']) !!}
                <div class="form-group">
                    <span class="required">*</span>  {!! Form::label('nombre','Nombre') !!}:
                    {!! Form::text('nombre','',['id'=>'nombre_id','class'=>'form-control','placeholder'=>'Nombre']) !!}

                </div>
                <div class="form-group">

                </div>
                <div class="form-group">

                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@stop