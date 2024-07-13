<?php

namespace App\Http\Controllers\spring;

use App\Http\Controllers\Controller;
use App\Models\spring\Grupo;
use App\Models\spring\OrdenacaoGeral;
use Inertia\Inertia;


class SpringHomeController extends Controller
{

    private function loadRelations($ordem)
    {
        if ($ordem->ordenavel_type === '\App\Models\spring\Grupo') {
            $grupo = $ordem->ordenavel;
            $ordem = $grupo->load('ordenacaoGrupo');
            if (isset($ordem->ordenacaoGrupo)) {
                $ordenacaoGrupos = $ordem->ordenacaoGrupo;
                foreach ($ordenacaoGrupos as $ordenacaoGrupo) {
                    $newGrupo = $ordenacaoGrupo->load('ordenavel')->ordenavel;
                    $this->loadRelations($newGrupo);
                }
            }
        }
    }
    public function index()
    {
        $ordens = OrdenacaoGeral::with('ordenavel')->get();
        foreach ($ordens as $ordem) {
            $this->loadRelations($ordem);
        }

        return Inertia::render('Index', [
            'ordens' => $ordens
        ]);
    }

    public function show($slug)
    {
        return Inertia::render('Docs');
    }
}
