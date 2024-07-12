<?php

namespace App\Http\Controllers\spring;

use App\Http\Controllers\Controller;
use App\Models\spring\OrdenacaoGeral;
use Inertia\Inertia;


class SpringHomeController extends Controller
{
    public function index()
    {
        dd(OrdenacaoGeral::with('ordenavel')->get());
        return Inertia::render('Index', [
            // 'grupos' => $grupos
        ]);
    }

    public function show($slug)
    {
        return Inertia::render('Docs');
    }
}
