<!DOCTYPE html>
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : SimpleWork
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20140225

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
    <link href="/css/default.css" rel="stylesheet" />
    <link href="/css/fonts.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<div>
    <div id="header" class="container">
            <div id="banner" class="container">
            <h2>Banco de Livros        </h2>
        </div>
        <div id="menu">
            <ul>
                <li><a href="/" accesskey="1" title="">Página Inicial</a></li>
                <li><a href="{{ url('/books') }}" accesskey="5" title="">Livros</a></li>
                @if(\Auth::check())
                    <li><a href="{{ url('/livrosrequesitados') }}" accesskey="3" title="">Livros Requesitados</a></li>
                    @if(\Auth::user()->isadmin==true)
                        <li><a href="{{ url('/todosrequesitados') }}" accesskey="3" title="">Todos Livros Requesitados</a></li>
                    @endif
                @endif

                @if(\Auth::check())
                    <li><a href="{{ url('/logout') }}" accesskey="3" title="">Sair</a></li>
                @else
                    <li><a href="{{ url('/login') }}" accesskey="3" title="">Login</a></li>
                @endif
                <li><a href="/contactos" accesskey="6" title="">Contactos</a></li>
            </ul>
        </div>
    </div>
    @yield('header')
</div>
@yield('content')
</body>
</html>
