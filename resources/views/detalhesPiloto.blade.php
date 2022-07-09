@extends('layouts.app')

@section('content')
    <h1>Pilotos Detalhes:</h1>
    <div class="piloto">
        <div class="detalhes">
            @if (isset($piloto))
                <img src="{{$piloto->img}}" alt="piloto/img">
                <h2>{{$piloto->nome}}</h2>
                <p>{{$piloto->nacionalidade}}<br/>
                    {{$piloto->idade}}<br/>
                    {{$piloto->equipa}}</p>
            @else
                <h1>O piloto não existe</h1>
            @endif
            @auth
                <form action="{{route('piloto.destroy',$piloto->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="botao">Eliminar Piloto</button>
                </form>
                <form action="{{route('piloto.edit',$piloto->id)}}" method="GET">
                    @csrf
                    <br>
                    <button class="botao">Editar Piloto</button>
                </form>
            @endauth
            <br>
            <a class="botao" href="/piloto">Voltar aos Pilotos</a>      
        </div>
    </div>
@endsection
