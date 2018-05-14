<?php

namespace ArmoredCore\WebObjects;

use ArmoredCore\Facades\Facade;
use value;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 06-04-2017
 * Time: 16:47
 * @method static void toRoute(string $route, value $id) use route convention: controllername@methodname
 */
class URL extends Facade
{

    protected static function getName()
    {
        return 'URL';
    }

}
