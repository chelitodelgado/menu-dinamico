<?php

use App\Http\Controllers\MenuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/menu', [MenuController::class, 'index']);
Route::get('/etiquetas', [MenuController::class, 'categoria']);
Route::delete('/delete/{id}', [MenuController::class, 'delete'] );
Route::get('/edit/{id}', [MenuController::class, 'edit'] );
Route::post('/insert', [MenuController::class, 'insert']);
Route::post('/update', [MenuController::class, 'update']);
