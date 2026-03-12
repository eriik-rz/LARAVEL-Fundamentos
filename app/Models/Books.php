<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Authors;
use App\Models\Loans;
use App\Models\Category;

class Books extends Model
{
		public function author(){
			return $this->belongsTo(Authors::class); // relación BelongsTo: muchos->uno (pertenece a un autor)
		}

		public function loans(){
			return $this->hasMany(Loans::class); // relación HasMany: uno->muchos (tiene muchos préstamos)
		}

		public function categories(){
			return $this->belongsToMany(Category::class); // relación BelongsToMany: muchos<->muchos (pertenece a muchas categorías)
		}
}
