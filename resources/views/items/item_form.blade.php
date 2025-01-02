
@csrf
Nombre: <input id="name" name="name" type="text" value={{old('name', isset($item) ? $item->name : '')}}><br>
@error('name')
    {{$message}}<br>
@enderror
Descripción: <br><textarea id="description" name="description">{{old('description', isset($item) ? $item->description : '')}}</textarea><br>
Año: <input id="year" name="year" type="number" value={{old('year', isset($item) ? $item->year : '')}}><br><br>
<button type="submit">
    {{$submit}}
</button>