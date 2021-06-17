<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoasController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List pessoas
Route::get('pessoas', [PessoasController::class, 'index']);

// List single artigo
Route::get('pessoas/{id}', [PessoasController::class, 'show']);

// Create new pessoas
Route::post('pessoas', [PessoasController::class, 'store']);

// Update pessoas
Route::put('pessoas/{id}', [PessoasController::class, 'update']);

// Delete pessoas
Route::delete('pessoas/{id}', [PessoasController::class,'destroy']);
