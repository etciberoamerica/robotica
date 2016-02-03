@extends('layouts/prueba')
@section('section')
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Ronda de turnos Reto Sorpresa.</h4>
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                    <th>Nombre institución</th>
                    <th>Nombre equipo</th>
                    <th>Nombre Robot</th>
                    <th>Hora inicio</th>
                    <th>Hora termino </th>
                    <th>Reto</th>
                    </thead>
                    <tbody>
                        @foreach($datCombat as $co)
                            <tr>
                                <td>{{ $co->name_inst }}</td>
                                <td>{{ $co->name_team }}</td>
                                <td>{{ $co->name_robot }}</td>
                                <td>{{ $co->schedule_start }}</td>
                                <td>{{ $co->schedule_end }}</td>
                                <td>
                                    <a href='{!! route('challenge/reto/combat',['id' => $co->combat_id])  !!}' type="button" data-type="adjust" data-id="3" class="btn btn-success btn-circle update">
                                        <i class="glyphicon glyphicon-dashboard"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        


    </div>
        @stop