<?php

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
Route::post('/todo/add',[App\Http\Controllers\Api\TaskController::class,'add']);
Route::post('/todo/status/{id}',[App\Http\Controllers\Api\TaskController::class,'update']);
//Hit api/register for registration page
Route::get('register',[App\Http\Controllers\Api\TaskController::class,'index']);
Route::post('register',[App\Http\Controllers\Api\TaskController::class,'registration']);
//Hit api/register for login  page
Route::get('login',[App\Http\Controllers\Api\TaskController::class,'login']);
Route::post('login',[App\Http\Controllers\Api\TaskController::class,'userlogin']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
