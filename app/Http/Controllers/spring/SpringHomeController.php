<?php

namespace App\Http\Controllers\spring;

use App\Http\Controllers\Controller;
use Inertia\Inertia;


class SpringHomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Docs');
    }
}
