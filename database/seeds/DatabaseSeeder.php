<?php

use App\Category;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call( UserSeeder::class );

        $user = factory( User::class )->create();

        Category::create( [ 'name' => 'Comida Mexicana' ] );
        Category::create( [ 'name' => 'Comida Italiana' ] );
        Category::create( [ 'name' => 'Comida Argentina' ] );
        Category::create( [ 'name' => 'Postres' ] );
        Category::create( [ 'name' => 'Ensalas' ] );
        Category::create( [ 'name' => 'Carnes' ] );
        Category::create( [ 'name' => 'Desayunos' ] );

    }
}
