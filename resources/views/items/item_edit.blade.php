@extends('layouts.base_layout')

@section('title', 'Listado de Objetos')

@section('content')

<h1>Editar objeto</h1>
<form method="post" action="{{ route('items.update', $item)}}">
    @method('PUT')
    @include('items.item_form', ['item' => $item, 'submit' => 'Editar'])
</form>

@endsection