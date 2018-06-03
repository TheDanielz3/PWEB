<?php

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 12-04-2017
 * Time: 20:37
 */

namespace ArmoredCore\WebKernel;

use Aura\Di\ContainerBuilder;

class ArmCore2 extends ContainerBuilder
{
    protected static $_diBuilderInstance = null;

    public static function getDIBuilder()
    {

        if (is_null(static::$_diBuilderInstance)) {
            static::$_diBuilderInstance = new ContainerBuilder();
        }
        return static::$_diBuilderInstance->newInstance();
    }

}