<?php

namespace App\Http\Controllers\react;

use App\Http\Controllers\Controller;
use App\Models\react\Categoria;
use App\Models\react\Grupo;
use App\Models\react\Post;
use Inertia\Inertia;


class HomeController extends Controller
{
    public function index()
    {
        $categorias = Categoria::with(['posts', 'grupos.posts'])->orderBy('ordenacao', 'asc')->get();
        $textos = Post::with('textos')->orderBy('ordenacao', 'asc')->first()->textos ?? [];
        return Inertia::render('Welcome', [
            'categorias' => $categorias,
            'textos' => $textos
        ]);
    }

    public function show($slug)
    {
        $categorias = Categoria::with(['posts', 'grupos.posts'])->orderBy('ordenacao', 'asc')->get();
        $textos = Post::with(['textos' => function ($query) {
            $query->orderBy('ordenacao');
        }])
            ->where('slug', $slug)
            ->first()
            ->textos ?? null;

        if (!$textos) {
            $textos = Grupo::with(['textos' => function ($query) {
                $query->orderBy('ordenacao');
            }])
                ->where('slug', $slug)
                ->first()->textos ?? [];
        }
        return Inertia::render('Docs', [
            'categorias' => $categorias,
            'textos' => $textos
        ]);
    }
}
