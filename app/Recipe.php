<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'preparation',
        'ingredients',
        'image',
        'user_id'
    ];

    public function category()
    {
        return $this->belongsTo( Category::class );
    }
}
