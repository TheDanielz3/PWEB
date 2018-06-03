<?php

namespace ArmoredCore\WebObjects;

use ArmoredCore\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 08-04-2017
 * Time: 22:38
 *
 *
 */
class ErrMgr extends Facade
{
    protected static function getName()
    {
        return 'ErrorManager';
    }
}