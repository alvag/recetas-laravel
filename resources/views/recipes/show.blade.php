@extends('layouts.app')

@section('content')
    <article class="recipe">
        <h1 class="text-center mb-4">{{$recipe->title}}</h1>

        <div class="image">
            <img class="w-100" src="/storage/{{$recipe->image}}" alt="">
        </div>


        <div class="details">
            <p>
                <span class="font-weight-bold text-primary">Escrito en:</span>
                {{$recipe->category->name}}
            </p>
            <p>
                <span class="font-weight-bold text-primary">Autor: </span>
                {{$recipe->user->name}}
            </p>

            <p>
                <span class="font-weight-bold text-primary">Fecha: </span>
                {{$recipe->created_at->format('d/m/Y')}}
            </p>
        </div>

        <div class="ingredients">
            <h2 class="my-3 text-primary">Ingredientes</h2>
            {!! $recipe->ingredients !!}
        </div>

        <div class="ingredients">
            <h2 class="my-3 text-primary">Preparación</h2>
            {!! $recipe->preparation !!}
        </div>
    </article>
@endsection
