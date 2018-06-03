<?php
/**
 * Created by PhpStorm.
 * User: Diogo
 * Date: 03/05/2018
 * Time: 18:33
 */
use ArmoredCore\WebObjects\View;
use ArmoredCore\Controllers\BaseController;

class LoginController
{
    public function index()
    {
        //return View::make('blackjack.show');
    }

    public function doLogin()
    {
        return View::make('user.login');
    }

    public function register()
    {
        return View::make('user.create');
    }

    public function store()
    {
        return View::make('');
    }
}


