@extends('layouts/default-admin')
@section('section')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br><br><br><br>
                <p data-placement="top" data-toggle="tooltip" title="Edit">
                    <button id="btn-e" class="btn btn-primary btn-xs" data-id="" data-title="Edit" data-toggle="modal" data-target="#edit" >
                        Nuevo reto
                    </button>
                </p>
                <h4>Retos registrados</h4>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                         <tr>
                             <th>Identificador</th>
                             <th>Nombre</th>
                             <th>Activo</th>
                             <th>Eliminar</th>
                             <th>Actualizar</th>
                         </tr>
                        </thead>
                        <tbody>
                            @foreach($pag as $p)
                                <tr>
                                    <td>{!! $p->id !!}</td>
                                    <td>{!! $p->name !!}</td>
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
                                <td colspan="5"> {!! $pag->render() !!}</td>
                            </tr>
                        </tfoot>
                    </table>
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
                    <div class="form-group">
                        <span class="required">*</span> {!! Form::label('nombre','Nombre') !!}:
                        {!! Form::text('nombre','',['id'=>'nombre_id','class'=>'form-control','placeholder'=>'Nombre']) !!}
                    </div>
                    <div class="form-group">
                         {!! Form::label('estatus','Estatus') !!}:
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
@stop