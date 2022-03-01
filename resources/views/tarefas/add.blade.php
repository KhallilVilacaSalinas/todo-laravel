@extends('layouts.admin')
@section('title', 'Adição de tarefas')

@section('content')
    <h1>Adição</h1>

    @if (session('alert'))
    <script>
        alert('Você não digitou nenhum titulo');
    </script>
    @endif

    <form method="POST">
        @csrf
        <label>
            <input type="text" name="title">
        </label>
        <input type="submit" value="Adicionar">
    </form>
@endsection
