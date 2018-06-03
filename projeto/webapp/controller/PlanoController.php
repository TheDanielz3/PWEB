<?php

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 19-04-2017
 * Time: 18:55
 */
class PlanoController extends \ArmoredCore\Controllers\BaseController
{

    public function show(){
        $dados = \ArmoredCore\WebObjects\Post::getAll();
        \ArmoredCore\WebObjects\View::make('home.show', ['plano' => $dados]);
    }
}