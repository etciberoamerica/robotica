<nav class="navbar navbar-findcond navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Findcond</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
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
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Geri bildirim</a></li>
                        <li><a href="#">Yard?m</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Ayarlar</a></li>
                        <li><a href="#exit">�?k?? yap</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Administracion <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{!! route('challenge') !!}">Retos</a></li>
                        <li><a href="{!! route('institutions') !!}">Instituciones</a></li>
                        <li><a href="{!! route('stages') !!}">Escenarios</a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>