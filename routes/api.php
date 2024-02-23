<?php

use App\Http\Controllers\API\IzidokController;
use App\Http\Controllers\API\IziklaimController;
use App\Http\Controllers\API\MedlinxController;
use App\Livewire\Pages\Hero\Izidok;
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
Route::group(['prefix'=>'v1'],function(){
    Route::get('/medlinx',[MedlinxController::class,'index']);
    Route::get('/izidok',[IzidokController::class,'index']);
    Route::get('/iziklaim',[IziklaimController::class,'index']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
