@extends('layouts/default-admin')
@section('section')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($flag && $pag)
                    <br><br><br><br>
                    <h4>Ronda de pruebas generada del reto {!! $challenge_name !!} .</h4>
                    <a href="{!! route('dashboard/generator/roud/excel',['id' => $id])  !!}">Excell</a>
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                        <th>Nombre equipo</th>
                        <th>Nombre del robot</th>
                        <th>Escenario</th>
                        <th>Hora inicio</th>
                        <th>Hora fin</th>
                        <th>Activo</th>
                        <th>Ajustar</th>
                        <th>Cancelar</th>
                        </thead>
                        <tbody>
                        @foreach($pag as $p)
                            <tr>
                                <td>
                                    {!! $p->teamName !!}
                                </td>
                                <td>
                                    {!! $p->robot_name !!}
                                </td>
                                <td>
                                    {!! $p->stageName !!}
                                </td>
                                <td>
                                    {!! $p->schedule_start !!}
                                </td>
                                <td>
                                    {!! $p->schedule_end !!}
                                </td>
                                <td>
                                    @if ($p->active)
                                        <span class='glyphicon glyphicon-ok' style="color: green;"></span>
                                    @else
                                        <span class='glyphicon glyphicon-remove' style="color:red;"></span>
                                    @endif
                                </td>
                                </td>
                                <td>
                                    @if ($p->active)
                                        <a type="button" data-type="adjust" data-id='{!! $p->id !!}' class="btn btn-success btn-circle update"><i class="glyphicon glyphicon-dashboard"></i></a>
                                    @else
                                        <a type="button" data-type="adjust" data-id='{!! $p->id !!}' class="btn btn-danger btn-circle"><i class="glyphicon glyphicon-dashboard"></i></a>

                                    @endif
                                </td>
                                <td>
                                    @if ($p->active)
                                        <a type="button" data-type="cancel" data-id='{!! $p->id !!}' class="btn btn-danger btn-circle update"><i class="glyphicon glyphicon-minus"></i></a>
                                    @else
                                        <a type="button" data-type="active" data-id='{!! $p->id !!}' class="btn btn-success btn-circle update"><i class="glyphicon glyphicon-ok"></i></a>
                                    @endif
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
                                var pathname = window.location.pathname;
                                var str = pathname.split("/");
                                var temp = new Array();
                                temp = x = pathname.split("/");
                                var type = $(this).attr('data-type');
                               /* console.log(type);
                                return false;*/
                                if(type == 'adjust'){
                                    $.ajax({
                                        url:temp[str.length - 1]+'/modification',
                                        data:{
                                            round_id : $(this).attr('data-id'),
                                            type:1,
                                            challenge_id:temp[str.length - 1]
                                        },
                                        type: 'GET',
                                        success:function(data){
                                            location.reload();
                                        },error:function(){
                                            alert('Upsss los sentimos ocurrio un problema');
                                        }
                                    });

                                }else{
                                    $.ajax({
                                        url:temp[str.length - 1]+'/modification',
                                        data:{
                                            round_id : $(this).attr('data-id'),
                                            type:0,
                                            typeText:type,
                                            challenge_id:temp[str.length - 1]
                                        },
                                        type: 'GET',
                                        success:function(data){
                                            location.reload();
                                        },error:function(){
                                            alert('Upsss los sentimos ocurrio un problema');
                                        }
                                    });
                                }
                            });

                        });
                    </script>

                @else
                @endif
            </div>
        </div>
    </div>
@stop