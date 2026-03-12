<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(){
      $libros = Books::with('author')->get();
      return response()->json($libros);
    }

    public function store(Request $request){
      // Usamos la Request de Illuminate para poder usar ->validate()
      try{

        $validated = $request->validate([
          'title' => 'required|string',
          'author_id' => 'required|integer',
          'published_year' => 'required|integer',
        ]);

        $bookId = Books::insertGetId(array_merge($validated, [
            'created_at' => now(),
            'updated_at' => now(),
        ]));

        return response()->json(['id' => $bookId], 201);

      }catch(\Illuminate\Validation\ValidationException $e){
        // Devuelve errores de validación con status 422
        return response()->json(['errors' => $e->errors()], 422);
      }catch(\Exception $e){
        return response()->json(['error' => 'Error interno'], 500);
      }
    }
}
