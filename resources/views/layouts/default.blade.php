<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    {!! Html::style('css/bootstrap.css') !!}

    {!! Html::style('css/style.main.css') !!}
    {!! Html::script('js/jquery-1.11.3.js') !!}
    {!! Html::script('js/bootstrap.js') !!}
    <title>@yield('title')</title>
</head>
<body>
@yield('section')
</body>
</html>