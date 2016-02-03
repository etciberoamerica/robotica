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
                <div class="col-sm-4">
                    <div class="col-padding" id="table_1">
                        <table  id="team_1_id" class="table table-bordred table-striped" >
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
                            <input type="hidden"  class='team_1_id' id="team_1_id" value="{!! $d->r_b_team_id !!}">
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="2" align="center">
                                    <h1 id="scort_1">0</h1>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="col-padding">
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
                                <tr>
                                    <td align="center" colspan="3"> Tiempo <h1 id="time_id"></h1></td>
                                </tr>
                                <tr id="button_scort">
                                    <th align="center">
                                        <span id="href_res_1" data-val="1" data-type="resta" class="eval"><i class="fa fa-futbol-o fa-3x" style="color:red;cursor:pointer;"></i></span>
                                        <span id="href_sum_1" data-val="1" data-type="suma" class="eval"><i class="fa fa-futbol-o fa-3x" style="color:green;cursor:pointer;"></i></span>
                                    </th>
                                    <th>
                                        <h3>
                                            Marcador
                                        </h3>
                                    </th>
                                    <th align="center">
                                        <span  id="href_sum_2" data-val="2" data-type="suma" class="eval"><i class="fa fa-futbol-o fa-3x" style="color:green;cursor:pointer;"></i></span>
                                        <span  id="href_res_2" data-val="2" data-type="resta" class="eval"><i class="fa fa-futbol-o fa-3x" style="color:red;cursor:pointer;"></i></span>
                                    </th>
                                </tr>

                                </tbody>
                                <input type="hidden" name="" id="time_text_id" value=1>
                                <input type="hidden" name="" id="flag_time" value=1>
                                <input type="hidden" name="" id="flag_penals" value=>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="col-padding" id="table_2" >
                        <table id="team_2_id" class="table table-bordred table-striped">
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
                            <input type="hidden" class='team_2_id' id="team_2_id" value="{!! $d->r_b2_team_id !!}">
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="2" align="center">
                                    <h1 id="scort_2">0</h1>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
            <div id="penals" class="none">
                <table class="table table-bordred table-striped">
                    <thead>
                        <tr>
                            <th colspan="3" align="center">Penales</th>
                        </tr>
                    </thead>

                    <tr>
                        <td align="center">

                                <button type="button" class="btn btn-default btn-circle" id="1_5">
                                    <i class="glyphicon glyphicon-resize-horizontal"></i>
                                </button>

                                <button type="button" class="btn btn-default btn-circle" id="1_4">
                                    <i class="glyphicon glyphicon-resize-horizontal"></i>
                                </button>

                                <button type="button" class="btn btn-default btn-circle" id="1_3">
                                    <i class="glyphicon glyphicon-resize-horizontal"></i>
                                </button>

                                <button type="button" class="btn btn-default btn-circle" id="1_2">
                                    <i class="glyphicon glyphicon-resize-horizontal"></i>
                                </button>

                                <button type="button" class="btn btn-default btn-circle" id="1_1">
                                    <i class="glyphicon glyphicon-resize-horizontal"></i>
                                </button>
                        </td>
                        <td align="center">
                            <input type="hidden" id="penal_1" value="1">
                            <input type="hidden" id="penal_2" value="1">
                            <input type="hidden" id="penal_1_win" value="0">
                            <input type="hidden" id="penal_2_win" value="0">


                            <span id="href_res_1" data-val="1" data-type="resta" class="eval_penal"><i class="fa fa-futbol-o fa-3x" style="color:red;cursor:pointer;"></i></span>
                            <span id="href_sum_1" data-val="1" data-type="suma" class="eval_penal"><i class="fa fa-futbol-o fa-3x" style="color:green;cursor:pointer;"></i></span>

                            <span id="evalua_penal" ><i class="fa fa-trophy fa-3x" style="color:green;cursor:pointer;"></i></span>

                            <span id="href_sum_2" data-val="2" data-type="suma" class="eval_penal"><i class="fa fa-futbol-o fa-3x" style="color:green;cursor:pointer;"></i></span>
                            <span id="href_res_2" data-val="2" data-type="resta" class="eval_penal"><i class="fa fa-futbol-o fa-3x" style="color:red;cursor:pointer;"></i></span>


                        </td>
                        <td align="center">
                            <button type="button" class="btn btn-default btn-circle" id="2_1">
                                <i class="glyphicon glyphicon-resize-horizontal"></i>
                            </button>

                            <button type="button" class="btn btn-default btn-circle" id="2_2">
                                <i class="glyphicon glyphicon-resize-horizontal"></i>
                            </button>

                            <button type="button" class="btn btn-default btn-circle" id="2_3">
                                <i class="glyphicon glyphicon-resize-horizontal"></i>
                            </button>

                            <button type="button" class="btn btn-default btn-circle" id="2_4">
                                <i class="glyphicon glyphicon-resize-horizontal"></i>
                            </button>

                            <button type="button" class="btn btn-default btn-circle" id="2_5">
                                <i class="glyphicon glyphicon-resize-horizontal"></i>
                            </button>
                        </td>
                    </tr>
                    <tr id="muerte_sub" class="none">
                        <td align="center" colspan="3">
                            Muerte súbita
                        </td>
                    </tr>
                    <tr id="muerte_sub_1" class="none">
                        <td align="center">
                            <button type="button" data-type="1" class="btn btn-default btn-circle muer_even" id="m_1">
                                <i class="glyphicon glyphicon-resize-horizontal"></i>
                            </button>
                        </td>
                        <td>

                        </td>
                        <td align="center">
                            <button type="button" data-type="2" class="btn btn-default btn-circle muer_even" id="m_2">
                                <i class="glyphicon glyphicon-resize-horizontal"></i>
                            </button>
                        </td>
                    </tr>

                </table>
            </div>





            <div class="modal fade bs-example-modal-lg" id='myModal' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <br>
                        <div id="errores" class="alert alert-danger none"></div>
                        <br>

                        <table id="mytable" class="table table-bordred table-striped">
                            <tbody>
                            <tr>
                                <td>Equipo {!! $d->r_t_name !!}</td>
                                <td>Equipo {!! $d->r_t2_name !!}</td>
                            </tr>
                            <tr>
                                <td>
                                    <div id="errores_c_1" class="alert alert-danger none"></div>
                                    <input type="text" name="hola" id="cap_id_1" class="form-control">
                                </td>
                                <td>
                                    <div id="errores_c_2" class="alert alert-danger none"></div>
                                    <input type="text" name="hola" id="cap_id_2" class="form-control">
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="2" align="center">
                                    <button id='btn_c_eval_fir'  class='btn btn-primary'>
                                        Evalua
                                    </button>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>


            <script>
                $(document).ready(function(){
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
                            $('#button_scort').removeClass('none');
                            $(this).attr('data-val', 1);
                            $(this).removeClass('btn-success');
                            $(this).addClass('btn-danger');
                            $('.start i').removeClass('glyphicon-play');
                            $('.start i').addClass('glyphicon-stop');
                            tiempo_corriendo = setInterval(function () {
                                // Segundos
                                tiempo.segundo++;
                                if (tiempo.segundo >= 60) {
                                    tiempo.segundo = 0;
                                    tiempo.minuto++;
                                }

                                // Minutos
                                if (tiempo.minuto >= 60) {
                                    tiempo.minuto = 0;
                                    tiempo.hora++;
                                }
                                var horas = tiempo.hora < 10 ? '0' + tiempo.hora : tiempo.hora;
                                var minutos = tiempo.minuto < 10 ? '0' + tiempo.minuto : tiempo.minuto;
                                var segundos = tiempo.segundo < 10 ? '0' + tiempo.segundo : tiempo.segundo;


                                $("#hour").text(horas);
                                $("#minute").text(minutos);
                                $("#second").text(segundos);
                                //if (minutos == 00  && segundos == 06) {
                                    if (minutos == {!! $d->challenge_duration !!} / parseInt(2) && segundos == 00) {
                                    $valor = parseInt($('#flag_time').val()) + parseInt(1);
                                    $('#flag_time').val($valor);
                                    clearInterval(tiempo_corriendo);
                                    resetTiemp();
                                   tiempo = {
                                        hora: 0,
                                        minuto: 0,
                                        segundo: 0
                                    };


                                }

                            }, 1000);

                            scortIncre();

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
                    function resetTiemp(){
                        $("#hour").text('00');
                        $("#minute").text('00');
                        $("#second").text('00');

                        $('.start').attr('data-val', 0);
                        $('.start').removeClass('btn-danger');
                        $('.start').addClass('btn-success');
                        $('.start i').removeClass('glyphicon-stop');
                        $('.start i').addClass('glyphicon-play');
                        if( parseInt($('#time_text_id').val()) != 2){
                            $('#time_id').text(parseInt($('#time_text_id').val()) + parseInt(1));
                            $('#time_text_id').val(parseInt($('#time_text_id').val()) + parseInt(1));

                        }else
                        if( parseInt($('#time_text_id').val()) == 2){
                            evalScort()
                        }

                    }
                    function scortIncre(){
                        $('.eval').unbind().bind('click',function(){
                            $type = $(this).attr('data-type');
                            $val  = $(this).attr('data-val');
                            if($val ==1){
                                if($type=='suma'){
                                    $('#scort_1').text(parseInt($('#scort_1').text()) + parseInt(1));
                                }else if($type =='resta'){
                                    if(parseInt($('#scort_1').text()) !=0){
                                        $('#scort_1').text(parseInt($('#scort_1').text()) - parseInt(1));
                                    }
                                }
                            }
                            else if($val == 2){
                                if($type=='suma'){
                                    $('#scort_2').text(parseInt($('#scort_2').text()) + parseInt(1));
                                }else if($type =='resta'){
                                    if(parseInt($('#scort_2').text()) !=0){
                                        $('#scort_2').text(parseInt($('#scort_2').text()) - parseInt(1));
                                    }
                                }
                            }

                        });

                    }
                    function evalScort(){
                        $scort1 = parseInt($('#scort_1').text());
                        $scort2  = parseInt($('#scort_2').text());
                        if($scort1 == $scort2 && parseInt($('#flag_time').val()) == 3){
                            $('#button_scort').addClass('none');
                            $('#penals').removeClass('none');
                            $('#flag_penals').val(1);
                            clearInterval(tiempo_corriendo);
                            evalPenal();
                        }else{
                            popUp($scort1,$scort2);
                        }
                    }
                    function evalPenal(){
                        $('.eval_penal').unbind().bind('click',function(){
                            $val= $(this).attr('data-val');
                            $type= $(this).attr('data-type');
                            $valOne = parseInt($('#penal_1').val());
                            $valTwo = parseInt($('#penal_2').val());
                            if($val == 1){
                                if($type=='suma'){
                                    $('#1_'+$valOne+'').removeClass('btn-default');
                                    $('#1_'+$valOne+'').addClass('btn-success');
                                    $('#1_'+$valOne+' i').removeClass('glyphicon-resize-horizontal');
                                    $('#1_'+$valOne+' i').addClass('glyphicon-ok');
                                    $('#penal_1').val($valOne + parseInt(1));
                                    $cortOne = parseInt($('#scort_1').text());
                                    $('#scort_1').text($cortOne + parseInt(1));
                                    $('#penal_1_win').val(parseInt($('#penal_1_win').val()) + parseInt(1));

                                }else{
                                        $('#1_'+$valOne+'').addClass('btn-danger');
                                        $('#1_'+$valOne+'').removeClass('btn-default');
                                        $('#1_'+$valOne+' i').removeClass('glyphicon-resize-horizontal');
                                        $('#1_'+$valOne+' i').addClass('glyphicon-remove');
                                        $('#penal_1').val($valOne + parseInt(1));
                                }
                            }else if($val == 2){
                                if($type=='suma'){
                                    $('#2_'+$valTwo+'').addClass('btn-success');
                                    $('#2_'+$valTwo+'').removeClass('btn-default');
                                    $('#penal_2').val($valTwo + parseInt(1));
                                    $cortTwo = parseInt($('#scort_2').text());
                                    $('#2_'+$valTwo+' i').removeClass('glyphicon-resize-horizontal');
                                    $('#2_'+$valTwo+' i').addClass('glyphicon-ok');
                                    $('#scort_2').text($cortTwo + parseInt(1));
                                    $('#penal_2_win').val(parseInt($('#penal_2_win').val()) + parseInt(1));

                                }else{
                                   /* if($valTwo != 1){*/
                                        $('#2_'+$valTwo+'').addClass('btn-danger');
                                        $('#2_'+$valTwo+'').removeClass('btn-default');
                                        $('#2_'+$valTwo+' i').removeClass('glyphicon-resize-horizontal');
                                        $('#2_'+$valTwo+' i').addClass('glyphicon-remove');
                                        $('#penal_2').val($valTwo + parseInt(1));

                               /*     }*/

                                }
                            }

                        });

                        $('#evalua_penal').unbind().bind('click',function(){
                            $scort1 = parseInt($('#scort_1').text());
                            $scort2 = parseInt($('#scort_2').text());
                            if($scort1 == $scort2){
                                $('#muerte_sub').removeClass('none');
                                $('#muerte_sub_1').removeClass('none');
                                $('.muer_even').unbind().bind('click',function(){
                                    var tip = $(this).attr('data-type');
                                    if(tip == 1){
                                        $('#scort_1').text(parseInt($('#scort_1').text()) + parseInt(1));

                                    }else if(tip == 2){
                                        $('#scort_2').text(parseInt($('#scort_2').text()) + parseInt(1));
                                    }

                                });

                            }else{
                                popUp($scort1,$scort2);
                            }



                        });

                    }
                    function popUp($scort1,$scort2){
                        if($scort1 > $scort2){
                            $id=1;
                        }else if($scort2 > $scort1){
                            $id=2;
                        }
                        $win =$('.team_'+$id+'_id').val();
                        var ht =$('#table_'+$id+'').html();
                        ht += $('.modal-content').html();
                        $('.modal-content').html(ht);
                        $('#myModal').modal({
                            backdrop:'static',
                            keyboard: true
                        });



                        $('#btn_c_eval_fir').unbind().bind('click',function(){
                            $('#errores_c_1').addClass('none');
                            $('#errores_c_2').addClass('none');
                            $('#errores').addClass('none');
                            var pathname = window.location.pathname;
                            var str = pathname.split("/");
                            var temp = new Array();
                            temp = x = pathname.split("/");
                            $.ajax({
                                url:temp[str.length - 1]+'/evalua',
                                type:'GET',
                                data:{
                                    win :$win,
                                    combat_id :temp[str.length - 1],
                                    equipo_uno:$('.team_1_id').val(),
                                    firma_equipo_uno:$('#cap_id_1').val(),
                                    equipo_dos: $('.team_2_id').val(),
                                    firma_equipo_dos: $('#cap_id_2').val(),
                                    puntaje_equipo_one: $('#scort_1').text(),
                                    puntaje_equipo_dos: $('#scort_2').text(),
                                    penaltis:$('#flag_penals').val()
                                },
                                success:function(data){
                                    if(data.type =='uno'){
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
                                            //location.reload(true);
                                        }

                                    }else if(data.type == 'dos')
                                    {
                                        $('#cap_id_1').focus();
                                        $('#errores').removeClass('none');
                                        $('#errores').empty();
                                        $('#errores').html(data.firmOne.message);
                                    }else if(data.type =='tres')
                                    {
                                        $('#cap_id_2').focus();
                                        $('#errores').removeClass('none');
                                        $('#errores').empty();
                                        $('#errores').html(data.firmTwo.message);
                                    }else if(data.type =='cuatro'){

                                        //location.reload(true);

                                    }


                                },error:function(){
                                    alert('Upsss los sentimos ocurrio un problema');
                                }
                            });

                        });
                    }

                });
            </script>
        @endif



    </div>
@stop