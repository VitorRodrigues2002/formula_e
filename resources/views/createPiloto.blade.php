@extends('layouts.app')

@section('content')
    <h1>Formula E - Criar Pilotos</h1>
    @if (isset($piloto))
        Editar Piloto
    @else
        Criar Piloto
    @endif
    <div class="detalhes">
        <p class="message">{{session('mssg')}}</p>
        <div class="error">
            <ul>
                @foreach ($errors->all as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        <form method="POST" enctype="multipart/form-data"
        @if (isset($piloto))
            action="{{route('piloto.update',$piloto->id)}}"
        @else
            action="{{route('piloto.store')}}"
        @endif
        >
        @csrf
        @if (isset($piloto))
            @method('PUT')
        @endif
            <label for="nome">Nome do Piloto</label>
            <input type="text" id="create" name="nome"
            @if (isset($piloto))
                valeu="{{$piloto->nome}}"
            @endif
            >
            <br>
            <br>
            <label for="nacionalidade">Nacionalidade do Piloto</label>
            <input type="text" id="create" name="nacionalidade"
            @if (isset($piloto))
                valeu="{{$piloto->nacionalidade}}"
            @endif
            >
            <br>
            <br>
            <label for="idade">Idade do Piloto</label>
            <input type="text" id="create" name="idade"
            @if (isset($piloto))
                valeu="{{$piloto->idade}}"
            @endif
            >
            <br>
            <br>
            <label for="equipa">Equipa do Piloto</label>
            <input type="text" id="create" name="equipa"
            @if (isset($piloto))
                valeu="{{$piloto->equipa}}"
            @endif
            >
            <br>
            <br>
            <input type="hidden" id="changed" name="changed" value="false">
            <label for="img">Imagem do Piloto</label>
            <input type="file" id="img" name="img"
            onchange="document.getElementById('changed').valeu='true'">
            @if (isset($piloto))
                (não alterar para manter foto)
            @endif    
            <br>
            <br>
            <input class="botao" type="submit"
            @if (isset($piloto))
                value="Editar Piloto"
            @else
                valeu="Criar Piloto"
            @endif>
        </form>
        <br>
        <a class="botao" href="{{route('piloto.index')}}">Voltar aos Pilotos</a>
    </div>
@endsection
