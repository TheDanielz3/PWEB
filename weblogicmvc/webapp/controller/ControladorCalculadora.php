<?php
/**
 * Created by PhpStorm.
 * User: Diogo
 * Date: 20/04/2018
 * Time: 09:29
 */
use ArmoredCore\WebObjects\View;
use ArmoredCore\Controllers\BaseController;

class ControladorCalculadora
{
    public function index() {
        View::make('calculadora.index');
    }

    public function show() {

        View::make('view.VistaCalculadora');
    }
}