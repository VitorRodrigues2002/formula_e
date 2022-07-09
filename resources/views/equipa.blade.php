<link href="{{ asset('css/main.css') }}" rel="stylesheet">
@extends('layouts.app')


@section('content')
    <h1>Equipas:</h1>

    @foreach ($equipa as $equipa)
        <div>
            <a href="{{route('equipa.show',$equipa->id)}}">
                <div class="piloto">
                    <img class="pilo_img" src="{{$equipa->img}}" alt="img/equipa">
                </div>
                <div class="piloto">
                    <h2 class="pilo_img">
                        <a class="nome_pilo">{{$equipa->nome}}</a>
                    </h2>
                </div>
            </a>
        </div>
    @endforeach
@endsection
