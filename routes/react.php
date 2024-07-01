<?php

use App\Http\Controllers\react\HomeController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'referencia'], function (){
    Route::get('/', [HomeController::class, 'index'])->name('react-home');
    Route::get('/{slug}', [HomeController::class, 'show'])->name('react-home');
});