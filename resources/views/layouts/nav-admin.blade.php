<nav class="navbar navbar-findcond navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                {!! Html::image('img/logo.png','',['class'=>'img-responsive','width'=>'70px','height'=>'70px']) !!}
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::user()->role_id == 9)

                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Retos <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            {{--<li><a href="{!! route('dashboard/stages',['id' => 1]) !!}">Sumo robotizado NXT</a></li>--}}

                        </ul>
                    </li>

                @endif



                @if(Auth::user()->role_id == 1)
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-fw fa-bell-o"></i> Bildirimler <span class="badge">0</span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><i class="fa fa-fw fa-tag"></i> <span class="badge">Music</span> sayfas? <span class="badge">Video</span> sayfas?nda etiketlendi</a></li>
                        <li><a href="#"><i class="fa fa-fw fa-thumbs-o-up"></i> <span class="badge">Music</span> sayfas?nda iletiniz be?enildi</a></li>
                        <li><a href="#"><i class="fa fa-fw fa-thumbs-o-up"></i> <span class="badge">Video</span> sayfas?nda iletiniz be?enildi</a></li>
                        <li><a href="#"><i class="fa fa-fw fa-thumbs-o-up"></i> <span class="badge">Game</span> sayfas?nda iletiniz be?enildi</a></li>
                    </ul>
                </li>
                <li class="active"><a href="#">Ana Sayfa <span class="sr-only">(current)</span></a></li>

                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Administracion <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{!! route('dashboard/settings') !!}">Configuración</a></li>
                        <li><a href="{!! route('challenge') !!}">Retos</a></li>
                        <li><a href="{!! route('institutions') !!}">Instituciones</a></li>

                        <li><a href="{!! route('list_user') !!}">Usuarios</a></li>
                        <li><a href="{!! route('referee') !!}">Árbitros</a></li>

                        <li class="dropdown-submenu">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Escenarios</a>
                            <ul class="dropdown-menu">
                                <li><a href="{!! route('dashboard/stages',['id' => 1]) !!}">Sumo robotizado NXT</a></li>
                                <li><a href="{!! route('dashboard/stages',['id' => 2]) !!}">Sumo robotizado EV3</a></li>
                                <li><a href="{!! route('dashboard/stages',['id' => 3]) !!}">Futbol robotizado NXT</a></li>
                                <li><a href="{!! route('dashboard/stages',['id' => 4]) !!}">Futbol robotizado EV3</a></li>
                                <li><a href="{!! route('dashboard/stages',['id' => 5]) !!}">Blockrise</a></li>
                                <li><a href="{!! route('dashboard/stages',['id' => 6]) !!}">Reto sorpresa</a></li>
                                <li><a href="{!! route('dashboard/stages',['id' => 7]) !!}">Taekwondo robotizado</a></li>
                                <li><a href="{!! route('dashboard/stages',['id' => 8]) !!}">Carrera de obstaculos</a></li>
                            </ul>
                        </li>

                        <li class="dropdown-submenu">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Grupos</a>
                            <ul class="dropdown-menu">
                                <li><a href="{!! route('dashboard/groups',['id' => 1]) !!}">Sumo robotizado NXT</a></li>
                                <li><a href="{!! route('dashboard/groups',['id' => 2]) !!}">Sumo robotizado EV3</a></li>
                                <li><a href="{!! route('dashboard/groups',['id' => 3]) !!}">Futbol robotizado NXT</a></li>
                                <li><a href="{!! route('dashboard/groups',['id' => 4]) !!}">Futbol robotizado EV3</a></li>
                                <li><a href="{!! route('dashboard/groups',['id' => 5]) !!}">Blockrise</a></li>
                                <li><a href="{!! route('dashboard/groups',['id' => 6]) !!}">Reto sorpresa</a></li>
                                <li><a href="{!! route('dashboard/groups',['id' => 7]) !!}">Taekwondo robotizado</a></li>
                                <li><a href="{!! route('dashboard/groups',['id' => 8]) !!}">Carrera de obstaculos</a></li>
                            </ul>
                        </li>

                        <li class="dropdown-submenu">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Equipos</a>
                            <ul class="dropdown-menu">
                                <li><a href="{!! route('dashboard/team',['id' => 0]) !!}">General</a></li>
                                <li><a href="{!! route('dashboard/team',['id' => 1]) !!}">Sumo robotizado NXT</a></li>
                                <li><a href="{!! route('dashboard/team',['id' => 2]) !!}">Sumo robotizado EV3</a></li>
                                <li><a href="{!! route('dashboard/team',['id' => 3]) !!}">Futbol robotizado NXT</a></li>
                                <li><a href="{!! route('dashboard/team',['id' => 4]) !!}">Futbol robotizado EV3</a></li>
                                <li><a href="{!! route('dashboard/team',['id' => 5]) !!}">Blockrise</a></li>
                                <li><a href="{!! route('dashboard/team',['id' => 6]) !!}">Reto sorpresa</a></li>
                                <li><a href="{!! route('dashboard/team',['id' => 7]) !!}">Taekwondo robotizado</a></li>
                                <li><a href="{!! route('dashboard/team',['id' => 8]) !!}">Carrera de obstaculos</a></li>
                              
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Pruebas oficiales</a>
                            <ul class="dropdown-menu">
                                <li><a href="{!! route('dashboard/generator/round',['id'=> 1]) !!}">Sumo robotizado NXT</a></li>
                                <li><a href="{!! route('dashboard/generator/round',['id'=> 2]) !!}">Sumo robotizado EV3</a></li>
                                <li><a href="{!! route('dashboard/generator/round',['id'=> 3]) !!}">Futbol robotizado NXT</a></li>
                                <li><a href="{!! route('dashboard/generator/round',['id'=> 4]) !!}">Futbol robotizado EV3</a></li>
                                <li><a href="{!! route('dashboard/generator/round',['id'=> 5]) !!}">Blockrise</a></li>
                                <li><a href="{!! route('dashboard/generator/round',['id'=> 7]) !!}">Taekwondo robotizado</a></li>
                                <li><a href="{!! route('dashboard/generator/round',['id'=> 8]) !!}">Carrera de obstaculos</a></li>
                            </ul>

                        </li>
                        <li class="dropdown-submenu">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Ronda de grupos</a>
                            <ul class="dropdown-menu">
                                <li><a href="{!! route('dashboard/generator/group',['id'=> 1]) !!}">Sumo robotizado NXT</a></li>
                                <li><a href="{!! route('dashboard/generator/group',['id'=> 2]) !!}">Sumo robotizado EV3</a></li>
                                <li><a href="{!! route('dashboard/generator/group',['id'=> 3]) !!}">Futbol robotizado NXT</a></li>
                                <li><a href="{!! route('dashboard/generator/group',['id'=> 4]) !!}">Futbol robotizado EV3</a></li>
                                <li><a href="{!! route('dashboard/generator/group',['id'=> 5]) !!}">Blockrise</a></li>
                                <li><a href="{!! route('dashboard/generator/group',['id'=> 7]) !!}">Taekwondo robotizado</a></li>
                                <li><a href="{!! route('dashboard/generator/group',['id'=> 8]) !!}">Carrera de obstaculos</a></li>
                            </ul>

                        </li>
                        <li class="dropdown-submenu">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Ronda de enfrentamientos</a>
                            <ul class="dropdown-menu">
                                <li><a href="{!! route('dashboard/generator/round/fighting',['id'=> 1]) !!}">Sumo robotizado NXT</a></li>
                                <li><a href="{!! route('dashboard/generator/round/fighting',['id'=> 2]) !!}">Sumo robotizado EV3</a></li>
                                <li><a href="{!! route('dashboard/generator/round/fighting',['id'=> 3]) !!}">Futbol robotizado NXT</a></li>
                                <li><a href="{!! route('dashboard/generator/round/fighting',['id'=> 4]) !!}">Futbol robotizado EV3</a></li>
                                <li><a href="{!! route('dashboard/generator/round/fighting',['id'=> 5]) !!}">Blockrise</a></li>
                                <li><a href="{!! route('dashboard/generator/round/fighting',['id'=> 7]) !!}">Taekwondo robotizado</a></li>
                                <li><a href="{!! route('dashboard/generator/round/fighting',['id'=> 8]) !!}">Carrera de obstaculos</a></li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">Efrentamientos</a>
                            <ul class="dropdown-menu">
                                <li><a href="{!! route('dashboard/fighting',['id'=> 1]) !!}">Sumo robotizado NXT</a></li>
                                <li><a href="{!! route('dashboard/fighting',['id'=> 2]) !!}">Sumo robotizado EV3</a></li>
                                <li><a href="{!! route('dashboard/fighting',['id'=> 3]) !!}">Futbol robotizado NXT</a></li>
                                <li><a href="{!! route('dashboard/fighting',['id'=> 4]) !!}">Futbol robotizado EV3</a></li>
                                <li><a href="{!! route('dashboard/fighting',['id'=> 5]) !!}">Blockrise</a></li>
                                <li><a href="{!! route('dashboard/fighting',['id'=> 7]) !!}">Taekwondo robotizado</a></li>
                                <li><a href="{!! route('dashboard/fighting',['id'=> 8]) !!}">Carrera de obstaculos</a></li>
                                <li><a href="{!! route('challenge/reto') !!}">Reto Sorpresa</a></li>

                                challenge/reto
                            </ul>

                        </li>





                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Geri bildirim</a></li>
                        <li><a href="#">Yard?m</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Ayarlar</a></li>
                        <li><a href="#exit">Ç?k?? yap</a></li>
                    </ul>
                </li>
                @endif
                <li>
                    <a href="{!! route('logout') !!}"><i class="glyphicon glyphicon-off"></i>Salir</a>
                </li>
            </ul>

        </div>
    </div>
</nav>