@extends('layouts/default')

@section('section')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <h4>Instituciones registradas</h4>
                <div class="table-responsive">


                    <table id="mytable" class="table table-bordred table-striped">

                        <thead>


                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Email</th>

                        <th>Edit</th>

                        <th>Delete</th>
                        </thead>
                        <tbody>

                        @foreach($insti as $in)
                            <tr>
                                <td>{!! $in->id !!} </td>
                                <td>{!! $in->name !!} </td>
                                <td>{!! $in->gender !!} </td>
                                <td>{!! $in->user_id !!} </td>
                                <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button id="btn-e" class="btn btn-primary btn-xs" data-id="{!! $in->id !!}" data-title="Edit" data-toggle="modal" data-target="#edit" >
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                    </p>
                                </td>
                                <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Delete">
                                        <button id="btn-d" class="btn btn-danger btn-xs" data-id="{!! $in->id !!}" data-title="Delete" data-toggle="modal" data-target="#delete" >
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>





                    <div class="clearfix"></div>
                    <ul class="pagination pull-right">
                        {!! $insti->render() !!}
                    </ul>

                </div>

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
                {!! Form::open(['route' => 'institutions', 'class' => 'form','id'=>'form-group']) !!}
                <div class="modal-body">
                    {!! Form::text('id','',['id'=>'institution_id','class'=>'form-control']) !!}
                    <div class="form-group">
                        * {!! Form::label('nombre','Nombre') !!}:
                          {!! Form::text('nombre','',['id'=>'nombre_id','class'=>'form-control','placeholder'=>'Nombre']) !!}
                    </div>
                    <div class="form-group">
                        * {!! Form::label('genero','Género') !!}:
                        {!!  Form::select('Género', ['' => 'Seleciona el genero ','MA'=>'Masculino','FE'=>'Femenino','MI'=>'Mixto'], '' ,['id'=>'genero_id','class' => 'form-control']) !!}

                    </div>
                    <div class="form-group">
                        * {!! Form::label('estatus','Estatus') !!}:
                        {!!  Form::select('Estatus', ['' => 'Seleciona el estatus ','1'=>'Activo','0'=>'Inactivo'], '' ,['id'=>'estatus_id','class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="modal-footer ">
                    <input  type="submit" class="btn btn-warning btn-lg glyphicon glyphicon-ok-sign" style="width: 100%;" value="Guardar">
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
                    <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <script>
        $(document).ready(function(){
            $('#form-group').submit(function(){

                return true;
            });


            $('button').each(function(index, ele){
                var idn= $(this).attr('id');
                if(idn == 'btn-e'){
                    var id = $(this).attr('data-id');
                    $(this).unbind().bind('click',function(){
                        console.log(id);
                        edit(id);
                    });

                }else if(idn == 'btn-d'){
                    var id = $(this).attr('data-id');
                    $(this).unbind().bind('click',function(){
                        console.log(id);
                        delet(id);
                    });
                }
            });
        });

        function edit(id){
            $.ajax({
                url:'editIns',
                method:'GET',
                data :{ id:id}
            }).done(function(data){
                $('#name_institution').html(data.name);
                $('#institution_id').val(data.id);
                $('#nombre_id').val(data.name)
                $('#genero_id > option[value='+data.gender+']').attr('selected', 'selected');
                $('#estatus_id > option[value='+data.active+']').attr('selected', 'selected');
            }).fail(function(){
                alert('Upss lo sentimos surgio un error intenat mas tarde');
            });

        }

        function delet(id){

        }


    </script>

@stop