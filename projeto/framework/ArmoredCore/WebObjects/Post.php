<?php

namespace ArmoredCore\WebObjects;

use ArmoredCore\Facades\Facade;
use assoc_arr;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 07-04-2017
 * Time: 16:32
 *
 * @method static object get(string $key)
 * @method static bool has(string $key)
 * @method static assoc_arr getAll()
 */
class Post extends Facade
{
    protected static function getName()
    {
        return 'Post';
    }
}