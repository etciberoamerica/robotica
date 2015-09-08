@extends('layouts/default')

@section('section')
    <br><br><br>

    <div class="container">
        {!! Form::open(['route' => 'register', 'autocomplete' =>'false','method'=>'POST','id' =>'form-se','autocomplete'=>'off']) !!}
        <div class="panel panel-default col-md-12 col-lg-12 ">
            <div class="panel-body">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-list-alt">
                                                        </span> Datos del coach</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="form-group">
                                * {!! Form::label('name', 'Nombre:') !!}
                                {!! Form::text('nombre','',array('class'=>'form-control','id'=>'name')) !!}
                                {!! $errors->first('nombre','<p class="error-message">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                * {!! Form::label('ap_pat','Apellido Paterno')!!}
                                {!! Form::text('Apellido Paterno','',array('class'=>'form-control','id'=>'ap_pat')) !!}
                                {!! $errors->first('Apellido Paterno','<p class="error-message">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                * {!! Form::label('ap_mat','Apellido Materno') !!}
                                {!! Form::text('Apellido Materno','',array('class'=>'form-control','id'=>'ap_mat')) !!}
                                {!! $errors->first('Apellido Materno','<p class="error-message">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                * {!! Form::label('nacionalidad', 'Nacionalidad') !!}

                                {!! $errors->first('Nacionalidad','<p class="error-message">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                * {!! Form::label('rfc','RFC:') !!}
                                {!! Form::text('RFC','',array('class' =>'form-control','id' =>'rfc')) !!}
                                {!! $errors->first('RFC','<p class="error-message">:message</p>')!!}
                            </div>
                            <div class="form-group">
                                * {!!Form::label('fecha','Fecha  de nacimiento')!!}<br><br/>

                                {!! $errors->first('Año','<p class="error-message">:message</p>') !!}
                                {!! $errors->first('Mes','<p class="error-message">:message</p>') !!}
                                {!! $errors->first('Día','<p class="error-message">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                * {!! Form::label('gen','Género:') !!}<br><br/>
                                {!! Form::label('mas','Masculino:') !!}
                                {!! Form::radio('Género','Masculino') !!}
                                {!! Form::label('fem','Femenino:') !!}
                                {!! Form::radio('Género','Femenino') !!}
                            </div>
                            <div class="form-group">
                                * {!! Form::label('ocu','Ocupación') !!}

                            </div>
                            <div class="form-group">
                                * {!! Form::label('calle','Calle y numero') !!}
                                {!! Form::text('Calle y numero','',array('class'=>'form-control','id'=>'calle')) !!}
                            </div>
                            <div class="form-group">
                                * {!! Form::label('cp','Código Postal') !!}
                                {!! Form::text('Código Postal','',array('class'=>'form-control','id'=>'cp')) !!}
                                {!! Form::hidden('idcp','',array('class'=>'form-control','id'=>'idcp')) !!}
                            </div>
                            <div class="form-group">
                                * {!! Form::label('colonia','Colonia') !!}
                                {!! Form::text('Colonia','',array('class'=>'form-control','id'=>'colonia')) !!}
                            </div>
                            <div class="form-group">
                                * {!! Form::label('delegacion','Delegación o Municipio') !!}
                                {!! Form::text('Delegación o Municipio','',array('class'=>'form-control','id'=>'delegacion')) !!}
                            </div>
                            <div class="form-group">
                                * {!! Form::label('estado','Estado') !!}
                                {!! Form::text('Estado','',array('class'=>'form-control','id'=>'estado')) !!}
                            </div>
                            <div class="form-group">
                                * {!! Form::label('tel_local', 'Teléfono Local') !!}
                                {!! Form::text('Teléfono Local','',array('class'=>'form-control','id'=>'tel_local')) !!}
                            </div>
                            <div class="form-group">
                                * {!! Form::label('tel_local', 'Teléfono Celular') !!}
                                {!! Form::text('Teléfono Celular','',array('class'=>'form-control','id'=>'tel_local')) !!}
                            </div>

                        </div>
                    </div>
                </div>
                 


                <div class="panel panel-default">
                    <div class="form-group">
                        {!! Form::label('per_ase',' ¿ A cuántas personas más deseas asegurar ?') !!}

                        {!! Form::select('personas',array('0'=> '0','1'=> '1','2'=> '2','3'=> '3','4'=> '4','5'=> '5',),0,array('class' => 'form-control','id'=>'per_ase','width'=>'10')) !!}
                    </div>

                </div>
                <div id="contenedor" class="contenedor"></div>


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix"><span class="glyphicon glyphicon-usd">
                                           </span> Detalles de tu compra</a>
                        </h4>
                    </div>
                    <div id="collapseSix" class="panel-collapse collapse">
                        <div class="panel-body">


                        </div>
                    </div>
                </div>



            </div>
        </div>

        <div class="panel panel-default col-md-6 col-lg-6 ">
            <div class="panel-body">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="glyphicon glyphicon-usd">
                              </span> Detalles de tu compra</a>
                        </h4>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse">
                        <div class="panel-body">


                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-credit-card">
                                                                              </span> Forma de pago</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="form-group">
                                {!! Form::label('pago','Método de pago:')  !!}
                                <br/>
                                <img src="{!! asset('imagenes/amex.jpg') !!}" alt=""/>
                                {!! Form::radio('Método de pago','amx') !!}
                                <img src="{!! asset('imagenes/master.png') !!}" alt=""/>
                                {!! Form::radio('Método de pago','master') !!}
                                <img src="{!! asset('imagenes/visa.png') !!}" alt=""/>
                                {!! Form::radio('Método de pago','visa') !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('nombre_tarjeta','Nombre como aparece en tu tarjeta:') !!}
                                {!! Form::text('Nombre tarjeta','',array('class'=>'form-control' ,'id'=> 'nombre_tarjeta')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('numero_tarjeta','Número de tarjeta de crédito') !!}
                                {!! Form::text('Número tarjeta','',array('class'=>'form-control' ,'id'=> 'numero_tarjeta')) !!}
                            </div>
                            <div class='form-row'>
                                <div class='col-xs-4 form-group cvc required'>
                                    {!! Form::label('cvc','CVC',array('class' =>'control-label')) !!}
                                    {!! Form::text('CVC','',array('class'=>'form-control card-cvc','size'=>'4','autocomplete' => 'off')) !!}
                                </div>
                                <div class='col-xs-4 form-group expiration required'>
                                    {!! Form::label('expira','Expiración:',array('class' =>'control-label')) !!}
                                    {!! Form::text('Mes tarjeta','',array('class'=>'form-control card-expiry-month','size'=>'2')) !!}
                                </div>
                                <div class='col-xs-4 form-group expiration required'>
                                    {!! Form::label('',' .',array('class' =>'control-label')) !!}
                                    {!! Form::text('Año tarjeta','',array('class'=>'form-control card-expiry-year','size'=>'4')) !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-ok">
                                            </span> Aceptación de compra</a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="form-group">
                                {!! Form::label('terminos','Acepto',array()) !!} <a href="{!! asset('terminos/terminos.pdf') !!}">Términos y Condiciones</a>  y  <a href="#">Aviso de Privacidad</a>
                                {!! Form::checkbox('Terminso', 'true','',array('id'=> 'terminos')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('declaracion','Declaración:') !!}
                                {!! Form::checkbox('Declaración', 'true','',array('id'=> 'terminos')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email_pol','Correo para envío de póliza(s)') !!}
                                {!! Form::text('Correo póliza','',array('class' => 'form-control','id'=>'email_pol')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('confirm_email_pol','Confirmacion correo pólizas') !!}
                                {!! Form::text('Confirmacion Correo póliza','',array('class' => 'form-control','id'=>'confirm_email_pol')) !!}
                            </div>
                            <div class="form-group">
                          
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::submit('Guardar', array('class' => 'btn btn-primary')) !!}

            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop