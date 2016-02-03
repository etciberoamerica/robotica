@extends('layouts/default-admin')
@section('section')
    <div class="container">
        <div class="row">
            <br><br><br>

    @if(Auth::user()->role_id == 9)
                @if($datos != NULL)
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                        <tr>
                            <th>Reto día 1</th>
                            <th>Escenario día 1</th>
                            <th>Reto día 2</th>
                            <th>Escenario día 2</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="tr_table" data-id="{!! $datos->stage_id_1 !!}" data-toggle="modal" data-target=".bs-example-modal-lg">{!! $datos->name_challenge_1 !!}</td>
                            <td class="tr_table" data-id="{!! $datos->stage_id_1 !!}" data-toggle="modal" data-target=".bs-example-modal-lg">{!! $datos->name_stage_1 !!}</td>
                            <td class="tr_table" data-id="{!! $datos->stage_id_2 !!}" data-toggle="modal" data-target=".bs-example-modal-lg">{!! $datos->name_challenge_2 !!}</td>
                            <td class="tr_table" data-id="{!! $datos->stage_id_2 !!}" data-toggle="modal" data-target=".bs-example-modal-lg">{!! $datos->name_stage_2 !!}</td>
                        </tr>
                        </tbody>
                    </table>
                @else
                    No Tiene asigando retos

                @endif


                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                    <tr>
                                        <th>Equipo 1</th>
                                        <th>Equipo 2</th>
                                        <th>Hora inicio</th>
                                        <th>Hora termino</th>
                                    </tr>
                                </thead>
                                <tbody id="table_identifi">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <script>
                    $(document).ready(function(){
                        $('.tr_table').unbind().bind('click',function(){
                            var val = $(this).attr('data-id');
                            $('#table_identifi').empty();
                            $.ajax({
                                url: 'referee/challenge',
                                data:{
                                    id:val
                                },
                                method:'GET',
                                success:function(data){
                                    var html="";
                                    $.each(data,function($i,$da){
                                        html +="<tr>";
                                        html +="<td>"+ $da.r_t_name +"</td>";
                                        html +="<td>"+ $da.r_t2_name +"</td>";
                                        html +="<td>"+ $da.schedule_start +"</td>";
                                        html +="<td>"+ $da.schedule_end +"</td>";
                                        html+="</tr>";
                                    });
                                    $('#table_identifi').html(html);
                                },error:function(){
                                    alert('Upss lo sentimos surgio un error intenat mas tarde');
                                }
                            });
                        });
                    });
                </script>
    @endif
        </div>
    </div>





@stop