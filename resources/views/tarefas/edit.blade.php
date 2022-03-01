@extends('layouts.admin')
@section('title', 'Edição de tarefas')

@section('content')
    <h1>Edição</h1>

    @if (session('alert'))
    <script>
        alert('Você não digitou nenhum titulo');
    </script>
    @endif

    <form method="POST">
        @csrf
        <label>
            <input type="text" name="title" value="{{ $data->titulo }}">
        </label>
        <input type="submit" value="Adicionar">
    </form>
@endsection
