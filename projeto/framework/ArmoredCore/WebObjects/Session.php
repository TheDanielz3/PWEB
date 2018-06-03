<?php

namespace ArmoredCore\WebObjects;

use ArmoredCore\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 07-04-2017
 * Time: 16:22
 *
 * @method static void set(string $key, object $mixedvar)
 * @method static object get(string $key)
 * @method static bool has(string $key)
 * @method static void remove(string $key)
 * @method static void destroy()
 */
class Session extends Facade
{
    protected static function getName()
    {
        return 'Session';
    }
}