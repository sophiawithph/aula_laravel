{{-- resources/views/produtos/delete.blade.php --}}
@extends('includes.base')

@section('title', 'Produtos')

@section('content')
<h2>Apagar produto</h2>
<p>Você está prestes a apagar {{ $prod->name }}.</p>
<p>Tem certeza de que quer fazer isso?</p>

<form action="{{ route('produtos.deleteForReal', $prod->id) }}" method="post">

    @csrf
    @method('delete')

    <input type="submit" value="Pó apagá!">
</form>
@endsection
