<?php

namespace ArmoredCore\Facades;

use ArmoredCore\Facades\Facade;
use ArmoredCore\WebKernel\ArmoredCore;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 09-04-2017
 * Time: 22:57
 */
class Debug extends Facade
{
    protected static function getName()
    {
        return 'Debugger';
    }

    public static function dump($mixedvar)
    {
        $instance = ArmoredCore::get('Debugger');
        $instance["messages"]->addMessage($mixedvar);
    }
}