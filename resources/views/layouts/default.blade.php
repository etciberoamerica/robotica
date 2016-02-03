<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    {!! Html::style('css/bootstrap.css') !!}
    {!! Html::style('css/font-awesome.css') !!}
    {!! Html::style('css/styles-auto.css') !!}
    {!! Html::style('css/style.main.css') !!}
    {!! Html::script('js/jquery-1.11.3.js') !!}
    {!! Html::script('js/bootstrap.js') !!}
    {!! Html::script('js/jquery.autocomplete.js') !!}
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, user-scalable=no" />
</head>
<body>
@include('layouts/nav')
@yield('section')
</body>
</html>