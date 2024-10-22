<?php

use App\Http\Controllers\API\DatadesaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(DatadesaController::class)->group(function(){
    Route::get('/desa','index');
    Route::get('/desa/show/{id}','show');
    Route::post('/desa','store');
    Route::post('/desa/update/{id}','update');
    Route::delete('/desa/delete/{id}','destroy');
});
