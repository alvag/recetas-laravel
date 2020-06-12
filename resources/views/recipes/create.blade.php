@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.min.css"
          integrity="sha256-6kLTaBcx5YzpT29NiHTRE/QbWWlKpFjAdVUAmptRGOk=" crossorigin="anonymous"/>
@endsection

@section('buttons')
    <a href="{{route('recipes.index')}}" class="btn btn-primary">Volver</a>
@endsection

@section('content')
    <h2 class="text-center mb-5">Crear Nueva Receta</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <form action="{{route('recipes.store')}}" enctype="multipart/form-data" method="POST">
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
                    <label for="category">Categoría</label>
                    <select name="category_id" id="category"
                            class="form-control @error('category_id') is-invalid @enderror">
                        <option value="">Seleccionar categoría</option>
                        @foreach($categories as $id => $category)
                            <option
                                value="{{$id}}"
                                {{old('category_id') == $id ? 'selected' : ''}}>
                                {{$category}}
                            </option>
                        @endforeach
                    </select>

                    @error('category_id')
                    <span class="invalid-feedback d-block font-weight-bold" role="alert">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="preparation">Preparación</label>
                    <input type="hidden" id="preparation" name="preparation" {{old('preparation')}}>
                    <trix-editor
                        class="form-control @error('preparation') is-invalid @enderror"
                        input="preparation"></trix-editor>

                    @error('preparation')
                    <span class="invalid-feedback d-block font-weight-bold" role="alert">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ingredients">Ingredientes</label>
                    <input type="hidden" id="ingredients" name="ingredients" {{old('ingredients')}}>
                    <trix-editor
                        class="form-control @error('ingredients') is-invalid @enderror"
                        input="ingredients"></trix-editor>

                    @error('ingredients')
                    <span class="invalid-feedback d-block font-weight-bold" role="alert">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="image">Selecciona una imagen</label>
                    <input type="file"
                           class="form-control @error('image') is-invalid @enderror"
                           name="image" id="image">

                    @error('image')
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

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.min.js"
            integrity="sha256-UILSuo1S5AFy4RyVZ9Xm7v8EVWLdv3IujsyN83s3wRw=" crossorigin="anonymous"></script>
@endsection
