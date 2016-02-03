@extends('layouts/prueba')
@section('section')
    <br><br><br>

    <div class="container">
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
                            <td id="name_team_1">{!! $d->r_t_name !!}</td>
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
                        </table>
                    </div>
                </div>
                <input type="hidden" name="" value="1" id="begin_none">
                <input type="hidden" name="" value="1" id="eval_win">
                <input type="hidden" name="" value="0" id="flag_death">


            </div>
            <div class="col-sm-4 team_2_id" id="table_b_3">
                <div class="col-padding" id="">
                    <table id="team_2_id" class="table table-bordred table-striped">
                        <tbody>
                        <tr>
                            <td>Nombre Equipo:</td>
                            <td id="name_team_2">{!! $d->r_t2_name !!}</td>
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

        <div class="row grid-divider" id="div_body">
            <div class="col-sm-4 none body_t">
                <table id="mytable" class="table table-bordred table-striped">
                    <tbody id="body_round_id_1">

                    </tbody>
                </table>
            </div>
            <div class="col-sm-4 none body_t" id="">
                <table id="mytable" class="table table-bordred table-striped">
                    <tbody id="round_id">

                    </tbody>
                </table>
            </div>
            <div class="col-sm-4 none body_t">
                <table id="mytable" class="table table-bordred table-striped">
                    <tbody id="body_round_id_2">

                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <!-- modal win -->

    <div class="modal fade bs-example-modal-lg" id='myWin' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="row grid-divider" id="div_body">
                    <div class="col-sm-6" id="di_1"></div>
                    <div class="col-sm-6" id="di_2"></div>
                </div>
                <div id="errores_win" class="alert alert-danger none"></div>
                <div class="row grid-divider" id="div_body">
                    <div class="col-sm-12" id="div_firms"></div>

                </div>
            </div>
        </div>
    </div>

    <!-- fin modal win-->




    <script>
        $(document).ready(function(){
            var tiempo_corriendo = null;
            var tiempo = {
                hora: 0,
                minuto: 0,
                segundo: 0
            };
            var bodyHtml2='';
            $bodyHtml1='';
            $bodyHtml3='';
            for (x=1;x<=4;x++) {
                $bodyHtml1 +="<tr id='tr_id_1_"+x+"' class='none'>" +
                        "<td align='center'>" +

                        "<button data-num='1' data-position='drop_posti_"+x+"' data-exec='restar' data-text='text_1_"+x+"' type='button' class='btn btn-danger btn-circle'>"+
                        "<i class='fa fa-times fa-lg'></i>"+
                        "</button>"+
                        "<span id='drop_posti_"+x+"' style='font-size: 25px;'><b>0</b></span>"+
                        "<button data-num='1' data-position='drop_posti_"+x+"' data-exec='suma' data-text='text_1_"+x+"' type='button' class='btn btn-success btn-circle'>"+
                        "<i class='fa fa-check fa-lg'></i>"
                "</button>" +
                        "</td></tr>";
                bodyHtml2 +=
                        "<tr id='tr_id_2_"+x+"' class='none'>" +
                        "<td>" +
                                "<input type='hidden' id='text_1_"+x+"'>"+
                        "</td>"+
                        "<td align='center'>" +
                        "<button data-head='0' data-type='2' data-class='btn_c_' id='btn_c_2_"+x+"' data-team={!! $d->r_b2_team_id !!} data-flag='1' data-val="+x+"  class='btn btn-primary eval'>";
                            if(x == 4){
                                bodyHtml2 += "Muerte";
                            }else{
                                bodyHtml2 += "Round "+ x +"";
                            }
                bodyHtml2 +="</button>";

                bodyHtml2 +=  "</td>" +
                        "<td>" +
                        "<input type='hidden' id='text_2_"+x+"'>"+
                        "</td>"+
                        "</tr>";
                $bodyHtml3 +="<tr id='tr_id_3_"+x+"' class='none'>" +
                        "<td align='center'>" +
                        "<button data-num='2' data-position='drop_posti_2_"+x+"' data-exec='restar' data-text='text_2_"+x+"' type='button' class='btn btn-danger btn-circle'>"+
                        "<i class='fa fa-times fa-lg'></i>"+
                        "</button>"+
                        "<span id='drop_posti_2_"+x+"' style='font-size: 25px;'><b>0</b></span>"+
                        "<button data-num='2' data-position='drop_posti_2_"+x+"' data-exec='suma' data-text='text_2_"+x+"' type='button' class='btn btn-success btn-circle'>"+
                        "<i class='fa fa-check fa-lg'></i>"
                "</button>" +
                "</td></tr>";
            }
            $('#round_id').html(bodyHtml2);
            $('#body_round_id_1').html($bodyHtml1);

            $('#body_round_id_2').html($bodyHtml3);
            $('.eval').unbind().bind('click',function(){


            });


            $('.btn-circle').unbind().bind('click',function(){
                $exe = $(this).attr('data-exec');
                $datPo =$(this).attr('data-position');
                $valPo = parseInt($('#'+$datPo).text());



                if($exe == 'restar'){

                    $e=  $valPo - parseInt(1);
                }else{
                    $e= $valPo + parseInt(1);
                }
                if($e < 0){

                }else if($e > 5){
                }else{
                    clearInterval(tiempo_corriendo);
                    $('.start').attr('data-val', 0);
                    $('.start').removeClass('btn-danger');
                    $('.start').addClass('btn-success');
                    $('.start i').removeClass('glyphicon-stop');
                    $('.start i').addClass('glyphicon-play');
                    $('#'+$datPo).text($e);
                    if($e == 5){

                        $re =$(this).attr('data-text');
                        $('#'+$re).val(1);
                        $('#eval_win').val(1);
                        $sco = $(this).attr('data-num');
                        $escore=$('#scort_'+$sco).text();
                        $('#scort_'+$sco).text(parseInt($escore) + parseInt(1));
                        clearInterval(tiempo_corriendo);


                    }
                }
                $t =eValWin();
                modal($t);

            });





            $('.start').unbind().bind('click',function(){
                $('#time_id').text($('#time_text_id').val());
                $('#table_div').removeClass('none');
                $('#h4_id').addClass('none');
                clock();
                var valor = $(this).attr('data-val');
                $eval = $('#eval_win').val();
                if (valor == '0') {

                    $('#button_scort').removeClass('none');
                    $('.body_t').removeClass('none');

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
                        if (minutos == 01 && segundos == 00) {
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

                    //scortIncre();

                    $valBe = parseInt($('#begin_none').val());
                    if($valBe < 5 && $eval == 1){
                        $('#tr_id_1_'+$valBe).removeClass('none');
                        $('#tr_id_2_'+$valBe).removeClass('none');
                        $('#tr_id_3_'+$valBe).removeClass('none');
                        $('#begin_none').val($valBe +  parseInt(1));
                    }
                    $('#eval_win').val(0);

                }else{

                    $('.start').attr('data-val', 0);
                    $('.start').removeClass('btn-danger');
                    $('.start').addClass('btn-success');
                    $('.start i').removeClass('glyphicon-stop');
                    $('.start i').addClass('glyphicon-play');
                    $('#button_scort').addClass('none');
                    clearInterval(tiempo_corriendo);
                    $('#eval_win').val(0);
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
                   // evalScort()
                }
                evalScort();

            }

            function evalScort(){
                $scor1=parseInt($('#begin_none').val()) - 1;
                //alert($scor1);

                $eval1=parseInt($('#drop_posti_'+$scor1).text());
                $eval2=parseInt($('#drop_posti_2_'+$scor1).text());
                 if($eval1 > $eval2){
                    //alert('gana el primero');
                    $('#begin_none').val(parseInt($scor1) + 1);
                    $('#eval_win').val(1);
                    $sc1=parseInt($('#scort_1').text());
                    $('#scort_1').text($sc1 + 1);
                }else if($eval2 > $eval1){
                    //alert('gana el segundo');
                    $('#begin_none').val(parseInt($scor1) + 1);
                    $('#eval_win').val(1);
                    $sc2=parseInt($('#scort_2').text());
                    $('#scort_2').text($sc2 + 1);
                }else if($eval2 == $eval1){
                    //alert('empate');
                     if($scor1 == 3){
                         $('#flag_death').val(1);
                     }
                    $('#begin_none').val(parseInt($scor1) + 1);
                    $('#eval_win').val(1);

                }
               $t =eValWin();
                modal($t);


            }

            function  eValWin(){
                $scor1=parseInt($('#scort_1').text());
                $scor2=parseInt($('#scort_2').text());
                $evalTe =$('#begin_none').val();


                $evalTe2 = parseInt($('#begin_none').val()) - 1;

                if($scor1 == $scor2 && $('#flag_death').val() == 1){
                    if($evalTe2 == 4){

                        $uno = parseInt($('#drop_posti_'+$evalTe2).text());
                        $dos = parseInt($('#drop_posti_2_'+$evalTe2).text());
                        if($uno > $dos){
                            //alert('gana el uno');
                            return 1;
                        }else if($dos > $uno){
                            return 2;
                        }

                    }

                    //alert('muerte subita');
                }else if($scor1 == 2){
                   return 1;
                }else if($scor2 == 2){
                    return 2;
                }

            }

            function modal($val){
                if($val){
                    $htmls1="<table  class='table table-bordred table-striped'>";
                    $htmls1 +=$('.team_1_id').html();
                    $htmls1 += "</table>";

                    $htmls2 ="<table  class='table table-bordred table-striped'>";
                    $htmls2 +=$('.team_2_id').html();
                    $htmls2 += "</table>";

                    $htmls = "<table  class='table table-bordred table-striped'>" +
                            "<tfoot>" +
                            "<tr><td>"+ $('#name_team_1').text() +"</td><td>"+ $('#name_team_2').text() +"</td></tr>" +
                            "<tr>" +
                                "<td><input type='text' class='form-control' id='cap_id_1' ></td>" +
                                "<td><input type='text' class='form-control' id='cap_id_2' ></td>" +
                            "</tr>" +
                            "<tr>" +
                                "<td align='center' colspan='2'><button id='btn_c_eval_fir' class='btn btn-primary'> Evalua </button></td>" +
                            "</tr>" +
                            "</tfoot>" +
                            "</table>";




                    $('#myWin').modal({
                        backdrop:'static',
                        keyboard: true
                    });
                    $('#div_firms').html($htmls);
                    $('#di_1').html($htmls1);
                    $('#di_2').html($htmls2);
                }

                $('#btn_c_eval_fir').unbind().bind('click',function(){
                    var pathname = window.location.pathname;
                    var str = pathname.split("/");
                    var temp = new Array();
                    temp = x = pathname.split("/");

                    $drop_1 = sumScore(1);
                    $drop_2 = sumScore(2);
                    $score1= parseInt($('#scort_1').text());
                    $score2= parseInt($('#scort_2').text());

                    $.ajax({
                        url:temp[str.length - 1]+'/evalua',
                        type:'GET',
                        data:{
                            /*team_id:$('team_'+$id+'_id input[name=team_'+$id+'_text]').val(),*/
                            win            : $val,
                            team_id_1      : $('.team_1_id_text').val(),
                            score_equipo_1 : $score1,
                            caidas_equipo_1: $drop_1,
                            firma_equipo_uno: $('#cap_id_1').val(),
                            team_id_2      : $('.team_2_id_text').val(),
                            score_equipo_2 : $score2,
                            caidas_equipo_2: $drop_2,
                            firma_equipo_dos: $('#cap_id_2').val(),

                        },
                        success:function(data){
                            if(!data.success){

                                if(data.errors){
                                    $('#errores_win').removeClass('none');
                                    $ht="";
                                    $ht +="<ul>";
                                    $.each(data.errors,function(i,val){
                                        $ht += "<li>";
                                            $ht += val;
                                        $ht += "</li>";
                                    });
                                    $ht +="</ul>";
                                    $('#errores_win').html($ht);

                                }else{
                                    $('#errores_win').addClass('none');
                                }


                            }


                        },error:function(){
                            alert('Upsss los sentimos ocurrio un problema');
                        }
                    });
                });

            }
        });
        function sumScore($identificador){
            if($identificador == 1){
                $v1 = parseInt($('#drop_posti_1').text());
                $v2 = parseInt($('#drop_posti_2').text());
                $v3 = parseInt($('#drop_posti_3').text());
                $v4 = parseInt($('#drop_posti_4').text());
            }else if($identificador == 2){
                $v1 = parseInt($('#drop_posti_2_1').text());
                $v2 = parseInt($('#drop_posti_2_2').text());
                $v3 = parseInt($('#drop_posti_2_3').text());
                $v4 = parseInt($('#drop_posti_2_4').text());

            }

            $op = $v1 + $v2 + $v3 + $v4;

            return $op;

        }


    </script>
@stop