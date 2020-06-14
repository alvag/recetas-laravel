@extends('layouts.app')

@section('buttons')
    <a href="{{route('recipes.create')}}" class="btn btn-primary mr-2">Crear receta</a>
@endsection

@section('content')
    <h2 class="text-center mb-5">Administra tus recetas</h2>

    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
            <tr>
                <th scope="col">Título</th>
                <th scope="col">Categoría</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($recipes as $recipe)
                <tr>
                    <td>{{$recipe->title}}</td>
                    <td>{{$recipe->category->name}}</td>
                    <td>
                        {{--<form method="POST" class="d-inline"
                              action="{{route('recipes.destroy', ['recipe'=>$recipe->id])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>--}}
                        <delete-recipe recipe="{{$recipe->id}}"></delete-recipe>
                        <a href="{{route('recipes.edit', ['recipe' => $recipe->id])}}" class="btn btn-dark btn-sm">Editar</a>
                        <a href="{{route('recipes.show', ['recipe' => $recipe->id])}}" class="btn btn-success btn-sm">Ver</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
