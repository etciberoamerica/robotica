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
                                <a href="#coach" id='tab-coach' title="Datos coach">
                                     <span class="round-tabs two">
                                         <i class="glyphicon glyphicon-user"></i>
                                     </span>
                                </a>
                            </li>
                            <li id='li_integrantes'>
                                <a href="#integrates" id="tab-integrantes" title="Datos integrantes">
                                     <span class="round-tabs three">
                                          <i class="glyphicon glyphicon-gift"></i>
                                     </span>
                                </a>
                            </li>
                        </ul></div>
                    <div id="errores" class="alert alert-danger none">
                    </div>

                    <div id="success" class="col-sm-12 col-md-12 none">
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                ×</button>
                            <span class="glyphicon glyphicon-ok"></span> <strong>Éxito </strong>
                            <hr class="message-inner-separator">
                            <p>
                                Gracias por tu registro, el coach puede modificar estos datos de fecha a fecha</p>
                        </div>
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
                                    * {!! Form::label('grado','Grado:') !!}
                                    {!! Form::select('Grado',$degree,'',['class'=>'form-control','id'=>'grado_id']) !!}
                                </div>
                                <div id ='reto_div_id' class="form-group none">
                                    * {!! Form::label('reto','Reto:') !!}
                                    {!! Form::select('Reto',[''=>'-- Selecciona reto --'],'' ,['class'=>'form-control','id'=>'reto_id']) !!}
                                </div>
                                <div class="form-group none" id="gender_div_id">
                                    * {!! Form::label('gen','Género:') !!}<br><br/>
                                    {!! Form::label('mas','Masculino:') !!}
                                    {!! Form::radio('Género','MAS') !!}
                                    {!! Form::label('fem','Femenino:') !!}
                                    {!! Form::radio('Género','FEM') !!}
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
                $('#nombre_equipo_id').blur(function(){
                    if($(this).val()){
                        $.ajax({
                            url:'check/name_team',
                            data:{
                                Nombre_del_equipo:$(this).val()
                            },
                            type:'GET',
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
                                }
                            },error:function(){
                            alert('Upsss los sentimos ocurrio un problema');
                        }
                        });
                    }
                });
                $('input:radio[name="Cordinador"]').click(function(){
                    if($(this).val() == 'S'){
                        $('#coordinador_info').addClass('none');
                    }else{
                        $('#coordinador_info').removeClass('none');
                    }
                });
                $('#comprobar_id_3').click(function(){
                    var dataOne={
                        Institución: $('#institution_id').val(),
                                Nombre_del_equipo:$('#nombre_equipo_id').val(),
                                Nombre_del_robot :$('#nombre_robot_id').val(),
                                País:$('#pais_id').val(),
                                Estado:$('#pais_id').val(),
                                Ciudad:$('#ciudad_id').val(),
                                Género:$( "input[name$='Género']:checked" ).val(),
                                Reto:$('#reto_id').val(),
                                Grado:$('#grado_id').val(),
                                tab :'uno'
                    };
                    var datosTwo ={
                        Nombre:$('#nombre_id').val(),
                        Apellido_Paterno:$('#apellido_paterno_id').val(),
                        Apellido_Materno:$('#apellido_materno_id').val(),
                        Correo:$('#correo_id').val(),
                        Correo_confirmación:$('#correo_confirmacion_id').val(),
                        Correo_alterno:$('#correo_alterno_id').val(),
                        Nombre_Coach_auxiliar:$('#nombre_aux_id').val(),
                        Apellido_Paterno_Coach_auxiliar:$('#apellido_paterno_aux_id').val(),
                        Apellido_Materno_Coach_auxiliar:$('#apellido_materno_aux_id').val(),
                        tab :'dos'};
                    if($('input:radio[name="Cordinador"]:checked').val() == 'S'){
                        var json2= {
                            Nombre_coordinador:$('#nombre_aux_id').val(),
                            Apellido_paterno_coordinador:$('#apellido_paterno_aux_id').val(),
                            Apellido_materno_coordinador:$('#apellido_materno_aux_id').val(),
                            Coordinado :$('input:radio[name="Cordinador"]:checked').val()};
                    }else{
                        var json2 ={
                            Nombre_coordinador:$('#cor_name_id').val(),
                            Apellido_paterno_coordinador:$('#cor_ap_pat_id').val(),
                            Apellido_materno_coordinador:$('#cor_ap_mat_id').val(),
                            Coordinado :$('input:radio[name="Cordinador"]:checked').val()};
                    }

                    var datosTwo= $.extend(false,{},datosTwo,json2);
                    var datosThree=
                    {
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
                            tab :'tres'
                    };
                    $.ajax({
                        url:'check/three',
                        type:'GET',
                        data:{
                            datosOne:dataOne,
                            datosTwo:datosTwo,
                            datosThree:datosThree
                        },success:function(data){
                            if(data.success == true){
                                $('#tab-integrantes').attr('data-toggle','tab');
                                $('#errores').addClass('none');
                                $("#coach").removeClass('active in');
                                $("#team").removeClass('active in');
                                $("#li_team").removeClass('active');
                                $("#li_coach").removeClass('active');
                                $("#integrates").addClass('active in');
                                $("#li_integrantes").addClass('active');
                                $('#success').removeClass('none');
                                $('#tab-integrantes').removeAttr('data-toggle');
                                $('#tab-coach').removeAttr('data-toggle');
                                clearInput();
                                setTimeout(function() {
                                    location.reload(true);
                                    },5000);

                            }else{
                                error =data.errors;
                                var countOne    = error.uno;
                                var countTwo    = error.dos;
                                var countThree  = error.tres;

                                var iO=0;
                                var html="";
                                html +="<ul>";
                                $.each(countOne,function($i,item,d){
                                    if(item){
                                        html +="<li>";
                                        html +=item;
                                        html +="</li>";
                                        iO=1;
                                    }
                                });
                                html +="<ul>";
                                $('#errores').empty();
                                $('#errores').html(html);
                                if(iO){
                                    $('#errores').removeClass('none');
                                    $("#li_team").addClass('active');
                                    $("#li_coach").removeClass('active');
                                    $("#li_integrantes").removeClass('active');
                                    $("#team").addClass('active in');
                                    $("#integrates").removeClass('active in');
                                    $("#coach").removeClass('active in');
                                    return false;
                                }
                                var iT=0;
                                var htmlT="";
                                htmlT +="<ul>";
                                $.each(countTwo,function($i,item,d){
                                    if(item){
                                        htmlT +="<li>";
                                        htmlT +=item;
                                        htmlT +="</li>";
                                        iT=1;
                                    }
                                });
                                htmlT +="<ul>";
                                $('#errores').empty();
                                $('#errores').html(htmlT);
                                if(iT){
                                    $('#errores').removeClass('none');
                                    $("#li_team").removeClass('active');
                                    $("#li_coach").addClass('active');
                                    $("#li_integrantes").removeClass('active');
                                    $("#team").removeClass('active in');
                                    $("#integrates").removeClass('active in');
                                    $("#coach").addClass('active in');
                                    return false;
                                }
                                var iTh=0;
                                var htmlTh="";
                                htmlTh +="<ul>";
                                $.each(countThree,function($i,item,d){
                                    if(item){
                                        htmlTh +="<li>";
                                        htmlTh +=item;
                                        htmlTh +="</li>";
                                        iT=1;
                                    }
                                });
                                htmlTh +="<ul>";
                                $('#errores').empty();
                                $('#errores').html(htmlTh);
                                if(iT){
                                    $('#errores').removeClass('none');
                                    $("#li_team").removeClass('active');
                                    $("#li_coach").removeClass('active');
                                    $("#li_integrantes").addClass('active');
                                    $("#team").removeClass('active in');
                                    $("#integrates").addClass('active in');
                                    $("#coach").removeClass('active in');
                                    return false;
                                }
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
                            Género:$( "input[name$='Género']:checked" ).val(),
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

                $('#grado_id').change(function(){
                    if($(this).val()){
                        $.ajax({
                            url     :'challenge/select',
                            data    :{
                                degree_id: $(this).val()
                            },
                            type: 'GET',
                            success: function(data){
                                $('#reto_div_id').removeClass('none');
                                $('#reto_id').empty();
                                $('#reto_id').append('<option  value="">-- Seleciona grados --</option>');
                                $.each(data, function(key, element){
                                    $('#reto_id').append("<option value='" + key + "'>" + element + "</option>");
                                });
                            },error:function(){
                                alert('Upsss los sentimos ocurrio un problema');
                            }

                        });
                    }else{

                    }

                });

                $('#reto_id').change(function(){
                    if($(this).val() == 6){
                        $('#gender_div_id').removeClass('none');
                        var html ='<label for="gen">Género:</label><br><label for="mas">Masculino:</label><input type="radio" value="MAS" name="Género"><label for="fem">Femenino:</label><input type="radio" value="FEM" name="Género">';
                        html +='<label for="fem">Mixto:</label><input type="radio" value="MIX" name="Género">';
                        $('#gender_div_id').empty();
                        $('#gender_div_id').html(html);
                    }else{
                        $('#gender_div_id').removeClass('none');
                        var html ='<label for="gen">Género:</label><br><label for="mas">Masculino:</label><input type="radio" value="MAS" name="Género"><label for="fem">Femenino:</label><input type="radio" value="FEM" name="Género">';
                        $('#gender_div_id').empty();
                        $('#gender_div_id').html(html);

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

        function clearInput(){
            $('#institución_id').val('');
            $('#institution_id').val('');
            $('#nombre_equipo_id').val('');
            $('#nombre_robot_id').val('');
            $('#pais_id').val('').change();
            $('#state_id').addClass('none');
            $('#city_id').addClass('none');
            $("input[name$='Género']:checked" ).attr("checked", false);
            $('#reto_id').val('').change();
            $('#grado_id').empty();
            $('#grado_id').append('<option  value="">-- Seleciona grados --</option>');
            $('#nombre_id').val('');
            $('#apellido_paterno_id').val('');
            $('#apellido_materno_id').val('');
            $('#correo_id').val('');
            $('#correo_confirmacion_id').val('');
            $('#correo_alterno_id').val('');
            $('#nombre_aux_id').val('');
            $('#apellido_paterno_aux_id').val('');
            $('#apellido_materno_aux_id').val('');
            $('#cor_name_id').val('');
            $('#cor_ap_pat_id').val('');
            $('#cor_ap_mat_id').val('');
            $('input:radio[name=Cordinador]')[0].checked = true;
            $('input:radio[name=Cordinador]')[1].checked = false;
            $('#cap_name_id').val('');
            $('#cap_ap_pat_id').val('');
            $('#cap_ap_mat_id').val('');
            $('#seg_name_id').val('');
            $('#seg_ap_pat_id').val('');
            $('#seg_ap_mat_id').val('');
            $('#tre_name_id').val('');
            $('#tre_ap_pat_id').val('');
            $('#tre_ap_mat_id').val('');
            $('#cua_name_id').val('');
            $('#cua_ap_pat_id').val('');
            $('#cua_ap_mat_id').val('');
        }
        </script>
@stop