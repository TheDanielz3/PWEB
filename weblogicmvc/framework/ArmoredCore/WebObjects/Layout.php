<?php

namespace ArmoredCore\WebObjects;

use ArmoredCore\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 06-04-2017
 * Time: 19:00
 *
 * @method static void includeLayout(string $layoutViewName)
 * @method static void includeView(string $subViewName)
 */
class Layout extends Facade
{
    protected static function getName()
    {
        return 'Layout';
    }
}