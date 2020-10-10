@extends('mascara')
@section('contenido')
    @switch(Auth::user()->idrol)
        @case(1)
            @include('page.deshboard.administrador')
        @break
        @case(2)
            @include('page.deshboard.comprador')
        @break
        @case(3)
            @include('page.deshboard.vendedor')
        @break@
    @endswitch

@endsection