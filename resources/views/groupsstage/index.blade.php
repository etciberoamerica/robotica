@extends('layouts/default-admin')
@section('section')
    <div class="container">
        <br><br>
        <div class="page-header">
            <h1>Ronda de grupos del reto {!! $challenge_name !!}.</h1>
        </div>
        <div class="row">
            @if($data[0]['data_team'])

                        @foreach($data as $d)
                    <div class="col-md-6">
                        <div class="panel panel-success">
                            <div class="panel-leftheading">
                                <h3 class="panel-lefttitle">{!! $d['name'] !!}</h3>
                            </div>

                            <table width="90%" style="margin-left: 55px;">
                                @foreach($d['data_team'] as $t)
                                    <tr class="p">
                                        <td>
                                            {!! $t['nombre_equipo'] !!}
                                        </td>
                                        <td>
                                            <a type="button" data-type="adjust" data-id="{!! $t['id_g_s'] !!}" data-toggle="modal" data-target="#edit" class="btn btn-success btn-circle update"><i class="glyphicon glyphicon-dashboard"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <div class="clearfix">
                            </div>
                        </div>
                    </div>
                         @endforeach

                @else
                    <div class="alert-message alert-message-danger">
                        <h4>
                            Atención</h4>
                        <p>
                            Para generar la ronda de grupos primero generar la ronda de pruebas del reto <h3>{!! $challenge_name !!}</h3> .</p>
                    </div>
            @endif
        </div>
    <div>



        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Datos <span id="name_institution"></span></h4>
                    </div>
                    <div id="errores" class="alert alert-danger none">
                    </div>
                    {!! Form::open(['route' => 'stage/add', 'class' => 'form','id'=>'form-group']) !!}
                    <div class="modal-body">
                        {!! Form::text('id','',['id'=>'round_id','class'=>'form-control','placeholder'=>'Nombre']) !!}
                        <div class="form-group">
                            {!! Form::label('reto','Grupo') !!}:
                            {!!  Form::select('Grupo', $dataG , '' ,['id'=>'grupo_id','class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <input  type="submit" class="btn btn btn-warning btn-lg glyphicon glyphicon-ok-sign" id='btn-submit' style="width: 100%;" value="Guardar">
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <script>
            $(document).ready(function(){
                $('.update').click(function(){
                    var atr = $(this).attr('data-id');
                    $('#round_id').val(atr);
                });

                $('#btn-submit').click(function(){
                    var pathname = window.location.pathname;
                    var str = pathname.split("/");
                    var temp = new Array();
                    temp = x = pathname.split("/");
                    $.ajax({
                        url:'modifi/'+temp[str.length - 1],
                        method:'GET',
                        data :$('#form-group').serialize()
                    }).done(function(data){
                        console.log(data);
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
                            $('#errores').empty();
                            $('#errores').addClass('none');

                                location.reload(true);

                        }
                    }).fail(function(){
                        alert('Upss lo sentimos surgio un error intenat mas tarde');
                    });
                    return false;
                });

            });
        </script>
@stop