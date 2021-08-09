<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'category_id', 
        'code', 
        'name', 
        'isbn', 
        'nationality', 
        'column', 
        'line', 
        'position', 
        'description'
    ];

    public function cat()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
