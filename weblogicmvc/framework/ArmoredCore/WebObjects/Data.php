<?php

namespace ArmoredCore\WebObjects;
use ArmoredCore\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 06-04-2017
 * Time: 17:46
 * @method static void get(string $dataName)
 *
 */
class Data extends Facade
{
    protected static function getName()
    {
        return 'Data';
    }
}