<?php

use App\Http\Controllers\Portfolio\PorfolioHomeController;
use App\Http\Controllers\Portfolio\PortfolioSobreController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PorfolioHomeController::class, 'index']);
Route::get('/sobre', [PortfolioSobreController::class, 'index']);
