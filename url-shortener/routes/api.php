<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UrlController;

Route::post('/shorten', [UrlController::class, 'store']);
Route::get('/{shortUrl}', [UrlController::class, 'redirect']);


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
