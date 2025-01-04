<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(["prefix" => "sample", "as" => "sample."], function() {
    Route::get("", [\App\Http\Controllers\SampleController::class, "list"])->name("list");
    Route::get("go-add", [\App\Http\Controllers\SampleController::class, "goAdd"])->name("goAdd");
    Route::post("", [\App\Http\Controllers\SampleController::class, "add"])->name("add");
});