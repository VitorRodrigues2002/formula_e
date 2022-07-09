@extends('layouts.app')

@section('content')
    <h1>Formula E - Criar Equipas</h1>
    <div class="detalhess">
        <p class="message">{{session('mssg')}}</p>
        <div class="error">
            <ul>
                @foreach ($errors->all as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        <form action="{{route('equipa.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="nome">Nome da Equipa</label>
            <input type="text" id="create" name="nome">
            <br>
            <br>
            <label for="pilotos">Pilotos</label>
            <input type="text" id="create" name="pilotos">
            <br>
            <br>
            <label for="img">Imagem da Equipa</label>
            <input type="file" id="img" name="img">    
            <br>
            <br>
            <input class="botao" type="submit">
        </form>
        <br>
        <a class="botao" href="{{route('equipa.index')}}">Voltar às Equipas</a>
    </div>
@endsection
