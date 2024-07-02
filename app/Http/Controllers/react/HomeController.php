<?php

namespace App\Http\Controllers\react;

use App\Http\Controllers\Controller;
use App\Models\react\Categoria;
use App\Models\react\Grupo;
use App\Models\react\Post;
use Inertia\Inertia;


class HomeController extends Controller
{
    public function index(){
        $categorias = Categoria::with(['posts', 'grupos.posts'])->orderBy('ordenacao')->get();
        $textos = Post::with('textos')->orderBy('ordenacao')->first()->textos ?? [];
        return Inertia::render('Welcome', [
            'categorias' => $categorias,
            'textos' => $textos
        ]);
    }

    public function show($slug){
        $categorias = Categoria::with(['posts', 'grupos.posts'])->orderBy('ordenacao')->get();
        $textos = Post::with('textos')->where('slug', $slug)->orderBy('ordenacao')->first()->textos ?? null;
        if(!$textos){
            $textos = Grupo::with('textos')->where('slug', $slug)->orderBy('ordenacao')->first()->textos ?? [];
        }
        return Inertia::render('Docs', [
            'categorias' => $categorias,
            'textos' => $textos
        ]);
    }
}
