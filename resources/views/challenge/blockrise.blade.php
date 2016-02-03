@extends('layouts/prueba')
@section('section')
    <br><br><br>
    <div class="container">
        @if($d->completed)
            Lo sentimos el reto se realizo en esta en etapa de evaluacion
            @else
            <div class="page-header">
                <h3>{!! $d->nam_c !!}</h3>
            </div>
            <div class="row grid-divider">
                <div id="h_1" class="col-sm-4">
                    <div class="col-padding" id="table_1" >
                        <table  class="table table-bordred table-striped" >
                            <tbody>
                            <tr>
                                <td>Nombre Equipo:</td>
                                <td>{!! $d->r_t_name !!}</td>
                            </tr>
                            <tr>
                                <td>Nombre Colegio:</td>
                                <td>{!! $d->in_name_1 !!}</td>
                            </tr>
                            <tr>
                                <td>Equipo:</td>
                                <td>
                                    @if($d->gender_1 = 'FEM')
                                        Femenino

                                    @elseif($d->gender_1 = 'MAS')
                                        Masculino
                                    @else
                                        Mixto
                                    @endif
                                </td>
                            </tr>
                            <input type="hidden" class="team_1_id" id="team_1_id" value="{!! $d->r_b_team_id !!}">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="h_2" class="col-sm-4">
                    <h4 id="h4_id_">
                        <center>
                            <a type="button" data-val=0 data-type="active" data-head="1" class="btn btn-success btn-circle start"><i
                                        class="glyphicon glyphicon-play"></i></a>
                        </center>
                    </h4>
                    <div id="table_div" class="none">
                        <table id="mytable_1" class="table table-bordred table-striped">
                            <tbody>
                            <tr class="none">
                                <td colspan="3" align="center">

                                    Hora Actual

                                </td>
                            </tr>
                            <tr class="none">
                                <td>
                                      <span class="clock-block hour">
                                        <span class="clock-val"></span>
                                        <span class="clock-unit"> Horas</span>
                                      </span>
                                </td>
                                <td>
                                      <span class="clock-block minute">
                                        <span class="clock-val"></span>
                                        <span class="clock-unit"> Minutos</span>
                                      </span>
                                </td>
                                <td>
                                    <span class="clock-block second">
                                        <span class="clock-val"></span>
                                        <span class="clock-unit"> Segundos</span>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" align="center">
                                    Duración reto
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div id="hour">00</div>
                                </td>
                                <td>
                                    <div id="minute">00</div>
                                </td>
                                <td>
                                    <div id="second">00</div>
                                </td>
                            </tr>

                            </tbody>
                            <input type="hidden" name="flag" id="flag_id" value=1>
                            <input type="hidden" name="flag" id="flag_id_2" value=1>
                            <input type="hidden" name="flag_win" id="flag_win" value="1">
                            <input type="hidden" name="flag_empater" id="flag_empater" value="4">
                            <tfoot>
                                <tr>
                                    <td colspan="3" id="erorres-div">

                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div id="h_3" class="col-sm-4">
                    <div class="col-padding" id="table_2" >
                        <table class="table table-bordred table-striped">
                            <tbody>
                            <tr>
                                <td>Nombre Equipo:</td>
                                <td>{!! $d->r_t2_name !!}</td>
                            </tr>
                            <tr>
                                <td>Nombre Colegio:</td>
                                <td>{!! $d->in_name_2 !!}</td>
                            </tr>
                            <tr>
                                <td>Equipo:</td>
                                <td>
                                    @if($d->gender_1 = 'FEM')
                                        Femenino

                                    @elseif($d->gender_1 = 'MAS')
                                        Masculino
                                    @else
                                        Mixto
                                    @endif
                                </td>
                            </tr>
                            <input type="hidden" class="team_2_id" id="team_2_id" value="{!! $d->r_b2_team_id !!}">
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

            <div class="row grid-divider none" id="div_body">
                <div id="b_1" class="col-sm-4">
                    <input type="hidden" name="" class="id_time" id="id_time_1">
                    <table id="table_i_1" class="table table-bordred table-striped" >
                        <tr>
                            <td>
                                <h4>
                                    Cubos
                                </h4>
                            </td>
                            <td># en zona de puntaje</td>
                            <td># numero de apilados </td>
                            <td><h4> Puntaje</h4></td>
                        </tr>
                        <tr id="tr-1-1">
                            <td>
                               <h4>
                                   <label for="">
                                       Rojos
                                   </label>
                               </h4>
                            </td>
                            <td>
                                <input type="text" name="" class="form-control" id="r_1_p">
                            </td>
                            <td>
                                <input type="text" name="" data-class='tr-1-1' class="form-control even" id="r_1_a" data-type="1" data-text="r_1_p" data-scort="a_1_r">
                            </td>
                            <td>
                                <h3 id="a_1_r">0</h3>
                            </td>
                        </tr>
                        <tr id='tr-2-1'>
                            <td>
                                <h4>
                                    <label for="">
                                        Verdes
                                    </label>
                                </h4>
                            </td>
                            <td>
                                <input type="text" name="" class="form-control" id="v_1_p">
                            </td>
                            <td>
                                <input type="text" name="" data-class='tr-2-1' class="form-control even" id="v_1_a" data-type="1" data-text="v_1_p" data-scort="a_1_v">
                            </td>
                            <td>
                                <h3 id="a_1_v">0</h3>
                            </td>
                        </tr>
                        <tr id='tr-3-1'>
                            <td>
                                <h4>
                                    <label for="">
                                        Azules
                                    </label>
                                </h4>
                            </td>
                            <td>
                                <input type="text" name="" class="form-control" id="a_1_p">
                            </td>
                            <td>
                                <input type="text" name="" data-class='tr-3-1' class="form-control even" id="a_1_a" data-type="1" data-text="a_1_p" data-scort="a_1_s">
                            </td>
                            <td>
                                <h3 id="a_1_s">0</h3>
                            </td>
                        </tr>
                        <tfoot>
                            <tr>
                                <td colspan="4" align="center">
                                    <h1 id="scort_1">0 </h1>
                                </td>
                            </tr>
                            <tr id="errores" class="none">
                                <td colspan="4">
                                    <div class="alert alert-danger "> Lo sentimos este usuario no pertenece al equipo</div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    Firma:
                                </td>
                                <td colspan="2" align="center">
                                    <input type="text" name="" id="firm_user_one" class="form-control">

                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="4">
                                    <button id="btn_eval_1" class="btn btn-success none" >Evaluar</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div id="b_2" class="col-sm-4">
                </div>
                <div id="b_3" class="col-sm-4">

                    <input type="hidden" name="" class="id_time" id="id_time_2">
                    <table id="table_i_2" class="table table-bordred table-striped" >
                        <tr>
                            <td>
                                <h4>
                                    Cubos
                                </h4>
                            </td>
                            <td># en zona de puntaje</td>
                            <td># numero de apilados </td>
                            <td><h4> Puntaje</h4></td>
                        </tr>
                        <tr id="tr-1-2">
                            <td>
                                <h4>
                                    <label>Rojos</label>
                                </h4>
                            </td>
                            <td>
                                <input type="text" name="" class="form-control" id="r_2_p" >
                            </td>
                            <td>
                                <input type="text" name="" data-class='tr-1-2' class="form-control even" id="r_2_a"  data-type="2" data-text="r_2_p" data-scort="a_2_r">
                            </td>
                            <td>
                                <h3 id="a_2_r">0</h3>
                            </td>
                        </tr>
                        <tr id="tr-2-2">
                            <td>
                                <h4>
                                    <label>Verdes</label>
                                </h4>
                            </td>
                            <td>
                                <input type="text" name="" class="form-control" id="v_2_p">
                            </td>
                            <td>
                                <input type="text" name="" data-class='tr-2-2' class="form-control even" id="v_2_a"  data-type="2" data-text="v_2_p" data-scort="a_2_v">
                            </td>
                            <td>
                                <h3 id="a_2_v">0</h3>
                            </td>
                        </tr>
                        <tr id="tr-3-2">
                            <td>
                                <h4>
                                    <label>Azules</label>
                                </h4>
                            </td>
                            <td>
                                <input type="text" name="" class="form-control" id="a_2_p">
                            </td>
                            <td>
                                <input type="text" name="" data-class='tr-3-2' class="form-control even"  id="a_2_a"  data-type="2" data-text="a_2_p" data-scort="a_2_s">
                            </td>
                            <td>
                                <h3 id="a_2_s">0</h3>
                            </td>
                        </tr>
                        <tfoot>
                        <tr>
                            <td colspan="4" align="center">
                                <h1 id="scort_2">0 </h1>
                            </td>
                        </tr>
                        <tr id="errores2" class="none">
                            <td colspan="4">
                                <div class="alert alert-danger "> Lo sentimos este usuario no pertenece al equipo</div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" >
                                Firma:
                            </td>
                            <td colspan="2" align="center">
                                <input type="text" name="" id="firm_user_two" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td align="center" colspan="4">
                                <button id="btn_eval_2" class="btn btn-success none" >Evaluar</button>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>




            <div class="modal fade bs-example-modal-sm" id='small' tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        
                        <table class="table table-bordred table-striped" >
                            <thead>
                                <tr>
                                    <th  colspan="2" align="center"> Seleciona equipo </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="center">{!! $d->r_t_name !!}</td>
                                    <td align="center">{!! $d->r_t2_name !!}</td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <button type="button" id="1" class="btn btn-success btn-circle btn-lg selec">
                                            <i class="glyphicon glyphicon-chevron-left"></i>
                                        </button>
                                    </td>
                                    <td align="center">
                                        <button type="button" id="2" class="btn btn-success btn-circle btn-lg selec">
                                            <i class="glyphicon glyphicon-chevron-right"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- inicio del modla -->
            <div class="modal fade bs-example-modal-lg" id='myModal' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="row grid-divider" id="div_body">
                            <div id="b_1" class="col-sm-6">
                                <table class="table table-bordred table-striped" >
                                    <tr>
                                        <td>Equipo {!! $d->r_t_name !!}</td>
                                    </tr>
                                </table>
                                <div id="tbl_id_1">

                                </div>
                                <div id="l_t_1" class="none">
                                    <table class="table table-bordred table-striped" >
                                        <thead>
                                        <tr>
                                            <td colspan="4" align="center">
                                                <h3>
                                                    Tiempo
                                                </h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" align="center">
                                                <h3 id="time_id_one"></h3>
                                            </td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Cubos</td>
                                            <td># en zona de puntaje</td>
                                            <td># numero de apilados </td>
                                            <td><h4> Puntaje</h4></td>
                                        </tr>
                                        <tr>
                                            <td><h4> Rojos </h4></td>
                                            <td id="l_r_1"></td>
                                            <td id="l_r_2"></td>
                                            <td id="l_r_3"></td>
                                        </tr>
                                        <tr>
                                            <td><h4> Verdes </h4></td>
                                            <td id="l_v_1"></td>
                                            <td id="l_v_2"></td>
                                            <td id="l_v_3"></td>
                                        </tr>
                                        <tr>
                                            <td><h4> Azules </h4></td>
                                            <td id="l_a_1"></td>
                                            <td id="l_a_2"></td>
                                            <td id="l_a_3"></td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="4" align="center">
                                                <h3 id="scort_one"></h3>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>

                                </div>


                            </div>
                            <div  class="col-sm-6">
                                <table class="table table-bordred table-striped" >
                                    <tr>
                                        <td>Equipo {!! $d->r_t2_name !!}</td>
                                    </tr>
                                </table>
                                <div id="tbl_id_2">

                                </div>
                                <div id="l_t_2" class="none">
                                    <table class="table table-bordred table-striped" >
                                        <thead>
                                        <tr>
                                            <td colspan="4" align="center">
                                                <h3>
                                                    Tiempo
                                                </h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" align="center">
                                                <h3 id="time_id_two"></h3>
                                            </td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Cubos</td>
                                            <td># en zona de puntaje</td>
                                            <td># numero de apilados </td>
                                            <td><h4> Puntaje</h4></td>
                                        </tr>
                                        <tr>
                                            <td><h4> Rojos </h4></td>
                                            <td id="l_r_1_2"></td>
                                            <td id="l_r_2_2"></td>
                                            <td id="l_r_3_2"></td>
                                        </tr>
                                        <tr>
                                            <td><h4> Verdes </h4></td>
                                            <td id="l_v_1_2"></td>
                                            <td id="l_v_2_2"></td>
                                            <td id="l_v_3_2"></td>
                                        </tr>
                                        <tr>
                                            <td><h4> Azules </h4></td>
                                            <td id="l_a_1_2"></td>
                                            <td id="l_a_2_2"></td>
                                            <td id="l_a_3_2"></td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="4" align="center">
                                                <h3 id="scort_two"></h3>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- fin del modal -->

            <!-- inicio modal win -->
            <div class="modal fade" id="myWin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h4 class="modal-title" id="myModalLabel">Equipo ganador </h4>
                        </div>

                        <div class="col-sm-12" id="di_win">

                        </div>

                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>

        <!-- fin modal win -->

            <script>
                $(document).ready(function(){

                    var pathname = window.location.pathname;
                    var str = pathname.split("/");
                    var temp = new Array();
                    temp = x = pathname.split("/");
                    $('#btn_eval_1').unbind().bind('click',function(){
                        getInfo(2);
                        $.ajax({
                            url:temp[str.length - 1]+'/evalua',
                            type:'get',
                            data:{
                                type:1,
                                zona_puntaje_roja :$('#r_1_p').val(),
                                numero_apilados_roja: $('#r_1_a').val(),
                                zona_puntaje_verde:$('#v_1_p').val(),
                                numero_apilados_verde:$('#v_1_a').val(),
                                zona_puntaje_azules:$('#a_1_p').val(),
                                numero_apilados_azules:$('#a_1_a').val(),
                                scort_team:$('#scort_1').text(),
                                firma_usuario: $('#firm_user_one').val(),
                                team_id: $('#team_1_id').val(),
                                time_final:$('#id_time_1').val(),
                                combat_id:temp[str.length - 1]
                            },
                            success:function(data){

                                if(data.error){

                                    $('#errores').addClass('none');
                                    $('#myModal').modal({
                                        backdrop:'static',
                                        keyboard: true
                                    });
                                    $('#l_t_2').addClass('none');
                                    $('#l_t_1').removeClass('none');

                                    $h_t=$('#h_1').html();
                                    $('#tbl_id_1').empty();
                                    $('#tbl_id_1').html($h_t);
                                    $('#time_id_one').text($('#id_time_1').val());
                                    $('#l_r_1').text($('#r_1_p').val());
                                    $('#l_r_2').text($('#r_1_a').val());
                                    $('#l_r_3').text($('#a_1_r').text());
                                    $('#l_v_1').text($('#v_1_p').val());
                                    $('#l_v_2').text($('#v_1_a').val());
                                    $('#l_v_3').text($('#a_1_v').text());
                                    $('#l_a_1').text($('#a_1_p').val());
                                    $('#l_a_2').text($('#a_1_a').val());
                                    $('#l_a_3').text($('#a_1_s').text());
                                    $('#scort_one').text($('#scort_1').text());
                                    $('#tbl_id_2').html('<div id="errores_cnt_2" class="alert alert-danger"> Datos aún no registrados . </div>');

                                    if(data.flag){
                                           //alert('acas');
                                        setTimeout(
                                                function(){
                                                    $('#myModal').modal('hide');
                                                    $('#myWin').modal({
                                                        backdrop:'static',
                                                        keyboard: true
                                                    });
                                                    $table = $('#table_'+data.flag_win).html();
                                                    $('#di_win').html($table);

                                                }, 5000);
                                    }

                                }else{
                                    $('#errores').removeClass('none');
                                }
                            },error:function(){
                                alert('Upsss lo sentimos ocurrio algo intenta mas tarde');
                            }
                        });





                    });
                    $('#btn_eval_2').unbind().bind('click',function(){
                        getInfo(1);
                        $.ajax({
                            url:temp[str.length - 1]+'/evalua',
                            type:'get',
                            data:{
                                type:2,
                                zona_puntaje_roja :$('#r_2_p').val(),
                                numero_apilados_roja: $('#r_2_a').val(),
                                zona_puntaje_verde:$('#v_2_p').val(),
                                numero_apilados_verde:$('#v_2_a').val(),
                                zona_puntaje_azules:$('#a_2_p').val(),
                                numero_apilados_azules:$('#a_2_a').val(),
                                scort_team:$('#scort_2').text(),
                                firma_usuario: $('#firm_user_two').val(),
                                team_id: $('#team_2_id').val(),
                                time_final:$('#id_time_2').val(),
                                combat_id:temp[str.length - 1]
                            },
                            success:function(data){
                                if(data.error){
                                    $('#errores2').addClass('none');
                                    $('#myModal').modal({
                                        backdrop:'static',
                                        keyboard: true
                                    });
                                    $('#l_t_1').addClass('none');
                                    $('#l_t_2').removeClass('none');

                                    $h_t=$('#h_3').html();
                                    $('#tbl_id_2').empty();
                                    $('#tbl_id_2').html($h_t);
                                    $('#time_id_two').text($('#id_time_2').val());
                                    $('#l_r_1_2').text($('#r_2_p').val());
                                    $('#l_r_2_2').text($('#r_2_a').val());
                                    $('#l_r_3_2').text($('#a_2_r').text());
                                    $('#l_v_1_2').text($('#v_2_p').val());
                                    $('#l_v_2_2').text($('#v_2_a').val());
                                    $('#l_v_3_2').text($('#a_2_v').text());
                                    $('#l_a_1_2').text($('#a_2_p').val());
                                    $('#l_a_2_2').text($('#a_2_a').val());
                                    $('#l_a_3_2').text($('#a_2_s').text());
                                    $('#scort_two').text($('#scort_2').text());
                                    $('#tbl_id_1').html('<div id="errores_cnt_2" class="alert alert-danger"> Datos aún no registrados . </div>');
                                    if(data.flag){
                                        //alert('acas');
                                        setTimeout(
                                                function(){
                                                    $('#myModal').modal('hide');
                                                    $('#myWin').modal({
                                                        backdrop:'static',
                                                        keyboard: true
                                                    });
                                                    $table = $('#table_'+data.flag_win).html();
                                                    $('#di_win').html($table);

                                                }, 5000);
                                    }
                                }else{
                                    $('#errores2').removeClass('none');
                                }
                            },error:function(){
                                alert('Upsss lo sentimos ocurrio algo intenta mas tarde');
                            }
                        });
                    });

                    var tiempo = {
                        hora: 0,
                        minuto: 0,
                        segundo: 0
                    };

                    var tiempo_corriendo = null;
                    $('.start').unbind().bind('click',function(){
                        $('#time_id').text($('#time_text_id').val());
                        $('#table_div').removeClass('none');
                        $('#h4_id').addClass('none');
                        clock();
                        var valor = $(this).attr('data-val');
                        if (valor == '0') {
                            $('#div_body').removeClass('none');
                            $('#button_scort').removeClass('none');
                            $(this).attr('data-val', 1);
                            $(this).removeClass('btn-success');
                            $(this).addClass('btn-danger');
                            $('.start i').removeClass('glyphicon-play');
                            $('.start i').addClass('glyphicon-stop');
                            tiempo_corriendo = setInterval(function () {

                                tiempo.segundo++;
                                if (tiempo.segundo >= 60) {
                                    tiempo.segundo = 0;
                                    tiempo.minuto++;
                                }

                                if (tiempo.minuto >= 60) {
                                    tiempo.minuto = 0;
                                    tiempo.hora++;
                                }
                                var horas = tiempo.hora < 10 ? '0' + tiempo.hora : tiempo.hora;
                                var minutos = tiempo.minuto < 10 ? '0' + tiempo.minuto : tiempo.minuto;
                                var segundos = tiempo.segundo < 10 ? '0' + tiempo.segundo : tiempo.segundo;
                                if (minutos == {!! $d->challenge_duration !!}  && segundos == 00) {
                                    clearInterval(tiempo_corriendo);
                                }
                                $("#hour").text(horas);
                                $("#minute").text(minutos);
                                $("#second").text(segundos);
                            }, 1000);
                        }else{
                            $('.start').attr('data-val', 0);
                            $('.start').removeClass('btn-danger');
                            $('.start').addClass('btn-success');
                            $('.start i').removeClass('glyphicon-stop');
                            $('.start i').addClass('glyphicon-play');
                            $('#button_scort').addClass('none');
                            clearInterval(tiempo_corriendo);
                        }
                    });

                    function clock() {
                        var padder = function (n) {
                            return (n < 10 ? '0' : '') + n;
                        };
                        var changeMe = function (ele, val) {
                            if (ele.data('val') === val) {
                                return;
                            }
                            ele.data('val', val);
                            ele.parent().toggleClass('flip');
                            ele.fadeOut(100, function () {
                                $(this).html(val).fadeIn(100);
                            });
                            ele.html(val);
                        };
                        var hourC = $('.hour .clock-val');
                        var minC = $('.minute .clock-val');
                        var secC = $('.second .clock-val');
                        window.setInterval(function () {
                            var d = new Date();

                            changeMe(hourC, padder(d.getHours()));
                            changeMe(minC, padder(d.getMinutes()));
                            changeMe(secC, padder(d.getSeconds()));
                        }, 1000);
                    }

                    $('#small').modal({
                        backdrop:'static',
                        keyboard: true
                    });

                    $('.selec').unbind().bind('click',function(){
                        $typeEval=$(this).attr('id');
                        if($typeEval == 1){
                            $("#table_i_2" ).removeClass('table table-bordred table-striped');
                            $("#table_i_2" ).addClass("none");
                            $('#h_1').removeClass('col-sm-4');
                            $('#b_1').removeClass('col-sm-4');
                            $('#h_1').addClass('col-sm-6');
                            $('#b_1').addClass('col-sm-6');
                            $('#h_2').removeClass('col-sm-4');
                            $('#b_2').removeClass('col-sm-4');
                            $('#h_2').addClass('col-sm-3');
                            $('#b_2').addClass('col-sm-3');
                            $('#h_3').removeClass('col-sm-4');
                            $('#b_3').removeClass('col-sm-4');
                            $('#h_3').addClass('col-sm-3');
                            $('#b_3').addClass('col-sm-3');
                        }else if($typeEval == 2){
                            $("#table_i_1" ).removeClass('table table-bordred table-striped');
                            $("#table_i_1" ).addClass("none");
                            $('#h_3').removeClass('col-sm-4');
                            $('#b_3').removeClass('col-sm-4');
                            $('#h_3').addClass('col-sm-6');
                            $('#b_3').addClass('col-sm-6');
                            $('#h_2').removeClass('col-sm-4');
                            $('#b_2').removeClass('col-sm-4');
                            $('#h_2').addClass('col-sm-3');
                            $('#b_2').addClass('col-sm-3');
                            $('#h_1').removeClass('col-sm-4');
                            $('#b_1').removeClass('col-sm-4');
                            $('#h_1').addClass('col-sm-3');
                            $('#b_1').addClass('col-sm-3');
                        }
                        $('#small').modal('hide');
                    });
                    $('.selec').unbind().bind('click',function(){
                        $typeEval=$(this).attr('id');
                        if($typeEval == 1){
                            $("#table_i_2" ).removeClass('table table-bordred table-striped');
                            $("#table_i_2" ).addClass("none");
                            $('#h_1').removeClass('col-sm-4');
                            $('#b_1').removeClass('col-sm-4');
                            $('#h_1').addClass('col-sm-6');
                            $('#b_1').addClass('col-sm-6');
                            $('#h_2').removeClass('col-sm-4');
                            $('#b_2').removeClass('col-sm-4');
                            $('#h_2').addClass('col-sm-3');
                            $('#b_2').addClass('col-sm-3');
                            $('#h_3').removeClass('col-sm-4');
                            $('#b_3').removeClass('col-sm-4');
                            $('#h_3').addClass('col-sm-3');
                            $('#b_3').addClass('col-sm-3');
                        }else if($typeEval == 2){
                            $("#table_i_1" ).removeClass('table table-bordred table-striped');
                            $("#table_i_1" ).addClass("none");
                            $('#h_3').removeClass('col-sm-4');
                            $('#b_3').removeClass('col-sm-4');
                            $('#h_3').addClass('col-sm-6');
                            $('#b_3').addClass('col-sm-6');
                            $('#h_2').removeClass('col-sm-4');
                            $('#b_2').removeClass('col-sm-4');
                            $('#h_2').addClass('col-sm-3');
                            $('#b_2').addClass('col-sm-3');
                            $('#h_1').removeClass('col-sm-4');
                            $('#b_1').removeClass('col-sm-4');
                            $('#h_1').addClass('col-sm-3');
                            $('#b_1').addClass('col-sm-3');
                        }
                        $('#small').modal('hide');
                    });

                    $('.even').unbind().bind('blur',function(){
                        $var =$(this).attr('data-text');
                        $scort =$(this).attr('data-scort');
                        $tr =$(this).attr('data-class');
                        $type= $(this).attr('data-type');
                        $val1=$('#'+$var+'').val();
                        $val2=$(this).val();
                        $valor=$val1 * $val2;
                        if($val2 > $val1){
                            $('#'+$tr+'').removeClass('has-success');
                            $('#'+$tr+'').addClass('has-error');
                            $('#erorres-div').html('<div class="alert alert-danger"><strong>Error!</strong> El numero de cubos apilados no debe ser mayor a existentes en zona. </div>');
                            //alert('');
                        }else{
                            $('#erorres-div').empty();
                            $('#'+$tr+'').addClass('has-success');

                            $('#'+$tr+'').removeClass('has-error');
                        }
                        $('#'+$scort+'').text($valor);
                        evalResul($type);
                    });

                    function evalResul($type){
                        $sc1= parseInt($('#a_1_s').text());
                        $sc2= parseInt($('#a_2_s').text());
                        if($sc1 != 0 || $sc2 != 0){
                            clearInterval(tiempo_corriendo);
                                $v1=parseInt($('#a_1_r').text());
                                $v2=parseInt($('#a_1_v').text());
                                $v3=parseInt($('#a_1_s').text());
                                $('#scort_1').text($v1 + $v2 +$v3);
                                $v1_2=parseInt($('#a_2_r').text());
                                $v2_2=parseInt($('#a_2_v').text());
                                $v3_2=parseInt($('#a_2_s').text());
                                $('#scort_2').text($v1_2 + $v2_2 +$v3_2);
                            if($sc2 != 0){
                                $h = $('#hour').text();
                                $m = $('#minute').text();
                                $s = $('#second').text();
                                $("#id_time_2").val($h +':'+$m+':'+$s);
                                $('#btn_eval_2').removeClass('none');
                            }
                            if($sc1 != 0){
                                $h = $('#hour').text();
                                $m = $('#minute').text();
                                $s = $('#second').text();
                                $("#id_time_1").val($h +':'+$m+':'+$s);
                                $('#btn_eval_1').removeClass('none');
                            }

                        }
                    }

                    function getInfo($id){
                        //console.log($id);
                        $.ajax({
                            url:temp[str.length - 1]+'/getinfo',
                            type:'get',
                            data:{
                                combat_id:temp[str.length - 1],
                                identificador:$id
                            },
                            success:function(dato){

                                if(dato.flag){
                                    $table = $('#table_'+$id).html();
                                    //alert($table);
                                    if($id == 1){
                                        setTimeout(
                                                function(){

                                                    $('#tbl_id_'+$id).empty();
                                                    $('#tbl_id_'+$id).append($table)
                                                    $('#l_t_'+$id).removeClass('none');
                                                }, 1000);

                                        /*$ta=$('#h_1').html();
                                        //alert($ta);
                                        $('#tbl_id_'+$id).empty();
                                        $('#tbl_id_'+$id).append($ta);*/

                                        $('#l_t_'+$id+' table thead tr td h3#time_id_one').html(dato.data.time);
                                        $('#l_r_1').text(dato.data.zona_1);
                                        $('#l_r_2').text(dato.data.num_1);
                                        $('#l_r_3').text(parseInt(dato.data.zona_1) * parseInt(dato.data.num_1));

                                        $('#l_v_1').text(dato.data.zona_2);
                                        $('#l_v_2').text(dato.data.num_2);
                                        $('#l_v_3').text(parseInt(dato.data.zona_2) * parseInt(dato.data.num_2));

                                        $('#l_a_1').text(dato.data.zona_3);
                                        $('#l_a_2').text(dato.data.num_3);
                                        $('#l_a_3').text(parseInt(dato.data.zona_3) * parseInt(dato.data.num_3));
                                        $('#scort_one').text(dato.data.score);

                                    }else{
                                        setTimeout(
                                                function(){

                                                    $('#tbl_id_'+$id).empty();
                                                    $('#tbl_id_'+$id).append($table)
                                                    $('#l_t_'+$id).removeClass('none');
                                                }, 1000);


                                        $('#l_t_'+$id+' table thead tr td h3#time_id_two').html(dato.data.time);
                                        $('#l_r_1_2').text(dato.data.zona_1);
                                        $('#l_r_2_2').text(dato.data.num_1);
                                        $('#l_r_3_').text(parseInt(dato.data.zona_1) * parseInt(dato.data.num_1));

                                        $('#l_v_1_2').text(dato.data.zona_2);
                                        $('#l_v_2_2').text(dato.data.num_2);
                                        $('#l_v_3_2').text(parseInt(dato.data.zona_2) * parseInt(dato.data.num_2));

                                        $('#l_a_1_2').text(dato.data.zona_3);
                                        $('#l_a_2_2').text(dato.data.num_3);
                                        $('#l_a_3_2').text(parseInt(dato.data.zona_3) * parseInt(dato.data.num_3));
                                        $('#scort_two').text(dato.data.score);

                                    }


                                }

                            },
                            error:function(){}
                        });

                    }

                });
            </script>
        @endif

    </div>
@stop