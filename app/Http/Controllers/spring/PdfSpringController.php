<?php

namespace App\Http\Controllers\Spring;

use App\Http\Controllers\Controller;
use App\Models\spring\Grupo;
use App\Models\spring\OrdenacaoGeral;
use App\Models\spring\Postagem;
use Dompdf\Dompdf;
use Dompdf\Options;

class PdfSpringController extends Controller
{

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

    public function index($slug)
    {
        
        $options = new Options();
        $options->set('defaultFont', 'Roboto');

        
        $objetoAtual = $this->buscarTexto($slug);
        $textos = null;
        $titulos = null;
        if ($objetoAtual instanceof Postagem) {
            $textos = $objetoAtual->ordenacao_textos()->orderBy('ordem')->get()->load('texto');
            $titulos = $textos->map(fn ($ordem) => $ordem->texto)->map(fn ($texto) => ['id' => $texto->id, 'titulo' => $texto->titulo]);
        }

        return view('pdf.Spring.SpringPrint', [
            'objetoAtual' => $objetoAtual,
            'textos' => $textos ?? [],
            'titulos' => $titulos ?? [],
        ])->render();
    }

    public function generatePdf($slug)
    {
        $options = new Options();
        $options->set('defaultFont', 'Roboto');

        $objetoAtual = $this->buscarTexto($slug);
        $textos = null;
        $titulos = null;
        if ($objetoAtual instanceof Postagem) {
            $textos = $objetoAtual->ordenacao_textos()->orderBy('ordem')->get()->load('texto');
            $titulos = $textos->map(fn ($ordem) => $ordem->texto)->map(fn ($texto) => ['id' => $texto->id, 'titulo' => $texto->titulo]);
        }

        // Instanciar o Dompdf com as opções configuradas
        $dompdf = new Dompdf($options);

        // Obter o HTML de uma view do Laravel
        $html = view('pdf.Spring.SpringPrint', [
            'objetoAtual' => $objetoAtual,
            'textos' => $textos ?? [],
            'titulos' => $titulos ?? [],
        ])->render();

        // Carregar o HTML no Dompdf
        $dompdf->loadHtml($html);

        // Configurar o tamanho e a orientação do papel
        $dompdf->setPaper('A4', 'portrait');

        // Renderizar o HTML como PDF
        $dompdf->render();

        // Exibir o PDF no navegador
        $dompdf->stream('meu_documento.pdf', ['Attachment' => false]);
    }
}
