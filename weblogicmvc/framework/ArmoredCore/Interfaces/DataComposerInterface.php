<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 06-04-2017
 * Time: 17:45
 */

namespace ArmoredCore\Interfaces;
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 10-05-2016
 * Time: 13:45
 */
interface DataComposerInterface
{
    public function set($array);

    public function get($key);
}