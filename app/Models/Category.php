<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function books(){
      return $this->belongsToMany(Books::class); // relación BelongsToMany: muchos<->muchos (pertenece a muchos libros)
    }
}
