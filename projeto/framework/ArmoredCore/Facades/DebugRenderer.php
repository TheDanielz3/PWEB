<?php

namespace ArmoredCore\Facades;

use ArmoredCore\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 09-04-2017
 * Time: 23:08
 * @method static void renderHead()
 * @method static void render()
 */
class DebugRenderer extends Facade
{
    protected static function getName()
    {
        return 'DebugRenderer';
    }
}