<!DOCTYPE html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <title>Sistema integrado</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
  @include('elementos/cabecera')
</head>
<body>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    @include('elementos/header')
    <!--header end-->

    <!--sidebar start-->
    @switch(Auth::user()->idrol)
        @case(1)
            @include('elementos.sidebar.administrador')
        @break
        @case(2)
            @include('elementos.sidebar.comprador')
        @break
        @case(3)
            @include('elementos.sidebar.vendedor')
        @break
    @endswitch
    <!--sidebar end-->
    
    <!--main content start-->
    @yield('contenido')
    <!--main content end-->
  </section>
  <!-- container section end -->

@include('elementos/script')
@yield('scripts')
</body>
</html>
