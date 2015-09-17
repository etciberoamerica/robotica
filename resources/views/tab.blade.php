@extends('layouts/default')

@section('section')
        <div class="container">
            <div class="row">
                <div class="board">
                    <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
                    <div class="board-inner">
                        <ul class="nav nav-tabs" id="myTab">
                            <div class="liner"></div>
                            <li class="active">
                                <a href="#home" data-toggle="tab" title="welcome">
                      <span class="round-tabs one">
                              <i class="glyphicon glyphicon-home"></i>
                      </span>
                                </a></li>

                            <li><a href="#profile" data-toggle="tab" title="profile">
                     <span class="round-tabs two">
                         <i class="glyphicon glyphicon-user"></i>
                     </span>
                                </a>
                            </li>
                            <li><a href="#messages" data-toggle="tab" title="bootsnipp goodies">
                     <span class="round-tabs three">
                          <i class="glyphicon glyphicon-gift"></i>
                     </span> </a>
                            </li>

                            <li><a href="#settings" data-toggle="tab" title="blah blah">
                         <span class="round-tabs four">
                              <i class="glyphicon glyphicon-comment"></i>
                         </span>
                                </a></li>

                            <li><a href="#doner" data-toggle="tab" title="completed">
                         <span class="round-tabs five">
                              <i class="glyphicon glyphicon-ok"></i>
                         </span> </a>
                            </li>

                        </ul></div>

                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home">

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
                                    {!! Form::select('Reto',$challenge,'' ,['class'=>'form-control','id'=>'challenge_id']) !!}
                                </div>
                            </div>

                            </p>


                        </div>
                        <div class="tab-pane fade" id="profile">
                            <h3 class="head text-center">Create a Bootsnipp<sup>™</sup> Profile</h3>
                            <p class="narrow text-center">
                                Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                            </p>

                            <p class="text-center">
                                <a href="" class="btn btn-success btn-outline-rounded green"> create your profile <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                            </p>

                        </div>
                        <div class="tab-pane fade" id="messages">
                            <h3 class="head text-center">Bootsnipp goodies</h3>
                            <p class="narrow text-center">
                                Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                            </p>

                            <p class="text-center">
                                <a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                            </p>
                        </div>
                        <div class="tab-pane fade" id="settings">
                            <h3 class="head text-center">Drop comments!</h3>
                            <p class="narrow text-center">
                                Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                            </p>

                            <p class="text-center">
                                <a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                            </p>
                        </div>
                        <div class="tab-pane fade" id="doner">
                            <div class="text-center">
                                <i class="img-intro icon-checkmark-circle"></i>
                            </div>
                            <h3 class="head text-center">thanks for staying tuned! <span style="color:#f48260;">♥</span> Bootstrap</h3>
                            <p class="narrow text-center">
                                Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
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