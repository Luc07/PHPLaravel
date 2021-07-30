@extends('layout.base')

@section('titulo', 'Editar usuário')

@section('conteudo')
<form action="{{ route('editarSucesso') }}" method="post">
        {{ csrf_field() }}
        <div class="field">
            <label for="id">Id:</label>
            <input type="text" name="id" id="id" placeholder="ID">

            @if($errors->has('id'))
                @foreach($errors->get('id') as $erro)
                    <strong class="erro"> {{ $erro }} </strong>
                @endforeach
            @endif
        </div>
        <div class="field">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" placeholder="Nome">

            @if($errors->has('nome'))
                @foreach($errors->get('nome') as $erro)
                    <strong class="erro"> {{ $erro }} </strong>
                @endforeach
            @endif
        </div>
        <div class="field">
            <button type="submit">Enviar</button>
        </div>
    </form>
@endsection