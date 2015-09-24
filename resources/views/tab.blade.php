@extends('layouts/default')

@section('section')
        <div class="container">
            <div class="row">
                <div class="board">
                    <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
                    <div class="board-inner">
                        <ul class="nav nav-tabs" id="myTab">
                            <div class="liner"></div>
                            <li id='li_team' class="active">
                                <a href="#team" data-toggle="tab" title="Datos equipo">
                                  <span class="round-tabs one">
                                          <i class="glyphicon glyphicon-info-sign"></i>
                                  </span>
                                </a>
                            </li>
                            <li id='li_coach'>
                                <a href="#coach" data-toggle='tab' id='tab-coach' title="Datos coach">
                                     <span class="round-tabs two">
                                         <i class="glyphicon glyphicon-user"></i>
                                     </span>
                                </a>
                            </li>
                            <li id='li_integrantes'>
                                <a href="#integrates" data-toggle='tab' id="tab-integrantes" title="Datos integrantes">
                                     <span class="round-tabs three">
                                          <i class="glyphicon glyphicon-gift"></i>
                                     </span>
                                </a>
                            </li>



                        </ul></div>

                    <div id="errores" class="alert alert-danger none">
                    </div>

                    <div class="tab-content">
                        <!-- inicio del primer tab -->
                        <div class="tab-pane fade in active" id="team">
                            <h3 class="head text-center">Datos de equipo</h3>
                            <p class="narrow text-center">
                            <div class="panel-body">
                                <div class="form-group">
                                    *{!! Form::label('institucion','Institución') !!}
                                    {!! Form::text('institución','',['class'=>'form-control','id'=>'institución_id']) !!}
                                    {!! Form::hidden('institution_id','',['id'=>'institution_id']) !!}
                                </div>
                                <div class="form-group">
                                    *{!! Form::label('nombre_team','Nombre del equipo') !!}
                                    {!! Form::text('Nombre del equipo','',['class'=>'form-control','id'=>'nombre_equipo_id']) !!}
                                </div>
                                <div class="form-group">
                                    *{!! Form::label('nombre_bot','Nombre del Robot') !!}
                                    {!! Form::text('Nombre del robot','',['class'=>'form-control','id'=>'nombre_robot_id']) !!}
                                </div>
                                <div class="form-group">
                                    *{!! Form::label('pais','País') !!}
                                    {!! Form::select('País',$country,'' ,['class'=>'form-control','id'=>'pais_id']) !!}
                                </div>

                                <div id='state_id' class="form-group none">
                                    *{!! Form::label('estado','Estado') !!}
                                    {!! Form::select('Estado',[''=>'-- Selecciona Estado --'],'',['class'=>'form-control','id'=>'estado_id']) !!}

                                </div>
                                <div id='city_id' class="form-group none">
                                    *{!! Form::label('estado','Ciudad') !!}
                                    {!! Form::select('Ciudad',[''=>'-- Selecciona ciudad --'],'',['class'=>'form-control','id'=>'ciudad_id']) !!}

                                </div>


                                <div class="form-group">
                                    * {!! Form::label('gen','Género:') !!}<br><br/>
                                    {!! Form::label('mas','Masculino:') !!}
                                    {!! Form::radio('Género','MAS') !!}
                                    {!! Form::label('fem','Femenino:') !!}
                                    {!! Form::radio('Género','FEM') !!}
                                    {!! Form::label('mix','Mixto:') !!}
                                    {!! Form::radio('Género','MIX') !!}
                                </div>
                                <div class="form-group">
                                    * {!! Form::label('reto','Reto:') !!}
                                    {!! Form::select('Reto',$challenge,'' ,['class'=>'form-control','id'=>'reto_id']) !!}
                                </div>
                                <div class="form-group">
                                    * {!! Form::label('grado','Grado:') !!}
                                    {!! Form::select('Grado',[''=>'-- Seleciona grados --'],'',['class'=>'form-control','id'=>'grado_id']) !!}
                                </div>
                            </div>

                            </p>

                            <p class="text-center">
                                <button id="comprobar_id_1" class="btn btn-success btn-outline-rounded green">
                                    Comprobar datos <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span>
                                </button>
                            </p>


                        </div>
                        <!-- fin del primer taba -->
                        <div class="tab-pane fade" id="coach">
                            <h3 class="head text-center">Datos Coach</h3>
                            <p class="narrow text-center">
                                <div class="form-group">
                                    *{!! Form::label('nombre','Nombre') !!}
                                    {!! Form::text('Nombre','',['class'=>'form-control','id'=>'nombre_id']) !!}
                                </div>
                                <div class="form-group">
                                    *{!! Form::label('apellido','Apellido paterno') !!}
                                    {!! Form::text('Apellido Paterno','',['class'=>'form-control','id'=>'apellido_paterno_id']) !!}
                                </div>
                                <div class="form-group">
                                    *{!! Form::label('apellido','Apellido materno') !!}
                                    {!! Form::text('Apellido Materno','',['class'=>'form-control','id'=>'apellido_materno_id']) !!}
                                </div>
                                <div class="form-group">
                                    *{!! Form::label('correo','Correo') !!}
                                    {!! Form::email('Correo','',['class'=>'form-control','id'=>'correo_id']) !!}
                                </div>
                                <div class="form-group">
                                    *{!! Form::label('correo','Confirmación correo') !!}
                                    {!! Form::email('Correo confirmación','',['class'=>'form-control','id'=>'correo_confirmacion_id']) !!}
                                </div>
                                <div class="form-group">
                                    *{!! Form::label('correo','Correo alterno') !!}
                                    {!! Form::email('Correo alterno','',['class'=>'form-control','id'=>'correo_alterno_id']) !!}
                                </div>
                                <div class="form-group">
                                    *{!! Form::label('nombre','Nombre Coach Auxiliar:') !!}
                                    {!! Form::text('Nombre Coach auxiliar ','',['class'=>'form-control','id'=>'nombre_aux_id']) !!}
                                </div>
                                <div class="form-group">
                                    *{!! Form::label('apellido','Apellido paterno Coach auxiliar') !!}
                                    {!! Form::text('Apellido Paterno Coach auxiliar','',['class'=>'form-control','id'=>'apellido_paterno_aux_id']) !!}
                                </div>
                                <div class="form-group">
                                    *{!! Form::label('apellido','Apellido materno Coach auxiliar') !!}
                                    {!! Form::text('Apellido Materno Coach auxiliar','',['class'=>'form-control','id'=>'apellido_materno_aux_id']) !!}
                                </div>
                                <div class="form-group">

                                    *{!! Form::label('coordinado','El coordinador es igual que el Coach auxiliar?') !!}
                                    Si{!! Form::radio('Cordinador', 'S',true) !!}
                                    No{!! Form::radio('Cordinador', 'N',false) !!}

                                </div>
                                <div id="coordinador_info" class="none">
                                    <div class="form-group">
                                        *{!! Form::label('','Nombre coordinador:') !!}
                                        {!! Form::text('Nombre coordinador','',['class'=>'form-control','id'=>'cor_name_id']) !!}
                                    </div>

                                    <div class="form-group">
                                        *{!! Form::label('','Apellido paterno  coordinador:') !!}
                                        {!! Form::text('Apellido paterno coordinador','',['class'=>'form-control','id'=>'cor_ap_pat_id']) !!}
                                    </div>

                                    <div class="form-group">
                                        *{!! Form::label('','Apellido materno  coordinador:') !!}
                                        {!! Form::text('Apellido materno coordinador','',['class'=>'form-control','id'=>'cor_ap_mat_id']) !!}
                                    </div>

                                </div>
                            </p>
                            <p class="text-center">
                                <button id="comprobar_id_2" class="btn btn-success btn-outline-rounded green">
                                    Comprobar datos <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span>
                                </button>
                            </p>


                        </div>
                        <div class="tab-pane fade" id="integrates">
                            <h3 class="head text-center">Integrantes</h3>
                            <p class="narrow text-center">
                            <div class="panel panel-default col-md-6 col-lg-6 ">
                                <div class="form-group">
                                    *{!! Form::label('','Nombre capitan:') !!}
                                    {!! Form::text('Nombre capitan','',['class'=>'form-control','id'=>'cap_name_id']) !!}
                                </div>
                                <div class="form-group">
                                    *{!! Form::label('','Apellido paterno capitan:') !!}
                                    {!! Form::text('Apellido paterno capitan','',['class'=>'form-control','id'=>'cap_ap_pat_id']) !!}
                                </div>

                                <div class="form-group">
                                    *{!! Form::label('','Apellido materno  capitan:') !!}
                                    {!! Form::text('Apellido materno capitan','',['class'=>'form-control','id'=>'cap_ap_mat_id']) !!}
                                </div>
                                <div class="form-group">
                                    *{!! Form::label('','Nombre 2 integrante:') !!}
                                    {!! Form::text('Nombre 2 integrante','',['class'=>'form-control','id'=>'seg_name_id']) !!}
                                </div>
                                <div class="form-group">
                                    *{!! Form::label('','Apellido paterno 2 integrante:') !!}
                                    {!! Form::text('Apellido paterno 2 integrante','',['class'=>'form-control','id'=>'seg_ap_pat_id']) !!}
                                </div>

                                <div class="form-group">
                                    *{!! Form::label('','Apellido materno  2 integrante:') !!}
                                    {!! Form::text('Apellido materno 2 integrante','',['class'=>'form-control','id'=>'seg_ap_mat_id']) !!}
                                </div>
                            </div>
                            <div class="panel panel-default col-md-6 col-lg-6 ">
                                <div class="form-group">
                                    *{!! Form::label('','Nombre 3 integrante:') !!}
                                    {!! Form::text('Nombre 3 integrante','',['class'=>'form-control','id'=>'tre_name_id']) !!}
                                </div>
                                <div class="form-group">
                                    *{!! Form::label('','Apellido paterno 3 integrante:') !!}
                                    {!! Form::text('Apellido paterno 3 integrante','',['class'=>'form-control','id'=>'tre_ap_pat_id']) !!}
                                </div>

                                <div class="form-group">
                                    *{!! Form::label('','Apellido materno  3 integrante:') !!}
                                    {!! Form::text('Apellido materno 3 integrante','',['class'=>'form-control','id'=>'tre_ap_mat_id']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('','Nombre 4 integrante:') !!}
                                    {!! Form::text('Nombre 4 integrante','',['class'=>'form-control','id'=>'cua_name_id']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('','Apellido paterno 4 integrante:') !!}
                                    {!! Form::text('Apellido paterno 4 integrante','',['class'=>'form-control','id'=>'cua_ap_pat_id']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('','Apellido materno 4 integrante:') !!}
                                    {!! Form::text('Apellido materno 4 integrante','',['class'=>'form-control','id'=>'cua_ap_mat_id']) !!}
                                </div>
                            </div>

                            </p>

                            <p class="text-center">
                                <button id="comprobar_id_3" class="btn btn-success btn-outline-rounded green">
                                    Comprobar datos <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span>
                                </button>
                            </p>
                        </div>

                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>

    <script>


            $(document).ready(function(){
                $('a[title]').tooltip();
                $('input:radio[name="Cordinador"]').click(function(){
                    if($(this).val() == 'S'){
                        $('#coordinador_info').addClass('none');

                    }else{
                        $('#coordinador_info').removeClass('none');
                    }


                });

                $('#comprobar_id_3').click(function(){
                    $.ajax({
                        url:'check/three',
                        type:'GET',
                        data:{
                            Nombre_capitan:$('#cap_name_id').val(),
                            Apellido_paterno_capitan:$('#cap_ap_pat_id').val(),
                            Apellido_materno_capitan:$('#cap_ap_mat_id').val(),
                            Nombre_2_integrante:$('#seg_name_id').val(),
                            Apellido_paterno_2_integrante:$('#seg_ap_pat_id').val(),
                            Apellido_materno_2_integrante:$('#seg_ap_mat_id').val(),
                            Nombre_3_integrante:$('#tre_name_id').val(),
                            Apellido_paterno_3_integrante:$('#tre_ap_pat_id').val(),
                            Apellido_materno_3_integrante:$('#tre_ap_mat_id').val(),
                            Nombre_4_integrante:$('#cua_name_id').val(),
                            Apellido_paterno_4_integrante:$('#cua_ap_pat_id').val(),
                            Apellido_materno_4_integrante:$('#cua_ap_mat_id').val(),

                        },success:function(data){
                            if(data.success ){
                                $('#tab-integrantes').attr('data-toggle','tab');
                                $('#errores').addClass('none');
                                $("#coach").removeClass('active in');
                                $("#team").removeClass('active in');
                                $("#li_team").removeClass('active');
                                $("#li_coach").removeClass('active');
                                $("#integrates").addClass('active in');
                                $("#li_integrantes").addClass('active');
                            }else{
                                $('#errores').removeClass('none');
                                var html="";
                                html +="<ul>";
                                $.each(data.errors,function($i,$e){
                                    console.log($e);
                                    html +="<li>";
                                    html +=$e;
                                    html +="</li>";
                                });
                                html +="<ul>";
                                $('#errores').empty();
                                $('#errores').html(html);
                            }

                        },error:function(){
                            alert('Upsss los sentimos ocurrio un problema');
                        }

                    });

                });
                $('#comprobar_id_2').click(function(){

                    var datos ={
                        Nombre:$('#nombre_id').val(),
                        Apellido_Paterno:$('#apellido_paterno_id').val(),
                        Apellido_Materno:$('#apellido_materno_id').val(),
                        Correo:$('#correo_id').val(),
                        Correo_confirmación:$('#correo_confirmacion_id').val(),
                        Correo_alterno:$('#correo_alterno_id').val(),
                        Nombre_Coach_auxiliar:$('#nombre_aux_id').val(),
                        Apellido_Paterno_Coach_auxiliar:$('#apellido_paterno_aux_id').val(),
                        Apellido_Materno_Coach_auxiliar:$('#apellido_materno_aux_id').val()};


                    if($('input:radio[name="Cordinador"]:checked').val() == 'S'){
                        var json2= {
                            Nombre_coordinador:$('#nombre_aux_id').val(),
                            Apellido_paterno_coordinador:$('#apellido_paterno_aux_id').val(),
                            Apellido_materno_coordinador:$('#apellido_materno_aux_id').val()};
                    }else{
                        var json2 ={
                            Nombre_coordinador:$('#cor_name_id').val(),
                            Apellido_paterno_coordinador:$('#cor_ap_pat_id').val(),
                            Apellido_materno_coordinador:$('#cor_ap_mat_id').val()};
                    }

                    var datsoRe= $.extend(false,{},datos,json2);
                   $.ajax({
                        url:'check/two',
                        type:'GET',
                        data:datsoRe,
                        success:function(data){
                            if(data.success ){
                                $('#tab-integrantes').attr('data-toggle','tab');
                                $('#errores').addClass('none');
                                $("#coach").removeClass('active in');
                                $("#team").removeClass('active in');
                                $("#li_team").removeClass('active');
                                $("#li_coach").removeClass('active');
                                $("#integrates").addClass('active in');
                                $("#li_integrantes").addClass('active');
                            }else{
                                $('#errores').removeClass('none');
                                var html="";
                                html +="<ul>";
                                $.each(data.errors,function($i,$e){
                                    console.log($e);
                                    html +="<li>";
                                    html +=$e;
                                    html +="</li>";
                                });
                                html +="<ul>";
                                $('#errores').empty();
                                $('#errores').html(html);
                            }
                        },error:function(){
                            alert('Upsss los sentimos ocurrio un problema');
                        }
                    });


                });


                $('#comprobar_id_1').click(function(){
                    $.ajax({
                        url:'check/one',
                        data:{
                            Institución: $('#institution_id').val(),
                            Nombre_del_equipo:$('#nombre_equipo_id').val(),
                            Nombre_del_robot :$('#nombre_robot_id').val(),
                            País:$('#pais_id').val(),
                            Estado:$('#pais_id').val(),
                            Ciudad:$('#ciudad_id').val(),
                            Género:$( "input[name$='Género']" ).val(),
                            Reto:$('#reto_id').val(),
                            Grado:$('#grado_id').val(),
                        },
                        type:'GET',
                        success:function(data){
                            if(data.success ){
                                $('#tab-coach').attr('data-toggle','tab');
                                $('#errores').addClass('none');
                                $("#coach").addClass('active in');
                                $("#team").removeClass('active in');
                                $("#li_team").removeClass('active');
                                $("#li_coach").addClass('active');
                            }else{
                                $('#errores').removeClass('none');
                                var html="";
                                html +="<ul>";
                                $.each(data.errors,function($i,$e){
                                    console.log($e);
                                    html +="<li>";
                                    html +=$e;
                                    html +="</li>";
                                });
                                html +="<ul>";
                                $('#errores').empty();
                                $('#errores').html(html);
                            }
                        },
                        error:function(){
                            alert('Upsss los sentimos ocurrio un problema');
                        }
                    });


                });

                $('#reto_id').change(function(){
                    if($(this).val()){
                        $.ajax({
                            url     :'challenge/select',
                            data    :{
                                challenge_id: $(this).val()
                            },
                            type: 'GET',
                            success: function(data){
                                $('#grado_id').empty();
                                $.each(data, function(key, element){
                                    $('#grado_id').append("<option value='" + key + "'>" + element + "</option>");
                                });

                            },error:function(){
                                alert('Upsss los sentimos ocurrio un problema');
                            }

                        });

                    }else{

                    }

                });

                $('#pais_id').change(function(){
                    if($(this).val()){
                        $('#state_id').removeClass('none');
                        $.ajax({
                            url:'country/select',
                            data:{
                                country_id: $(this).val()
                            },
                            type: 'GET',
                            success:function(data){
                                $('#estado_id').empty();
                                $.each(data, function(key, element){
                                    $('#estado_id').append("<option value='" + key + "'>" + element + "</option>");
                                });

                            },error:function(){
                                alert('Upsss los sentimos ocurrio un problema');
                            }
                        });
                    }else{
                        $('#estado_id').empty();
                        $('#estado_id').append("<option value='0'>-- Seleciona estado --</option>");
                        $('#state_id').addClass('none');
                    }

                });


                $('#estado_id').change(function(){
                    if($(this).val()){
                        $('#city_id').removeClass('none');
                        $.ajax({
                            url:'city/select',
                            data:{
                                city_id: $(this).val()
                            },
                            type: 'GET',
                            success:function(data){
                                $('#ciudad_id').empty();
                                $.each(data, function(key, element){
                                    $('#ciudad_id').append("<option value='" + key + "'>" + element + "</option>");
                                });

                            },error:function(){
                                alert('Upsss los sentimos ocurrio un problema');
                            }
                        });
                    }else{
                        $('#ciudad_id').empty();
                        $('#ciudad_id').append("<option value='0'>-- Seleciona ciudad --</option>");
                        $('#city_id').addClass('none');
                    }

                });



                $("#institución_id").autocomplete({
                    serviceUrl: "autocompleintitu",
                    type: "GET",
                    autoSelectFirst: true,
                    noCache: true,
                    dataType: 'json',
                    transformResult: function (response) {

                        return {
                            suggestions: $.map(response, function (dataItem) {
                                return {
                                    id: dataItem.id,
                                    value: dataItem.name,
                                    poblacion: dataItem.poblacion,
                                    municipio: dataItem.municipio,
                                    estado: dataItem.estado,
                                    cp: dataItem.cp
                                };
                            })
                        };
                    },
                    onSelect: function (suggestion) {
                        $('#institution_id').val(suggestion.id);
                    }
                });
            });
        </script>

@stop