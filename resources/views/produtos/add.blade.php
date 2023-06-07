{{-- views/produtos/add.blade.php --}}
@extends('includes.base')

@section('title', 'Produtos - Adicionar')

@section('content')
    <h2>Adicione seu produto</h2>

    @if ($errors)
        @foreach ($errors->all() as $err)
            {{ $err }}<br>
        @endforeach
    @endif

    <form action="{{ url()->current() }}" method="post">

        @csrf
        <input type="text" name="name" placeholder="Nome do produto" value="{{ old('name', $prod->name ?? '') }}">
        <br>
        <input type="number" name="price" step="0.01" placeholder="Preço" min="0" value="{{ old('price', $prod->price ?? '') }}">
        <br>
        <input type="number" name="quantity" placeholder="Quantidade" min="0" value="{{ old('quantity', $prod->quantity ?? '') }}">
        <hr width="30%" align="left">
        <input type="submit" value="Gravar">
    </form>
@endsection
