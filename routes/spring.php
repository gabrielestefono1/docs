<?php

use App\Http\Controllers\spring\SpringHomeController;
use Illuminate\Support\Facades\Route;

Route::domain('webestcoding.local')->group(function () {
    Route::get('/', [SpringHomeController::class, 'index']);
    Route::get('/{slug?}', [SpringHomeController::class, 'show'])->where('slug', '.*');
});
