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
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user as $us)
                    <tr>
                        <td>{!! $us->full_name !!}</td>
                        <td>{!! $us->username !!}</td>
                        <td>{!! base64_decode($us->password_two) !!}</td>
                        <td>{!! $us->nombre_rol !!}</td>
                        <td>
                            <p data-placement="top" data-toggle="tooltip" title="Edit">
                                <button id="btn-e" class="btn btn-primary btn-xs" data-id="{!! $us->id !!}" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                            </p>
                        </td>
                        <td>
                            <p data-placement="top" data-toggle="tooltip" title="Delete">
                                <button id="btn-d" class="btn btn-danger btn-xs" data-id="{!! $us->id !!}" data-title="Delete" data-toggle="modal" data-target="#delete" >
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </p>
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

    <!-- inicio del modal -->

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
                    {!! Form::hidden('Rol',9) !!}
                    {!! Form::hidden('id','',['id'=>'identificador']) !!}
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
                <div class="modal-footer ">
                    <input  type="submit" class="btn btn-warning btn-lg glyphicon glyphicon-ok-sign" id='btn-submit' style="width: 100%;" value="Guardar">
                </div>

                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- inicio de modal delete -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Eliminar datos</h4>
                </div>
                <div class="modal-body">
                    {!! Form::hidden('id','',['id'=>'identificador-de','class'=>'form-control','placeholder'=>'Nombre']) !!}
                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign">
                        </span> ¿Seguro que quieres borrar este registro ?</div>
                </div>
                <div class="modal-footer ">
                    <button type="button" id='btn-yes' class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <script>
        $(document).ready(function(){




                    $('#btn-submit').unbind().bind('click',function(){
                        $.ajax({
                            url:'list/add',
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
                                url:'list/challenge/stage',
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
                                url:'list/challenge/stage',
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

            $('button').each(function(index, ele){
                var idn= $(this).attr('id');
                if(idn == 'btn-e'){
                    var id = $(this).attr('data-id');
                    $(this).unbind().bind('click',function(){
                        edit(id);
                    });
                }else if(idn == 'btn-d'){
                    var id = $(this).attr('data-id');
                    $(this).unbind().bind('click',function(){
                        delet(id);
                    });
                }
            });

        });

        function edit(id){
            $.ajax({
                url:'referee/edit',
                method:'GET',
                data :{ id:id}
            }).done(function(data){
                $('#identificador').val(data.user.id);
                $('#nombre_id').val(data.user.name);
                $('#apt_pat_id').val(data.user.last_name);
                $('#apt_pmat_id').val(data.user.last_name_m);
                $('#usuario_id').val(data.user.username);
                $('#usuario_id').attr('readonly',true);
                $('#challenge_id_1 option[value='+ data.reto.challenge_id_1 +']').attr("selected", "selected");
                $('#challenge_id_2 option[value='+ data.reto.challenge_id_2 +']').attr("selected", "selected");

                even_1(data.reto.challenge_id_1,data.reto.stage_id_1);
                even_2(data.reto.challenge_id_2,data.reto.stage_id_2);
            }).fail(function(){
                alert('Upss lo sentimos surgio un error intenat mas tarde');
            });

        }

        function delet(id){
            $.ajax({
                url: 'referee/edit',
                method:'GET',
                data :{ id:id}
            }).done(function(data){
                $('#identificador-de').val(data.id);
            }).fail(function(){
                alert('Upss lo sentimos surgio un error intenat mas tarde');
            });

        }

        function even_1(val,stage){
            $.ajax({
                url:'list/challenge/stage',
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
                    $('#stage_id_1 option[value='+stage+']').attr("selected", "selected");

                },error:function(){
                    alert('Upss lo sentimos surgio un error intenat mas tarde');
                }
            });

        }
        function even_2(val,stage){
            $.ajax({
                url:'list/challenge/stage',
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
                    $('#stage_id_2 option[value='+stage+']').attr("selected", "selected");

                },error:function(){
                    alert('Upss lo sentimos surgio un error intenat mas tarde');
                }
            });

        }
    </script>
@stop