<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
	// Un autor tiene muchos libros — nombrar el método en plural facilita su uso
	public function books()
	{
			return $this->hasMany(Books::class); // relación HasMany: uno->muchos (tiene muchos libros)
	}
}

