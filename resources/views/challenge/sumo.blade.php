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
                            <input type="hidden" name="" id="team_1_id" value="{!! $d->r_b_team_id !!}">
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="2" align="center">
                                    <h1 id="scort_1">0</h1>
                                </td></tr>
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

                                </tbody>
                                <input type="hidden" name="flag" id="flag_id" value=1>
                                <input type="hidden" name="flag" id="flag_id_2" value=1>
                                <input type="hidden" name="flag_win" id="flag_win" value="1">
                                <input type="hidden" name="flag_empater" id="flag_empater" value="4">
                                <input type="hidden" name="flag_final" id="flag_final" value="0">
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
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
                            <input type="hidden" name="" id="team_2_id" value="{!! $d->r_b2_team_id !!}">
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="2" align="center">
                                    <h1 id="scort_2">0</h1>
                                </td></tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        @endif



        <div class="col-sm-4">
            <div class="col-padding">
                <table id="mytable" class="table table-bordred table-striped">
                    <tbody id="tbody_1">

                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="col-padding">

                {!! Form::open(['route' => 'pruebassssss', 'class' => 'form','id'=>'form_ser']) !!}
                <table id="mytable" class="table table-bordred table-striped">
                    <input type='hidden' id='val_1' value=0>
                    <input type='hidden' id='val_2' value=0>
                    <tbody id="tbody_eval">


                    </tbody>
                </table>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="col-sm-4">
            <div class="col-padding">
                <table id="mytable" class="table table-bordred table-striped">
                    <tbody id="tbody_2">

                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- inicioo del modal-->
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
    <!-- fin del modal-->

    <!-- inicio moal centi-->
    <div id='myModalCen' class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <br>
                <div id="errores" class="alert alert-danger none"></div>
                    <br>
                <table id="mytable" class="table table-bordred table-striped">
                    <tr>
                        <td colspan="2" align="center">
                           <h3>
                               Round <span id="num_round"></span>
                           </h3>
                        </td>
                    </tr>
                    <tr>
                        <td>{!! $d->r_t_name !!}</td>
                        <td>{!! $d->r_t2_name !!}</td>
                    </tr>
                    <tr>
                        <td>
                            <div id="errores_cnt_1" class="alert alert-danger none"></div>
                            <input type="text" name="" id="firts_c" class="form-control">
                        </td>
                        <td>
                            <div id="errores_cnt_2" class="alert alert-danger none"></div>
                            <input type="text" name="" id="secon_c" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <button id='btn_c_cent'  class='btn btn-primary'>
                                Evalua
                            </button>
                        </td>
                    </tr>
                </table>
                <br>
            </div>
        </div>
    </div>
    <!-- fin modal centi-->
    <script>
        $(document).ready(function () {
            $('#click').unbind().bind('click',function(){
                location.reload(true)
            });
            var bodyEval='';
            for (x=1;x<=6;x++) {
                bodyEval += "<tr tr  id='tr_id_3_"+x+"' data-val='"+t+"' class='none'>>"+
                        "<td>" +
                        "<input name='["+x+"]win_1_"+x+"' type='hidden' id='win_1_"+x+"'>" +
                        "<input name='["+x+"]result_1_"+x+"' type='hidden' id='result_1_"+x+"'>" +
                        "</td>"+
                        "<td align='center'>" +
                        "<a type='button' data-head='0'  data-team1={!! $d->r_b_team_id !!} data-team2={!! $d->r_b2_team_id !!} data-class='btn_c_' id='btn_c_3_"+x+"' data-flag='2'  data-val="+x+" data-type='active' class='btn btn-warning btn-circle eval'>"+
                        "<i class='glyphicon glyphicon-resize-horizontal'></i>"+
                        "</a>"+
                        "</td>" +
                        "<td>" +
                        "<input name='["+x+"]win_2_"+x+"' type='hidden' id='win_2_"+x+"'>" +
                        "<input name='["+x+"]result_2_"+x+"' type='hidden' id='result_2_"+x+"'>" +
                        "</td>"+
                        "</tr>";
            }
            $('#tbody_eval').html(bodyEval);
            var bodyHtml2='';
            for (x=1;x<=6;x++) {
                bodyHtml2 +=
                        "<tr id='tr_id_2_"+x+"' class='none'>" +
                        "<td align='center'>" +
                        "<button data-head='0' data-type='2' data-class='btn_c_' id='btn_c_2_"+x+"' data-team={!! $d->r_b2_team_id !!} data-flag='1' data-val="+x+"  class='btn btn-primary eval'>"+
                        "Round "+ x +
                        "</button>";
                                if(x == 5 || x ==6){
                                }
                bodyHtml2 +=  "</td>" +
                        "</tr>";
            }
            $('#tbody_2').html(bodyHtml2);

            var bodyHtml1='';
            var t=2;
            for (x=1;x<=6;x++) {
                bodyHtml1 +="<tr  id='tr_id_1_"+x+"' data-val='"+t+"' class='none'>" +
                        "<td aling='center'>" +
                        "<button data-head='0' data-type='1'  data-class='btn_c_' id='btn_c_1_"+x+"' data-team={!! $d->r_b_team_id !!} data-flag='1' data-val="+x+"  class='btn btn-primary eval'>"+
                        "Round"+x+
                        "</button>";
                        if(x == 5 || x ==6){
                        }
                bodyHtml1 +="</td>" +
                        "</tr>";
                t++;
            }
            $('#tbody_1').html(bodyHtml1);
            var tiempo = {
                hora: 0,
                minuto: 0,
                segundo: 0
            };
            var tiempo_corriendo = null;
            $('.start').unbind().bind('click', function () {
                $('#table_div').removeClass('none');
                $('#h4_id').addClass('none');
                clock();
                var valor = $(this).attr('data-val');
                if (valor == '0') {
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

                        if (minutos == {!! $d->challenge_duration !!}  && segundos == 00) {
                            clearInterval(tiempo_corriendo);
                        }
                        $("#hour").text(horas);
                        $("#minute").text(minutos);
                        $("#second").text(segundos);

                    }, 1000);

                    $('.eval').unbind().bind('click',function(){
                        var valo = $(this).attr('data-head');
                        if(valo == 1){
                            $('.srt').attr('data-val', 0);
                            $('.srt').removeClass('btn-danger');
                            $('.srt').addClass('btn-success');
                            $('.srt i').removeClass('glyphicon-stop');
                            $('.srt i').addClass('glyphicon-play');

                        }else{
                            $('#flag_id_2').val(2);
                            clearInterval(tiempo_corriendo);
                            $('.start').attr('data-val', 0);
                            $('.start').removeClass('btn-danger');
                            $('.start').addClass('btn-success');
                            $('.start i').removeClass('glyphicon-stop');
                            $('.start i').addClass('glyphicon-play');
                            var valor = $(this).attr('data-val'); //incremento
                            var flag= $('#flag_id').val();
                            var atrFlag =$('#tr_id_1_'+flag).attr('data-val');
                            $('#tr_id_2_'+flag).removeClass('none');
                            $('#tr_id_1_'+flag).removeClass('none');
                            $('#tr_id_3_'+flag).removeClass('none');
                            $('#flag_id').val(atrFlag);
                            var textVal=$(this).attr('data-val');
                            var equipo=$(this).attr('data-team');
                            var typeWin=$(this).attr('data-flag');
                            var typeT=$(this).attr('data-type');
                            var clas= $(this).attr('data-class');

                            $('#'+clas+'1_'+textVal+'').unbind('click');
                            $('#'+clas+'1_'+textVal+'').attr('disabled');
                            $('#'+clas+'2_'+textVal+'').unbind('click');
                            $('#'+clas+'2_'+textVal+'').attr('disabled');
                            $('#'+clas+'3_'+textVal+'').unbind('click');
                            $('#'+clas+'3_'+textVal+'').attr('disabled');
                            $tr= parseInt(textVal) + 1;
                            $('#'+clas+'1_'+$tr+'').unbind('click');
                            $('#'+clas+'1_'+$tr+'').attr('disabled');
                            $('#'+clas+'2_'+$tr+'').unbind('click');
                            $('#'+clas+'2_'+$tr+'').attr('disabled');
                            $('#'+clas+'3_'+$tr+'').unbind('click');
                            $('#'+clas+'3_'+$tr+'').attr('disabled');
                            if(typeWin == 2){
                                $(this).attr('data-team1');
                                $(this).attr('data-team2');
                                $('#win_1_'+textVal+'').val($(this).attr('data-team1'));
                                $('#result_1_'+textVal+'').val(2);
                                $('#win_2_'+textVal+'').val($(this).attr('data-team2'));
                                $('#result_2_'+textVal+'').val(2);
                                $('#'+clas+'1_'+textVal+'').removeClass('btn-primary');
                                $('#'+clas+'2_'+textVal+'').removeClass('btn-primary');
                                $('#'+clas+'1_'+textVal+'').addClass('btn-success');
                                $('#'+clas+'2_'+textVal+'').addClass('btn-success');
                            }else{
                                $('#win_'+typeT+'_'+textVal+'').val(equipo);
                                $('#result_'+typeT+'_'+textVal+'').val(typeWin);
                                $(this).removeClass('btn-primary');
                                $(this).addClass('btn-success');
                            }
                            evaluation(textVal);
                        }
                        var textValf=$(this).attr('data-val');
                        var typeTf=$(this).attr('data-type');
                        if(typeTf =='active'){
                            if(textValf == 5 || textValf ==6){
                                popupModalCenti(textValf);
                            }
                        }
                    });

                    var valo = $(this).attr('data-head');
                    var valo2 = $('#flag_id_2').val();
                    if(valo == 1 && valo2 ==1){
                        $('#flag_id_2').val(1);
                        var flag= $('#flag_id').val();
                        var atrFlag =$('#tr_id_1_'+flag).attr('data-val');
                        $('#tr_id_3_'+flag).removeClass('none');
                        $('#tr_id_2_'+flag).removeClass('none');
                        $('#tr_id_1_'+flag).removeClass('none');
                        $('#flag_id').val(atrFlag);

                    }else{
                        var flag= $('#flag_id').val();
                    }
                } else {
                    $(this).attr('data-val', 0);
                    $(this).removeClass('btn-danger');
                    $(this).addClass('btn-success');
                    $('.start i').removeClass('glyphicon-stop');
                    $('.start i').addClass('glyphicon-play');
                    clearInterval(tiempo_corriendo);
                }
            });
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


        function evaluation(valor){
            $('#btn_c_1_'+valor+'').removeClass('eval');
            $('#btn_c_2_'+valor+'').removeClass('eval');
            $('#btn_c_3_'+valor+'').removeClass('eval');

            $array = new Array();
            $tr= parseInt(valor);
            $flagWV= $('#flag_win').val();
            $flagW= $('#flag_win').val();
            $('#flag_win').val(parseInt($flagW)  + parseInt(1));
            $data1= $('#form_ser').serialize();
            $data = $('#form_ser').serializeArray();
            $team1= $('#team_1_id').val()
            $team2= $('#team_2_id').val()
            $c1=parseInt(1);
            $valorAc1=$('#val_1').val();
            $valorAc2=$('#val_2').val();
            $v1="";
            $v2="";
            for(i=1;i<=$tr;i++)
            {
                if($flagWV == i){
                    var txt1_1 = $('#win_1_'+$flagWV+'').val(), txt1_2 = $('#result_1_'+$flagWV+'').val();
                    var txt2_1 = $('#win_2_'+$flagWV+'').val(), txt2_2 = $('#result_2_'+$flagWV+'').val();

                    if(txt2_2  == txt1_2 ){

                    }else{
                        if(txt1_1 == $team1 && !txt2_1){
                            $v2 =$('#val_1').val( parseInt($valorAc1)  + parseInt(1) );
                            $('#win_2_'+i+'').val(0);
                            $('#scort_1').text(parseInt($valorAc1)  + parseInt(1) );
                        }else if(txt2_1 == $team2 && !txt1_1){
                            $('#win_1_'+i+'').val(0);
                            $v2 =$('#val_2').val( parseInt($valorAc2)  + parseInt(1) );
                            $('#scort_2').text( parseInt($valorAc2)  + parseInt(1) );

                        }
                    }
                }
            }

            if($tr >= 2){
                evaluationWin($('#val_1').val(),$('#val_2').val());
            }


        }

        function evaluationWin($v1,$v2){
            if(parseInt($('#flag_win').val())== 6  && parseInt($('#flag_final').val()) == 1){
                if($v1 > $v2 ){
                    $('#flag_win').val(1);
                    popupModal(1);
                    return true;
                }else if($v2 > $v1 ){
                    $('#flag_win').val(1);
                    popupModal(2);
                    return true;
                }
            }else if(parseInt($('#flag_win').val())== 6 && parseInt($('#flag_final').val()) == 1){
                if($v1 > $v2){
                    $('#flag_win').val(1);
                    popupModal(1);
                    return true;
                }else if($v2 > $v1){
                    $('#flag_win').val(1);
                    popupModal(2);
                    return true;
                }
            }

            if(parseInt($('#flag_win').val())== 6 ){
                $('#flag_final').val(1);
            }


            if($('#flag_id').val() ==''){
                $('#flag_final').val(1);
            }
            if(parseInt($('#flag_final').val()) == 1){
                //alert($v1+' , '+$v2);

            }

            if($v1 >= 2 && $v2 < 2){
                $('#flag_win').val(1);
                popupModal(1);
                return true;
            }else if($v2 >= 2 && $v1 < 2){
                $('#flag_win').val(1);
                popupModal(2);
                return true;
            }



            return false;
        }

        function popupModal($id){

            $win =$('#team_'+$id+'_id').val();
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
                        equipo_uno:$('#team_1_id').val(),
                        firma_equipo_uno:$('#cap_id_1').val(),
                        equipo_dos: $('#team_2_id').val(),
                        firma_equipo_dos: $('#cap_id_2').val(),
                        puntaje_equipo_one: $('#scort_1').text(),
                        puntaje_equipo_dos: $('#scort_2').text(),
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


        function popupModalCenti($id){
            $valorAc1=$('#val_1').val();
            $valorAc2=$('#val_2').val();
            $('#num_round').html($id);
            $('#firts_c').val('')
            $('#secon_c').val('')
            $('#myModalCen').modal({
                backdrop:'static',
                keyboard: true
            });
            $('#btn_c_cent').unbind().bind('click',function(){
                $('#errores_cnt_1').addClass('none');
                $('#errores_cnt_2').addClass('none');
                if($('#firts_c').val() ==''){
                    $('#errores_cnt_1').removeClass('none');
                    $('#errores_cnt_1').text('Ingresa los centimetros');
                    $('#firts_c').focus();
                    return true;

                }else if($('#secon_c').val() ==''){
                    $('#errores_cnt_2').removeClass('none');
                    $('#errores_cnt_2').text('Ingresa los centimetros');
                    $('#secon_c').focus();
                    return true;
                }else{
                    $('#myModalCen').modal('hide');
                    var pathname = window.location.pathname;
                    var str = pathname.split("/");
                    var temp = new Array();
                    temp = x = pathname.split("/");
                    $.ajax({
                        url:temp[str.length - 1]+'/envio',
                        type:'GET',
                        data:{
                            primero:$('#firts_c').val(),
                            segundo: $('#secon_c').val(),
                        },
                        success:function(data){
                            if(!data.success ){
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
                                $('#errores').empty();
                                $('#errores').addClass('none');
                                if(data.win.wins == '2'){
                                    $valor= $('#scort_2').text();
                                    $('#scort_2').text(parseInt($valor)  + parseInt(1));
                                    $v2 =$('#val_2').val( parseInt($valorAc2)  + parseInt(1) );
                                    evaluationWin($('#val_1').val(),$('#val_2').val());
                                }else if(data.win.wins == '1'){
                                    $v2 =$('#val_1').val( parseInt($valorAc1)  + parseInt(1) );
                                    $valor= $('#scort_1').text();
                                    $('#scort_1').text(parseInt($valor)  + parseInt(1));
                                    evaluationWin($('#val_1').val(),$('#val_2').val());
                                }
                            }
                        },error:function(){
                            alert('Upsss los sentimos ocurrio un problema');
                        }
                    });
                }
            });
        }

    </script>
@stop