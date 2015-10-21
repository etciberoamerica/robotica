@extends('layouts/default-admin')
@section('section')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($flag && $pag)
                    <br><br><br><br>

                        <button id="btn" class="btn btn-primary btn-xs" data-id="" data-title="Edit" >
                            Ronda generada
                        </button>

                    <h4>Escenarios registrados</h4>
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                        <th>Nombre</th>
                        <th>Nombre del robot</th>
                        <th></th>
                        <th>Eliminar</th>
                        </thead>
                        <tbody>
                        @foreach($pag as $p)
                            <tr>
                                <td>
                                    {!! $p->name !!}
                                </td>
                                <td>
                                    {!! $p->robot_name !!}
                                </td>
                                <td>
                                    {!! $p->schedule !!}
                                </td>
                                <td>
                                    {!! $p->day !!}
                                </td>
                                <td>
                                    <a type="button" data-id='{!! $p->id !!}' class="btn btn-success btn-circle update"><i class="glyphicon glyphicon-dashboard"></i></a>
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
                    <script>
                        $(document).ready(function(){
                            $('.update').click(function(){
                                console.log($(this).attr('data-id'));



                                $.ajax({
                                    url:'stage/add',
                                    method:'GET',
                                    data :$('#form-group').serialize()
                                }).done(function(data){
                                    location.reload();
                                }).fail(function(){
                                    alert('Upss lo sentimos surgio un error intenat mas tarde');
                                });
                            });

                        });
                    </script>

                @else

                        <a id="btn" class="btn btn-primary btn-xs" data-id="" data-title="Edit" data-target="#edit" >
                            Ronda aun no generada
                        </a>


                @endif
            </div>
        </div>
    </div>
@stop