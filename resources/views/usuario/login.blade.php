@extends('layout.base')

@section('titulo', 'Login de usuário')

@section('conteudo')
<form action="{{ route('logarSucesso') }}" method="post">
        {{ csrf_field() }}
        <div class="field">
            <label for="email">E-mail:</label>
            <input type="text" name="email" id="email" placeholder="E-mail">

            @if($errors->has('email'))
                @foreach($errors->get('email') as $erro)
                    <strong class="erro"> {{ $erro }} </strong>
                @endforeach
            @endif
        </div>
        <div class="field">
            <label for="senha">Senha:</label>
            <input type="text" name="senha" id="senha" placeholder="Senha">

            @if($errors->has('senha'))
                @foreach($errors->get('senha') as $erro)
                    <strong class="erro"> {{ $erro }} </strong>
                @endforeach
            @endif
        </div>
        <div class="field">
            @if($errors->has('senha'))
                @foreach($errors->get('senha') as $erro)
                    <strong class="erro"> {{ $erro }} </strong>
                @endforeach
            @endif
            <button type="submit">Enviar</button>
        </div>
    </form>
@endsection