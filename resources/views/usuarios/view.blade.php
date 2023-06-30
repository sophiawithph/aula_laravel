@extends('includes.base')

@section('title', 'Usuarios - Ver')

@section('content')
    <h2>{{ $user->name }}</h2>
    <p>Email:{{ $user->name }}</p>

    <p>
        <a href="{{ route('usuarios') }}">Voltar</a>
    </p>
@endsection
