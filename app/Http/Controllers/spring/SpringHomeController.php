<?php

namespace App\Http\Controllers\spring;

use App\Http\Controllers\Controller;
use App\Models\spring\Grupo;
use App\Models\spring\OrdenacaoGeral;
use Inertia\Inertia;


class SpringHomeController extends Controller
{
    private function loadRelations($grupo)
    {
        $ordens = $grupo->load('ordenacaoGrupo')->ordenacaoGrupo;
        if (isset($ordens)) {
            foreach ($ordens as $ordem) {
                if($ordem->ordenavel_type === '\App\Models\spring\Grupo'){
                    $newGrupo = $ordem->load('ordenavel')->ordenavel;
                    $this->loadRelations($newGrupo);
                }else{
                    $ordem->load('ordenavel');
                }
            }
        }
    }
    public function index()
    {
        $ordens = OrdenacaoGeral::with('ordenavel')->get();
        foreach ($ordens as $ordem) {
            if ($ordem->ordenavel_type === '\App\Models\spring\Grupo') {
                $this->loadRelations($ordem->ordenavel);
            }
        }

        return Inertia::render('Index', [
            'ordens' => $ordens
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

        return Inertia::render('Docs', [
            'ordens' => $ordens
        ]);
    }
}
