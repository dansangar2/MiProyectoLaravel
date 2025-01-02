@extends('layouts.base_layout')

@section('title', 'Listado de Objetos')

@section('content')

<h1>Nuevo objeto</h1>
<form method="post" action="{{ route('items.store')}}">
    @include('items.item_form', ['submit' => 'Crear'])
</form>

@endsection