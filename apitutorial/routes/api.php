<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

use App\Http\Controllers\ArticleController;

Route::controller(ArticleController::class)->group(function () {
    Route::get('articles', 'index');
    Route::get('articles/{article}', 'show');
    Route::post('articles', 'store');
    Route::put('articles/{article}', 'update');
    Route::delete('articles/{article}', 'destroy');
});