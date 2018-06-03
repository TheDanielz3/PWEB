<?php

namespace ArmoredCore\WebObjects;

use ArmoredCore\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 07-04-2017
 * Time: 16:48
 * @method static void toRoute(string $routeName, string $id = '')
 * @method static void toURL(string $url)
 * @method static void flashToRoute(string $routeName, array $flashData, string $id = '')
 */
class Redirect extends facade
{
    protected static function getName()
    {
        return 'Redirector';
    }
}