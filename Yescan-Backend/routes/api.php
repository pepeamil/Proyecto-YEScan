<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\ConsultaController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/provincia', [ProvinciaController::class,'getProvinciaSinParametro']);

//para pasar el id de una provincia
Route::get('/provincias/{id}', [ProvinciaController::class,'getProvinciaConParametro']);

Route::get('/provinciasAlternativa/{id?}', [ProvinciaController::class,'getProvinciaAlternativa']);


//Ruta para visualizar todas la provincias registradas en la base de datos
Route::get('/provincias', [ProvinciaController::class,'index']);

//ruta para el registro de una provincia en una base de datos
Route::post('/insert-provincias', [ProvinciaController::class,'store']);

//ruta para el actualizar una provincia en una base de datos
Route::put('/update-provincias/{id}', [ProvinciaController::class,'update']);

//ruta para desactivar una provincia en una base de datos
Route::delete('/delete-provincias/{id}', [ProvinciaController::class,'destroy']);

//ruta para reactivar una provincia en una base de datos
Route::put('/restore-provincias/{id}', [ProvinciaController::class,'restore']);

//ruta para el registro de una consulta en una base de datos
Route::post('/insert-consultas', [ConsultaController::class,'store']);