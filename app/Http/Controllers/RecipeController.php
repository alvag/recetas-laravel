<?php

namespace App\Http\Controllers;

use App\Category;
use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }

    public function index()
    {
        return view( 'recipes.index' );
    }


    public function create()
    {
        $categories = Category::all()->pluck( 'name', 'id' );
        return view( 'recipes.create' )->with( [
            'categories' => $categories
        ] );
    }

    public function store( Request $request )
    {
        $rules = [
            'title' => 'required|min:6',
            'category_id' => 'required',
            'preparation' => 'required',
            'ingredients' => 'required',
//            'image' => 'required|image',
        ];

        $data = $request->validate( $rules );

        Recipe::create( [
            'title' => $data[ 'title' ],
            'category_id' => $data[ 'category_id' ],
            'preparation' => $data[ 'preparation' ],
            'ingredients' => $data[ 'ingredients' ],
            'user_id' => Auth::user()->id,
            'image' => 'image.jpg'
        ] );
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
