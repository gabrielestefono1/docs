<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PortfolioContatoController extends Controller
{
    public function index()
    {
        return Inertia::render('Contato');
    }
}
