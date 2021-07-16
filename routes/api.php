<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => 'auth',
    'middleware' => 'api'
], function () {
    Route::post('login', [AuthController::class,'login']);
    Route::post('logout', [AuthController::class,'logout']);
});

Route::group(['middleware' => ['role:Operations']], function() {
    Route::get('/products', function (){
        return \App\Models\Product::all();
    });
});

Route::group(['middleware' => ['role:HR']], function() {
    Route::get('/candidates', function (){
        return \App\Models\Candidate::all();
    });
});

