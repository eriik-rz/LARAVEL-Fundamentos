<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{

  protected $table = 'book_category';

    public function book(){
      return $this->belongsTo(Books::class); // relación BelongsTo: muchos->uno (pertenece a un libro)
    }

    public function category(){
      return $this->belongsTo(Category::class); // relación BelongsTo: muchos->uno (pertenece a una categoría)
    }
}
