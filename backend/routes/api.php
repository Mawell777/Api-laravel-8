<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PersonController;
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



//Get all count
Route::get('count',[PersonController::class,'getPersonCount']);
//Get all persons
Route::get('persons',[PersonController::class,'getPerson']);
//get detail persons
Route::get('person/{id}',[PersonController::class,'getPersonById']);
//Add new person
Route::post('addperson',[PersonController::class,'addPerson']);
//Update person
Route::put('updateperson/{id}',[PersonController::class,'updatePerson']);
//Delete person
Route::delete('deleteperson/{id}',[PersonController::class,'deletePerson']);