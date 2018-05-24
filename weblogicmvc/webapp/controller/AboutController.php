<?php

use ArmoredCore\Controllers\BaseController;
//use ArmoredCore\WebObjects\Redirect;
/**
 * Created by PhpStorm.
 * User: Diogo
 * Date: 12/04/2018
 * Time: 13:35
 */

class AboutController extends BaseController
{
    public function index() {
        return View::make('about.index');
    }
}