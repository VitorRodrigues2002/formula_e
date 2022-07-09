<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@extends('layouts.app')

@section('content')
    <div class="intro">
        <img class="logo" src="/img/logo.png">
    </div>
    <div class="intro">
        <div class="rotas">
            <br>
            <a class="botao" href="{{route('piloto.index')}}">Ver Pilotos</a>
            <a class="botao" href="{{route('equipa.index')}}">Ver Equipas</a>
        </div>
    </div>
    
@endsection
