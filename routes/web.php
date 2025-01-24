<?php

use Illuminate\Support\Facades\Route;


Route::get('/', \App\Http\Controllers\UrlShortenerController::class);
Route::get('/{shortened}',[ \App\Http\Controllers\UrlShortenerController::class, 'redirect'])->name('redirect');
Route::post('urls', [\App\Http\Controllers\UrlShortenerController::class, 'store'])->name('urls.store');
