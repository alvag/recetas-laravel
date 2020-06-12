@extends('layouts.app')

@section('buttons')
    <a href="{{route('recipes.index')}}" class="btn btn-primary">Volver</a>
@endsection

@section('content')
    <h2 class="text-center mb-5">Crear Nueva Receta</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form action="{{route('recipes.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" name="title" id="title"
                           class="form-control @error('title') is-invalid @enderror"
                           value="{{@old('title')}}"
                           placeholder="Título de la receta">

                    @error('title')
                    <span class="invalid-feedback d-block font-weight-bold" role="alert">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Agregar Receta</button>
                </div>
            </form>
        </div>
    </div>
@endsection
