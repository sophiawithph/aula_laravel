{{-- resources/views/produtos/delete.blade.php --}}
@extends('includes.base')

@section('title', 'Produtos')

@section('content')
<h2>Apagar produto</h2>
<p>Você está prestes a apagar {{ $prod->name }}.</p>
<p>Tem certeza de que quer fazer isso?</p>
@endsection
