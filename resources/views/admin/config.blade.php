@extends('layouts.admin')

@section('title', 'Configurações')

@section('content')
    <h1>Configuraçoes</h1>

    @component('alert')
        Testando 1,2,3
    @endcomponent

    @if (isset($nome))
        Meu nome é {{ $nome }} e tenho {{ $idade }} anos.
    @endif


    <form method="POST">
        @csrf
        Nome: <br>
        <input type="text" name="nome"><br>
        Idade: <br>
        <input type="text" name="idade"><br>
        Estado: <br>
        <input type="text" name="estado"><br>
        <input type="submit" value="Enviar">
    </form>

    @if (count($list) > 0)
        List de bolos:
        <ul>
            @foreach ($list as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    @else
        Não há ingredientes
    @endif

@endsection
