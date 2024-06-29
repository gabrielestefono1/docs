<?php

namespace App\Http\Controllers\react;

use App\Http\Controllers\Controller;
use App\Models\react\Categoria;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(){
        $categorias = Categoria::with('posts')->get();
        return Inertia::render('Welcome', [
            'categorias' => $categorias
        ]);
    }
}
