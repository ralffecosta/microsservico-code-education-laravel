<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenreController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Criando as rotas dentro de um namespace
Route::prefix('api')->group(function () {
    
});

Route::resource('categories', CategoryController::class)->except('create', 'edit');
Route::resource('genres', GenreController::class)->except('create', 'edit');
