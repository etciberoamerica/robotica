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
                    <div class="col-sm-4 team_1_id" id="table_b_1">
                        <div class="col-padding" id="">
                            <table  id="team_1_id"  class="table table-bordred table-striped" >
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
                                <input type="hidden" class="team_1_id_text" id="team_1_id" value="{!! $d->r_b_team_id !!}">
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
                    <div class="col-sm-4" id="table_b_2" >
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

                                    </tbody>
                                    <input type="hidden" name="flag" id="flag_id" value=1>
                                    <input type="hidden" name="flag" id="flag_id_2" value=1>
                                    <input type="hidden" name="flag_win" id="flag_win" value="1">
                                    <input type="hidden" name="flag_empater" id="flag_empater" value="4">
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-4 team_2_id" id="table_b_3">
                        <div class="col-padding" id="">
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
                                <input type="hidden" class="team_2_id_text" id="team_2_id" value="{!! $d->r_b2_team_id !!}">
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
                <input type="hidden" name="" id="team_eval">
                <input type="hidden" name="" id="num_eval">
                <input type="hidden" name="" id="inc_time_exec" class="">
                <input type="hidden" name="" id="time_exec" class="">


                    <div class="row grid-divider">
                        <div class="col-sm-12">
                            <div class="col-padding none" id="table_2" >
                                <div class="row">
                                    <input type="hidden" name="" id="num_drop" value="0">
                                    <div class="row-xs-height">
                                        <div class="col-xs-4 col-xs-height">
                                            <div class="inside" data-position="1">
                                                <div class="content" align="center">
                                                    100%
                                                </div>
                                            </div>
                                            <div class="inside-two" data-position="1">
                                                <div class="content" align="center">
                                                    <button data-position="drop_posti_5" type="button" class="btn btn-danger btn-circle drop_posti_resta">
                                                        <i class="fa fa-times fa-lg"></i>
                                                    </button>
                                                    <span id="drop_posti_5" style="font-size: 25px;"><b>0</b></span>
                                                    <button data-position="drop_posti_5" type="button" class="btn btn-success btn-circle drop_posti_suma">
                                                        <i class="fa fa-check fa-lg"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="inside c5 select" data-position="5">
                                                <div class="content" align="center">
                                                    <br><br><br><br><br><br><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-xs-height">
                                            <div class="inside" data-position="1">
                                                <div class="content" align="center">
                                                    80%
                                                </div>
                                            </div>
                                            <div class="inside-two" data-position="1">
                                                <div class="content" align="center">
                                                    <button data-position="drop_posti_4" type="button" class="btn btn-danger btn-circle drop_posti_resta">
                                                        <i class="fa fa-times fa-lg"></i>
                                                    </button>
                                                    <span id="drop_posti_4" style="font-size: 25px;"><b>0</b></span>
                                                    <button data-position="drop_posti_4" type="button" class="btn btn-success btn-circle drop_posti_suma">
                                                        <i class="fa fa-check fa-lg"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="inside c4 select" data-position="4">
                                                <div class="content" align="center">
                                                    <br><br><br><br><br><br><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-xs-height">
                                            <div class="inside" data-position="1">
                                                <div class="content" align="center">
                                                    60%
                                                </div>
                                            </div>
                                            <div class="inside-two" data-position="1">
                                                <div class="content" align="center">
                                                    <button data-position="drop_posti_3" type="button" class="btn btn-danger btn-circle drop_posti_resta">
                                                        <i class="fa fa-times fa-lg"></i>
                                                    </button>
                                                    <span id="drop_posti_3" style="font-size: 25px;"><b>0</b></span>
                                                    <button data-position="drop_posti_3" type="button" class="btn btn-success btn-circle drop_posti_suma">
                                                        <i class="fa fa-check fa-lg"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="inside c3 select" data-position="3">
                                                <div class="content" align="center">
                                                    <br><br><br><br><br><br><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-xs-height">
                                            <div class="inside" data-position="1">
                                                <div class="content" align="center">
                                                    40%
                                                </div>
                                            </div>
                                            <div class="inside-two" data-position="1">
                                                <div class="content" align="center">
                                                    <button data-position="drop_posti_2" type="button" class="btn btn-danger btn-circle drop_posti_resta">
                                                        <i class="fa fa-times fa-lg"></i>
                                                    </button>
                                                    <span id="drop_posti_2" style="font-size: 25px;"><b>0</b></span>
                                                    <button data-position="drop_posti_2" type="button" class="btn btn-success btn-circle drop_posti_suma">
                                                        <i class="fa fa-check fa-lg"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="inside c2 select" data-position="2">
                                                <div class="content" align="center">
                                                    <br><br><br><br><br><br><br>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-xs-4 col-xs-height">
                                            <div class="inside" data-position="1">
                                                <div class="content" align="center">
                                                    20%
                                                </div>
                                            </div>
                                            <div class="inside-two" data-position="1">
                                                <div class="content" align="center">
                                                    <button data-position="drop_posti_1" type="button" class="btn btn-danger btn-circle drop_posti_resta">
                                                        <i class="fa fa-times fa-lg"></i>
                                                    </button>
                                                    <span id="drop_posti_1" style="font-size: 25px;"><b>0</b></span>
                                                    <button data-position="drop_posti_1" type="button" class="btn btn-success btn-circle drop_posti_suma">
                                                        <i class="fa fa-check fa-lg"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="inside c1 select" data-position="1">
                                                <div class="content" align="center">
                                                    <br><br><br><br><br><br><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                        <button type="button" id="1" data-team="{!! $d->r_b_team_id !!}" class="btn btn-success btn-circle btn-lg selec">
                                            <i class="glyphicon glyphicon-chevron-left"></i>
                                        </button>
                                    </td>
                                    <td align="center">
                                        <button type="button" id="2" data-team="{!! $d->r_b2_team_id !!}" class="btn btn-success btn-circle btn-lg selec">
                                            <i class="glyphicon glyphicon-chevron-right"></i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal fade bs-example-modal-lg" id='myModal' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="row grid-divider" id="div_body">
                                <div class="col-sm-6" id="di_1"></div>
                                <div class="col-sm-6" id="di_2"></div>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- modal win -->

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



                {{--<div class="modal fade" id='myWin' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog">
                        <div class="modal-content" id="div_body">
                            <div class="row grid-divider" >
                                <div class="col-sm-6" id="di_win">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>--}}

            <!-- fin modal win-->

            <!-- reinicio juego inicio-->
                <div class="modal fade" id="myRest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">

                                <h4 class="modal-title" id="myModalLabel">Reiniciar Juego</h4>
                            </div>

                            <div class="col-sm-12" align="center">
                                <br><br><br>
                                <button type="button" class="btn btn-primary" onclick="location.reload(true)">Reiniciar Juego</button>

                            </div>

                            <div class="modal-footer">

                            </div>
                        </div>
                    </div>
                </div>

            <!-- renicio juego fin -->
                <script>
                    $(document).ready(function(){

                           /*
                            drop_posti_suma*/


                        $('.drop_posti_resta').unbind().bind('click',function(){
                            $id =$(this).attr('data-position');
                            $valor=parseInt($('#'+$id+' b').text());
                            if($valor != 0){
                                $('#'+$id+' b').text( $valor - parseInt(1));
                            }
                        });


                        $('.drop_posti_suma').unbind().bind('click',function(){
                            $id =$(this).attr('data-position');
                            $valor=parseInt($('#'+$id+' b').text());
                            $valore= parseInt($('#num_drop').val());
                            if($valor < 3){

                                $('#num_drop').val($valore + parseInt(1));
                                $('#'+$id+' b').text( $valor + parseInt(1));
                            }

                            if(parseInt($('#num_drop').val()) == 3){
                                $h = $('#hour').text();
                                $m = $('#minute').text();
                                $s = $('#second').text();
                                $("#time_exec").val($h +':'+$m+':'+$s);
                                clearInterval(tiempo_corriendo);
                                popPup(parseInt($('#num_eval').val()));
                            }

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
                                $('#table_2').removeClass('none');
                                $('#div_body').removeClass('none');
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


                                    if (minutos == {!! $d->challenge_duration !!} && segundos == 00) {
                                        $h = $('#hour').text();
                                        $m = $('#minute').text();
                                        $s = $('#second').text();
                                        $("#time_exec").val($h +':'+$m+':'+$s);
                                        clearInterval(tiempo_corriendo);
                                        popPup(parseInt($('#num_eval').val()));
                                    }



                                }, 1000);
                                clasSelect(tiempo_corriendo);



                            }else{
                                $('.start').attr('data-val', 0);
                                $('.start').removeClass('btn-danger');
                                $('.start').addClass('btn-success');
                                $('.start i').removeClass('glyphicon-stop');
                                $('.start i').addClass('glyphicon-play');
                                //$('#button_scort').addClass('none');
                                clearInterval(tiempo_corriendo);
                            }
                        });


                        $('#small').modal({
                            backdrop:'static',
                            keyboard: true
                        });
                        $('.selec').unbind().bind('click',function(){
                            $typeEval=$(this).attr('id');
                            $teamEval=$(this).attr('data-team');
                            $('#num_eval').val($typeEval);
                            $('#team_eval').val($teamEval);
                            if($typeEval == 1){
                                $('#team_2_id tfoot').addClass('none');
                                $('#table_b_1').removeClass('col-sm-4');
                                $('#table_b_2').removeClass('col-sm-4');
                                $('#table_b_2').removeClass('col-sm-4');

                                $('#table_b_1').addClass('col-sm-6');
                                $('#table_b_2').addClass('col-sm-4');
                                $('#table_b_2').addClass('col-sm-2');

                            }if($typeEval == 2){
                                $('#team_1_id tfoot').addClass('none');
                                $('#table_b_1').removeClass('col-sm-4');
                                $('#table_b_2').removeClass('col-sm-4');
                                $('#table_b_2').removeClass('col-sm-4');

                                $('#table_b_1').addClass('col-sm-2');
                                $('#table_b_2').addClass('col-sm-4');
                                $('#table_b_2').addClass('col-sm-6');
                            }
                            $('#small').modal('hide');


                        });




                    });

                    function clasSelect(tiempo_corriendo){
                        $i=0;
                        $('.select').unbind().bind('click',function(){
                            $i++;
                            $pos = $(this).attr('data-position');
                            $var = '.c'+$pos +' .content';
                            $($var).empty();
                            $($var).html('<br><br><i class="fa fa-check fa-4x"></i><br><br><br>');
                            $(this).removeClass('select');
                            $(this).addClass('removed');

                            $flagTime=parseInt($('#inc_time_exec').val());
                            $('#inc_time_exec').val($i);

                            if($('#num_eval').val() == 2){
                                $('#scort_2').text( parseInt($('#scort_2').text()) + parseInt(20));
                            }else if($('#num_eval').val() == 1){
                                $('#scort_1').text( parseInt($('#scort_1').text()) + parseInt(20));
                            }

                            if($flagTime == 4){
                                $h = $('#hour').text();
                                $m = $('#minute').text();
                                $s = $('#second').text();
                                $("#time_exec").val($h +':'+$m+':'+$s);
                                clearInterval(tiempo_corriendo);
                                popPup(parseInt($('#num_eval').val()));
                            }

                            removedClas();

                            


                        });
                    }

                    function removedClas(){
                        $('.removed').unbind().bind('click',function(){
                           /* alert('remove');*/
                            $pos = $(this).attr('data-position');
                            $var = '.c'+$pos +' .content';
                            $($var).empty();
                            $($var).html('<br><br><br><br><br><br><br>');

                            $(this).removeClass('removed');
                            $(this).addClass('select');
                            clasSelect();
                            if($('#num_eval').val() == 2){
                                if(parseInt($('#scort_2').text()) != 0){
                                    $('#scort_2').text( parseInt($('#scort_2').text()) - parseInt(20));
                                }
                            }else if($('#num_eval').val() == 1){
                                if(parseInt($('#scort_1').text()) != 0){
                                    $('#scort_1').text( parseInt($('#scort_1').text()) - parseInt(20));
                                }
                            }

                        });
                    }
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
                    function popPup($id){

                        $htmls=$('.team_'+$id+'_id').html();
                        //console.log($htmls);
                        $htmls += "<div  class='col-padding'><table class='table table-bordred table-striped'>" +
                                "<tr>" +
                                    "<td colspan='2' align='center'><h3>"+
                                        $('#time_exec').val()
                                    +"</h3></td>"+
                                "</tr>";
                        $htmls +="<tr id='tr_"+ $id +"' class='none'>" +
                                "<td colspan='2'>" +
                                "<div id='errores_cnt_"+ $id +"' class='alert alert-danger'>" +
                                "</div>" +
                                "</td>" +
                                "</tr>";

                        $htmls+= "<tr>" +
                                        "<td>Firma:</td>"+
                                        "<td>"+
                                            "<input type='text' class='form-control' id='firma_team_"+$id+"'>"+
                                        "</td>"+
                                "</tr>";
                        $htmls+= "<tr>" +
                                "<td colspan='2' align=center>"+
                                "<button class='btn btn-primary evaluac' data-id="+$id+">Evaluar</button>"+
                                "</td>"+
                                "</tr>";
                        $htmls+= "</table></div>";

                        $('#di_'+$id+'').html($htmls);
                        $('#myModal').modal({
                            backdrop:'static',
                            keyboard: true
                        });
                        var pathname = window.location.pathname;
                        var str = pathname.split("/");
                        var temp = new Array();
                        temp = x = pathname.split("/");


                        $combatId=temp[str.length - 1];
                        $datPre= preView($combatId,$id);
                        $('.evaluac').unbind().bind('click',function(){
                            $('#tr_'+$id).addClass('none');
                            $id= $(this).attr('data-id');
                            $drop=0;
                            if(parseInt($('#num_drop').val()) == 3){
                                $drop=1;
                            }


                            $.ajax({
                                url:temp[str.length - 1]+'/evalua',
                                type:'GET',
                                data:{
                                    /*team_id:$('team_'+$id+'_id input[name=team_'+$id+'_text]').val(),*/
                                    firma_usuario: $('#firma_team_'+$id+'').val(),
                                    team_id: $('.team_'+$id+'_id_text').val(),
                                    identificador: $id,
                                    combat : temp[str.length - 1],
                                    drop: $drop,
                                    score:$('#scort_'+ $id +'').text(),
                                    time: $('#time_exec').val()
                                },
                                success:function(data){
                                    if(!data.success){

                                        if(data.rest){
                                            $('#myModal').modal('hide');
                                            $('#myRest').modal({
                                                backdrop:'static',
                                                keyboard: true
                                            });
                                            return true;
                                        }

                                        $('#tr_'+$id).removeClass('none');
                                        var html="";
                                        html +="<ul>";
                                        $.each(data.errors,function($i,$e){
                                            html +="<li>";
                                            html +=$e;
                                            html +="</li>";
                                        });
                                        html +="<ul>";
                                        $("#errores_cnt_" + $id +"").empty();
                                        $("#errores_cnt_" + $id +"").html(html);
                                    }else{
                                        $('#tr_'+$id).removeClass('none');
                                        var html="";
                                        html +="<ul>";
                                        $.each(data.errors,function($i,$e){
                                            html +="<li>";
                                            html +=$e;
                                            html +="</li>";
                                        });
                                        html +="<ul>";
                                        $("#errores_cnt_" + $id +"").empty();
                                        $("#errores_cnt_" + $id +"").html(html);
                                        //location.reload(true);
                                        $('#tr_'+$id+' #errores_cnt_'+$id+'').removeClass('alert-danger');
                                        $('#tr_'+$id+' #errores_cnt_'+$id+'').addClass('alert-success');
                                        if(data.win != 0){
                                            $('#myModal').modal('hide');
                                            $htmls=$('.team_'+data.win+'_id').html();
                                            $('#myWin').modal({
                                                backdrop:'static',
                                                keyboard: true
                                            });
                                            $('#di_win').html($htmls);
                                        }else{
                                            //alert('acas');
                                        }
                                    }


                                },error:function(){
                                    alert('Upsss los sentimos ocurrio un problema');
                                }
                            });

                        });

                    }

                    function preView(combat_id,identificador){
                       // alert('preView');
                        if(identificador == 1){
                            identificador=2
                        }else{
                            identificador=1
                        }
                        $.ajax({
                            url:combat_id+'/combat',
                            type:'GET',
                            data:{
                                combat_id:combat_id,
                                identificador:identificador
                            },
                            success:function(data){
                                //console.log(data);

                                    buildPreview(data.identificador,data.data_array,data.flag);


                            },error:function(){

                            }
                        });

                    }

                    function buildPreview(identificador,data,flag){
                        $htmls=$('.team_'+identificador+'_id').html();
                        $htmls += "<div  class='col-padding'><table class='table table-bordred table-striped'>" ;

                                    if(flag){
                                        $htmls +="<tr id='tr_"+ identificador +"'>" +
                                                "<td align='center' colspan='2'>" ;
                                        $htmls +="<h1 id='scort_"+identificador+"'>" +
                                                data.score
                                                +"</h1>";
                                        $htmls +="</td>";
                                        $htmls +="</tr>";
                                    }
                        $htmls +="<tr id='tr_"+ identificador +"'>" +
                                "<td align='center' colspan='2'>" ;
                                        if(flag){
                                            $htmls +="<h3>" +
                                                    data.time
                                                    +"</h3>";
                                        }else{
                                            $htmls +="<div id='errores_cnt_"+ identificador +"' class='alert alert-danger'> Datos aún no registrados . </div>";
                                        }
                        $htmls +="</td>" +
                                "</tr>";

                        $htmls+= "</table></div>";
                        $('#di_'+identificador+'').html($htmls);
                        if(flag){

                            $('#di_'+identificador+' h1#scort_'+identificador+'').text(data.score);
                        }

                        /*console.log($htmls);*/
                    }
                </script>

            @endif




    </div>



@stop