<?php

namespace ArmoredCore\Facades;

use ArmoredCore\WebKernel\ArmoredCore;
use Exception;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 06-04-2017
 * Time: 00:12
 */
abstract class Facade
{

    protected static function getName()
    {
        throw new Exception('Facade does not implement getName method.');
    }

    public static function __callStatic($method, $args)
    {
        $instance = ArmoredCore::get(static::getName());

        if (!method_exists($instance, $method)) {
            throw new Exception(get_called_class() . ' does not implement ' . $method . ' method.');
        }

        return call_user_func_array([$instance, $method], $args);
    }

}