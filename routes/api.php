<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/libros', [ApiController::class, 'index']);

Route::post('/libros', [ApiController::class, 'store']);

?>