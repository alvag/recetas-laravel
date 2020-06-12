<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{

    public function index()
    {
        return view( 'recipes.index' );
    }


    public function create()
    {
        return view( 'recipes.create' );
    }

    public function store( Request $request )
    {
        $rules = [
            'title' => 'required|min:6'
        ];

        Recipe::create( $request->validate( $rules ) );
        return redirect()->route( 'recipes.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function show( Recipe $recipe )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit( Recipe $recipe )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Recipe $recipe )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Recipe $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy( Recipe $recipe )
    {
        //
    }
}
