<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class PorfolioHomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Welcome');
    }
}
