@extends('layouts.app')

@section('content')
    <h1>Formula E - Equipa Detalhes</h1>
    <div class="piloto">
        <div class="detalhes">
            @if (isset($equipa))
                <img src="{{$equipa->img}}" alt="equipa/img">
                <h2>{{$equipa->nome}}</h2>
                <p>{{$equipa->pilotos}}<br/>
            @else
                <h1>A equipa não existe</h1>
            @endif
            @auth
                <form action="{{route('equipa.destroy',$equipa->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="botao">Eliminar Equipa</button>
                </form>
            @endauth
            <br>
            <a  class="botao" href="/equipa">voltar aos equipas</a>
        </div>
    </div>
@endsection
