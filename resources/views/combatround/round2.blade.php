@extends('layouts/default-admin')
@section('section')
    <br><br><br><br>
    <div class="container">
        <div class="row">


            <div class="col-md-4">
                <!-- begin panel group -->
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    @foreach($dataGrouptwo as $dg)
                        <div class="panel panel-default">
                            <!--wrap panel heading in span to trigger image change as well as collapse -->
                            <span class="side-tab" data-target="#tab1" data-toggle="tab" role="tab" aria-expanded="false">
                                <div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse"
                                     aria-expanded="true" aria-controls="collapseOne">
                                    <h4 data-id="{!! $dg->id !!}" class="panel-title group" style="cursor: pointer">{!! $dg->name !!}</h4>
                                </div>
                            </span>
                        </div>
                        @endforeach
                    <!-- panel 1 -->

                    <!-- / panel 1 -->
                    <!-- panel 2 -->

                    <!-- / panel 2 -->
                    <!-- panel 3 -->

                </div>
                <!-- / panel-group -->
            </div> <!-- /col-md-4 -->
            <div class="col-md-8">
                <!-- begin macbook pro mockup -->
                <div class="md-macbook-pro md-glare">
                    <div class="md-lid">
                        <div class="md-camera">

                        </div>
                        <div class="md-screen">
                            <!-- content goes here -->
                            <div class="tab-featured-image">
                                <div class="tab-content">
                                    <div class="tab-pane in active" id="tab1">
                                        <table class="table table-condensed table-hover">
                                            <thead>
                                            <tr>
                                                <th colspan="2" style="text-align: center;" id="title_group">

                                                </th>
                                                <th colspan="3" style="text-align: center;" id="title_stage">
                                                    Escenario
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>Equipo 1</th>
                                                <th>Equipo 2</th>
                                                <th>Hora Inicio</th>
                                                <th>Hora Fin</th>
                                                <th>Movimiento</th>

                                            </tr>
                                            </thead>
                                            <tbody id="tbody_stage">

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="md-base">

                    </div>
                </div>
                <!-- end macbook pro mockup -->
            </div> <!-- / .col-md-8 -->
        </div> <!--/ .row -->
    </div> <!-- end sidetab container -->




    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">


                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Datos <span id="name_institution"></span></h4>
                </div>
                <div id="errores" class="alert alert-danger none">
                </div>

                <div id="sucess_class" class="alert alert-success none">
                    Escenario Respaldo esta activo.
                </div>
                <br><br>
                <div class="form-group" id="tr_time_des">
                    {!! Form::label('minutos','Minutos') !!}:
                    <input type="text" id="time_des" class="form-control" placeholder='Minutos'>
                    <input type="hidden" id="combat_id">
                </div>
                <div class="form-group">
                    {!! Form::label('respaldo','Activar Respaldo') !!}:
                    {!!   Form::checkbox('Activar_respaldo', 1, false,['id'=> 'check_id']) !!}
                </div>
                <br>
                <div class="modal-footer ">
                    <input  type="submit" class="btn btn-warning btn-lg glyphicon glyphicon-ok-sign" id='btn-submit' style="width: 100%;" value="Generar">
                </div>
                <div id="hiden_div" class="none">
                    <div class="modal-footer ">
                        <input  type="submit" class="btn btn-success btn-lg glyphicon glyphicon-ok-sign" id='save_id' style="width: 100%;" value="Guardar">
                    </div>
                </div>
                <br>

                <form action="#" id="form_id">

                    <table>
                        <thead style="background-color: #99cb84">
                        <tr>
                            <td>Equipo 1</td>
                            <td>Equipo 2</td>
                            <td>Horario inicio </td>
                            <td>Horario Fin</td>
                            <td>Horario Inicio Modificado</td>
                            <td>Horario Fin Modificado</td>

                        </tr>



                        </thead>
                        <tbody id="detail_tbody">

                        </tbody>
                    </table>
                </form>








            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <script>
        $(document).ready(function(){
            $('.group').unbind().bind('click',function(){
                $name_gro=$(this).text();
                var pathname = window.location.pathname;
                var str = pathname.split("/");
                var temp = new Array();
                temp = x = pathname.split("/");
                $.ajax({
                    url: temp[str.length - 1]+'/send',
                    data:{
                        group_id: $(this).attr('data-id'),
                    },
                    type: 'GET',
                    success:function(data){
                     //console.log(data);
                        $('#title_stage').html(data.name);
                        $('#title_group').html($name_gro);
                        var html="";
                        $.each(data.data_info,function(i,el)
                        {
                            html +="<tr>" +
                                    "<td>"+el.r_t_name+"</td>" +
                                    "<td>"+el.r_t2_name+"</td>" +
                                    "<td>"+el.schedule_start+"</td>" +
                                    "<td>"+el.schedule_end+"</td>" +
                                    "<td>" +
                                    "<a class='btn btn-danger btn-circle move'  data-id='"+el.id+"' data-toggle='modal' data-target='#edit'  data-type='cancel' type='button'>" +
                                    "<i class='glyphicon glyphicon-share-alt'></i> " +
                                    "</a>"+
                                    "</td>"
                                    "</tr>";
                        });
                        $('#tbody_stage').html(html);
                        move();
                    },error:function(){
                        alert('Upsss los sentimos ocurrio un problema');
                    }
                });
            });
        });

        function move(){
            $('#errores').addClass('none');
            $('#sucess_class').addClass('none');
            $('#save_id').unbind().bind('click',function(){
                var pathname = window.location.pathname;
                var str = pathname.split("/");
                var temp = new Array();
                temp = x = pathname.split("/");
                var time = $('#time_des').val();
                var combat_id = $('#combat_id').val();
                $.ajax({
                    url:temp[str.length - 1]+'/serializa',
                    data: $('#form_id').serialize(),
                    type:'GET',
                    success:function(data){
                        if(data.success){
                            alert('Accion realizada !!');
                            location.reload(true);

                        }

                    },
                    error:function(data){
                        alert('Upsss los sentimos ocurrio un problema');
                    }
                });
            });
            $('#check_id').unbind().bind('change',function(){
                var chechk = $("#check_id").is(':checked');
                if(chechk){
                    $('#tr_time_des').addClass('none');
                }else{
                    $('#tr_time_des').removeClass('none');
                }
            });
            $('#btn-submit').unbind().bind('click',function(){
                var pathname = window.location.pathname;
                var str = pathname.split("/");
                var temp = new Array();
                temp = x = pathname.split("/");
                var time = $('#time_des').val();
                var combat_id = $('#combat_id').val();

                var chechk = $("#check_id").is(':checked');

                if(chechk) {
                    var data_json= {
                        combat_id: combat_id,
                        flag: true,
                        challenge_id :temp[str.length - 1]
                    };
                    var flag=true;
                } else {
                    var data_json= {
                        flag: false,
                        time: time,
                        combat_id: combat_id,
                        challenge_id :temp[str.length - 1]
                    };
                    var flag=false;
                }


                $.ajax({
                    url:temp[str.length - 1]+'/time',
                    data:data_json,
                    type:'GET',
                    success:function(data){

                        if(data.success){
                            $('#errores').addClass('none');
                            $('#sucess_class').removeClass('none');
                            if(!flag){
                                $('#sucess_class').addClass('none');
                                $('#hiden_div').removeClass('none');
                                $.each(data.datos,function(i,lo){
                                    $('#ver_1_'+lo.id).html(lo.schedule_start);
                                    $('#ver_2_'+lo.id).html(lo.schedule_end);
                                    $('#text_val_1_'+lo.id).val(lo.schedule_start);
                                    $('#text_val_2_'+lo.id).val(lo.schedule_end);
                                });
                            }else{
                                location.reload(true);
                            }

                        }else{
                            $('#errores').removeClass('none');
                            $('#errores').html(data.datos);


                        }
                    },
                    error:function(data){
                        alert('Upsss los sentimos ocurrio un problema');
                    }
                });

                return false;
            });
            $('.move').unbind().bind('click',function(){
                var pathname = window.location.pathname;
                var str = pathname.split("/");
                var temp = new Array();
                temp = x = pathname.split("/");
               var valor= $(this).attr('data-id');

                $.ajax({
                    url: temp[str.length - 1]+'/move',
                    data:{
                        combat_id: valor,
                    },
                    type: 'GET',
                    success:function(data){
                        var html="";
                        $.each(data.data_one,function(i,lo){
                            html +="<tr>" +
                                    "<td>"+lo.r_t_name+"</td>"+
                                    "<td>"+lo.r_t2_name+"</td>"+
                                    "<td>"+lo.schedule_start+"" +
                                    '<input type="hidden" value="'+lo.id+'" name=prueba['+i+'][id]>' +
                                    '<input type="hidden" id="text_val_1_'+lo.id+'" value="'+lo.id+'" name=prueba['+i+'][schedule_start]>' +
                                    '<input type="hidden" id="text_val_2_'+lo.id+'" value="'+lo.id+'" name=prueba['+i+'][schedule_end]>' +
                                    "</td>" +
                                    "<td>"+lo.schedule_end+"</td>" +
                                    "<td id=ver_1_"+lo.id+" style='background-color: #99cb84'>" +

                                    "</td>"+
                                    "<td id=ver_2_"+lo.id+" style='background-color: #99cb84'></td>"+
                                    "</tr>";
                        });
                        $('#combat_id').val(valor);
                        $('#detail_tbody').html(html);



                    },error:function(){
                        alert('Upsss los sentimos ocurrio un problema');
                    }

                });
            });
        }
    </script>
@stop