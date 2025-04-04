<?php

use App\Http\Controllers\MimiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::resource('mimis', MimiController::class)->only('index', 'store', 'update', 'destroy');



