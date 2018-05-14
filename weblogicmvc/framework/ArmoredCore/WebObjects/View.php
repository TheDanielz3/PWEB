<?php

namespace ArmoredCore\WebObjects;

use ArmoredCore\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 06-04-2017
 * Time: 00:40
 *
 * @method static View make(string $viewName, array $viewData = null)
 * @method static void attachSubView ( string $placeHolder, string $viewName, array $viewData = [])
 */
class View extends Facade
{
    protected static function getName()
    {
        return 'View';
    }
}