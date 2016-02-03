@extends('layouts/default-admin')
@section('section')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br><br><br><br><br><br>
                <p data-placement="top" data-toggle="tooltip" title="Edit">
                    <button id="btn" class="btn btn-primary btn-xs" data-id="" data-title="Edit" data-toggle="modal" data-target="#edit" >
                        Nuevo escenario
                    </button>
                </p>
                <h4>Escenarios registrados en el reto {!! $name_challenge !!}</h4>
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                        <th>Name</th>
                        <th>Reto</th>
                        <th>Respaldo</th>
                        <th>Activo</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                        @foreach($pag as $p)
                            <tr>
                                <td>{!! $p->name !!}</td>
                                <td>{!! $p->name_challenge !!}</td>
                                <td>
                                    @if($p->back)
                                        <span class='glyphicon glyphicon-ok' style="color: green;"></span>
                                    @else
                                        <span class='glyphicon glyphicon-remove' style="color:red;"></span>
                                    @endif
                                </td>
                                <td>
                                    @if ($p->active)
                                        <span class='glyphicon glyphicon-ok' style="color: green;"></span>
                                    @else
                                        <span class='glyphicon glyphicon-remove' style="color:red;"></span>
                                    @endif
                                </td>
                                <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button id="btn-e" class="btn btn-primary btn-xs" data-id="{!! $p->id !!}" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                    </p>
                                </td>
                                <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Delete">
                                        <button id="btn-d" class="btn btn-danger btn-xs" data-id="{!! $p->id !!}" data-title="Delete" data-toggle="modal" data-target="#delete" >
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
                                {!! $pag->render() !!}
                            </td>
                        </tr>
                    </tfoot>
                </table>



            </div>
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
                {!! Form::open(['route' => 'stage/add', 'class' => 'form','id'=>'form-group']) !!}
                <div class="modal-body">
                    {!! Form::hidden('id','',['id'=>'identificador','class'=>'form-control','placeholder'=>'Nombre']) !!}
                    <div class="form-group">
                        <span class="required">*</span> {!! Form::label('nombre','Nombre') !!}:
                        {!! Form::text('Nombre','',['id'=>'nombre_id','class'=>'form-control','placeholder'=>'Nombre']) !!}
                        {!!  Form::hidden('Reto', $id ,['id'=>'reto_id','class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('estatus','Estatus') !!}:
                        {!!  Form::select('Estatus', ['' => 'Seleciona el estatus ','1'=>'Activo','0'=>'Inactivo'], '' ,['id'=>'estatus_id','class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('respaldo','Respaldo') !!}:
                    {!!   Form::checkbox('Respaldo', 1, false,['id'=> 'check_id']) !!}
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
            $('#btn').click(function(){
                $('#identificador').val('');
                $('#nombre_id').val('');
                $('#estatus_id > option[value=" "]').attr('selected', 'selected');
            });

            $('#form-group').submit(function(){
                return false;
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
            $('#btn-submit').click(function(){
                var pathname = window.location.pathname;
                var str = pathname.split("/");
                var temp = new Array();
                temp = x = pathname.split("/");
                $.ajax({
                    url:'add/'+temp[str.length - 1],
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
                    }
                    else{
                        $('#errores').empty();
                        $('#errores').addClass('none');
                        location.reload(true);
                    }
                }).fail(function(){
                    alert('Upss lo sentimos surgio un error intenat mas tarde');
                });
            });
            $('#btn-yes').click(function(){
                var pathname = window.location.pathname;
                var str = pathname.split("/");
                var temp = new Array();
                temp = x = pathname.split("/");
                $.ajax({
                    url:'delete/'+temp[str.length - 1],
                    method:'GET',
                    data :{id: $('#identificador-de').val()}
                }).done(function(data){
                    if(data.success){
                        location.reload();
                    }
                }).fail(function(){
                    alert('Upss lo sentimos surgio un error intenat mas tarde');
                });
            });


        });

        function edit(id){
            var pathname = window.location.pathname;
            var str = pathname.split("/");
            var temp = new Array();
            temp = x = pathname.split("/");
            $.ajax({
                url:'find/'+temp[str.length - 1],
                method:'GET',
                data :{ id:id}
            }).done(function(data){
                console.log(data);
                $('#identificador').val(data.id);
                $('#nombre_id').val(data.name);
                $('#estatus_id > option[value='+data.active+']').attr('selected', 'selected');
                if(data.back){
                    $('#check_id').attr('checked',true);
                }else{
                    $('#check_id').attr('checked',false);
                }
            }).fail(function(){
                alert('Upss lo sentimos surgio un error intenat mas tarde');
            });
        }

        function delet(id){
            var pathname = window.location.pathname;
            var str = pathname.split("/");
            var temp = new Array();
            temp = x = pathname.split("/");
            $.ajax({
                url:'find/'+temp[str.length - 1],
                method:'GET',
                data :{ id:id}
            }).done(function(data){
                $('#identificador-de').val(data.id);
            }).fail(function(){
                alert('Upss lo sentimos surgio un error intenat mas tarde');
            });
        }
    </script>

@stop