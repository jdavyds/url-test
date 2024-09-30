<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UrlController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{shortUrl}', [UrlController::class, 'redirect']);
