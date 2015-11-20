@extends('layouts/default-admin')
@section('section')
        <div class="container">
            <br><br>
            <div class="page-header">
                <h1>Ronda de enfrentamientos {!! $challenge_name !!}.</h1>
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
                                                {!! $t['r_t_name'] !!}
                                            </td>
                                            <td>
                                                Vs
                                            </td>
                                            <td>
                                                {!! $t['r_t2_name'] !!}
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
                        <h4>Atención</h4>
                        <p>
                            Para generar enfrentamientos  primero generar la ronda de grupos del reto <h3>{!! $challenge_name !!}</h3> .
                        </p>
                    </div>
                @endif
            </div>
        <div>
@stop