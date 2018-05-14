<?php

namespace ArmoredCore\WebObjects;

use ArmoredCore\Facades\Facade;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 06-04-2017
 * Time: 17:05
 *
 * @method static void css(string $filenameCSS)
 * @method static void js(string $filenameJS)
 * @method static void image(string $filenameImage)
 * @method static void html(string $HTMLfilename)
 */
class Asset extends Facade
{

    protected static function getName()
    {
        return 'Asset';
    }

}