@extends('layouts/prueba')
@section('section')
    <br><br><br>
    <div class="container">
        <div class="row grid-divider">
            <div class="col-sm-6">
                <div class="col-padding" id="table_1">
                    <table  id="team_1_id" class="table table-bordred table-striped" >
                        <tbody>
                            <tr>
                                <td>Nombre Equipo:</td>
                                <td>{!! $datCombat->name_team !!}</td>
                            </tr>
                            <tr>
                                <td>Nombre Colegio:</td>
                                <td>{!! $datCombat->name_inst !!}</td>
                            </tr>
                            <tr>
                                <td>Equipo:</td>
                                <td>
                                    @if( $datCombat->genero == 'FEM' )
                                        Femenino
                                        @else
                                        Masculino
                                    @endif

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="col-padding">
                    <h4 id="h4_id_">
                        <center>
                            <a class="btn btn-success btn-circle start" data-head="1" data-type="active" data-val="0" type="button"><i class="glyphicon glyphicon-play"></i></a>
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
            </div>
            <div class="col-sm-3">
                <div class="col-padding" id="table_2" >
                    <h1 >
                        <center id="score">
                            0
                        </center>
                    </h1>


                </div>
            </div>

        </div>
        <input type="text" name="time" id="time_id">
        <div class="row grid-divider none" id="div_body">
            <div id="b_1" class="col-sm-6">
                <table  id="team_1_id" class="table table-bordred table-striped" >
                    <tbody>
                        <tr>
                            <td>
                                {!!  Html::image('img/sorpresa.jpg', 'a picture',['class'=>"img-responsive"])  !!}
                            </td>
                            <td>
                                <label for="">Punto EX. 1</label>
                                <input type="checkbox" name="" id="check_uno">
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <label for="">Punto EX. 2</label>
                                <input type="checkbox" name="" id="check_dos">
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div id="b_1" class="col-sm-6">
                <table  id="team_1_id" class="table table-bordred table-striped" >
                    <tbody>
                        <tr>
                            <td align="center">
                                <button class="suma btn btn-danger btn-circle drop_posti_resta" type="button" data-type="resta">
                                    <i class="fa fa-times fa-lg"></i>
                                </button>
                            </td>
                            <td></td>
                            <td  align="center">
                                <button class="suma btn btn-success btn-circle drop_posti_suma" type="button" data-type="suma">
                                    <i class="fa fa-check fa-lg"></i>
                                </button>
                            </td>
                        </tr>

                    </tbody>
                    <tfoot id="ocul" class="none">
                        <tr>
                            <td>
                                <div id="errores" class="alert alert-danger none"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="">Firma:</label>
                            </td>
                            <td colspan="2" align="center">
                                <input type="text" name="firm" id="firm_id" class="form-control">

                            </td>
                        </tr>

                        <tr>
                            <td colspan="3" align="center">
                                <button type="button" class="btn btn-primary" id="envio">Registrar</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#envio').unbind().bind('click',function(){
                $v1=false;
                $v2=false;

                if( $('#check_uno').is(':checked') ) {
                    $v1=true;
                }else{
                    $v1=false;
                }

                if( $('#check_dos').is(':checked') ) {
                    $v2=true;
                }else{
                    $v2=false;
                }

                var pathname = window.location.pathname;
                var str = pathname.split("/");
                var temp = new Array();
                temp = x = pathname.split("/");
                $.ajax({
                    url:temp[str.length - 1]+'/firm',
                    type:'GET',
                    data:{
                        id :temp[str.length - 1],
                        score : parseInt($('#score').text()),
                        firma : $('#firm_id').val(),
                        extra_uno:$v1,
                        extra_dos:$v2,
                        tiempo: $('#time_id').val()
                    },
                    success:function(data){
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
                        }
                        else{
                            $('#errores').addClass('none');

                        }


                    },
                    error:function(){
                        alert('Upsss los sentimos ocurrio un problema');
                    }
                });


            });

            $('.suma').unbind().bind('click',function(){
                $score = parseInt($('#score').text());
                $type= $(this).attr('data-type');
                if($type == 'suma'){
                    if($score < 100){
                        $score = $score + parseInt(10);
                    }
                }else if ($type == 'resta'){
                    if($score > 0){
                        $score = $score - parseInt(10);
                    }
                }
                $('#score').text($score);


                if($score ==100){
                    clearInterval(tiempo_corriendo);
                    //resetTiemp();
                    $('#ocul').removeClass('none');
                    tiempo = {
                        hora: 0,
                        minuto: 0,
                        segundo: 0
                    };
                    $hour =   $('#hour').text();
                    $minute = $('#minute').text();
                    $second = $('#second').text();
                    $('#time_id').val($hour+':'+$minute+':'+$second);

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
                $('#div_body').removeClass('none');

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
                        if (minutos == {!! $d->challenge_duration !!} && segundos == 00) {
                            $valor = parseInt($('#flag_time').val()) + parseInt(1);
                            $('#flag_time').val($valor);
                            clearInterval(tiempo_corriendo);
                            //resetTiemp();
                            $('#ocul').removeClass('none');
                            tiempo = {
                                hora: 0,
                                minuto: 0,
                                segundo: 0
                            };
                            $hour =   $('#hour').text();
                            $minute = $('#minute').text();
                            $second = $('#second').text();
                            $('#time_id').val($hour+':'+$minute+':'+$second);


                        }

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
    </script>
    @stop