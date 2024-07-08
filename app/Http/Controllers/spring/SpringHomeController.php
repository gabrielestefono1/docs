<?php

namespace App\Http\Controllers\spring;

use App\Http\Controllers\Controller;
use App\Models\spring\Conteudo;
use App\Models\spring\Grupo;
use Inertia\Inertia;


class SpringHomeController extends Controller
{
    public function index()
    {
        $conteudo = Grupo::with('conteudo')->find(10);
        dd($conteudo->conteudo->ordem);
        return Inertia::render('Index', [
            // 'grupos' => $grupos
        ]);
    }

    public function show($slug)
    {
        return Inertia::render('Docs');
    }
}
