<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get( '/', function () {
    return view( 'welcome' );
} );

Route::get( 'recetas', 'RecipeController@index' )->name( 'recipes.index' );
Route::get( 'recetas/create', 'RecipeController@create' )->name( 'recipes.create' );
Route::post( 'recetas', 'RecipeController@store' )->name( 'recipes.store' );
Route::get( 'recetas/{recipe}', 'RecipeController@show' )->name( 'recipes.show' );
Route::get( 'recetas/{recipe}/edit', 'RecipeController@edit' )->name( 'recipes.edit' );
Route::put( 'recetas/{recipe}', 'RecipeController@update' )->name( 'recipes.update' );
Route::delete( 'recetas/{recipe}', 'RecipeController@destroy' )->name( 'recipes.destroy' );

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
