@extends('layouts.base_layout')

@section('title', 'Listado de Objetos')

@section('content')

<a href="{{route('items.create')}}">Nuevo</a>
<h1>Lista de objetos</h1>

    @foreach ($items as $item)
    <div>    
            <a href="{{route('items.show', $item->id)}}">{{$item->name}}</a> creado por {{$item->user->name}} 
            @can ('update', $item)
                
                    <a href="{{route('items.edit', $item->id)}}">Editar</a>
                    <form method="POST" action="{{route('items.destroy', $item)}}" onclick="event.preventDefault(); this.closest('form').submit();">
                        @csrf @method("DELETE")
                        <a href="{{route('items.destroy', $item->id)}}">Eliminar</a>
                    </form>
                
            @endcan
    </div>     
    @endforeach

@endsection