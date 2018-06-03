<?php

namespace ArmoredCore\WebKernel;
use ArmoredCore\WebKernel\IOCContainer;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 06-04-2017
 * Time: 00:06
 */
class ArmoredCore extends IOCContainer
{

    public static function getComponents()
    {
        return self::$instances;
    }

}