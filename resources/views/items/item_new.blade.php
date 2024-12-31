@extends('layouts.base_layout')

@section('title', 'Listado de Objetos')

@section('content')

<h1>Nuevo objeto</h1>
<form method="post" action="/items">
    @csrf
    Nombre: <input id="name" name="name" type="text" required><br>
    Descripción: <br><textarea id="description" name="description"></textarea><br>
    Año: <input id="year" name="year" type="number"><br><br>
    <button type="submit">Crear</button>
</form>

@endsection