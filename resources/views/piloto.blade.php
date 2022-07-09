<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@extends('layouts.app')

@section('content')
    <h1>Pilotos:</h1>

    @foreach ($piloto as $piloto)
        <div>
            <a href="{{route('piloto.show',$piloto->id)}}">
                <div class="piloto">
                    <img class="pilo_img"src="{{$piloto->img}}" alt="img/piloto">
                </div>
                <div class="piloto">
                    <h2 class="pilo_img">
                        <a class="nome_pilo">{{$piloto->nome}}</a>
                    </h2>
                </div>
            </a>
        </div>
    @endforeach
@endsection
