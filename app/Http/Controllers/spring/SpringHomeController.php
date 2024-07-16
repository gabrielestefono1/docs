<?php

namespace App\Http\Controllers\spring;

use App\Http\Controllers\Controller;
use App\Models\spring\Grupo;
use App\Models\spring\OrdenacaoGeral;
use App\Models\spring\Postagem;
use Inertia\Inertia;

use function PHPUnit\Framework\isEmpty;

class SpringHomeController extends Controller
{
    private function loadRelations($grupo)
    {
        $ordens = $grupo->load('ordenacaoGrupo')->ordenacaoGrupo;
        if (isset($ordens)) {
            foreach ($ordens as $ordem) {
                if ($ordem->ordenavel_type === '\App\Models\spring\Grupo') {
                    $newGrupo = $ordem->load('ordenavel')->ordenavel;
                    $this->loadRelations($newGrupo);
                } else {
                    $ordem->load('ordenavel');
                }
            }
        }
    }

    private function buscarTexto($slug)
    {
        // Verifica se existe alguma barra
        $barra = strrpos($slug, '/');
        $texto = "";
        // Caso não exista
        if (!$barra) {
            $texto = Grupo::where('slug', $slug)->first();
            return $texto ?? Postagem::where('slug', $slug)->first();
        }
        // Caso exista
        $barra = substr($slug, strrpos($slug, '/') + 1);
        $texto = Grupo::where('slug', $barra)->first();
        return $texto = $texto ?? Postagem::where('slug', $barra)->first();
    }

    public function index()
    {
        $ordens = OrdenacaoGeral::with('ordenavel')->get();
        foreach ($ordens as $ordem) {
            if ($ordem->ordenavel_type === '\App\Models\spring\Grupo') {
                $this->loadRelations($ordem->ordenavel);
            }
        }

        $objetoAtual = Postagem::first();

        return Inertia::render('Index', [
            'ordens' => $ordens,
            'objetoAtual' => $objetoAtual
        ]);
    }

    public function show($slug)
    {
        $ordens = OrdenacaoGeral::with('ordenavel')->get();
        foreach ($ordens as $ordem) {
            if ($ordem->ordenavel_type === '\App\Models\spring\Grupo') {
                $this->loadRelations($ordem->ordenavel);
            }
        }

        $objetoAtual = $this->buscarTexto($slug);
        $textos = null;
        if($objetoAtual instanceof Postagem){
            $textos = $objetoAtual->ordenacao_textos()->orderBy('ordem')->get()->load('texto');
        }

        return Inertia::render('Docs', [
            'ordens' => $ordens,
            'objetoAtual' => $objetoAtual,
            'textos' => $textos
        ]);
    }
}
