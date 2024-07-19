<?php

use App\Http\Controllers\Portfolio\PorfolioHomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PorfolioHomeController::class, 'index']);
