<?php

use App\Http\Controllers\ClienteControllerAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/clientes',[ClienteControllerAPI::class,'index']);

Route::post('/clientes',[ClienteControllerAPI::class,'store']);

Route::get('/clientes/{id}',[ClienteControllerAPI::class,'show']);

Route::patch('/clientes/{id}',[ClienteControllerAPI::class,'update']);

Route::put('/clientes/{id}',[ClienteControllerAPI::class,'update']);

Route::delete('/clientes/{id}',[ClienteControllerAPI::class,'destroy']);