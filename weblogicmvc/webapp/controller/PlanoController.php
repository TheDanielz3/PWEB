<?php

use ArmoredCore\WebObjects\View;
use ArmoredCore\Controllers\BaseController;

class PlanoController extends BaseController
{
    public function index()
    {
        return View::make('calculadora.index');
    }

    public function show()
    {
        $calcula = new CalculadoraPlano();
        $credito = Post::get('valor_credito');
        $numPrest = Post::get('num_prest');
        $plano = $calcula -> calculaPlano($credito, $numPrest);
        return View::make('calculadora.show', ['plano' => $plano]);
    }
}