<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PortfolioSobreController extends Controller
{
    public function index()
    {
        return Inertia::render('Sobre');
    }
}
