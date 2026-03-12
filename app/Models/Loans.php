<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Books;

class Loans extends Model
{
	// El nombre correcto de la tabla creada en la migración es 'loans'
	protected $table = 'loans';

		public function book(){
			return $this->belongsTo(Books::class); // relación BelongsTo: muchos->uno (pertenece a un libro)
		}
}
