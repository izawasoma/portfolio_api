<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(["prefix" => "sample", "as" => "sample."], function() {
    Route::get("", [\App\Http\Controllers\SampleController::class, "apilist"])->name("apilist");
    Route::post("", [\App\Http\Controllers\SampleController::class, "apicreate"])->name("apicreate");
});