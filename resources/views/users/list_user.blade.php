@extends('layouts/default-admin')
@section('section')
    <div class="container">
        <div class="row">
            <br><br><br><br><br><br>

            <p data-placement="top" data-toggle="tooltip" title="Edit">
                <button id="btn" class="btn btn-primary btn-xs" data-id="" data-title="Edit" data-toggle="modal" data-target="#edit" >
                    Nuevo usuario
                </button>
            </p>
            <table id="mytable" class="table table-bordred table-striped">
                <thead>
                <tr>
                    <th>Nombre completo</th>
                    <th>Email</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user as $us)
                    <tr>
                        <td>{!! $us->full_name !!}</td>
                        <td>{!! $us->email !!}</td>
                        <td>{!! $us->username !!}</td>
                        <td>{!! base64_decode($us->password_two) !!}</td>
                        <td>{!! $us->nombre_rol !!}</td>
                        <td>
                            <a target="_blank" href="{!! route('preview',['id'=> $us->id ]) !!}">Preview reconocimiento</a>
                        </td>
                        <td>
                            <a target="_blank" href="{!! route('previewGaf',['id'=> $us->id ]) !!}">Preview gafete</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="4">
                        {!! $user->render() !!}
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>


    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Datos <span id="name_institution"></span></h4>
                </div>
                <div id="errores" class="alert alert-danger none">
                </div>
                {!! Form::open(['class' => 'form','id'=>'form-group']) !!}
                <div class="modal-body">

                    <div class="form-group">
                        <span class="required">*</span> {!! Form::label('role','Rol') !!}:
                        {!!  Form::select('Rol', $role, ' ',['id'=>'role_id','class' => 'form-control']) !!}

                    </div>
                    <div id="refere" class="none">
                        <div class="form-group">
                            <span class="required">*</span> {!! Form::label('nombre','Nombre') !!}
                            {!! Form::text('Nombre','',['id'=>'nombre_id','class'=>'form-control','placeholder'=>'Nombre']) !!}
                        </div>

                        <div class="form-group">
                            <span class="required">*</span> {!! Form::label('paterno','Apellido paterno') !!}
                            {!! Form::text('Apellido_paterno','',['id'=>'apt_pat_id','class'=>'form-control','placeholder'=>'Apellido paterno']) !!}
                        </div>
                        <div class="form-group">
                            <span class="required">*</span> {!! Form::label('paterno','Apellido materno') !!}
                            {!! Form::text('Apellido_materno','',['id'=>'apt_pmat_id','class'=>'form-control','placeholder'=>'Apellido materno']) !!}
                        </div>
                        <div class="form-group">
                            <span class="required">*</span> {!! Form::label('usuario','Usuario') !!}
                            {!! Form::text('Usuario','',['id'=>'usuario_id','class'=>'form-control','placeholder'=>'Usuario']) !!}
                        </div>

                        <div class="form-group">
                            <span class="required">*</span> {!! Form::label('pass','Password') !!}:
                            {!! Form::password('Password', ['class' => 'form-control','placeholder'=>'Password']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('dia','Dia 1') !!}:
                        </div>
                        <div class="form-group">
                            <span class="required">*</span> {!! Form::label('reto','Reto') !!}:
                            {!!  Form::select('varia[Reto 1]', $challenge, ' ',['id'=>'challenge_id_1','class' => 'form-control']) !!}
                        </div>
                        <div class="form-group none" id='stage_div_1'>
                            <span class="required">*</span> {!! Form::label('escenario','Escenario') !!}:
                            {!!  Form::select('varia[Escenario 1]', [], ' ',['id'=>'stage_id_1','class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('dia','Dia 2') !!}:
                        </div>
                        <div class="form-group">
                            <span class="required">*</span> {!! Form::label('reto','Reto') !!}:
                            {!!  Form::select('varia[Reto 2]', $challenge, ' ',['id'=>'challenge_id_2','class' => 'form-control']) !!}
                        </div>
                        <div class="form-group none" id='stage_div_2'>
                            <span class="required">*</span> {!! Form::label('escenario','Escenario') !!}:
                            {!!  Form::select('varia[Escenario 2]', [], ' ',['id'=>'stage_id_2','class' => 'form-control']) !!}
                        </div>

                    </div>
                </div>
                <div class="modal-footer ">
                    <input  type="submit" class="btn btn-warning btn-lg glyphicon glyphicon-ok-sign" id='btn-submit' style="width: 100%;" value="Guardar">
                </div>

                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <script>
        $(document).ready(function(){
            $('#role_id').unbind().bind('change', function(){

                if($(this).val() ==9){

                    $('#refere').removeClass('none');

                    $('#btn-submit').unbind().bind('click',function(){
                        $.ajax({
                            url:'add',
                            method:'GET',
                            data :$('#form-group').serialize()
                        }).done(function(data){
                            if(!data.success){
                                $('#errores').removeClass('none');
                                var html="";
                                html +="<ul>";
                                $.each(data.errors,function($i,$e){
                                    html +="<li>";
                                    html +=$e;
                                    html +="</li>";
                                });
                                html +="<ul>";
                                $('#errores').empty();
                                $('#errores').html(html);
                            }else{
                                location.reload(true);
                            }
                        }).fail(function(){
                            alert('Upss lo sentimos surgio un error intenat mas tarde');
                        });
                        return false;
                    });

                    $('#challenge_id_2').unbind().bind('change',function(){
                        var val = $(this).val();
                        if(val !=' '){
                            $.ajax({
                                url:'challenge/stage',
                                method:'GET',
                                data:{
                                    challenge_id: val
                                },
                                success:function(data){
                                    var html='';
                                    $.each(data,function($i,$e){
                                        html +='<option value="'+$i+'">';
                                        html +=$e;
                                        html +='</option>';
                                    });
                                    $('#stage_div_2').removeClass('none');
                                    $('#stage_id_2').empty();
                                    $('#stage_id_2').html(html);
                                },error:function(){
                                    alert('Upss lo sentimos surgio un error intenat mas tarde');
                                }
                            });

                        }else{
                            $('#stage_div_2').removeClass('none');
                        }
                    });


                    $('#challenge_id_1').unbind().bind('change',function(){
                        var val = $(this).val();
                        if(val !=' '){
                            $.ajax({
                                url:'challenge/stage',
                                method:'GET',
                                data:{
                                    challenge_id: val
                                },
                                success:function(data){
                                    var html='';
                                    $.each(data,function($i,$e){
                                        html +='<option value="'+$i+'">';
                                        html +=$e;
                                        html +='</option>';
                                    });
                                    $('#stage_div_1').removeClass('none');
                                    $('#stage_id_1').empty();
                                    $('#stage_id_1').html(html);
                                },error:function(){
                                    alert('Upss lo sentimos surgio un error intenat mas tarde');
                                }
                            });

                        }else{
                            $('#stage_div_1').removeClass('none');
                        }
                    });

                }else{
                    $('#refere').addClass('none');
                }
            });

            $('#btn-submit').unbind().bind('click',function(){

                return false;
            });

        });
    </script>


@stop