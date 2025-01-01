@extends('layouts.base_layout')

@section('title', 'Listado de Objetos')

@section('content')

<a href="/item/new">Nuevo</a>
<h1>Lista de objetos</h1>
<ul>
    @foreach ($items as $item)
        <li><a href="/item/{{$item->id}}">{{$item->name}}</a> creado por {{$item->user->name}} <a href="{{route('items.edit', $item->id)}}">Editar</a></li>        
    @endforeach
</ul>

@endsection