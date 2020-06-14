<?php

namespace App\Http\Controllers;

use App\Category;
use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class RecipeController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' )->except( 'show' );
    }

    public function index()
    {
        $recipes = auth()->user()->recipes;

        return view( 'recipes.index' )->with( [
            'recipes' => $recipes
        ] );
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
            'image' => 'required|image',
        ];

        $data = $request->validate( $rules );

        $path_image = $request[ 'image' ]->store( 'upload/recipes', 'public' );

        // Resize de imagen
        $img = Image::make( public_path( "storage/{$path_image}" ) )->fit( 1000, 550 );
        $img->save();

        auth()->user()->recipes()->create( [
            'title' => $data[ 'title' ],
            'category_id' => $data[ 'category_id' ],
            'preparation' => $data[ 'preparation' ],
            'ingredients' => $data[ 'ingredients' ],
            'image' => $path_image
        ] );

        return redirect()->route( 'recipes.index' );
    }

    public function show( Recipe $recipe )
    {
        return view( 'recipes.show', compact( 'recipe' ) );
    }

    public function edit( Recipe $recipe )
    {
        $categories = Category::all()->pluck( 'name', 'id' );
        return view( 'recipes.edit' )->with( [
            'recipe' => $recipe,
            'categories' => $categories
        ] );
    }

    public function update( Request $request, Recipe $recipe )
    {
        $this->authorize( 'update', $recipe );

        $rules = [
            'title' => 'required|min:6',
            'category_id' => 'required',
            'preparation' => 'required',
            'ingredients' => 'required',
        ];

        $data = $request->validate( $rules );
        $path_image = $recipe->image;

        if ( request( 'image' ) ) {
            $path_image = $request[ 'image' ]->store( 'upload/recipes', 'public' );
            $img = Image::make( public_path( "storage/{$path_image}" ) )->fit( 1000, 550 );
            $img->save();

            if ( File::exists( public_path( "storage/$recipe->image" ) ) ) {
                File::delete( public_path( "storage/$recipe->image" ) );
            }
        }


        // Resize de imagen

        $recipe->update( [
            'title' => $data[ 'title' ],
            'category_id' => $data[ 'category_id' ],
            'preparation' => $data[ 'preparation' ],
            'ingredients' => $data[ 'ingredients' ],
            'image' => $path_image
        ] );

        return redirect()->route( 'recipes.index' );
    }

    public function destroy( Recipe $recipe )
    {
        $this->authorize( 'update', $recipe );

        $recipe->delete();
        if ( File::exists( public_path( "storage/$recipe->image" ) ) ) {
            File::delete( public_path( "storage/$recipe->image" ) );
        }

        return redirect()->route( 'recipes.index' );

    }
}
